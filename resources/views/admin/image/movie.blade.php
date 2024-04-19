@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'MOVIE')
@section('content')
    @include('movie.modal')
    @include('movie.create')
    <div class="main_contents">
        <h2>- 動画一覧 -</h2>
        @if (session('message'))
            <div class="msg_wrap">
                {{ session('message') }}
            </div>
        @endif
        <div class="container">
            <div class="bottom_list add_category_wrap">
                <button type="submit" value="add" name="add_category" id="movie_create_btn" class="add_btn">新規追加
                </button>
            </div>
            <div class="category_list_wrap">
                <div class="category_list">
                    <table>
                        <tr class="category_list_menu">
                            <th class="category_list_id">ID</th>
                            <th class="movie_list_title">タイトル</th>
                            <th class="movie_list_src">リンク</th>
                            <th class="movie_list_status">公開状況</th>
                            <th class="category_list_btn" id="edit_lock_wrap">
                            </th>
                        </tr>
                        @foreach($movie_list as $movie)
                            <tr class="category_list_menu">
                                <td class="category_list_id">{{ $movie->id }}</td>
                                <td class="movie_list_title">{{ $movie->title }}</td>
                                <td class="movie_list_src">{{ $movie->src }}</td>
                                <td class="movie_list_status {{ $movie->status_id == 0 ? '' : 'private_mode' }}">{{ $movie->status_id == 0 ? '公開中' : '非公開' }}</td>
                                <td class="category_list_btn movie_list_btn" id="edit_lock_wrap">
                                    <form action="/movie/status/{{ $movie->id }}" method="post">
                                        @csrf
                                        <button type="submit"
                                                name="status_id"
                                                class="category_btn movie_btn" value="{{ $movie->status_id == 1 ? '0' : '1' }}">
                                            {{ $movie->status_id == 1 ? '公開' : '非公開' }}
                                        </button>
                                    </form>
                                    <button data-id="{{ $movie->id }}" type="submit" value="{{ $movie->id }}"
                                            name="category_id"
                                            class="category_btn movie_edit_btn">
                                        変更
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
