

<div class="container"> 
 
 <form action="/login/coop/do_update_coop_client" method="post" role="form" class="form-horizontal">
  <input type="hidden" name="did" value="<?=$info[0]->id;?>"/>
     <div class="form-group">
            <label for="coop_client" class="col-sm-4 control-label">名称:</label>
         <div class="col-sm-4">
            <input type="text" name="coop_client" class="form-control" id="coop_client" placeholder="请输入名称" value="<?=$info[0]->coop_client;?>"/>
         </div>
     </div>
     
     <div class="form-group">
            <label for="content" class="col-sm-4 control-label">简单备注:</label>
         <div class="col-sm-6">
            <input type="text" name="content" class="form-control" id="content" placeholder="如：新增的合作代理" value="<?=$info[0]->content;?>"/>
         </div>
     </div>
    <div class="col-sm-offset-6 col-sm-10">
        <input type="submit" value="提交" />
    </div> 
 </form>
</div>

 <script type="text/javascript">
$(document).ready(function(){
    $("#es_9").addClass('active');    
    $("#es_9_4").addClass('active');     
});
</script>