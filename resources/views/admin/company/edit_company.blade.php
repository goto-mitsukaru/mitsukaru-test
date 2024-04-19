@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'COMPANIES')
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
                        <label class="title_label" for="workplace">所在地 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="workplace" id="edit_text"
                                  oninput="resizeTextarea()">{{$id != 0 ? $company->workplace:""}}</textarea>
                        <label class="title_label" for="feature">企業特徴 : </label>
                        <input class="edit_area" name="feature"
                                  id="feature" value="{{$id != 0 ? $company->feature:""}}">
{{--                        <label class="title_label" for="establish">設立年月 : </label>--}}
{{--                        <input class="edit_area" name="establish"--}}
{{--                                  id="establish" value="">--}}
                        <label class="title_label" for="income">平均年収 : </label>
                        <input class="edit_area" name="income"
                                  id="income" value="{{$id != 0 ? $company->income:""}}">
                        <label class="title_label" for="adviser">顧問件数 : </label>
                        <input class="edit_area" name="adviser"
                                  id="adviser" value="{{$id != 0 ? $company->adviser:""}}">
                        <label class="title_label" for="matter">相続の年間対応件数 : </label>
                        <input class="edit_area" name="matter"
                                  id="matter" value="{{$id != 0 ? $company->matter:""}}">
                        <label class="title_label" for="soft">使用している会計ソフト : </label>
                        <input class="edit_area" name="soft"
                                  id="soft" value="{{$id != 0 ? $company->soft:""}}">
                        <label class="title_label" for="url">企業URL : </label>
                        <input class="edit_area" name="url"
                               id="url" value="{{$id != 0 ? $company->url:""}}">
                        <label class="title_label" for="employee">従業員数 : </label>
                        <input class="edit_area" name="employee"
                               id="employee" value="{{$id != 0 ? $company->employee:""}}">
                        <label class="title_label" for="edit_text">会社概要【旧入力欄】 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="profile" id="edit_text"
                                  oninput="resizeTextarea()">{{$id != 0 ? $company->profile:""}}</textarea>
                        <label class="title_label" for="mvv">ミッション・ビジョン・バリュー : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="mvv" id="mvv"
                                  oninput="resizeTextarea()">{{$id != 0 ? $company->mvv:""}}</textarea>
                        <label class="title_label" for="scale">顧問規模（お客様の特徴） : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="scale" id="scale"
                                  oninput="resizeTextarea()">{{$id != 0 ? $company->scale:""}}</textarea>
                        <label class="title_label" for="number">顧問件数（法人・個人含め） : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="number" id="number"
                                  oninput="resizeTextarea()">{{$id != 0 ? $company->number:""}}</textarea>
                        <label class="title_label" for="business">事業・サービス内容 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="business" id="business"
                                  oninput="resizeTextarea()">{{$id != 0 ? $company->business:""}}</textarea>
                        <label class="title_label" for="average_number">担当者の平均担当件数 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="average_number" id="average_number"
                                  oninput="resizeTextarea()">{{$id != 0 ? $company->average_number:""}}</textarea>
                        <div class="btn_wrap">
                            <button type="submit" formaction="/admin/company/{{$id}}" formtarget="_self" value="update" name="submit" class="edit_btn" id="edit_btn">
                                {{$id != 0 ? "更新":"登録"}}
                            </button>
                            <button type="submit" formaction="/admin/company/{{$id}}" formtarget="_self" value="delete" name="delete" class="delete_btn"
                                    id="delete_btn">この企業情報を削除する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
