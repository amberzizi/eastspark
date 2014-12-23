$(document).ready(function(){
    $('#search_submit').click(function(){
        if($('#search_input').val()==""){
            $('#search_input').css("border","1px solid red");
            showwarning1(search_tips,"请输入您要搜索的条件！");
            return false;
        }
        
    });
    ///////////////////////////////////
    $("[name='arraydel']").change(function(){
            isshowdel();   
        })
        $('#selectall').click(function(){
            $("[name='arraydel']").attr("checked",'true');//全选
            isshowdel();  
        })
    //////////////////////////////////    
})
function delitem(url){
    var i = 0;
    var arrayStr = ''; 
    $("[name='arraydel']:checked").each(function(){
        arrayStr = $(this).val()+'_'+arrayStr;
        i++; 
    })
    arrayStr= arrayStr.substring(0,arrayStr.length-1);
    $.post(url,{str:arrayStr},function(result){
         if(result==1){
            location.reload();
            $("input[name='arraydel']").each(function() {
                $(this).attr("checked", false);
            })
         }else{
            alert('error noid');
         }
    });
}
///////////////////////////////////////////
function showwarning1(key,text){
 $(key).removeClass("color_999").addClass("color_red").html(text);    
}
function shownomal1(key,text){
 $(key).removeClass("color_red").addClass("color_999").html(text);    
}

function showwarning(text,key){
    $('.detail4-message').html(text);
    popWin("detail4");   
}
function reset4(){
    $('.detail4').css("display","none");
}
function ifempty(key){
    if ($(key).val() === '') {
            return true;
        }    
}
function iflimit(text,min,max){
    if(text.length<min){
        return true;
    }else if(text.length>max){
        return true;
    }else{
        return false;
    }
}
function ifregex(text,str){
    if(str.test(text)){
        return true;//符合正则表达式
    }else{
        return false;//不符合 
    }
}
function shownomal(key,showkey){
    $(showkey).text("");
    $(showkey).css("display","none");
    $(key).css("border","1px solid #D0D0D0");    
}
function showwrong(key,showkey,text){    
    $(showkey).text(text);
    $(showkey).css("display","block");
    $(key).css("border","1px solid red");    
}

///////////

$(document).keyup(function(e){
    if (e.keyCode == 27)
    {
        $('.detail3').css("display","none");
        $('.detail4').css("display","none");
    }
})
/////////////////////////检测是否是有复选框是否有选中
function isshowdel(){
        var isChecked = false;
        $("[name='arraydel']").each(function(){
            if($(this).attr("checked"))
            {
                isChecked=true;
                return; 
            } 
        })
        if(isChecked){ 
            $('#deleteall').css('display','');
            $('#selectall').css('display','none'); 
        }else{
            $('#deleteall').css('display','none');
            $('#selectall').css('display','');    
        }
    }
/////////////////////////检测是否是有复选框是否有选中
//检测不文明用语
function Checksensitive(strVal) {
    var res = false; //默认无敏感字。
    var strArray = new Array("操", "干", "日", "叼", "操干日叼", "操干日叼靠","操干日叼","操你妈", "操你娘","叼你", "叼你老母", "日你", "日你妈", "靠", "狗日的", "去你妈的", "去你大爷", "你妹", "操你妹", "干你妹","日你妹", "去死吧", "滚你妈的", "垃圾", "发票", "你去死吧", "扑街", "卜街", "全家死","去死吧你","你妹的");
    for (var i = 0; i < strArray.length; i++) {
        if (strArray[i] == strVal) {
            //res = strArray[i];
            res = true;
            break;
        }
    }
    return res;
}
