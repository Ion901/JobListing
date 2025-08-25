<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //grupeaza in grupe dupa feature, daca am 2[0,1] atunci imi returneaza o colectie cu colectii
        $job = Job::latest()->with(['employer','tags'])->get()->groupBy('feature');

        return view('jobs.index',[
            'featured' => $job[0],
            'jobs' => $job[1],
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
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
            'schedule' => ['required', Rule::in(['Full Time','Part Time'])],
            'url' => ['required','active_url'],
            'tags' => ['nullable',]
        ]);

        $attributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->job()->create(Arr::except($attributes,'tags'));

        if($attributes['tags']){
            foreach(explode(',',$attributes['tags']) as $tag){
                $job->tag($tag);
            }
        }

        return redirect('/');
    }
}