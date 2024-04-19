@extends('common.layout')
@include('common.css')
@include('common.menu')
@section('title', 'ARTICLES')
@section('content')
    <div class="main_contents">
        <h2>- 編集画面 -</h2>
        <div class="frame_wrap">
            <div class="edit_wrap">
                <div class="edit_text_wrap">
                    <form action="/article/{{$id}}" method="POST" enctype="multipart/form-data"
                          onSubmit="return check_article()" id="admin_article_form" target="_self">
                        @csrf
                        <div class="photo_frame">
                            <div class="img_item_wrap">
                                <div class="image_input{{ (!empty($article) && !empty($article->image)) ? '' : ' active' }}">
                                    <span>画像を追加</span></div>
                                <div
                                        class="image{{ (!empty($article) && !empty($article->image)) ? ' active' : '' }}">
                                    <img
                                            src="{{ (!empty($article) && !empty($article->image)) ? $article->image : '' }}"
                                            class="preview"/>
                                    <div
                                            class="hover_menu{{ (!empty($article) && !empty($data->image)) ? '' : ' store' }}">
                                        @if((!empty($article) && !empty($article->image)))
                                            <a href="{{ $article->image }}"
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

                        <label class="title_label" for="edit_title">タイトル : </label>
                        <textarea class="edit_area" name="title"
                                  id="edit_title">{{$id != 0 ? $article->title:""}}</textarea>
                        <label class="title_label" for="tags">タグ : </label>
                        @if($tags_list != "")
                            <input id="tags" name="tags" type="text" data-role="tagsinput"
                                   value="{{implode(',',$tags_list)}}">
                        @else
                            <input id="tags" name="tags" type="text" data-role="tagsinput"
                                   value="">
                        @endif
                        <label class="title_label category_label">カテゴリ : </label>
                        <select name="category" id="edit_category">
                            @foreach($categories as $category)
                                @if($id != 0)
                                    <option value="{{$category->id}}" {{$article->category_id == $category->id ? "selected":""}}>{{$category->name}}</option>
                                @else
                                    <option value="{{$category->id}}" {{$category->id == 1 ? "selected":""}}>{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <label class="title_label category_label">ライター : </label>
                        <select name="writer" id="edit_category">
                            @foreach($writer_list as $writer)
                                @if($id != 0)
                                    <option value="{{$writer->id}}" {{$article->writer_id == $writer->id ? "selected":""}}>{{$writer->name}}</option>
                                @else
                                    <option value="{{$writer->id}}" {{$writer->id == 1 ? "selected":""}}>{{$writer->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <div id="inputFields">
                            <div class="input-group mb-3">
                                <label class="title_label" for="edit_lead">インタビューまとめ : </label>
                                <input type="text" id="edit_lead" class="form-control" name="inputFields[]" placeholder="入力欄">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary addInputField" type="button">プラス</button>
                                </div>
                            </div>
                        </div>
                        <label class="title_label" for="edit_text">テキスト : </label>
                        <textarea class="edit_area" name="text" id="edit_text"
                                  oninput="resizeTextarea()">{{$id != 0 ? $article->text:""}}</textarea>
                        <div class="edit_bottom">
                            <div class="status_wrap">
                                <label class="title_label">公開状況 : </label>
                                <ul>
                                    @if($id != 0)
                                        <li>
                                            <label>
                                                <input type="radio" name="release"
                                                       value="1" {{$article->status_flag == 1 ? "checked":""}}>公開
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="release"
                                                       value="0" {{$article->status_flag == 0 ? "checked":""}}>非公開
                                            </label>
                                        </li>
                                    @else
                                        <li>
                                            <label>
                                                <input type="radio" name="release"
                                                       value="1" checked>公開
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="release"
                                                       value="0">非公開
                                            </label>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="slug_wrap">
                                <label class="title_label" for="edit_text">スラッグ : </label>
                                @if($id == 0)
                                    <textarea class="edit_area" name="slug" id="edit_slug"></textarea>
                                @else
                                    <p>article/detail/{{$article->slug}}/{{$id}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="btn_wrap">
                            <button type="submit" formaction="/admin/article/{{$id}}" formtarget="_self" value="update" name="submit" class="edit_btn" id="edit_btn">
                                {{$id != 0 ? "更新":"登録"}}
                            </button>
                            <button type="submit" formaction="/admin/preview/{{$id}}" formtarget="_blank" onclick="previewDown()" value="preview" name="preview" class="edit_btn pre_btn" id="pre_btn">
                                プレビュー
                            </button>
                            <button type="submit" value="delete" name="delete" class="delete_btn"
                               id="delete_btn">この記事を削除する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/tagsinput.js"></script>
    <script>
        $(document).ready(function() {
            // プラスボタンがクリックされたときの処理
            $(document).on('click', '.addInputField', function() {
                if ($('#inputFields .input-group').length < 15) {
                    var newInputField = '<div class="input-group mb-3">' +
                                            '<input type="text" id="edit_lead" class="form-control" name="inputFields[]" placeholder="入力欄">' +
                                            '<div class="input-group-append">' +
                                                '<button class="btn btn-outline-secondary removeInputField" type="button">マイナス</button>' +
                                            '</div>' +
                                        '</div>';
                    $(this).closest('.input-group').after(newInputField);
                } else {
                    alert('最大15個までしか追加できません。');
                }
            });
            // マイナスボタンがクリックされたときの処理
            $(document).on('click', '.removeInputField', function() {
                $(this).closest('.input-group').remove();
            });
            // フォーム送信前に空の入力欄をチェックする
            $('#dataForm').submit(function() {
                var emptyFields = false;
                $('#inputFields input').each(function() {
                    if ($(this).val() === '') {
                        emptyFields = true;
                        return false; // ループを抜ける
                    }
                });
                if (emptyFields) {
                    alert('入力欄を全て記入してください。');
                    return false; // フォームの送信をキャンセル
                }
            });
        });
    </script>
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
