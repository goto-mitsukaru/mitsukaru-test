<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NennsyuContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $career_income = [
        0,
        20,
        30,
        40,
        50,
        10,
    ];

    private $yearly = [
        '400万円未満' => 453,
        '400～500万円未満' => 543,
        '500～600万円未満' => 673,
        '600～700万円未満' => 763,
        '700～800万円未満' => 831,
        '800～900万円未満' => 924,
        '900～1000万円未満' => 1132,
        '1000万円以上' => 1165,
    ];

    public function __construct($request)
    {
        $this->lastname = $request['lastname'];
        $this->firstname = $request['firstname'];
        $this->email = $request['mail_address'];
        $this->career = $request['career'];
        $this->yearly_income = $request['yearly_income'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $target = $this->yearly[$this->yearly_income[0]] + $this->career_income[$this->career];

        return $this->to($this->email)
            ->subject('お問い合わせありがとうございます。')
            ->view('taxnennsyushinndann.emails.mail')
            ->with([
                'lastname' => $this->lastname,
                'firstname' => $this->firstname,
                'over' => $this->yearly_income[0] == '1000万円以上',
                'yearly' => $this->yearly[$this->yearly_income[0]],
                'career' => $this->career_income[$this->career],
            ]);
    }
}
