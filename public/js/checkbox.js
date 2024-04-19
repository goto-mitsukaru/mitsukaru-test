;(function($)
    {
        /* =============================================================
        // relation_checkbox
        // チェックボックスの親子関係構築プラグイン
        // author digichro inc. y.sakai
        //
        // 親のチェックボックスチェック→子のチェックボックス全てチェック
        // 子のチェックボックス全てチェック→親のチェックボックスチェック
        //
        // 使い方）
        // $("#parent").relation_checkbox({ "childs": "#childs_checkbox input" });
        // $("#parent").relation_checkbox({ "childs": $( "#childs_checkbox input" ) });
        // ※childs は jQueryオブジェクト or jQueryセレクターを指定する。
        ============================================================= */
        $.relation_checkbox = function( element, options )
        {
            var defaults = {
                childs: null
            }

            var plugin = this,
                $parent = $(element),
                $childs = null,
                last_count = false,
                enabled = false;

            plugin.settings = {}

            plugin.init = function()
            {
                plugin.settings = $.extend({}, defaults, options);

                if( plugin.settings.childs instanceof jQuery )
                {
                    $childs = plugin.settings.childs;
                    enabled = true;
                }
                else if( $.type(plugin.settings.childs) === "string" )
                {
                    $childs = $( plugin.settings.childs );
                    enabled = true;
                }
                if( !enabled ) return false;

                $childs.bind( "change", childs_to_parent );
                $parent.bind( "change", parent_to_childs );
                //parent_to_childs();
                if( $parent.is(":checked") )
                {
                    $childs.not(":checked").attr( "checked", "checked" ).change();
                }
                last_count = $childs.filter(":checked").size();
            }

            var childs_to_parent = function()
            {
                if( !enabled ) return false;

                if( $childs.size() == $childs.filter(":checked").size() )
                {
                    $parent.attr( "checked", "checked" ).change();
                }
                else
                {
                    $parent.removeAttr( "checked" );
                    if( last_count == $childs.size() )
                    {
                        enabled = false;
                        $parent.change();
                        enabled = true;
                    }
                }
                last_count = $childs.filter(":checked").size();
            }
            var parent_to_childs = function()
            {
                if( !enabled ) return false;

                if( $parent.is(":checked") )
                {
                    $childs.not(":checked").attr( "checked", "checked" ).change();
                }
                else
                {
                    $childs.filter(":checked").removeAttr( "checked" ).change();
                }
                last_count = $childs.filter(":checked").size();
            }

            plugin.init();
        }

        $.fn.relation_checkbox = function(options)
        {
            return this.each(function()
            {
                if (undefined == $(this).data("relation_checkbox"))
                {
                    var plugin = new $.relation_checkbox(this, options);
                    $(this).data("relation_checkbox", plugin);
                }
            });
        }

    }
)(jQuery);