<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendLpController extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($post_data, $ccAddress, $FROM_NAME, $FROM_EMAIL, $SUBJECT, $BODY)
    {
        $this->toAddress = $post_data;
        $this->ccAddress = $ccAddress;
        $this->FROM_NAME = $FROM_NAME;
        $this->FROM_EMAIL = $FROM_EMAIL;
        $this->SUBJECT = $SUBJECT;
        $this->BODY = $BODY;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Mail::raw($this->BODY, function($message){
          $message->to($this->toAddress)
              ->subject($this->SUBJECT);
        });
    }
}
