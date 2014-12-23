$(document).ready(function(){
    //===================加载文本编辑器===================
    var ue = UE.getEditor('content');
    //===================js表单验证===================
    $('#title').blur(function(){
        verifytitle();
    });

    $('#com_net').blur(function(){
        verifycom_net();
    });

    $('#submit').bind('click',function(){
        var ubbeditor = ue.getContentTxt();
       if(verifytitle()&&verifycontent(ubbeditor)&&verifycom_net()) {
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
            $("#title_c").text("请输入公司名称").css("color","");
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
            $("#content_c").text("请输入公司描述").css("color","");
            return true;
        }  
}

function verifycom_net(){
    var com_net = $('#com_net').val();
        if(iflimit(com_net,1,100)){
            $("#com_net_c").text("网址不可为空,且不可过长").css("color","red");
            return false;
          }else{
            $("#com_net_c").text("请输入公司网址").css("color","");
            return true;
          } 
    
}

