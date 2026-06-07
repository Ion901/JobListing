<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class SearchController extends Controller
{
    public function __invoke($search = ' ')
    {
        $term = request('q') ?? $search;

        $attr = request('q') ? 'title' : 'title_slug';

        $jobs = Job::with(['employer', 'tags'])
            ->where($attr, 'like', "%{$term}%")
            ->get();

        return view('results', ['jobs' => $jobs]);
    }
}
