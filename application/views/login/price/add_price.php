
<div class="container"> 
 
 <form action="/login/quoted_price/do_add_price" method="post" role="form" class="form-horizontal">
     <div class="form-group">
            <label for="price" class="col-sm-4 control-label">最新报价:</label>
         <div class="col-sm-4">
            <input type="text" name="price" class="form-control" id="price" placeholder="请输入最新报价"/>
         </div>
     </div>
     
     <div class="form-group">
            <label for="content" class="col-sm-4 control-label">简单备注:</label>
         <div class="col-sm-6">
            <input type="text" name="content" class="form-control" id="content" placeholder="如:报价描述"/>
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