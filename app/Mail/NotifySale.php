<?php

namespace App\Mail;

use App\Models\Program;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifySale extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public Program $program;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Program $program)
    {
        $this->user = $user;
        $this->program = $program;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.sale.notify');
    }
}
