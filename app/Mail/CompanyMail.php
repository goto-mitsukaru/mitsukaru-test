<?php

namespace App\Mail;

use App\Models\Recruit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyMail extends Mailable
{
    use Queueable, SerializesModels;

    private $career_array = [
        '未経験',
        '1年～3年',
        '3年～5年',
        '5年～7年',
        '7年以上',
    ];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->id = $request->id;
        $this->lastname = $request->lastname;
        $this->firstname = $request->firstname;
        $this->phone_number = $request->phone_number;
        $this->email = $request->mail_address;
        $this->age = $request->age;
        $this->career = $request->career;
        $this->text_form = $request->text_form;
        $this->style = $request->style;
        $this->license = $request->license;
        $this->region = $request->region;
        $this->facebook = $request->facebook;
        $this->src = $request->src;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $career = $this->career_array;

        if ($this->id) {
            $recruit = Recruit::where('id', $this->id)->first();
        } else {
            $recruit = null;
        }

        $env = config('environment.env');
        if ($env == 'develop') {
            // 開発用の送り先
            return
                $this
                    ->to('greentea.4k@gmail.com')
                    ->subject('開発環境/エントリー問い合わせ')
                    ->view('emails.company')
                    ->with([
                        'lastname' => $this->lastname,
                        'firstname' => $this->firstname,
                        'phone_number' => $this->phone_number,
                        'email' => $this->email,
                        'license' => $this->license,
                        'career' => $career[($this->career)],
                        'age' => $this->age,
                        'text_form' => $this->text_form,
                        'style' => $this->style,
                        'region' => $this->region,
                        'recruit' => $recruit,
                        'facebook' => $this->facebook,
                        'src' => $this->src,
                    ]);
        } else {
            return
                $this
                    ->to('agent@mitsukaru-jpn.com')
                    ->bcc('moncson@gmail.com')
                    ->bcc('cocoa2647@gmail.com')
                    ->bcc('k-yokoo@hion-tech.com')
                    ->subject('エントリー問い合わせ')
                    ->view('emails.company')
                    ->with([
                        'lastname' => $this->lastname,
                        'firstname' => $this->firstname,
                        'phone_number' => $this->phone_number,
                        'email' => $this->email,
                        'license' => $this->license,
                        'career' => $career[($this->career)],
                        'age' => $this->age,
                        'text_form' => $this->text_form,
                        'style' => $this->style,
                        'region' => $this->region,
                        'recruit' => $recruit,
                        'facebook' => $this->facebook,
                        'src' => $this->src,
                    ]);
        }
    }
}
