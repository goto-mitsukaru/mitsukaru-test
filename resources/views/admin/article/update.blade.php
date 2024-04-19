@extends('admin/common.layout')
@include('admin/common.css')
@include('admin/common.menu')
@section('title', 'ARTICLES')
@section('content')

    <div class="main_contents">
        <h2>- 編集画面 -</h2>
        <div class="frame_wrap">
            <p class="photo_frame">
                {{$title}}
            </p>
            <div class="edit_wrap">
                <div class="edit_text_wrap">
                </div>
            </div>
        </div>
    </div>
@endsection
