<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with(['employer', 'tags', 'experience'])->latest()->get();

        return view('jobs.index', [
            'featured'  => $jobs->where('feature', true)->values(),
            'jobs'      => $jobs->where('feature', false)->values(),
            'tags'      => Tag::all(),
            'employers' => Employer::all(),
        ]);
    }

    public function show(Job $job)
    {

        $otherJobs = Job::with(['employer', 'tags'])
            ->where('employer_id', $job->employer_id)
            ->where('id', '!=', $job->id)
            ->limit(3)
            ->get();
        return view('jobs.job', compact(['job', 'otherJobs']));
    }

    public function byTags()
    {
        $tags = Tag::all();
        return view('jobs.tags', compact('tags'));
    }

    public function byCareer()
    {
        $featuredJobs = Job::with(['employer', 'tags'])
            ->latest()
            ->take(6)
            ->get();

        $topTags = Tag::withCount('jobs')
            ->orderByDesc('jobs_count')
            ->take(8)
            ->get();

        return view('jobs.career', compact('featuredJobs', 'topTags'));
    }

    public function byCompany()
    {
        $employers = Employer::with(['job'])->get();
        $jobs = Job::with(['employer', 'tags', 'experience'])->get();
        return view('jobs.company', compact('employers','jobs'));
    }

    public function bySalaries()
    {
        $jobs = Job::with(['employer', 'tags', 'experience'])
            ->whereNotNull('salary')
            ->orderByDesc('salary')
            ->get();

        $salaryRanges = [
            '0 - 999' => $jobs->whereBetween('salary', [0, 999])->count(),
            '1000 - 1999' => $jobs->whereBetween('salary', [1000, 1999])->count(),
            '2000 - 2999' => $jobs->whereBetween('salary', [2000, 2999])->count(),
            '3000+' => $jobs->where('salary', '>=', 3000)->count(),
        ];

        return view('jobs.salaries', [
            'jobs' => $jobs->take(12),
            'salaryRanges' => $salaryRanges,
            'salaryStats' => [
                'count' => $jobs->count(),
                'average' => round($jobs->avg('salary') ?? 0),
                'max' => $jobs->max('salary') ?? 0,
                'min' => $jobs->min('salary') ?? 0,
            ],
        ]);
    }

    public function byStudy()
    {

        $alphabet = collect(explode(',', 'A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z'));
        $jobs = Job::groupBy('title')->get('title');
        $indexedCollection = [];

        $jobs->each(function ($job) use (&$indexedCollection, $alphabet) {
            $firstLetter = strtoupper($job->title[0]);

            if ($alphabet->contains($firstLetter)) {

                if (!isset($indexedCollection[$firstLetter])) {
                    $indexedCollection[$firstLetter] = [];
                }

                $indexedCollection[$firstLetter][] = $job->title;
            }
        });

        return view('jobs.studies', compact(['indexedCollection', 'alphabet']));
    }

    public function findStudy(Job $job)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function panel()
    {
        if (Auth::user()->role === 'admin') {
            return redirect('/admin');
        } else {
            return redirect('/employer');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Full Time', 'Part Time'])],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable',]
        ]);

        $attributes['feature'] = $request->has('featured');

        $job = Auth::user()->employer->job()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags']) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }

        return redirect('/');
    }
}
