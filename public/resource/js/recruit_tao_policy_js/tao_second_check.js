$(document).ready(function(){
    //===================加载文本编辑器===================

    //===================js表单验证===================
    $('#title').blur(function(){
        verifytitle();
    });
    $('#value').blur(function(){
        verifyvalue();
    });
    $('#manager').blur(function(){
        verifymanager();
    });
    $('#phone').blur(function(){
        verifyphone();
    });
    $('#address').blur(function(){
        verifyaddress();
    });
    $('#num').blur(function(){
        verifynum();
    });
    $('#content').blur(function(){
        verifycontent();
    });

    $('#submit').bind('click',function(){
       if(verifytitle()&&verifycontent()&&verifyvalue()&&verifymanager()&&verifyphone()&&verifynum()&&verifyaddress()) {
        return true;
       }else{
        return false;
       }
    });
    
    
    
    
});

function verifytitle(){
    var name = $("#title").val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$|^\s*$/;
        if(iflimit(name,1,255)){
            $("#title_c").text("标题不可为空").css("color","red");
            return false;
          }else if(ifregex(name,str)){
            $("#title_c").text("请勿输入无意义的文字符").css("color","red");
                return false;
          }else if(Checksensitive(name)){
            $('#title_c').text("请勿输入反动、迷信及不文明言论").css("color","red");
            return false;
          }else{
            $("#title_c").text("请输入标题，详细和有意义的标题能让您的信息更加吸引眼球").css("color","");
            return true;
          }   
}

function verifycontent(){
    var content = $("#content").val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$|^\s*$/;
        if(Checksensitive(content)){
            $('#content_c').text("请勿输入反动、迷信及不文明言论").css("color","red");
            return false;
        }else if(iflimit(content,1,999)){
            $("#content_c").text("信息内容不可为空").css("color","red");
            return false;
        }else if(ifregex(content,str)){
            $("#content_c").text("请勿输入无意义的文字").css("color","red");
            return false;
        }else{
            $("#content_c").text("请输入信息内容").css("color","");
            return true;
        }  
}

function verifyvalue(){
    var value = $("#value").val();
    var str = /^(\d+.\d+){1}$|^\d+$/;
    if(iflimit(value,1,10)){
            $("#value_c").text("内容不可为空，且内容不可过长").css("color","red");
            return false;
          }else if(!ifregex(value,str)){
            $("#value_c").text("只能输入数字").css("color","red");
            return false;
          }else{
            $("#value_c").text("请输入价格").css("color","");
            return true;
          } 
    
} 
function verifynum(){
    var num = $("#num").val();
    var str = /^(\d+.\d+){1}$|^\d+$/;
    if(iflimit(num,1,10)){
            $("#num_c").text("内容不可为空，且内容不可过长").css("color","red");
            return false;
          }else if(!ifregex(num,str)){
            $("#num_c").text("只能输入数字").css("color","red");
            return false;
          }else{
            $("#num_c").text("请输入数量").css("color","");
            return true;
          } 
    
} 
function verifymanager(){
    var manager = $("#manager").val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$|^\s*$/;
    if(Checksensitive(manager)){
            $('#manager_c').text("请勿输入反动、迷信及不文明言论").css("color","red");
            return false;
        }else if(manager.length == 0){
            $("#manager_c").text("联系人不可为空").css("color","red");
            return false;
        }else if(manager.length > 10){
            $("#manager_c").text("联系人不可过长").css("color","red");
            return false;
        }else if(ifregex(manager,str)){
            $("#manager_c").text("请勿输入无意义的文字").css("color","red");
            return false;
        }else{
            $("#manager_c").text("请输入联系人").css("color","");
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

function verifyaddress(){
    var address = $("#address").val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$|^\s*$/;
        if(iflimit(address,1,255)){
            $("#address_c").text("地域不可为空").css("color","red");
            return false;
          }else if(ifregex(address,str)){
            $("#address_c").text("请勿输入无意义的文字符").css("color","red");
                return false;
          }else if(Checksensitive(address)){
            $('#address_c').text("请勿输入反动、迷信及不文明言论").css("color","red");
            return false;
          }else{
            $("#address_c").text("请输入地域").css("color","");
            return true;
          }   
}
