
<div class="container"> 
 
 <form action="/login/coop/do_update_coop_com" method="post" >
 <input type="hidden" name="did" value="<?=$info[0]->id;?>"/>
 名称
 <input type="text" name="coop_name" value="<?=$info[0]->coop_name;?>"/><br />
 备注
 <input type="text" name="content" value="<?=$info[0]->content;?>"/><br />
 <input type="submit" value="提交"/>
 
 </form>
</div>
 <script type="text/javascript">
$(document).ready(function(){
    $("#es_9").addClass('active');    
    $("#es_9_3").addClass('active');     
});
</script>