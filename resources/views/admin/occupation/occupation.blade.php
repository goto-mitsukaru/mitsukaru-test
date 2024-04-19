@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'Occupation')
@section('content')
    <div class="main_contents">
        <h2>- ポジション一覧 -</h2>
        @if (session('message'))
            <div class="msg_wrap">
                {{ session('message') }}
            </div>
        @endif
        <div class="container">
            <div class="bottom_list add_category_wrap">
                <form action="/admin/occupation/1" method="POST" name="add_form">
                    @csrf
                    <input type="text" name="name" class="add_category">
                    <button type="submit" value="add" name="add_category" class="add_btn">新規追加</button>
                </form>
            </div>
            <div class="category_list_wrap">
                <div class="category_list">
                    <table>
                        <tr class="category_list_menu">
                            <th class="category_list_id">ID</th>
                            <th class="category_list_name category_list_input">ポジション</th>
                            <th class="category_list_btn" id="edit_lock_wrap">
                                <a class="change_btn"><img id="edit_lock" src="/images/icon_lock.png"></a>
                            </th>
                        </tr>
                        @foreach($occupation_list as $occupation)
                            <form action="/admin/occupation/0" method="POST">
                                @csrf
                                <tr class="category_list_menu">
                                    <td class="category_list_id">{{ $occupation->id }}</td>
                                    <td class="category_list_name"><input type="text" value="{{ $occupation->name }}"
                                                                          name="name" class="bg_input"></td>
                                    <td class="category_list_btn" id="edit_lock_wrap">
                                        <button type="submit" value="{{ $occupation->id }}" name="occupation_id"
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
