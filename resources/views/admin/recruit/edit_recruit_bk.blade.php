@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'RECRUIT')
@section('content')
    <style>
        #main_contents_profile .photo_frame {
            width: 68%;
        }

        #main_contents_profile .photo_frame:before {
            width: 100%;
        }
    </style>
    <div class="main_contents" id="main_contents_profile">
        <h2>- {{ \Request::is('admin/edit_recruit/copy/*') ? '複製画面' : '編集画面' }} - </h2>
        <div class="frame_wrap">
            <div class="edit_wrap">
                <div class="edit_text_wrap">
                    <form method="POST" enctype="multipart/form-data"
                          id="admin_article_form" target="_self">
                        @csrf

                        <p class="title_label" style="margin: 60px 0 25px 10px;">画像(動画が無い場合入力) : </p>
                        <div class="photo_frame">
                            <div class="img_item_wrap">
                                <div
                                    class="image_input{{ (!empty($recruit) && !empty($recruit->image)) ? '' : ' active' }}">
                                    <span>画像を追加</span></div>
                                <div
                                    class="image{{ (!empty($recruit) && !empty($recruit->image)) ? ' active' : '' }}">
                                    <img
                                        src="{{ (!empty($recruit) && !empty($recruit->image)) ? ($recruit->image) : '' }}"
                                        class="preview"/>
                                    <div
                                        class="hover_menu{{ (!empty($recruit) && !empty($data->image)) ? '' : ' store' }}">
                                        @if((!empty($recruit) && !empty($recruit->image)))
                                            <a href="{{ $recruit->image }}"
                                               class="is_view" target="_blank">閲覧</a>
                                        @endif
                                        <span class="is_update">変更</span>
                                        <span class="is_delete">削除</span>
                                        <input type="hidden" name="image_delete_1" class="image_delete"/>
                                    </div>
                                </div>
                                <input type="file" name="image" class="file"/>
                            </div>
                        </div>

                        {{-- <label class="title_label" for="movie_title">動画タイトル : </label>
                        <input class="edit_area" name="movie_title"
                               id="movie_title" value="{{$id != 0 ? $recruit->movie_title:""}}"> --}}

                        <label class="title_label" for="movie">動画URL（iframeタグsrc部分） : </label>
                        <input class="edit_area" name="movie"
                               id="movie" value="{{$id != 0 ? $recruit->movie:""}}">

                        {{-- <label class="title_label" for="movie">インタビュー記事ボタンURL : </label>
                        <input class="edit_area" name="movie"
                               id="movie" value="{{$id != 0 ? $recruit->movie:""}}"> --}}

                        <label class="title_label" for="name">タイトル : </label>
                        <input class="edit_area" name="name"
                               id="name" value="{{$id != 0 ? $recruit->name:""}}">
                        <label class="title_label" for="company_id">企業 : </label>
                        <div class="select_wrap">
                            <select class="js-example-basic-multiple" name="company_id" id="company_id">
                                <option value="0" {{ $id==0 ? 'selected' : '' }}>企業名非公開</option>
                                @foreach($companies as $company)
                                    @if($id != 0)
                                        <option value="{{$company->id}}" {{$company->id == $recruit->company_id ? "selected":""}}>{{$company->name}}</option>
                                    @else
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label class="title_label" for="scale_id">事務所規模 : </label>
                        <div class="select_wrap">
                            <select class="js-example-basic-multiple" name="scale_id" id="scale_id">
                                @foreach($scale_list as $scale)
                                    @if($id != 0)
                                        <option
                                            value="{{$loop->index}}" {{$loop->index == $recruit->scale_id ? "selected":""}}>{{$scale}}</option>
                                    @else
                                        <option value="{{$loop->index}}">{{$scale}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label class="title_label" for="license_id">募集資格 : </label>
                        <div class="select_wrap">
                            <select class="js-example-basic-multiple" name="license_id[]" multiple="multiple"
                                    id="license_id">
                                @foreach($license_list as $license)
                                    @if($id != 0)
                                        <option
                                            value="{{ $license->id }}" {{ in_array($license->id, $license_ids) ? 'selected' : '' }}>{{ $license->name }}</option>
                                    @else
                                        <option value="{{$license->id}}">{{$license->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label class="title_label" for="occupation_id">ポジション : </label>
                        <div class="select_wrap">
                            <select class="js-example-basic-multiple" multiple="multiple" name="occupation_id[]"
                                    id="occupation_id">
                                @foreach($occupations as $occupation)
                                    @if($id != 0)
                                        <option
                                            value="{{ $occupation->id }}" {{ in_array($occupation->id, $occupation_ids) ? 'selected' : '' }}>{{ $occupation->name }}</option>
                                    @else
                                        <option value="{{$occupation->id}}">{{$occupation->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label class="title_label" for="feature_id">特徴 : </label>
                        <div class="select_wrap">
                            <select class="js-example-basic-multiple" multiple="multiple" name="feature_id[]"
                                    id="feature_id">
                                @foreach($feature_list as $feature)
                                    @if($id != 0)
                                        <option
                                            value="{{ $feature->id }}" {{ in_array($feature->id, $feature_ids) ? 'selected' : '' }}>{{ $feature->name }}</option>
                                    @else
                                        <option value="{{$feature->id}}">{{$feature->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label class="title_label" for="status_id">雇用形態 : </label>
                        <div class="select_wrap">
                            <select name="status_id" id="status_id">
                                @if($id != 0)
                                    <option value="0" {{ $recruit->status_id == 0 ? 'selected' : '' }}>指定なし</option>
                                    <option value="1" {{ $recruit->status_id == 1 ? 'selected' : '' }}>正社員</option>
                                    <option value="2" {{ $recruit->status_id == 2 ? 'selected' : '' }}>派遣社員</option>
                                    <option value="3" {{ $recruit->status_id == 3 ? 'selected' : '' }}>アルバイト</option>
                                    <option value="4" {{ $recruit->status_id == 4 ? 'selected' : '' }}>その他</option>
                                @else
                                    <option value="0">指定なし</option>
                                    <option value="1">正社員</option>
                                    <option value="2">派遣社員</option>
                                    <option value="3">アルバイト</option>
                                    <option value="4">その他</option>
                                @endif
                            </select>
                        </div>
                        <label class="title_label" for="category">業種 : </label>
                        <input class="edit_area" name="category"
                               id="category" value="{{$id != 0 ? $recruit->category:""}}">
                        <label class="title_label" for="income">年収 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="income" id="income"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->income:""}}</textarea>
                        <label class="title_label" for="feature_id">希望年収帯 : </label>
                        <div class="select_wrap">
                            <select class="js-example-basic-multiple" multiple="multiple" name="income_id[]"
                                    id="income_id">
                                @foreach($income_list as $income)
                                    @if($id != 0)
                                        <option
                                            value="{{ $income->id }}" {{ in_array($income->id, $income_ids) ? 'selected' : '' }}>{{ $income->name }}</option>
                                    @else
                                        <option value="{{$income->id}}">{{$income->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label class="title_label" for="area_id">勤務地 : </label>
                        <div class="select_wrap">
                            <select class="js-example-basic-multiple" name="area_id" id="area_id">
                                @foreach($area_array as $area)
                                    @if($id != 0)
                                        <option
                                            value="{{ $loop->index }}" {{ $recruit->area_id == $loop->index ? 'selected' : '' }}>{{ $area }}</option>
                                    @else
                                        <option value="{{ $loop->index }}">{{ $area}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label class="title_label" for="time">就業時間 : </label>
                        <input class="edit_area" name="time"
                               id="time" value="{{$id != 0 ? $recruit->time:""}}">
                        <label class="title_label" for="overtime">残業 : </label>
                        <input class="edit_area" name="overtime"
                               id="overtime" value="{{$id != 0 ? $recruit->overtime:""}}">
                        <label class="title_label" for="welfare">福利厚生 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="welfare" id="welfare"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->welfare:""}}</textarea>
                        <label class="title_label" for="holiday">休日 : </label>
                        <input class="edit_area" name="holiday"
                               id="holiday" value="{{$id != 0 ? $recruit->holiday:""}}">
                        {{--                        <label class="title_label" for="soft">使用している会計ソフト : </label>--}}
                        {{--                        <input class="edit_area" name="soft"--}}
                        {{--                               id="soft" value="{{$id != 0 ? $recruit->soft:""}}">--}}
                        <label class="title_label" for="content">内容【旧入力欄】 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="content" id="content"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->content:""}}</textarea>
                        <label class="title_label" for="job_description">仕事概要 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="job_description"
                                  id="job_description"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->job_description:""}}</textarea>
                        <label class="title_label" for="specific_content">具体的な業務内容 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="specific_content"
                                  id="specific_content"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->specific_content:""}}</textarea>
                        <label class="title_label" for="work_environment">働く環境 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="work_environment"
                                  id="work_environment"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->work_environment:""}}</textarea>
                        <label class="title_label" for="position_worthwhile">ポジションの魅力・やりがい : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="position_worthwhile"
                                  id="position_worthwhile"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->position_worthwhile:""}}</textarea>
                        <label class="title_label" for="job_worthwhile">仕事の魅力・やりがい : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="job_worthwhile"
                                  id="job_worthwhile"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->job_worthwhile:""}}</textarea>
                        <label class="title_label" for="career_path">入社後のキャリアパス : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="career_path" id="career_path"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->career_path:""}}</textarea>


                        <label class="title_label" for="match">条件【旧入力欄】 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="match" id="match"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->match:""}}</textarea>
                        <label class="title_label" for="required_condition">必須条件 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="required_condition"
                                  id="required_condition"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->required_condition:""}}</textarea>
                        <label class="title_label" for="welcome_condition">歓迎条件 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="welcome_condition"
                                  id="welcome_condition"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->welcome_condition:""}}</textarea>
                        <label class="title_label" for="ideal_image">求める人物像※期待行動・コンピテンシー等 : </label>
                        <textarea style="white-space: pre-wrap" class="edit_area" name="ideal_image" id="ideal_image"
                                  oninput="resizeTextarea()">{{$id != 0 ? $recruit->ideal_image:""}}</textarea>

                        <div class="edit_bottom">
                            <div class="status_wrap">
                                <label class="title_label">おすすめ求人 : </label>
                                <ul>
                                    @if($id != 0)
                                        <li>
                                            <label>
                                                <input type="radio" name="recommendation_flag"
                                                       value="1" {{$recruit->recommendation_flag == 1 ? "checked":""}}>設定
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="recommendation_flag"
                                                       value="0" {{$recruit->recommendation_flag == 0 ? "checked":""}}>未設定
                                            </label>
                                        </li>
                                    @else
                                        <li>
                                            <label>
                                                <input type="radio" name="recommendation_flag"
                                                       value="1">設定
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="recommendation_flag"
                                                       value="0" checked>未設定
                                            </label>
                                        </li>
                                    @endif
                                </ul>
                                <label class="title_label">公開状況 : </label>
                                <ul>
                                    @if($id != 0)
                                        <li>
                                            <label>
                                                <input type="radio" name="status_flag"
                                                       value="1" {{$recruit->status_flag == 1 ? "checked":""}}>公開
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="status_flag"
                                                       value="0" {{$recruit->status_flag == 0 ? "checked":""}}>非公開
                                            </label>
                                        </li>
                                    @else
                                        <li>
                                            <label>
                                                <input type="radio" name="status_flag"
                                                       value="1" checked>公開
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="status_flag"
                                                       value="0">非公開
                                            </label>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="btn_wrap">
                            @if(!Request::is('*copy*'))
                                <button type="submit" formaction="/admin/recruit/{{$id ? 'update' : 'create'}}/{{$id}}"
                                        formtarget="_self"
                                        value="update" name="submit"
                                        class="edit_btn" id="edit_btn">
                                    {{$id != 0 ? "更新":"登録"}}
                                </button>
                                @if($id != 0)
                                    <button type="submit" value="delete" formaction="/admin/recruit/create/{{$id}}"
                                            formtarget="_self" name="delete" class="delete_btn"
                                            id="delete_btn">このプロフィールを削除する
                                    </button>
                                @endif
                            @else
                                <button type="submit" formaction="/admin/recruit/create/{{$id}}"
                                        formtarget="_self"
                                        value="update" name="submit"
                                        class="edit_btn" id="edit_btn">
                                    複製
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // 画像アップロード
        $(function () {
            $(document).on('click', '.image_input, .is_update', function (e) {
                $(this).closest('.img_item_wrap').find('.file').click();
            });

            $(document).on('click', '.is_delete', function (e) {
                $(this).closest('.img_item_wrap').find('.file').val('');
                $(this).closest('.img_item_wrap').find('.image_input').addClass('active');
                $(this).closest('.img_item_wrap').find('.image').removeClass('active');
                $(this).closest('.img_item_wrap').find('.image_delete').val('true');
            });

            $(document).ready(function () {
                $('.js-example-basic-multiple').select2({
                    closeOnSelect: false,
                });
            });

            $(function () {
                $('.file').on('change', function () {
                    var self = $(this);

                    //fileの値は空ではなくなるはず
                    if (self.val() !== '') {

                        //propを使って、file[0]にアクセスする
                        var image_ = self.prop('files')[0];

                        //添付されたのが本当に画像かどうか、ファイル名と、ファイルタイプを正規表現で検証する
                        if (!/\.(jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF)$/.test(image_.name) || !/(jpg|jpeg|png|gif)$/.test(image_.type)) {
                            alert('JPG、GIF、PNGファイルの画像を添付してください。');
                            //     //添付された画像ファイルが１M以下か検証する
                        } else if (10485760 < image_.size) {
                            alert('10MB以下の画像を添付してください。');
                        } else {
                            // window.FileReaderに対応しているブラウザどうか
                            if (window.FileReader) {
                                //FileReaderをインスタンス化
                                var reader_ = new FileReader();
                                //添付ファイルの読み込みが成功したときに実行されるイベント（成功時のみ）
                                //一旦飛ばしてreader_ .readAsDataURLが先に動く
                                reader_.onload = function () {
                                    //Data URI Schemeをimgタグのsrcにいれてリアルタイムに添付画像を描画する
                                    self.closest('.img_item_wrap').find('.image_input').removeClass('active');
                                    self.closest('.img_item_wrap').find('.image').addClass('active');
                                    self.closest('.img_item_wrap').find('.preview').attr('src', reader_.result);
                                    self.closest('.img_item_wrap').find('.is_view').attr('href', reader_.result);
                                    self.closest('.img_item_wrap').find('.hover_menu').addClass('store');
                                    self.closest('.img_item_wrap').find('.hover_menu a').hide();
                                    self.closest('.img_item_wrap').find('.image_delete').val('');
                                }
                                //Data URI Schemeを取得する
                                reader_.readAsDataURL(image_);
                            }
                            return false;
                        }
                    }
                    //ダメだったら値をクリアする
                    self.val('');
                });
            });

        });
    </script>
@endsection
