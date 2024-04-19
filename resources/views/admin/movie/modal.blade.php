<div class="bg_wrap" id="edit_bg_wrap">
    <div class="modal_wrap">
        <div class="modal_close">×</div>
        <form action="/admin/movie/edit" method="post">
            @csrf
            <input type="hidden" id="movie_id" name="movie_id">
            <ul>
                <li>
                    <div class="movie_title">
                        タイトル
                    </div>:
                    <input type="text" class="movie_title_input" id="movie_title" name="movie_title">
                </li>
                <li>
                    <div class="movie_title">
                        リンク
                    </div>:
                    <input type="text" class="movie_title_input" id="movie_src" name="movie_src">
                </li>
                <li>
                    <button id="movie_edit" type="submit" name="edit_post" class="message"
                            value="">変更する
                    </button>
                    <button id="movie_edit" type="submit" name="edit_post" class="delete_btn message" style="background: #4a1010;"
                            value="">削除する
                    </button>
                </li>
            </ul>
        </form>
    </div>
</div>