@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'ARTICLES')
@section('content')
    <div class="main_contents">
        <h2>- 記事一覧 -</h2>
        @if (session('message'))
            <div class="msg_wrap" id="msg_wrap">
                {{ session('message') }}
            </div>
        @endif
        <div class="container">
            <div class="bottom_list">
                <a class="add_btn" href="/admin/article/edit/0">新規追加</a>
            </div>
            <div class="list_wrap">
                <div class="table_list">
                    <table>
                        <tr>
                            <th class="list_id" style="width: 50px">ID</th>
                            <th class="list_date" style="width: 115px; letter-spacing: 0;">作成日</th>
                            <th class="list_title" style="width: calc(50% - 385px); letter-spacing: 0">タイトル</th>
                            <th class="list_text" style="width: calc(50% - 385px); letter-spacing: 0;">テキスト</th>
                            <th class="list_status" style="width: 70px">公開</th>
                            <th class="list_btn" style="width: 150px"></th>
                        </tr>
                        @foreach($article_list as $article)
                            <tr>
                                <td class="">{{ $article->id }}</td>
                                <td class="">{{ date("Y/m/d", strtotime($article->created_at)) }}</td>
                                <td class="left_text">{{ $article->title }}</td>
                                <td class="left_text">{{ $article->text }}</td>
                                <td class="{{ $article->status_flag ? '':'bg_red' }}">{{ $article->status_flag ? '公開中':'非公開' }}</td>
                                <td class="list_btn">
                                    <a class="edit_btn table_btn" href="/admin/article/edit/{{$article->id}}">編集</a>
                                    <a class="delete_btn table_btn" target="_blank" href="/article/{{$article->slug}}/{{$article->id}}">リンク</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
