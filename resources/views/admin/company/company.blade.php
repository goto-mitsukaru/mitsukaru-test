@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'COMPANY')
@section('content')
    <div class="main_contents" id="main_contents_profile">
        <h2>- 企業一覧 -</h2>
            <div class="msg_wrap" id="msg_wrap">
            </div>
        <div class="container">
            <div class="bottom_list">
                <a class="add_btn" href="/admin/company/edit_company/0">新規追加</a>
            </div>
            <div class="list_wrap">
                <div class="table_list">
                    <table>
                        <tr>
                            <th class="list_id">ID</th>
                            <th class="list_date" style="width: 160px">作成日</th>
                            <th class="list_title">企業名</th>
                            <th class="list_text" style="width: auto">企業概要</th>
                            <th class="list_btn"></th>
                        </tr>
                        @foreach($company_list as $company)
                            <tr>
                                <td class="">{{ $company->id }}</td>
                                <td class="">{{ date("Y/m/d H:i", strtotime($company->created_at)) }}</td>
                                <td class="left_text">{{ $company->name }}</td>
                                <td class="left_text">{{ $company->profile }}</td>
                                <td class="list_btn com_btn_wrap">
                                    <button class="edit_btn table_btn" style="background: #2b6d8f;" onclick="location.href='/admin/company/edit_company/{{$company->id}}'">編集</button>
                                    <div class="btn_form delete_modal_btn">
                                        <div class="delete_btn table_btn">削除</div>
                                    </div>
                                    <div class="bg_wrap" id="edit_bg_wrap">
                                        <div class="modal_wrap">
                                            <div class="modal_close">×</div>
                                            <form class="btn_form" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <ul>
                                                    <li style="justify-content: center;">
                                                        <p style="color: #1b1b2a; font-size: 17px;">本当に削除しますか？</p>
                                                    </li>
                                                    <li>
                                                        <button class="delete_btn table_btn"
                                                                style="background: #8f332b; padding: 12px"
                                                                formaction="/admin/company/{{$company->id}}"
                                                                formtarget="_self"
                                                                type="submit" name="delete" value="delete">
                                                            削除する
                                                        </button>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        //二段階削除
        $(function () {
            $('.delete_modal_btn').on('click', function () {
                $(this).next('.bg_wrap').show();
            });
            $('.modal_close').on('click', function () {
                $('.bg_wrap').hide();
            });
        })
    </script>
@endsection
