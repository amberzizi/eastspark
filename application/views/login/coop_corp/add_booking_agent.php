
<div class="container"> 
 
 <form action="/login/coop/do_add_coop" method="post" role="form" class="form-horizontal">
     <div class="form-group">
            <label for="coop_name" class="col-sm-4 control-label">名称:</label>
         <div class="col-sm-4">
            <input type="text" name="coop_name" class="form-control" id="coop_name" placeholder="请输入名称"/>
         </div>
     </div>
     
     <div class="form-group">
            <label for="content" class="col-sm-4 control-label">简单备注:</label>
         <div class="col-sm-6">
            <input type="text" name="content" class="form-control" id="content" placeholder="如：新增的合作代理"/>
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
    $("#es_9_3").addClass('active');     
});
</script>