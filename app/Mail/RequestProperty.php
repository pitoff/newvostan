<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestProperty extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $propertyTitle;
    public $body;
    public $property;
    public $email;

    public function __construct($propertyTitle, $id, $email, $body)
    {
        $this->propertyTitle = $propertyTitle;
        $this->body = $body;
        $this->property = $id;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.requestProperty')
                    ->subject('Property Request');
    }
}
