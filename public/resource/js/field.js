function confirmdiv(id) {
    $('.alert-message').html("您确定要删除此条记录吗？");
    //先移除click 事件再设置click事件
    $("#alert-sub").unbind("click");
    $("#alert-sub").click(
            function() {
                detelsub(id);
            }
    );
    popWin('detail3');
}
function detelsub(key) {
    //alert("看到了吧！"+key);
    window.location.href = "/login/field_delete/" + key;
}

$(document).ready(function() {
    $('#search_submit1').click(function() {
        if ($('#search_input1').val() == "请输入您想搜索的房源信息") {
            $('#search_input1').css("border", "1px solid red");
            return false;
        }
    });


    //填充大厦
    $(".build-list .select").on("click", function(event) {
        //清空图片
        $("#show_build_image").html();
        //alert($(this).attr('data'));
        //根据选择的大厦，ajax查询该大厦信息并进行填充
        $.get("/login/field/get_buildinfo_ajax/" + $(this).attr('data'), function(data) {
            //$(".build-list").html(data);
            build = eval(data);
            $('#build').val(build[0]['name']);
            $('#addr').val(build[0]['addr']);
            //$('#property').val(build[0]['property']);
            $('#floor2').val(build[0]['floor2']);
            $('#titlein').val(build[0]['name']);
            $('#region').val(build[0]['region']);
            $('#area').val(build[0]['area']);
            $('#rank option').removeAttr("selected");
            $('#rank [value=' + build[0]['rank'] + ']').attr("selected", "selected");
            //标签
            $('#tag_select').html('');
            $('#tag_selected').html('');
            $tag = build[0]['tag'];
            $tag = $tag.split(',');
            $.each($tag, function(n, value) {
                $('#tag_select').append("<a class='tag_li' data-value='" + value + "'>      " + value + "    </a>");
            })
            //搞楼层选择
            $('#floor').html('');
            s = parseInt(build[0]['floor1']);
            f = parseInt(build[0]['floor2']);
            //alert(f);
            for (i = s; i <= f; i++) {
                if (i != 0) {
                    $('#floor').append('<option value="' + i + '">' + i + '</option>');
                }
            }
            var json = eval(build[0]['property']);
            for (var pro in json) {
                $("#property").append($("<option/>").text(json[pro]).attr("value", json[pro]));
            }
            var json1 = eval(build[1]);
            var arr = ['内景', '外景', '电梯间'];
            for (var img in json1) {
                $("#show_build_image").append($('<div/>').attr('class', 'build_img_show').append($('<label/>').text(arr[img])).append($("<img/>").attr("src", '/' + json1[img]).attr('data_url', json1[img])));
            }
        });
        $(this).parent().hide();
        event.stopPropagation();
    });

//标签点击添加
    $('#tag_add').click(function() {
        if ($.trim($(this).prev().val()) !== '') {
            $('#tag_selected').append("<a class='tag_lied' data-value='" + $(this).prev().val() + "'>      " + $(this).prev().val() + "    </a>");
            $(this).prev().val('');
            $i = 1;
            $.each($('.tag_lied'), function() {
                $(this).addClass('ehbg_0' + $i);
                $i++;
            });
        }
    })
    $(".tag_li").on("click", function() {
        $('#tag_selected').append("<a class='tag_lied' data-value='" + $(this).attr("data-value") + "'>      " + $(this).attr("data-value") + "    </a>");
        $i = 1;
        $.each($('.tag_lied'), function() {
            $(this).addClass('ehbg_0' + $i);
            $i++;
        });
        $(this).remove();
    });
    $(".tag_lied").on("click", function() {
        $('#tag_select').append("<a class='tag_li' data-value='" + $(this).attr("data-value") + "'>      " + $(this).attr("data-value") + "    </a>");
        $i = 1;
        $.each($('.tag_lied'), function() {
            $(this).addClass('ehbg_0' + $i);
            $i++;
        });
        $(this).remove();
    });

    function show_pic(url) {
        $('#show_image').html('');
        var url2 = "url=" + encodeURI(url);
        $.post("/login/field/checkimg/", url2, function(data) {
            objs = eval(data);
            for (var img in objs) {
                $('#show_image').append('<span><img src=/' + url + objs[img] + ' /><a data_url="/uploads/field/' + url + objs[img] + '" class="img_delete">删除</a></span>');
            }
        });
    }
    ;

    $("#show_build_image .build_img_show img").on('click', function() {
        $(this).parent().hide();
        //复制图片
        $.post('/login/field/field_build/', "url=" + $(this).attr('data_url') + "&t_url=" + $('#w_m_url').val(), function(data) {
            show_pic('uploads/field/' + $('#w_m_url').val());
        });
    });

    //下拉列表
    $("#build").keyup(function(event) {
        $(this).parent().next().show();
        $.get("/login/field/get_build_ajax/" + $(this).val(), function(data) {
            $(".build-list").html(data);
            if (data == '') {
                $(".build-list").hide();
            }
        });
    });

    //点击其他处恢复默认
    $("body").click(function() {
        //alert($("#build").next().next().html());
        $("#build").parent().next().hide();
    });

})


function verifybuild() {
    var title = $('#build').val();
    var key = '#field_tips_build';
    //var str = /^\d*$|^[a-z]*$|^[A-Z]*$/;
    if (Checksensitive(title)) {
        showwarning1(key, "请勿输入反动、迷信及不文明言论");
        $('#build').css("border", "1px solid red");
        return false;
    } else if (iflimit(title, 1, 255)) {
        showwarning1(key, "大厦名称不可为空");
        $('#build').css("border", "1px solid red");
        return false;
    } else {
        $('#build').css("border", "1px solid #D0D0D0");
        shownomal1(key, "输入大厦名称/拼音简写/全拼等选择大厦，如果没有您需要的信息，<a class=\"color_red\"  href=\"/login/build\">点此处</a>添加");
        return true;
    }
}
function verifyaddr() {
    var title = $('#addr').val();
    var key = '#field_tips_addr';
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$/;
    if (Checksensitive(title)) {
        showwarning1(key, "请勿输入反动、迷信及不文明言论");
        $('#addr').css("border", "1px solid red");
        return false;
    } else if (iflimit(title, 1, 255)) {
        showwarning1(key, "地址不可为空");
        $('#addr').css("border", "1px solid red");
        return false;
    } else if (ifregex(title, str)) {
        showwarning1(key, "请勿输入无意义的语句");
        $('#addr').css("border", "1px solid red");
        return false;
    } else {
        $('#addr').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请输入地址");
        return true;
    }

}
function verifyfloor() {
    var title = $('#floor').val();
    var title1 = $('#floor2').val();
    var key = '#field_tips_floor';
    if (iflimit(title, 1, 11)) {
        showwarning1(key, "办公间所在楼层数不可为空");
        $('#floor').css("border", "1px solid red");
        return false;
    } else if (parseInt(title) > parseInt(title1)) {
        showwarning1(key, "请注意办公间所在楼层数应小于总楼层数");
        $('#floor').css("border", "1px solid red");
        return false;
    } else {
        $('#floor').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请输入办公间所在楼层数");
        return true;
    }
}
function verifyfloor2() {
    var title = $('#floor2').val();
    var key = '#field_tips_floor';
    if (iflimit(title, 1, 11)) {
        showwarning1(key, "办公间楼层数不可为空");
        //$("#floor2").select();
        $('#floor2').css("border", "1px solid red");
        return false;
    } else {
        $('#floor2').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请输入办公间所在楼层数");
        return true;
    }
}
function verifyproperty() {
    var title = $('#property').val();
    var str = /^(\d+.\d+){1}$|^\d+$/;
    var key = '#field_tips_property';
    if (ifempty(title)) {
        showwarning1(key, "物业费不可为空");
        //$("#property").select();
        $('#property').css("border", "1px solid red");
        return false;
    } else if (parseInt(title) > 50) {
        showwarning1(key, "请认真核对物业费用，您所输金额已大幅超出天津市平均标准");
        $('#property').css("border", "1px solid red");
        return false;
    } else if (!ifregex(title, str)) {
        showwarning1(key, "请输入正确的金额");
        $('#property').css("border", "1px solid red");
        return false;
    } else {
        $('#property').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请输入每平米/月所需物业费，例：12.00元/平米/月");
        return true;
    }
}
function verifytitlein() {
    var title = $('#titlein').val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$/;
    var key = '#field_tips_titlein';
    if (Checksensitive(title)) {
        showwarning1(key, "请勿输入反动、迷信及不文明言论");
        //$("#titlein").select();
        $('#titlein').css("border", "1px solid red");
        return false;
    } else if (iflimit(title, 1, 255)) {
        showwarning1(key, "房源标题不可为空");
        //$("#titlein").select();
        $('#titlein').css("border", "1px solid red");
        return false;
    } else if (ifregex(title, str)) {
        showwarning1(key, "清晰的标题内容便于使用时查找");
        //$("#titlein").select();
        $('#titlein').css("border", "1px solid red");
        return false;
    } else {
        $('#titlein').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请输入办公间标题以供房源列表显示，例：信诚大厦南北向写字楼58平");
        return true;
    }

}
function verifysquare() {
    var title = $('#square').val();
    var str = /^(\d+.\d+){1}$|^\d+$/;
    var key = '#field_tips_square';
    if (ifempty(title)) {
        showwarning1(key, "办公间面积不可为空");
        $('#square').css("border", "1px solid red");
        return false;
    } else if (parseInt(title) > 3000) {
        showwarning1(key, "请认真核对面积数值，您所输平米数已大幅超出天津市平均标准");
        $('#square').css("border", "1px solid red");
        return false;
    } else if (!ifregex(title, str)) {
        showwarning1(key, "办公间租赁费用格式错误");
        $('#square').css("border", "1px solid red");
        return false;
    } else {
        $('#square').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请输入办公间面积，例：90.50平方米 ");
        return true;
    }
}
function verifyrent() {
    var title = $('#rent').val();
    var str = /^(\d+.\d+){1}$|^\d+$/;
    var key = '#field_tips_rent';
    if (ifempty(title)) {
        showwarning1(key, "请输入金额");
        $('#rent').css("border", "1px solid red");
        return false;
    } else if (parseInt(title) > 20000) {
        showwarning1(key, "请认真核对租金金额，您所输金额已大幅超出天津市平均标准");
        $('#rent').css("border", "1px solid red");
        return false;
    } else if (!ifregex(title, str)) {
        showwarning1(key, "请输入正确的金额");
        $('#rent').css("border", "1px solid red");
        return false;
    } else {
        $('#rent').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请输入办公间租赁费用，例：3500.00元");
        return true;
    }
}
