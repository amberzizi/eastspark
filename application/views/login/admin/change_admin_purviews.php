<div class="container">
<form action="/user/login_manager/save_admin_purviews" method="post">
            <p><label for="RadioGroup1_0">前台用户管理</label><input id="RadioGroup1_0" type="checkbox" name="val[indexuser]" value="1" /></p>
            <p><label for="RadioGroup1_1">后台管理员管理</label><input id="RadioGroup1_1" type="checkbox" name="val[loginuser]" value="1" /></p>
            <p><label for="RadioGroup1_2">房源管理</label><input id="RadioGroup1_2" type="checkbox" name="val[house]" value="1" /></p>
            <p><label for="RadioGroup1_3">数据统计管理</label><input id="RadioGroup1_3" type="checkbox" name="val[datacount]" value="1" /></p>
            <p><label for="RadioGroup1_4">小区管理</label><input id="RadioGroup1_4" type="checkbox" name="val[community]" value="1" /></p>
<input type="hidden" name="id" value="<?=$id;?>"/>
<input type="submit" value="增加" id="submit"/>
</form>

</div>
<script type="text/javascript">

$(document).ready(function(){
    var pur = <?=$purviews;?>;
    if(pur != 'no_purviews'){
        //解析json
            var json = eval(pur);
            for(var i in json){
                if(json[i]=="1"){
                    $("input[name='val["+i+"]']:checkbox").attr("checked", true);   
                }
            }
    }
    
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