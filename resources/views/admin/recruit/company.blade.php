@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'RECRUIT')
@section('content')
    <div class="main_contents" id="main_contents_profile">
        <h2>- 求人一覧 -</h2>
            <div class="msg_wrap" id="msg_wrap">
            </div>
        <div class="container">
            <div class="bottom_list">
                <a class="add_btn" href="/admin/profile/edit_profile/0">新規追加</a>
            </div>
            <div class="list_wrap">
                <div class="table_list">
                    <table>
                        <tr>
                            <th class="list_id">ID</th>
                            <th class="list_icon">写真</th>
                            <th class="list_name">名前</th>
                            <th class="list_introduction">紹介文</th>
                            <th class="list_status">公開</th>
                            <th class="list_btn"></th>
                        </tr>
                        <tr>
                                <td class=""></td>
                                <td class="profile_img"><img src=""></td>
                                <td class="left_text"></td>
                                <td class="left_text"></td>
                                <td class=""></td>
                                <td class="list_btn">
                                    <a class="edit_btn table_btn" href="/admin/profile/edit_profile/">編集</a>
                                </td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection