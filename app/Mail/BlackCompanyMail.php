<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlackCompanyMail extends Mailable
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
        $this->firstname = $request->firstname;
        $this->lastname = $request->lastname;
        $this->phone_number = $request->phone_number;
        $this->email = $request->mail_address;

        $this->month_overtime = $request->month_overtime;
        $this->set_overtime = $request->set_overtime;
        $this->right_overtime = $request->right_overtime;
        $this->attendance = $request->attendance;
        $this->paid_vacation = $request->paid_vacation;
        $this->break_time = $request->break_time;
        $this->training = $request->training;
        $this->evaluation = $request->evaluation;
        $this->employee_benefits = $request->employee_benefits;
        $this->relationships = $request->relationships;
        $this->workplace_situation = $request->workplace_situation;
        $this->my_situation = $request->my_situation;

        $this->career = $request->career;
        $this->age = $request->age;
        $this->region = $request->region;
        $this->text_form = $request->text_form;
        $this->facebook = $request->facebook;
        $this->src = $request->src;
        $this->total_score = array_sum($request->score);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $career = $this->career_array;

        $title = 'ブラック診断問い合わせ';
        if (preg_match('/utm_source=facebook/', $this->src) || preg_match('/fbclid/', $this->src)) $title = '【facebook】' . $title;
        elseif (preg_match('/utm_source=sms/', $this->src) || preg_match('/utm_source=hs_sms/', $this->src)) $title = '【SMS】' . $title;
        elseif (preg_match('/utm_source=email/', $this->src) || preg_match('/utm_source=hs_email/', $this->src)) $title = '【メルマガ】' . $title;

        $env = config('environment.env');
        if ($env == 'develop') {
            // 開発用の送り先
            return
                $this
//                    ->to('cocoa2647@gmail.com')
                    ->to('greentea.4k@gmail.com')
//                    ->bcc('agent@mitsukaru-jpn.com')
                    ->subject('開発環境/'.$title)
                    ->view('taxblacksinndann.emails.company')
                    ->with([
                        'firstname' => $this->firstname,
                        'lastname' => $this->lastname,
                        'phone_number' => $this->phone_number,
                        'email' => $this->email,

                        'month_overtime' => $this->month_overtime,
                        'set_overtime' => $this->set_overtime,
                        'right_overtime' => $this->right_overtime,
                        'attendance' => $this->attendance,
                        'paid_vacation' => $this->paid_vacation,
                        'break_time' => $this->break_time,
                        'training' => $this->training,
                        'evaluation' => $this->evaluation,
                        'employee_benefits' => $this->employee_benefits,
                        'relationships' => $this->relationships,
                        'workplace_situation' => $this->workplace_situation,
                        'my_situation' => $this->my_situation,
                        'total_score' => $this->total_score,

                        'career' => $career[($this->career)],
                        'age' => $this->age,
                        'region' => $this->region,
                        'text_form' => $this->text_form,
                        'facebook' => $this->facebook,
                        'src' => $this->src,
                    ]);

        } else {
            return
                $this
                    ->to('agent@mitsukaru-jpn.com')
                    ->bcc('moncson@gmail.com')
                    ->bcc('k-yokoo@hion-tech.com')
                    ->bcc('cocoa2647@gmail.com')
                    ->subject($title)
                    ->view('taxblacksinndann.emails.company')
                    ->with([
                        'firstname' => $this->firstname,
                        'lastname' => $this->lastname,
                        'phone_number' => $this->phone_number,
                        'email' => $this->email,

                        'month_overtime' => $this->month_overtime,
                        'set_overtime' => $this->set_overtime,
                        'right_overtime' => $this->right_overtime,
                        'attendance' => $this->attendance,
                        'paid_vacation' => $this->paid_vacation,
                        'break_time' => $this->break_time,
                        'training' => $this->training,
                        'evaluation' => $this->evaluation,
                        'employee_benefits' => $this->employee_benefits,
                        'relationships' => $this->relationships,
                        'workplace_situation' => $this->workplace_situation,
                        'my_situation' => $this->my_situation,
                        'total_score' => $this->total_score,

                        'career' => $career[($this->career)],
                        'age' => $this->age,
                        'region' => $this->region,
                        'text_form' => $this->text_form,
                        'facebook' => $this->facebook,
                        'src' => $this->src,
                    ]);
        }
    }
}
