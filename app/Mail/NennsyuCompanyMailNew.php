<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NennsyuCompanyMailNew extends Mailable
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

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public function __construct($request)
    {
        $this->fullname = $request['お名前'];
        $this->phone_number = $request['携帯電話番号'];
        $this->email = $request['メールアドレス'];
        // $this->work_style = $request['work_style'];
        // $this->reason = $request['reason'];
        $this->license = $request['現在の資格'];
        $this->region = $request['prefecture'];
        $this->career = $request['career'];
        $this->age = $request['year'];
        $this->charge_number = $request['担当件数'];
        $this->annual_sales = $request['年間売上'];
        $this->yearly_income = $request['yearly_income'];
        $this->management_experience = $request['マネジメント経験'];
        $this->plus_finance_consulting = $request['財務コンサル'];
        $this->plus_inheritance = $request['相続'];
        $this->plus_others = $request['その他'];

        $this->facebook = $request['facebook'];
        $this->src = $request['src'];
        $this->env = $request['env'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $career = $this->career_array;

        $title = '年収診断問い合わせ';
        if (preg_match('/facebook/', $this->src) || preg_match('/fbclid/', $this->src)) $title = '【facebook】' . $title;
        elseif (preg_match('/sms/', $this->src)) $title = '【SMS】' . $title;
        elseif (preg_match('/email/', $this->src) || preg_match('/utm_source=hs_email/', $this->src)) $title = '【メルマガ】' . $title;

        $env = config('environment.env');
        if($env == 'develop'){
            // 開発用の送り先
            return
                $this
                    ->to('greentea.4k@gmail.com')
                    //                    ->bcc('cocoa2647@gmail.com')
//                    ->bcc('k-yokoo@hion-tech.com')
                    ->subject('開発環境/'.$title)
                    ->view('taxnennsyushinndannnew.emails.company')
                    ->with([
                        'fullname' => $this->fullname,
                        'phone_number' => $this->phone_number,
                        'email' => $this->email,
                        // 'work_style' => $this->work_style,
                        // 'reason' => $this->reason,
                        'license' => $this->license,
                        'region' => $this->region,
                        'career' => $career[($this->career)],
                        'age' => $this->age,
                        'text_form' => $this->text_form,
                        'charge_number' => $this->charge_number,
                        'annual_sales' => $this->annual_sales,
                        'yearly_income' => $this->yearly_income,
                        'management_experience' => $this->management_experience,
                        'plus_finance_consulting' => $this->plus_finance_consulting,
                        'plus_inheritance' => $this->plus_inheritance,
                        'plus_others' => $this->plus_others,

                        'facebook' => $this->facebook,
                        'src' => $this->src,
                        'env' => $this->env,

                        'over' => $this->yearly_income[0] == '1000万円以上',
                        'yearly' => $this->yearly[$this->yearly_income[0]],
                        'exp' => $this->career_income[$this->career],
                    ]);
        }else{
            // 本番環境用
            return
                $this
                    ->to('agent@mitsukaru-jpn.com')
                    // ->bcc('moncson@gmail.com')
                    // ->bcc('cocoa2647@gmail.com')
                    // ->bcc('k-yokoo@hion-tech.com')
                    ->subject($title)
                    ->view('taxnennsyushinndannnew.emails.company')
                    ->with([
                        'fullname' => $this->fullname,
                        'phone_number' => $this->phone_number,
                        'email' => $this->email,
                        'license' => $this->license,
                        'region' => $this->region,
                        'career' => $career[($this->career)],
                        'age' => $this->age,
                        // 'text_form' => $this->text_form,
                        'charge_number' => $this->charge_number,
                        'annual_sales' => $this->annual_sales,
                        'yearly_income' => $this->yearly_income,
                        'management_experience' => $this->management_experience,
                        'plus_finance_consulting' => $this->plus_finance_consulting,
                        'plus_inheritance' => $this->plus_inheritance,
                        'plus_others' => $this->plus_others,

                        'facebook' => $this->facebook,
                        'src' => $this->src,
                        'env' => $this->env,

                        'over' => $this->yearly_income == '1000万円以上',
                        'yearly' => $this->yearly[$this->yearly_income],
                        'exp' => $this->career_income[$this->career],
                    ]);
        }
    }
}
