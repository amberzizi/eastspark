

<div class="container"> 
 
 <form action="/login/quoted_price/do_update_price" method="post" role="form" class="form-horizontal">
  <input type="hidden" name="did" value="<?=$info[0]->id;?>"/>
     <div class="form-group">
            <label for="price" class="col-sm-4 control-label">名称:</label>
         <div class="col-sm-4">
            <input type="text" name="price" class="form-control" id="price" placeholder="请输入最新报价" value="<?=$info[0]->price;?>"/>
         </div>
     </div>
     
     <div class="form-group">
            <label for="content" class="col-sm-4 control-label">简单备注:</label>
         <div class="col-sm-6">
            <input type="text" name="content" class="form-control" id="content" placeholder="如：新增最新报价依据" value="<?=$info[0]->content;?>"/>
         </div>
     </div>
    <div class="col-sm-offset-6 col-sm-10">
        <input type="submit" value="提交" />
    </div> 
 </form>
</div>

 <script type="text/javascript">
$(document).ready(function(){
    $("#es_3").addClass('active');    
    $("#es_3_1").addClass('active');     
});
</script>