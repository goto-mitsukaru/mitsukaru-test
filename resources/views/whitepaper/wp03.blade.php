@extends('common.template')
@include('common.header')
@include('common.footer')
@section('content')

    <div class="p-white-child__fv">
       <img class="p-white-list__img" src="/images/whitepaper/pdf3-black.webp" alt="サムネ3">
        <p class="p-white-child__text">下記フォームより資料をDLいただけます。</p>
      <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
<script>
  hbspt.forms.create({
    region: "na1",
    portalId: "23322521",
    formId: "0c8e7c49-faa9-444c-844d-f7e619f77d54"
  });
</script>
     </div>
@endsection
