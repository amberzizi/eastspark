$(document).ready(function(){
    //===================加载文本编辑器===================
    var ue = UE.getEditor('content');
    //===================js表单验证===================
    $('#title').blur(function(){
        verifytitle();
    });

    $('#num').blur(function(){
        verifynum();
    });
    $('#address').blur(function(){
        verifyaddress();
    });
    
    $('#submit').bind('click',function(){
        var ubbeditor = ue.getContentTxt();
       if(verifytitle()&&verifycontent(ubbeditor)&&verifynum()&&verifyaddress()) {
        return true;
       }else{
        return false;
       }
    });
});

function verifytitle(){
    var title = $("#title").val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$|^\s*$/;
        if(iflimit(title,1,50)){
            $("#title_c").text("公司名不可为空,且不可过长").css("color","red");
            return false;
          }else if(ifregex(title,str)){
            $("#title_c").text("请勿输入无意义的文字符").css("color","red");
                return false;
          }else if(Checksensitive(title)){
            $('#title_c').text("请勿输入反动、迷信及不文明言论").css("color","red");
            return false;
          }else{
            $("#title_c").text("请输入招聘标题").css("color","");
            return true;
          }   
}
function verifycontent(ubbeditor){
    var content = ubbeditor;
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$|^\s*$/;
        if(Checksensitive(content)){
            $('#content_c').text("请勿输入反动、迷信及不文明言论").css("color","red");
            return false;
        }else if(iflimit(content,1,100000)){
            $("#content_c").text("信息内容不可为空").css("color","red");
            return false;
        }else if(ifregex(content,str)){
            $("#content_c").text("请勿输入无意义的文字").css("color","red");
            return false;
        }else{
            $("#content_c").text("请输入职位描述").css("color","");
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
            $("#num_c").text("请输入招聘人数").css("color","");
            return true;
          } 
    
} 
function verifyaddress(){
    var address = $("#address").val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$|^\s*$/;
        if(iflimit(address,1,255)){
            $("#address_c").text("工作地点不可为空").css("color","red");
            return false;
          }else if(ifregex(address,str)){
            $("#address_c").text("请勿输入无意义的文字符").css("color","red");
                return false;
          }else if(Checksensitive(address)){
            $('#address_c').text("请勿输入反动、迷信及不文明言论").css("color","red");
            return false;
          }else{
            $("#address_c").text("请输入工作地点").css("color","");
            return true;
          }   
}
