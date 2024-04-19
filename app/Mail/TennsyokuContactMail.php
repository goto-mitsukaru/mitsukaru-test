<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TennsyokuContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->firstname = $request->firstname;
        $this->lastname = $request->lastname;
        $this->email = $request->mail_address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
            ->subject('お問い合わせありがとうございます。')
            ->view('taxtennsyokusinndann.emails.mail')
            ->with([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
            ]);
    }
}
