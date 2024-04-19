@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'CATEGORY')
@section('content')
    <div class="main_contents">
        <h2>- カテゴリ一覧 -</h2>
        @if (session('message'))
            <div class="msg_wrap">
                {{ session('message') }}
            </div>
        @endif
        <div class="container">
            <div class="bottom_list add_category_wrap">
                <form action="/admin/article/category/1" method="POST" name="add_form" onSubmit="return check()">
                    @csrf
                    <input type="text" name="category" class="add_category">
                    <button type="submit" value="add" name="add_category" class="add_btn">新規追加</button>
                </form>
            </div>
            <div class="category_list_wrap">
                <div class="category_list">
                    <table>
                        <tr class="category_list_menu">
                            <th class="category_list_id">ID</th>
                            <th class="category_list_name category_list_input">カテゴリ名</th>
                            <th class="category_list_btn" id="edit_lock_wrap">
                                <a class="change_btn"><img id="edit_lock" src="/images/icon_lock.png"></a>
                            </th>
                        </tr>
                        @foreach($category_list as $category)
                            <form action="/admin/article/category/0" method="POST" onSubmit="return check_article()">
                                @csrf
                                <tr class="category_list_menu">
                                    <td class="category_list_id">{{ $category->id }}</td>
                                    <td class="category_list_name"><input type="text" value="{{ $category->name }}"
                                                                          name="category" class="bg_input"></td>
                                    <td class="category_list_btn" id="edit_lock_wrap">
                                        <button type="submit" value="{{ $category->id }}" name="category_id"
                                                class="category_btn">
                                            変更
                                        </button>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
