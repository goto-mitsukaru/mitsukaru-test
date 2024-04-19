@section('css')
<style>
    #menu .menu_main{
        background: rgba(0,0,0,0.95);
    }

    #menu .menu_btn{
        background: rgba(0,0,0,0.7);
    }

    #menu .menu_main nav ul li .no_page{
        color: rgba(255,255,255,0.1);
    }

    #main_content .room_list ul li .text_area{
        color: rgba(255,255,255,0.45);
    }

    #main_content .info_list ul li p{
        color: rgba(255,255,255,0.45);
    }

    #main_content .contact_list .top_text{
        border-bottom: 1px solid rgba(255,255,255,0.45);
    }

    #main_content .detail_wrap{
        background: rgba(0,0,0,0.45);
    }

    .photo_frame {
        position: relative;
        z-index: 5;
    }

    .photo_frame:before {
        content: '';
        display: block;
        position: absolute;
        top: -1px;
        left: 0;
        z-index: 5;
        width: 100%;
        height: calc(100% + 1px);
        box-shadow: inset 0 0 0px 8px rgba(0,0,0,0.6);
        pointer-events: none;
    }

    #main_content .img_item_wrap .image .hover_menu{
        background-color: rgba(0,0,0,0.8);
    }

    #main_content .img_item_wrap .image .hover_menu span,
    #main_content .img_item_wrap .image .hover_menu a{
        background-color: rgba(255,255,255,0.3);
    }

</style>

@stop