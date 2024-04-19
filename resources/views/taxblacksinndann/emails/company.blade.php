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
勤務地 : {{ ($region == 1)? '未回答' : $region }}<br>
月間の実残業時間（みなしも含む）はどのくらいですか？ : @if(!empty($month_overtime)) @foreach($month_overtime as $value) {{$value}} @endforeach @endif<br>
みなし残業の設定はありますか？ : @if(!empty($set_overtime)) @foreach($set_overtime as $value) {{$value}} @endforeach @endif<br>
残業時間は正しく給料として支払われていますか？ : @if(!empty($right_overtime)) @foreach($right_overtime as $value) {{$value}} @endforeach @endif<br>
勤怠管理について当てはまるものをお選びください : @if(!empty($attendance)) @foreach($attendance as $value) {{$value}} @endforeach @endif<br>
有給取得について当てはまるものをお選びください : @if(!empty($paid_vacation)) @foreach($paid_vacation as $value) {{$value}} @endforeach @endif<br>
休憩時間について当てはまるものをお選びください : @if(!empty($break_time)) @foreach($break_time as $value) {{$value}} @endforeach @endif<br>
教育や研修について当てはまるものをお選びください : @if(!empty($training)) @foreach($training as $value) {{$value}} @endforeach @endif<br>
評価制度について当てはまるものをお選びください : @if(!empty($evaluation)) @foreach($evaluation as $value) {{$value}} @endforeach @endif<br>
福利厚生について当てはまるものをすべてお選びください : @if(!empty($employee_benefits)) @foreach($employee_benefits as $value) {{$value}} @endforeach @endif<br>
職場の人間関係について当てはまるものをすべてお選びください : @if(!empty($relationships)) @foreach($relationships as $value) {{$value}} @endforeach @endif<br>
職番の状況に当てはまるものをすべてお選びください : @if(!empty($workplace_situation)) @foreach($workplace_situation as $value) {{$value}} @endforeach @endif<br>
あなたの状況に当てはまるものをすべてお選びください : @if(!empty($my_situation)) @foreach($my_situation as $value) {{$value}} @endforeach @endif<br>
ブラック度 : {{ $total_score }}％<br>
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
