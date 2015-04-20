<style type="text/css">
#addinfo{
        padding-bottom: 15px;
}

</style>
<div class="container">
        <div id="addinfo">
            <a class="btn btn-primary btn-xs" href="/login/quoted_price/add_price">新增报价信息</a>
        </div>
        <table class="table">
        <tr>
        <th>编号</th>
        <th>报价</th>
        <th>备注</th>
        <th>创建时间</th>
        <th>操作</th>
        </tr>
        <?php if(isset($info_list) && !empty($info_list)){?>
            <?php foreach($info_list as $value):?>
            <tr>
            <td><?=$value->id;?></td>
            <td><?=$value->price;?></td>
            <td><?=$value->content;?></td>
            <td><?=$value->create_time;?></td>
            <td><a href="/login/quoted_price/update_price/<?=$value->id;?>">编辑</a>|
            <a href="/login/quoted_price/delete_price/<?=$value->id;?>">删除</a>
            </td>
            </tr>
            <?php endforeach;?>
        <?php }?>
        </table> 
         
         
         <div class="pull-right">
            <br /> 
            总共<?=$allnum;?>条数据
            <br /> 
            <?=$page;?>
            <br /> 
        </div>
 
</div> 
 
  <script type="text/javascript">
$(document).ready(function(){
    $("#es_3").addClass('active');    
    $("#es_3_2").addClass('active');     
});
</script>
 
 
