<?php

namespace App\Http\Controllers;


use App\Models\Job;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index(){
        //grupeaza in grupe dupa feature, daca am 2[0,1] atunci imi returneaza o colectie cu colectii
        $job = Job::latest()->with(['employer', 'tags'])->get()->groupBy('feature');

        return view('jobs.index', [
            'featured' => $job[0],
            'jobs' => $job[1],
            'tags' => Tag::all()
        ]);
    }
}
