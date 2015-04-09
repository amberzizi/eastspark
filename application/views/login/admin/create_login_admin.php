<div class="container">
    <form action="/user/login_manager/save_new_login_admin" method="post">
    用户名：<input type="text" name="username"/><br />
    密码：<input type="password" name="password" id="pw"/><br />
    确认密码：<input type="password" name="check_password"/><br />
    姓名：<input type="text" name="name"/><br />
    手机号码：<input type="text" name="phone"/><br />
    公司电话：<input type="text" name="company_phone"/><br />
    个人描述：<textarea name="promise"></textarea><br />
    <input type="submit" value="增加" id="submit"/>
    </form>

</div>
<script type="text/javascript">

$(document).ready(function(){

    
   $('#submit').bind('click',function(){
        var temp = $('#pw').val();
        if(temp != ''){
        var hash = $.md5(temp);
        $('#pw').val(hash);
        return true;
        }
        
        return false;
   });
    
});


 </script>
 <script type="text/javascript">
$(document).ready(function(){
    $("#es_9").addClass('active');    
    $("#es_9_1").addClass('active');     
});
</script>
 </body>
 </html>