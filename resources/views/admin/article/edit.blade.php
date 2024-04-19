@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'ARTICLES')
@section('content')
    <style>
        .main_contents .frame_wrap .edit_wrap .edit_text_wrap .text_buttons li {
            border: 1px solid #000;
            margin: 5px;
            width: calc((100% - 30px) / 3);
        }

        .main_contents .frame_wrap .edit_wrap .edit_text_wrap .text_buttons li button {
            font-size: 10px;
            text-align: left;
            width: 100%;
            padding: 10px;
        }
    </style>
    <div class="main_contents">
        <h2>- 編集画面 -</h2>
        <div class="frame_wrap">
            <div class="edit_wrap">
                <div class="edit_text_wrap">
                    <form action="article/{{$id}}" method="POST" enctype="multipart/form-data"
                          onSubmit="return check_article()" id="admin_article_form" target="_self">
                        @csrf
                        <div class="photo_frame">
                            <div class="img_item_wrap">
                                <div
                                    class="image_input{{ (!empty($article) && !empty($article->image)) ? '' : ' active' }}">
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

                        {{-- <label class="title_label" for="movie">会社名 : </label>
                        <input id="movie_title" name="movie_title" type="text"  data-role="tagsinput" value="{{ (!empty($article) && !empty($article->movie_title)) ? $article->movie_title : '' }}"> --}}

                        <label class="title_label" for="movie">動画URL（iframeタグsrc部分） : </label>
                        <input id="movie" name="movie" type="text"  data-role="tagsinput" value="{{ (!empty($article) && !empty($article->movie)) ? $article->movie : '' }}">

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
                                    <option
                                        value="{{$category->id}}" {{$article->category_id == $category->id ? "selected":""}}>{{$category->name}}</option>
                                @else
                                    <option
                                        value="{{$category->id}}" {{$category->id == 1 ? "selected":""}}>{{$category->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <label class="title_label category_label">ライター : </label>
                        <select name="writer" id="edit_category">
                            @foreach($writer_list as $writer)
                                @if($id != 0)
                                    <option
                                        value="{{$writer->id}}" {{$article->writer_id == $writer->id ? "selected":""}}>{{$writer->name}}</option>
                                @else
                                    <option
                                        value="{{$writer->id}}" {{$writer->id == 1 ? "selected":""}}>{{$writer->name}}</option>
                                @endif
                            @endforeach
                        </select>

                        <label class="title_label" for="edit_text">テキスト : </label>
                        <ul class="text_buttons">
                            <li>
                                <button type="button" onclick="addText(event);" data-number="1">目次</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="2">見出し</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="3">更に小見出し
                                </button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="4">リンク</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="5">サイト内リンク</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="6">LPへボタンリンク</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="7">引用・参考サイトタグ</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="8">赤字+太文字テキスト</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="9">黄色マーカー+太文字テキスト</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="10">青マーカー＋太文字テキスト</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="11">緑マーカー+太文字テキスト</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="12">ピンクマーカー＋太文字テキスト
                                </button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="13">箇条書き</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="14">連番箇条書き</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="15">文字サイズ</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="16">囲い枠A（タイトル有）</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="17">囲い枠B（タイトル有）</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="18">囲い枠C（タイトル有）</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="19">囲い枠C（本文のみ）</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="20">表</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="21">動画</button>
                            </li>
                            <li>
                                <button type="button" onclick="addText(event);" data-number="22">太字</button>
                            </li>
                        </ul>
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
                                <label class="title_label">PICKUPフラグ : </label>
                                <ul>
                                    @if($id != 0)
                                        <li>
                                            <label>
                                                <input type="radio" name="pickup_flag"
                                                       value="1" {{$article->pickup_flag == 1 ? "checked":""}}>ON
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="pickup_flag"
                                                       value="0" {{$article->pickup_flag == 0 ? "checked":""}}>OFF
                                            </label>
                                        </li>
                                    @else
                                        <li>
                                            <label>
                                                <input type="radio" name="pickup_flag"
                                                       value="1" checked>公開
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="pickup_flag"
                                                       value="0">非公開
                                            </label>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="slug_wrap">
                                <label class="title_label" for="edit_text">スラッグ : </label>
                                @if($id == 0)
                                    <p id="notice_edit_slug">/ は入力できません。</p>
                                    <textarea class="edit_area" name="slug" id="edit_slug"></textarea>
                                @else
                                    <p>article/detail/{{$article->slug}}/{{$id}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="btn_wrap">
                            <button type="submit" formaction="/admin/article/{{$id}}" formtarget="_self" value="update"
                                    name="submit" class="edit_btn" id="edit_btn">
                                {{$id != 0 ? "更新":"登録"}}
                            </button>
                            <button type="submit" formaction="/admin/preview/{{$id}}" formtarget="_blank"
                                    onclick="previewDown()" value="preview" name="preview" class="edit_btn pre_btn"
                                    id="pre_btn">
                                プレビュー
                            </button>
                            <button type="submit" formaction="/admin/article/{{$id}}" formtarget="_self" value="delete"
                                    name="delete" class="delete_btn"
                                    id="delete_btn">この記事を削除する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/tagsinput.js"></script>
    <script>
        $(function () {
            // shift + enter で<br>を自動入力
            $('#edit_text').focus(function () {
                $(this).on('keydown', function (event){
                    if(event.shiftKey) {
                        if(event.which === 13){
                            // 入力位置の取得
                            var selIdx = $(this).get(0).selectionStart;
                            var start = $(this).val().slice(0, selIdx);
                            var end = $(this).val().slice(selIdx);
                            $(this).val(`${start}<br>${end}`);
                            // カーソルを<br>の後ろに設置
                            $(this).get(0).setSelectionRange(selIdx+4, selIdx+4);
                        }
                    }
                })
            })

            $('#notice_edit_slug').hide();

            $('#edit_slug').on('keyup', function () {
                if ($(this).val().indexOf('/') >= 0) {
                    $('#notice_edit_slug').slideDown();

                } else {
                    $('#notice_edit_slug').slideUp();
                }
            });
        })

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

        function addText(e) {
            const area = document.getElementById('edit_text');
            var number = e.target.dataset.number;
            var text = '';
            if (number == 1) {
                var text = '<div class="mokuji">\n<h2>目次</h2>\n<ol>\n<li><a href="#heading1">見出し①</a></li>\n<li><a href="#heading2">見出し②</a></li>\n<li><a href="#heading3">見出し③</a></li>\n<li><a href="#heading4">まとめ</a></li> \n</ol>\n</div>\n';
            } else if (number == 2) {
                var text = '<h2 class="article_h2" id=""></h2>\n'
            } else if (number == 3) {
                var text = '<h4 class="article_h4" id=""></h4>\n'
            } else if (number == 4) {
                var text = '<a href="★★★URL★★★" target="_blank" class="out_site_url">テキストテキストテキスト</a>\n'
            } else if (number == 5) {
                var text = '<div class="article_link"><a href="LPへのリンク" data-id="00"></a></div>\n'
            } else if (number == 6) {
                var text = '<div class="lp_button_wrap"><div class="inner_wrap"><a href="https://YY.co.jp/●●-service-introduction/" class="midium" target="_blank" rel="nofollow" onclick="gaclick(&#39;article-button&#39;, this)" data-gaclick="article-button"><img src="/images/next_white.png" alt=""><p>○○のサービスは<br>こちらからチェック</p></a></div></div>\n'
            } else if (number == 7) {
                var text = '<blockquote class="article_blockquote"></blockquote>\n'
            } else if (number == 8) {
                var text = '<span style="font-weight:bold;"><font color="#ff0000">★ここに文字★</font></span>\n'
            } else if (number == 9) {
                var text = '<span style="font-weight:bold;"><span class="markerYellow">★ここに文字★</span></span>\n'
            } else if (number == 10) {
                var text = '<span style="font-weight:bold;"><span class="markerBlue">★ここに文字★</span></span>\n'
            } else if (number == 11) {
                var text = '<span style="font-weight:bold;"><span class="markerGreen">★ここに文字★</span></span>\n'
            } else if (number == 12) {
                var text = '<span style="font-weight:bold;"><span class="markerPink">★ここに文字★</span></span>\n'
            } else if (number == 13) {
                var text = '<ul class="mark_addition_ul">\n<li></li>\n<li></li>\n<li></li>\n</ul>\n'
            } else if (number == 14) {
                var text = '<ol class="mark_addition_ol">\n<li></li>\n<li></li>\n<li></li>\n</ol>\n'
            } else if (number == 15) {
                var text = '<span style="font-size: 10pt;"></span>\n'
            } else if (number == 16) {
                var text = '<div class="sc_frame_wrap_a sc_frame_wrap"><div class="sc_frame_title">Aテスト囲い枠</div><div class="sc_frame "><div class="sc_frame_text">テストテストテストテスト</div></div></div>\n'
            } else if (number == 17) {
                var text = '<div class="sc_frame_wrap_b sc_frame_wrap"><div class="sc_frame_title"><div class="sc_frame_icon"><img src="/images/next_white.png" alt=""></div><span>Bテスト囲い枠</span></div><div class="sc_frame "><div class="sc_frame_text">テストテストテストテスト</div></div></div>\n'
            } else if (number == 18) {
                var text = '<div class="sc_frame_wrap_c sc_frame_wrap"><div class="sc_frame_title">Cテスト囲い枠</div><div class="sc_frame "><div class="sc_frame_text">テストテストテストテスト</div></div></div>\n'
            } else if (number == 19) {
                var text = '<div class="sc_frame_wrap_d  sc_frame_wrap"><div class="sc_frame "><div class="sc_frame_text">本文のみテストテストテスト</div></div></div>\n'
            } else if (number == 20) {
                var text = '<table class="article_table">\n<thead><th>見出し</th><th>内容</th></thead>\n<tbody>\n<tr><th>見出し</th><td>内容</td></tr>\n<tr><th>見出し</th><td>内容</td></tr>\n<tr><th>見出し</th><td>内容</th></tr>\n</tbody>\n</table>\n'
            } else if (number == 21) {
                var text = '<div class="article_video">埋め込み用HTMLタグを入れる</div>\n'
            } else if (number == 22) {
                var text = '<span style="font-weight:bold;">★ここに文字★</span>\n'
            }

            //カーソルの位置を基準に前後を分割して、その間に文字列を挿入
            area.value = area.value.substr(0, area.selectionStart)
                + text + area.value.substr(area.selectionStart);
        }
    </script>
@endsection
