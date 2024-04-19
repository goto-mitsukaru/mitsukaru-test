@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'IMAGE')
@section('content')
    @include('admin.image.modal')
    <div class="main_contents">
        <h2>- 画像一覧 -</h2>
        @if (session('message'))
            <div class="msg_wrap">
                {{ session('message') }}
            </div>
        @endif
        <div class="container">
            <div class="bottom_list add_category_wrap">
                <button type="submit" value="add" name="add_category" id="image_create_btn" class="add_btn">新規追加
                </button>
            </div>
            <div class="category_list_wrap">
                <div class="category_list">
                    <table>
                        <tr class="category_list_menu">
                            <th class="category_list_id">ID</th>
                            <th class="movie_list_title" style="width: 15%">画像</th>
                            <th class="movie_list_src" style="width: 27%">メディア名</th>
                            <th class="movie_list_status" style="width: 40%">メディアパス</th>
                            <th class="category_list_btn" style="width: 100px" id="edit_lock_wrap">
                                操作
                            </th>
                        </tr>
                        @foreach($image_list as $image)
                            <tr class="category_list_menu">
                                <td class="category_list_id">{{ $image->id }}</td>
                                <td class="movie_list_title">
                                    <div class="img_wrap">
                                        <a href="{{ $image->src }}" target="_blank">
                                        <img src="{{ $image->src }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td class="movie_list_src" style="width: 27%">{{ $image->name }}</td>
                                <td class="movie_list_status">
                                    <div class="copy_wrap">
                                        <button data-id="{{ $image->id }}" class="media_url_btn">コピー</button>
                                        <input type="text" id="{{ 'media_url_'.$image->id }}" class="media_url" name="media_url" value="{{ $image->src }}">
                                    </div>
                                </td>
                                <td class="img_btn_wrap" id="edit_lock_wrap">
                                    <div class="btn_wrap">
                                        <button data-id="{{ $image->id }}" type="submit" class="edit_img_btn">編集</button>
                                    </div>
                                </td>
                            </tr>
{{--                            <tr class="category_list_menu">--}}
{{--                                <td class="category_list_id">{{ $image->id }}</td>--}}
{{--                                <td class="movie_list_title">--}}
{{--                                    <div class="img_wrap">--}}
{{--                                        <img src="/images/top2.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td class="movie_list_src" style="width: 27%">{{ $image->name }}</td>--}}
{{--                                <td class="movie_list_status">--}}
{{--                                    <div class="copy_wrap">--}}
{{--                                        <button id="{{ 'media_url_btn_'.$image->id }}" class="media_url_btn">コピー</button>--}}
{{--                                        <input type="text" id="media_url" name="media_url" value="{{ $image->src }}">--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td class="img_btn_wrap" id="edit_lock_wrap">--}}
{{--                                    <div class="btn_wrap">--}}
{{--                                        <button class="edit_img_btn">編集</button>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
