<?php

namespace App\Mail;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class CvEmail extends Mailable
{
    use Queueable, SerializesModels;



    /**
     * Create a new message instance.
     */
    public function __construct(
        public string $name,
        public string $email,
        public string $cvPath,
        public string $jobTitle,
        public string $sentAt = '',

    ) {
        $this->sentAt = now()->format('d F Y H:i');
    }

    public function build(): static
    {
        return $this
            ->subject('Cerere nouă — ' . $this->name)
            ->view('mail.job-application')
            ->attach(Attachment::fromStorage($this->cvPath));
    }
}
