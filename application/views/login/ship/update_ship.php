

<div class="container"> 
 
 <form action="/login/ship/do_update_ship" method="post" role="form" class="form-horizontal">
  <input type="hidden" name="did" value="<?=$info[0]->id;?>"/>
     <div class="form-group">
            <label for="ship_name" class="col-sm-4 control-label">名称:</label>
         <div class="col-sm-4">
            <input type="text" name="ship_name" class="form-control" id="ship_name" placeholder="请输入名称" value="<?=$info[0]->ship_name;?>"/>
         </div>
     </div>
     
     <div class="form-group">
            <label for="content" class="col-sm-4 control-label">简单备注:</label>
         <div class="col-sm-6">
            <input type="text" name="content" class="form-control" id="content" placeholder="如：新增船舶" value="<?=$info[0]->content;?>"/>
         </div>
     </div>
    <div class="col-sm-offset-6 col-sm-10">
        <input type="submit" value="提交" />
    </div> 
 </form>
</div>

 <script type="text/javascript">
$(document).ready(function(){
    $("#es_1").addClass('active');    
    $("#es_1_5").addClass('active');     
});
</script>