<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="jumbotron">
                <h2>科员后台管理系统</h2>
                <p>=======管理员登陆=========</p>
                <div class="form-group">
                            <form action="/user/login_manager/check_admin_info" method="post">
                                <input type="hidden" name="token" value="<?=$token;?>"/>
                                <input type="hidden" name="token_id" value="<?=$token_id;?>"/>
                                用户名：<input name="username" type="text"/><br /><br />
                                密码：<input name="password" type="password" id="pw"/><br /><br />
                                <div class="captcha" ><input placeholder="请输入验证码" class="captcha_f" name="captcha" type="text"/></div><a class="left" href="" id="replace_captcha"></a><br /><br />
                                <?php if($check == 'capwrong'){echo '验证码错误，请正确填写！<br />';}else if($check == 'upwrong'){echo '密码错误，请核对后填写!<br />';}else if($check == 'delwrong'){echo '用户已被冻结，请联系管理员!<br />';}?>
                                <input type="submit" value="登录" id="submit"/> 
                            </form>
                </div>
            </div>
        </div>

        <div class="col-md-2">
        </div>
        
    </div>
</div>
<script type="text/javascript">

$(document).ready(function(){
    //初始化验证码
    getCaptcha();
    
   $('#submit').on('click',function(){
        var temp = $('#pw').val();
        if(temp != ''){
        var hash = $.md5(temp);
        $('#pw').val(hash);
        return true;
        }
        
        return false;
   });
    
});

//获取验证码并填充节点
    var getCaptcha = function() {
        var timestamp = new Date().getTime();
        $(".captcha").next().html('<img src="/user/login_manager/captcha/100/32?v=' + timestamp + '" />');
    } 
//更换验证码
    $("#replace_captcha").click(function(){
        getCaptcha();
    });
 </script>

</body>
</html>