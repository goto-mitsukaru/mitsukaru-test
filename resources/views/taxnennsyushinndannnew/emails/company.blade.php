お問い合わせ内容<br>
<br>
@if($facebook == 1)
    ※facebookからの流入です。<br>
@endif
{{-- 流入元URL : {{ $src }}<br> --}}
名前 : {{ $fullname }}様<br>
電話番号 : {{ $phone_number }}<br>
メールアドレス : {{ $email }}<br>
生まれ年 : {{ ($age == 1)? '未回答' : $age.'年' }}<br>
業界経験年数 : {{ $career }}<br>
勤務エリア : {{ $region }}<br>
{{-- 担当している件数 : @if(!empty($charge_number)) @foreach($charge_number as $value) {{$value}}&nbsp;&nbsp; @endforeach @endif<br> --}}
担当している件数 : {{ $charge_number }}<br>
{{-- 年間担当売り上げ : @if(!empty($annual_sales)) @foreach($annual_sales as $value) {{$value}}&nbsp;&nbsp; @endforeach @endif<br> --}}
年間担当売り上げ : {{ $annual_sales }}<br>
{{-- 保有資格 : @if(!empty($license)) @foreach($license as $value) {{$value}}&nbsp;&nbsp; @endforeach @endif<br> --}}
保有資格 : {{ $license }}<br>
{{-- 現在の年収 : @if(!empty($yearly_income)) @foreach($yearly_income as $value) {{$value}}&nbsp;&nbsp; @endforeach @endif<br> --}}
現在の年収 : {{ $yearly_income }}<br>
{{-- マネージメント経験 : @if(!empty($management_experience)) @foreach($management_experience as $value) {{$value}}&nbsp;&nbsp; @endforeach @endif<br> --}}
マネージメント経験 : {{ $management_experience }}<br>
{{-- 理想の職場環境 : @if(!empty($env)) @foreach($env as $value) {{$value}}&nbsp;&nbsp; @endforeach @endif<br> --}}
理想の職場環境 :  {{ $env }}<br>
＋aの付加価値業務 <br>
財務コンサル: {{ $plus_finance_consulting }}<br>
相続: {{ $plus_inheritance }}<br>
その他: {{ $plus_others }}<br>
診断結果の年収金額 :
@if($over)
    {{ ($yearly + $exp).'〜'.(2500 + $exp) }}万円
@else
    {{ $yearly + $exp }}万円
@endif
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
