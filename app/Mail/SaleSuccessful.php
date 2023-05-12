<?php

namespace App\Mail;

use App\Models\Program;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SaleSuccessful extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $program;
    public $date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $to_user, Program $program)
    {
        $this->user = $to_user;
        $this->program = $program;
        $this->date = (intval(date('j')) > 5) ? now()->addMonthsNoOverflow()->format('F') : now()->format('F');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.sale.success')->subject('IZ Online Education Enrollment Confirmation');
    }
}
