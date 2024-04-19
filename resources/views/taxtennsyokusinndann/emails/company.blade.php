お問い合わせ内容<br>
@if($facebook == 1)
    ※facebookからの流入です。<br>
@endif
流入元URL : {{ $src }}<br>
<br>
名前 : {{ $lastname }} {{ $firstname }}様<br>
電話番号 : {{ $phone_number }}<br>
メールアドレス : {{ $email }}<br>
生まれ年 : {{ ($age == 1)? '未回答' : $age.'年' }}<br>
業界経験年数 : {{ $career }}<br>
診断の目的 : {{ $reason }}<br>
理想の働き方 : @if(!empty($work_style)) @foreach($work_style as $value) {{$value}}&nbsp;&nbsp; @endforeach @endif<br>
保有資格 : @if(!empty($license)) @foreach($license as $value) {{$value}}&nbsp;&nbsp; @endforeach @endif<br>
希望エリア : @if(!empty($region)) @foreach($region as $value) {{$value}}&nbsp;&nbsp; @endforeach @endif<br>
その他ご要望 : {{ $text_form }}<br>
<br>
…………………………………………………………………………………………………………<br>
会社名： 株式会社ミツカル<br>
代表者： 城之内 楊<br>
住 所： 〒141-0021 東京都品川区上大崎３丁目２−１ 目黒センタービル 8階<br>
E-mail： <a href="info@mitsukaru-jpn.com">info@mitsukaru-jpn.com</a><br>
URL： <a href="https://www.mitsukaru-fukugyou.com/">
    https://www.mitsukaru-fukugyou.com/
</a><br>
…………………………………………………………………………………………………………
