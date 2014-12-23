function confirmdiv(id){
    $('.alert-message').html("您确定要冻结此用户吗？");
    //先移除click 事件再设置click事件
    $("#alert-sub").unbind("click");
    $("#alert-sub").click(
        function(){
          detelsub(id);  
        }
    );
    popWin('detail3');    
}
function detelsub(key){
    window.location.href="/admin/admin_delete/"+key;
    }
    
function confirmdiv1(id){
    $('.alert-message').html("您确定要恢复此用户吗？");
    //先移除click 事件再设置click事件
    $("#alert-sub").unbind("click");
    $("#alert-sub").click(
        function(){
          detelsub1(id);  
        }
    );
    popWin('detail3');    
}
function detelsub1(key){
    window.location.href="/admin/admin_return/"+key;
    }

$(document).ready(function(){
    $('#username').blur(function() {
        verifyusername();
    })
    $('#passsword').blur(function() {
        verifypasssword();
    })
    $('#repasssword').blur(function() {
        verifyrepasssword();
    })
    $('#name').blur(function() {
        verifyname();
    })
    $('#phone').blur(function() {
        verifyphone();
    })
    //输入信息验证
    $("#submit").click(function() {
        var key5 = verifyphone_sub();
        var key4 = verifyname();
        var key3 = verifyrepasssword();
        var key2 = verifypasssword();
        var key1 = verifyusername_sub();
        if (key1&&key2&&key3&&key4&&key5) {
            return true;
        }
        return false;
    });
})    


function verifyusername_sub() {
    var title = $('#username').val();
    var verifykey = $('#verifykey').val();
    var key = '#admin_tips_username';
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$/;
    if (Checksensitive(title)) {
        showwarning1(key, "请勿输入反动、迷信及不文明言论");
        $('#username').css("border", "1px solid red");
        return false;
    } else if (iflimit(title, 1, 255)) {
        showwarning1(key, "用户名不可为空");
        $('#username').css("border", "1px solid red");
        return false;
    }else if (iflimit(title, 4, 255)) {
        showwarning1(key, "用户名长度应至少4位");
        $('#username').css("border", "1px solid red");
        return false;
    } else if (verifykey=='0') {
        showwarning1(key, "用户名已经存在");
        $('#username').css("border", "1px solid red");
        return false;
    } else {
        $('#username').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请为新增的网站管理员设置用户名，如：housesmanager01");
        return true;
    }

}
function verifyusername() {
    var title = $('#username').val();
    var key = '#admin_tips_username';
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$/;
    if (Checksensitive(title)) {
        showwarning1(key, "请勿输入反动、迷信及不文明言论");
        $('#username').css("border", "1px solid red");
        return false;
    } else if (iflimit(title, 1, 255)) {
        showwarning1(key, "用户名不可为空");
        $('#username').css("border", "1px solid red");
        return false;
    }else if (iflimit(title, 4, 255)) {
        showwarning1(key, "用户名长度应至少4位");
        $('#username').css("border", "1px solid red");
        return false;
    }  else {
        $.ajax({
              url: "/admin/verify_username",
              data: { title: title},
              success: 
                  function(data1){
                    if(data1==1){;
                        $('#verifykey').val("0");///有重复title
                        showwarning1(key,"用户名已经存在");
                        $('#username').css("border","1px solid red");
                        return false;
                    }else{
                        $('#verifykey').val("1");//没有重复title
                        $('#username').css("border","1px solid #D0D0D0");
                        shownomal1(key,"请为新增的网站管理员设置用户名，如：housesmanager01 ");
                        return true;
                    }
                  }
            }); 
    }

}
function verifypasssword() {
    var title = $('#passsword').val();
    var key = '#admin_tips_passsword';
    if (iflimit(title, 1, 255)) {
        showwarning1(key, "密码不可为空");
        $('#passsword').css("border", "1px solid red");
        return false;
    } else if (iflimit(title, 6, 255)) {
        showwarning1(key, "密码长度应至少6位");
        $('#passsword').css("border", "1px solid red");
        return false;
    } else {
        $('#passsword').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请为新增的网站管理员设置后台登陆密码，例：123456 ");
        return true;
    }
}

function verifyrepasssword() {
    var title = $('#repasssword').val();
    var title1 = $('#passsword').val();
    var key = '#admin_tips_repasssword';
    if (iflimit(title, 1, 255)) {
        showwarning1(key, "确认密码不可为空");
        $('#repasssword').css("border", "1px solid red");
        return false;
    } else if (iflimit(title, 6, 255)) {
        showwarning1(key, "确认密码长度应至少6位");
        $('#repasssword').css("border", "1px solid red");
        return false;
    } else if (title!=title1) {
        showwarning1(key, "两次密码输入不一致，请重新输入");
        $('#repasssword').css("border", "1px solid red");
        return false;
    } else {
        $('#repasssword').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请输入确认密码");
        return true;
    }
}
function verifyname() {
    var title = $('#name').val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$/;
    var key = '#admin_tips_name';
    if (Checksensitive(title)) {
        showwarning1(key, "请勿输入反动、迷信及不文明言论");
        $('#name').css("border", "1px solid red");
        return false;
    } else if (iflimit(title, 1, 255)) {
        showwarning1(key, "姓名不可为空");
        $('#name').css("border", "1px solid red");
        return false;
    } else {
        $('#name').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请输入新增网站管理员的真实姓名");
        return true;
    }

}

function verifyphone() {
    var title = $('#phone').val();
    var str = /^[1][3-8]\d{9}$/;
    var key = '#admin_tips_phone';
    if (iflimit(title, 11, 11)) {
        showwarning1(key, "号码不能为空或者太大，请输入正确的手机号码");
        $('#phone').css("border", "1px solid red");
        return false;
    } else if (!ifregex(title, str)) {
        showwarning1(key, "请输入11位真实的手机号");
        $('#phone').css("border", "1px solid red");
        return false;
    } else {
        $.ajax({
              url: "/admin/verify_phone",
              data: { phone: title},
              success: 
                  function(data1){
                    if(data1==1){;
                        $('#verifyphone').val("0");///有重复title
                        showwarning1(key,"手机号码已经存在");
                        $('#phone').css("border","1px solid red");
                        return false;
                    }else{
                        $('#verifyphone').val("1");//没有重复title
                        $('#phone').css("border","1px solid #D0D0D0");
                        shownomal1(key,"请输入11位手机号码，例：13522000000");
                        return true;
                    }
                  }
            });
    }

}
function verifyphone_sub() {
    var title = $('#phone').val();
    var verifykey = $('#verifyphone').val();
    var str = /^[1][3-8]\d{9}$/;
    var key = '#admin_tips_phone';
    if (iflimit(title, 11, 11)) {
        showwarning1(key, "号码不能为空或者太大，请输入正确的手机号码");
        $('#phone').css("border", "1px solid red");
        return false;
    } else if (!ifregex(title, str)) {
        showwarning1(key, "请输入11位真实的手机号");
        $('#phone').css("border", "1px solid red");
        return false;
    }  else if (verifykey=='0') {
        showwarning1(key, "手机号码已经存在");
        $('#phone').css("border", "1px solid red");
        return false;
    }else {
        $('#phone').css("border", "1px solid #D0D0D0");
        shownomal1(key, "请输入11位手机号码，例：13522000000");
        return true;
    }

}
