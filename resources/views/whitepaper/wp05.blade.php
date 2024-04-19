@extends('common.template')
@include('common.header')
@include('common.footer')
@section('content')

    <div class="p-white-child__fv">
        <img class="p-white-list__img" src="/images/whitepaper/pdf5-common.webp" alt="サムネ5">
        <p class="p-white-child__text">下記フォームより資料をDLいただけます。</p>
       <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
<script>
  hbspt.forms.create({
    region: "na1",
    portalId: "23322521",
    formId: "80d3fa96-528c-44eb-b304-5f90698b9765"
  });
</script>
     </div>
@endsection
