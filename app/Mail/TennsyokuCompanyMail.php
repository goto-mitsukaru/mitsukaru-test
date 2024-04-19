<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TennsyokuCompanyMail extends Mailable
{
    use Queueable, SerializesModels;

    private $career_array = [
        '未経験',
        '1年～3年',
        '3年～5年',
        '5年～7年',
        '7年以上',
        '未経験(経理経験あり)',
    ];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->firstname = $request->firstname;
        $this->lastname = $request->lastname;
        $this->phone_number = $request->phone_number;
        $this->email = $request->mail_address;
        $this->work_style = $request->work_style;
        $this->reason = $request->reason;
        $this->license = $request->license;
        $this->region = $request->region;
        $this->career = $request->career;
        $this->age = $request->age;
        $this->text_form = $request->text_form;

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

        $title = '職場診断問い合わせ';
        if (preg_match('/facebook/', $this->src) || preg_match('/fbclid/', $this->src)) $title = '【facebook】' . $title;
        elseif (preg_match('/sms/', $this->src)) $title = '【SMS】' . $title;
        elseif (preg_match('/email/', $this->src) || preg_match('/utm_source=hs_email/', $this->src)) $title = '【メルマガ】' . $title;

        $env = config('environment.env');
        if($env == 'develop') {
            // 開発用の送り先
            return
                $this
                    ->to('greentea.4k@gmail.com')
                    //                    ->bcc('cocoa2647@gmail.com')
//                    ->bcc('8wakawo@gmail.com')
//                    ->bcc('k-yokoo@hion-tech.com')
                    ->subject('開発環境/'.$title)
                    ->view('taxtennsyokusinndann.emails.company')
                    ->with([
                        'firstname' => $this->firstname,
                        'lastname' => $this->lastname,
                        'phone_number' => $this->phone_number,
                        'email' => $this->email,
                        'work_style' => $this->work_style,
                        'reason' => $this->reason,
                        'license' => $this->license,
                        'region' => $this->region,
                        'career' => $career[($this->career)],
                        'age' => $this->age,
                        'text_form' => $this->text_form,
                        'facebook' => $this->facebook,
                        'src' => $this->src,
                    ]);
        }else{
            // 本番環境用
            return
                $this
                    ->to('agent@mitsukaru-jpn.com')
                    ->bcc('moncson@gmail.com')
                    ->bcc('cocoa2647@gmail.com')
                    ->bcc('k-yokoo@hion-tech.com')
                    ->subject($title)
                    ->view('taxtennsyokusinndann.emails.company')
                    ->with([
                        'firstname' => $this->firstname,
                        'lastname' => $this->lastname,
                        'phone_number' => $this->phone_number,
                        'email' => $this->email,
                        'work_style' => $this->work_style,
                        'reason' => $this->reason,
                        'license' => $this->license,
                        'region' => $this->region,
                        'career' => $career[($this->career)],
                        'age' => $this->age,
                        'text_form' => $this->text_form,
                        'facebook' => $this->facebook,
                        'src' => $this->src,
                    ]);
        }
    }
}
