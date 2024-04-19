<div class="bg_wrap" id="create_bg_wrap">
    <div class="modal_wrap">
        <div class="modal_close">×</div>
        <form action="/admin/movie/create" method="post">
            @csrf
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
                    <button id="movie_edit" type="submit" name="edit_post" class="delete_btn message"
                            value="">登録する
                    </button>
                </li>
            </ul>
        </form>
    </div>
</div>