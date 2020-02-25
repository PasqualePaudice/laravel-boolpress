<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $messaggio;

    public function __construct($lead)
    {
        $this->messaggio= $lead;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@sito.it')->view('mail.messaggio-conferma');
    }
}
