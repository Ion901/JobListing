<?php

namespace App\Listeners;

use App\Events\JobApplicationSubmitted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\CvEmail;

class JobApplicationListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(JobApplicationSubmitted $event): void
    {
        Mail::to($event->job->employer->user->email)->send(new CvEmail(
            name: $event->candidate_name,
            email: $event->candidate_email,
            cvPath: $event->cvPath,
            jobTitle: $event->job->title
        ));
    }
}
