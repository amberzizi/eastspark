var reg=/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/gi;
//获取验证码并填充节点
var getCaptcha = function() {
        var timestamp = new Date().getTime();
        $(".captcha").next().html('<img src="/user/captcha/100/32?v=' + timestamp + '" />');
    }
    //初始化
$(document).ready(function(){
        $('#name').blur(function(){
            verifyname();
        });
       $('#phone').blur(function(){
            verifyphone();
        });
            //更换验证码
        $("#replace_captcha").click(function() {
        getCaptcha();
        });
        
        getCaptcha();
        //如果验证码错误，弹出对话框
        var err=$(".cyw_popup").css('display');
        var ifok=$(".cyw_popup").attr('ifok');
        if(err == 'inline'){
            alert("验证码错误,请重新输入！");
        }
        if(ifok == 'yes'){
            alert("提交成功！");
        }
       
       $('#doresume').bind('click',function(){
           $('.cyw_popup').show();
           $('.work_modal_bg').show();
       });
       $('#exit').bind('click',function(){
            $('.cyw_popup').hide();
            $('.work_modal_bg').hide();
       });
       $('#submit').bind('click',function(){
       if(verifyname()&&verifyphone()) {
        return true;
       }else{
        return false;
       }
    });
       
    });
    
    function verifyname(){
    var name = $("#name").val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$|^\s*$/;
        if(iflimit(name,1,20)){
            $("#name_c").text("姓名不可为空").css("color","red");
            return false;
          }else if(ifregex(name,str)){
            $("#name_c").text("请勿输入无意义的文字符").css("color","red");
                return false;
          }else if(Checksensitive(name)){
            $('#name_c').text("请勿输入不文明言论").css("color","red");
            return false;
          }else{
            $("#name_c").text("请输入姓名").css("color","");
            return true;
          }   
}
    function verifyphone(){
    var phone = $("#phone").val();
    var str = /^(\d+.\d+){1}$|^\d+$/;
    if(iflimit(phone,1,12)){
            $("#phone_c").text("电话不可为空").css("color","red");
            return false;
          }else if(!ifregex(phone,str)){
            $("#phone_c").text("不是正确的电话号码").css("color","red");
            return false;
          }else{
            $("#phone_c").text("请输入电话").css("color","");
            return true;
          }  
}
    