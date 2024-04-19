@extends('common.template')
@include('common.header')
@include('common.footer')
@section('content')

    <div class="p-white-child__fv">
        <img class="p-white-list__img" src="/images/whitepaper/pdf1-income.webp" alt="サムネ1">
        <p class="p-white-child__text">下記フォームより資料をDLいただけます。</p>
        <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
        <script>
          hbspt.forms.create({
            region: "na1",
            portalId: "23322521",
            formId: "756bfb56-cd31-4701-8031-33d02f2c57b6"
          });
        </script>
     </div>
@endsection
