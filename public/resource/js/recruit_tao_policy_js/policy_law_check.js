$(document).ready(function(){
    //===================加载文本编辑器===================
    var ue = UE.getEditor('content');
    //===================js表单验证===================
    $('#title').blur(function(){
        verifytitle();
    });
    $('#name').blur(function(){
        verifyname();
    });

    $('#submit').bind('click',function(){
        var ubbeditor = ue.getContentTxt();
       if(verifytitle()&&verifycontent(ubbeditor)&&verifyname()) {
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
            $("#content_c").text("请输入信息内容").css("color","");
            return true;
        }  
}

function verifyname(){
    var name = $("#name").val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$|^\s*$/;
        if(iflimit(name,1,20)){
            $("#name_c").text("姓名不可为空,且不可过长").css("color","red");
            return false;
          }else if(ifregex(name,str)){
            $("#name_c").text("请勿输入无意义的文字符").css("color","red");
                return false;
          }else if(Checksensitive(name)){
            $('#name_c').text("请勿输入反动、迷信及不文明言论").css("color","red");
            return false;
          }else{
            $("#name_c").text("请输入姓名").css("color","");
            return true;
          }   
}