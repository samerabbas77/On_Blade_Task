<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class DailyTasks extends Mailable
{
    use Queueable, SerializesModels;

    protected $tasks;
    protected $user;
    /**
     * Create a new message instance.
     */
    public function __construct($tasks,$user)
    {
        $this->tasks = $tasks;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Daily Tasks',
            from: "no-reply@FocalX.com",
            to: $this->user->email,
            cc: ['manager@FocalX.com'],
            bcc: ['audit@FocalX.com']
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Mail.TaskMail',  
            with: [
                'tasks' => $this->tasks,
                'user' => $this->user
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
