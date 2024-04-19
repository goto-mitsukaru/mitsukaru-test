<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlackContactMailNew extends Mailable
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
        // $this->lastname = $request->lastname;
        $this->email = $request->email;
        $score = request()->input('score');
        // dd($score);
        $scoreArray = explode(',', $score);
        $scoreArray = array_map('trim', $scoreArray);
        // 空白を削除した配列を得る
        $scoreArray = array_filter($scoreArray, function ($value) {
            return $value !== '';
        });
        // dd($scoreArray);
        $this->total_score = array_sum($scoreArray);
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
            ->view('taxblacksinndannnew.emails.mail')
            ->with([
                'firstname' => $this->firstname,
                // 'lastname' => $this->lastname,
                'total_score' => $this->total_score,
            ]);
    }
}
