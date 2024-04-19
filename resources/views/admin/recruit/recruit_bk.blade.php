@extends('admin.common.layout')
@include('admin.common.css')
@include('admin.common.menu')
@section('title', 'RECRUIT')
@section('content')
    <div class="main_contents" id="main_contents_profile">
        <h2>- 求人一覧 -</h2>
        <div class="msg_wrap" id="msg_wrap">
        </div>
        <div class="container">
            <div class="bottom_list">
                <a class="add_btn" href="/admin/edit_recruit/0">新規追加</a>
            </div>
            <div class="list_wrap">
                <div class="table_list">
                    <table>
                        <tr>
                            <th class="list_id">ID</th>
                            <th class="list_date" style="width: 100px">作成日</th>
                            <th class="list_title">企業名</th>
                            <th style="width: calc(50% - 100px)" class="list_text">求人タイトル</th>
                            <th style="width: 100px">おすすめ</th>
                            <th style="width: 100px">公開状況</th>
                            <th class="list_btn" style="width: 200px"></th>
                        </tr>
                        @foreach($recruit_list as $recruit)
                            <tr>
                                <td class="">{{ $recruit->id }}</td>
                                <td style="letter-spacing: 0.02rem">{{ date("Y/m/d", strtotime($recruit->created_at)) }}</td>
                                <td class="left_text">
                                    {{ $company_list->where('id', $recruit->company_id)->first() ? $company_list->where('id', $recruit->company_id)->first()->name : '' }}
                                </td>
                                <td class="left_text">{{ $recruit->name }}</td>
                                <td>{{ $recruit->recommendation_flag ? '設定中' : '-' }}</td>
                                <td class="{{ $recruit->status_flag ? '' : 'bg_red' }}">{{ $recruit->status_flag ? '公開' : '非公開' }}</td>
                                <td class="list_btn com_btn_wrap" style="padding: 8px">
                                    <a href="/jobdetail/{{$recruit->id}}" class="edit_btn table_btn link_btn"
                                            style="background: #424242; width: 40px; padding: 6px 0 2px; margin-right: 0;">
                                        <img src="/images/link.svg" alt="">
                                        <div class="link_comment">
                                            リンク
                                        </div>
                                    </a>
                                    <button class="edit_btn table_btn"
                                            style="background: #2b6d8f; width: 40px; padding: 6px 0 2px"
                                            onclick="location.href='/admin/edit_recruit/{{$recruit->id}}'">
                                        <img src="/images/editing.svg" alt="">
                                        <div class="link_comment">
                                            編集
                                        </div>
                                    </button>
                                    <button class="edit_btn table_btn"
                                            style="background: #368f2b; width: 40px; padding: 6px 0 2px"
                                            onclick="location.href='/admin/edit_recruit/copy/{{$recruit->id}}'">
                                        <img src="/images/copy.svg" alt="">
                                        <div class="link_comment">
                                            複製
                                        </div>
                                    </button>
                                    <div class="btn_form delete_modal_btn" style="width: 40px;">
                                        <button class="delete_btn table_btn"
                                                style="background: #8f332b; padding: 6px 0 2px">
                                            <img src="/images/delete.svg" alt="">
                                            <div class="link_comment">
                                                削除
                                            </div>
                                        </button>
                                    </div>
                                    <div class="bg_wrap" id="edit_bg_wrap">
                                        <div class="modal_wrap">
                                            <div class="modal_close">×</div>
                                            <form class="btn_form" method="POST" enctype="multipart/form-data"
                                                  >
                                                @csrf
                                                <ul>
                                                    <li style="justify-content: center;">
                                                        <p style="color: #1b1b2a; font-size: 17px;">本当に削除しますか？</p>
                                                    </li>
                                                    <li>
                                                        <button class="delete_btn table_btn"
                                                                style="background: #8f332b; padding: 12px"
                                                                formaction="/admin/recruit/create/{{$recruit->id}}"
                                                                formtarget="_self"
                                                                type="submit" name="delete" value="delete">
                                                            削除する
                                                        </button>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        const getURL = (button) => {
            let url = button.dataset.url;
            navigator.clipboard.writeText(url);
        }

        //二段階削除
        $(function () {
            $('.delete_modal_btn').on('click', function () {
                $(this).next('.bg_wrap').show();
            });
            $('.modal_close').on('click', function () {
                $('.bg_wrap').hide();
            });
        })

    </script>
@endsection
