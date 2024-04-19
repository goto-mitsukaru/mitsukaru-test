@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'LP_COMPANIES')
@section('content')
    <div class="main_contents">
        <h2>- 編集画面 -</h2>
        <div class="frame_wrap">
            <div class="edit_wrap">
                <div class="edit_text_wrap">
                    <form action="admin/company/{{$id}}" method="POST" enctype="multipart/form-data"
                          onSubmit="return check_article()" id="admin_article_form" target="_self">
                        @csrf

                        <label class="title_label" for="name">会社名 : </label>
                        <input class="edit_area" name="name"
                                  id="name" value="{{$id != 0 ? $company->name:""}}">
                        <label class="title_label" for="img_path">画像パス : </label>
                        <input class="edit_area" name="img_path"
                               id="img_path" value="{{$id != 0 ? $company->img_path:""}}">
                        <label class="title_label" for="slogan">企業理念 : </label>
                        <input class="edit_area" name="slogan"
                               id="slogan" value="{{$id != 0 ? $company->slogan:""}}">

                        <label class="title_label" for="about_us">会社概要 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="about_us" id="edit_text"
                                  oninput="resizeTextarea()">{{$id != 0 ? $company->about_us:""}}</textarea>
                        <label class="title_label" for="point">ポイント : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="point" id="edit_text"
                                  oninput="resizeTextarea()">{{$id != 0 ? $company->point:""}}</textarea>
                        <label class="title_label" for="positions">募集中のポジション : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="positions" id="edit_text"
                                  oninput="resizeTextarea()">{{$id != 0 ? $company->positions:""}}</textarea>
                        <label class="title_label" for="site_url">サイトURL : </label>
                        <input class="edit_area" name="site_url"
                                  id="site_url" value="{{$id != 0 ? $company->site_url:""}}">
                        <div class="btn_wrap">
                            <button type="submit" formaction="/admin/lp_company/{{$id}}" formtarget="_self" value="update" name="submit" class="edit_btn" id="edit_btn">
                                {{$id != 0 ? "更新":"登録"}}
                            </button>
                            <button type="submit" formaction="/admin/lp_company/{{$id}}" formtarget="_self" value="delete" name="delete" class="delete_btn"
                                    id="delete_btn">この企業情報を削除する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
