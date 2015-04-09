<div class="container">
<form action="/user/login_manager/save_login_admin_info_change" method="post">
用户名：<input type="text" name="username" value="<?=$admin_info[0]->username;?>"/><br />
密码：<input type="password" name="password" id="pw" value="<?=$admin_info[0]->password;?>"/><br />
确认密码：<input type="password" name="check_password"/><br />
姓名：<input type="text" name="name" value="<?=$admin_info[0]->name;?>"/><br />
手机号码：<input type="text" name="phone" value="<?=$admin_info[0]->phone;?>"/><br />
公司电话：<input type="text" name="company_phone" value="<?=$admin_info[0]->company_phone;?>"/><br />
个人描述：<textarea name="promise"><?=$admin_info[0]->promise;?></textarea><br />
<input type="hidden" value="<?=$id;?>" name="id"/>
<input type="submit" value="修改" id="submit"/>
</form>
</div>
<script type="text/javascript">

$(document).ready(function(){

    
   $('#submit').bind('click',function(){
        
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