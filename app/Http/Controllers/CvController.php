<?php

namespace App\Http\Controllers;

use App\Events\JobApplicationSubmitted;
use App\Mail\CvEmail;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CvController extends Controller
{
    public function send(Request $request, Job $job)
    {
        $validated = $request->validate([
            'candidate_name'  => 'required|string',
            'candidate_email' => 'required|email',
            'candidate_cv'    => ['required', File::types(['docx', 'pdf', 'doc'])],
        ]);

        $cvPath = $request->file('candidate_cv')->store('cvs');

        $user = Auth::user();

        if($user){
            //salvez in tabelul job_user[many-to-many]
            $job->applicants()->attach(Auth::id(), ['cv_path' => $cvPath]);

        }else{
            $user = null;
        }

        //foloses event-listener-queue pentru rapididate si functionare mai buna trimitere email
        JobApplicationSubmitted::dispatch($job, $user, $cvPath, $validated['candidate_name'], $validated['candidate_email']);


        return redirect()->back()->with('success', 'Cererea a fost trimisă!');
    }

    public function applications()
    {
        $user = Auth::user();
        $applications = $user?->isEmployee() ? $user->jobs()->with('employer')->get() : redirect(route('home'), 403);

        return view('employee.applications', compact('applications'));
    }
}
