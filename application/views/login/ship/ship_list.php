<style type="text/css">
#addinfo{
        padding-bottom: 15px;
}

</style>
<div class="container">
        <div id="addinfo">
            <a class="btn btn-primary btn-xs" href="/login/ship/add_ship">新增船只信息</a>
        </div>
        <table class="table">
        <tr>
        <th>编号</th>
        <th>名称</th>
        <th>备注</th>
        <th>创建时间</th>
        <th>操作</th>
        </tr>
        <?php if(isset($info_list) && !empty($info_list)){?>
            <?php foreach($info_list as $value):?>
            <tr>
            <td><?=$value->id;?></td>
            <td><?=$value->ship_name;?></td>
            <td><?=$value->content;?></td>
            <td><?=$value->create_time;?></td>
            <td><a href="/login/ship/update_ship/<?=$value->id;?>">编辑</a>|
            <a href="/login/ship/delete_ship/<?=$value->id;?>">删除</a>
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
    $("#es_1").addClass('active');    
    $("#es_1_5").addClass('active');     
});
</script>
 
 
