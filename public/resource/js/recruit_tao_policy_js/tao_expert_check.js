$(document).ready(function(){
    //===================加载文本编辑器===================

    //===================js表单验证===================
    $('#name').blur(function(){
        verifyname();
    });
    $('#work_year').blur(function(){
        verifywork_year();
    });
    $('#phone').blur(function(){
        verifyphone();
    });
    $('#major').blur(function(){
        verifymajor();
    });


    $('#submit').bind('click',function(){
       if(verifyname()&&verifywork_year()&&verifymajor()&&verifyphone()) {
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
function verifywork_year(){
    var work_year = $("#work_year").val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$|^\s*$/;
        if(iflimit(work_year,1,10)){
            $("#work_year_c").text("不可为空,且不可过长").css("color","red");
            return false;
          }else if(ifregex(work_year,str)){
            $("#work_year_c").text("请勿输入无意义的文字符").css("color","red");
                return false;
          }else if(Checksensitive(work_year)){
            $('#work_year_c').text("请勿输入反动、迷信及不文明言论").css("color","red");
            return false;
          }else{
            $("#work_year_c").text("请输入从业时间").css("color","");
            return true;
          }   
}

function verifymajor(){
    var major = $("#major").val();
    var str = /^\d*$|^[a-z]*$|^[A-Z]*$|^\s*$/;
        if(iflimit(major,1,255)){
            $("#major_c").text("姓名不可为空,且不可过长").css("color","red");
            return false;
          }else if(ifregex(major,str)){
            $("#major_c").text("请勿输入无意义的文字符").css("color","red");
                return false;
          }else if(Checksensitive(major)){
            $('#major_c').text("请勿输入反动、迷信及不文明言论").css("color","red");
            return false;
          }else{
            $("#major_c").text("请输入主要成就").css("color","");
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

