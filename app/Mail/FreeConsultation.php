<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FreeConsultation extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;

    public function __construct($params)
    {
        $env = config('environment.env');
        if ($env == 'develop') {
            // 開発用件名
            $this->title = '開発環境/【MITSUKARU】無料相談';
        }else{
            //本番用件名
            $this->title = '【MITSUKARU】無料相談';
        }
        $this->post_data = $params;
    }

    public function build()
    {
        if (preg_match('/utm_source=facebook/', $this->post_data['src']) || preg_match('/fbclid/', $this->post_data['src'])) $this->title = '【facebook】' . $this->title;
        elseif (preg_match('/utm_source=sms/', $this->post_data['src'])) $this->title = '【SMS】' . $this->title;
        elseif (preg_match('/utm_source=email/', $this->post_data['src']) || preg_match('/utm_source=hs_email/', $this->post_data['src'])) $this->title = '【メルマガ】' . $this->title;

        return $this->view('taxmitsukaru.mails.consultation')
            ->subject($this->title)
            ->with(['post_data' => $this->post_data]);
    }
}
