<div class="bg_wrap" id="img_bg_wrap">
    <div class="modal_wrap">
        <div class="modal_close">×</div>
        <form id="modal_form" action="/image/post_image" enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" id="image_id" name="image_id">
            <ul>
                <li>
                    <div class="movie_title">
                        メディア名
                    </div>
                    :
                    <input type="text" class="movie_title_input" id="image_name" name="image_name">
                </li>
                <li>
                    <input type="file" class="movie_title_input img_file" id="img_file" name="img_file">
                </li>
                <li>
                    <div class="modal_img_wrap">
                        <label for="img_file">
                            <div class="modal_container">
                                <div class="create_file_wrap">
                                    <label for="img_file">画像を追加</label>
                                </div>
                            </div>
                        </label>
                        <div class="change_container">
                            <div class="change_file_wrap">
                                <a id="image_href" target="_blank" href="">閲覧</a>
                                <label for="img_file">変更</label>
                                <span id="set_img_delete" style="display: none">削除</span>
                            </div>
                        </div>
                        <img src="#" alt="" id="image_src">
                    </div>
                </li>
                <li>
                    <button style="margin-top: 0" id="image_create" type="submit" name="create_img"
                            class="delete_btn message"
                            value="">
                    </button>
                    <button style="margin-top: 0" id="delete_img" formaction="/image/delete" name="delete_img"
                            class="delete_btn message">削除
                    </button>
                </li>
            </ul>
        </form>
    </div>
</div>