@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'PROFILE')
@section('content')
    <div class="main_contents" id="main_contents_profile">
        <h2>- プロフィール一覧 -</h2>
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
                            <th class="list_company">会社・役職</th>
                            <th class="list_introduction">紹介文</th>
                            <th class="list_link_name">リンク名</th>
                            <th class="list_link_url">リンクURL</th>
                            <th class="list_status">公開</th>
                            <th class="list_btn"></th>
                        </tr>
                        @foreach($profile_list as $profile)
                            <tr>
                                <td class="">{{ $profile->id }}</td>
                                <td class="profile_img"><img src="{{ $profile->icon }}"></td>
                                <td class="left_text">{{ $profile->name }}</td>
                                <td class="left_text">{{ $profile->company }}</td>
                                <td class="left_text">{{ $profile->introduction }}</td>
                                <td class="left_text">{{ $profile->link_name }}</td>
                                <td class="left_text">{{ $profile->link_url }}</td>
                                <td class="{{ $profile->status_flag ? '':'bg_red' }}">{{ $profile->status_flag ? '公開中':'非公開' }}</td>
                                <td class="list_btn">
                                    <a class="edit_btn table_btn"
                                       href="/admin/profile/edit_profile/{{$profile->id}}">編集</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
