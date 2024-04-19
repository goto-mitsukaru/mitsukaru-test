<?php

namespace App\Mail;

use App\Models\Recruit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->lastname = $request->lastname;
        $this->firstname = $request->firstname;
        $this->email = $request->mail_address;
        $this->id = $request->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->id){
            $recruit = Recruit::where('id', $this->id)->first();
        }else{
            $recruit = null;
        }

        return $this->to($this->email)
            ->subject('お問い合わせありがとうございます。')
            ->view('emails.mail')
            ->with([
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'recruit' => $recruit
            ]);
    }
}
