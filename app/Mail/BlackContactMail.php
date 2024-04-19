<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlackContactMail extends Mailable
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
        $this->total_score = array_sum($request->score);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
            ->subject('【ブラック診断】診断結果のご連絡 ㈱ミツカル')
            ->view('taxblacksinndann.emails.mail')
            ->with([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'total_score' => $this->total_score,
            ]);
    }
}
