<style type="text/css">
#addinfo{
        padding-bottom: 15px;
}

</style>
<div class="container">
        <div id="addinfo">
            <a class="btn btn-primary btn-xs" href="/login/coop/add_client">新增客户</a>
        </div>
        <table class="table">
        <tr>
        <th>编号</th>
        <th>名称</th>
        <th>备注</th>
        <th>创建时间</th>
        <th>操作</th>
        </tr>
        <?php foreach($info_list as $value):?>
        <tr>
        <td><?=$value->id;?></td>
        <td><?=$value->coop_client;?></td>
        <td><?=$value->content;?></td>
        <td><?=$value->create_time;?></td>
        <td><a href="/login/coop/update_coop_client/<?=$value->id;?>">编辑</a>|
        <a href="/login/coop/delete_coop_client/<?=$value->id;?>">删除</a>
        </td>
        </tr>
        <?php endforeach;?>
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
    $("#es_9").addClass('active');    
    $("#es_9_4").addClass('active');     
});
</script>
 
 
