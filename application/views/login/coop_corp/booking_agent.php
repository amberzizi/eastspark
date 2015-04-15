<div class="container">
        <a href="/login/coop/add_coop">新增广告</a><br />
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
        <td><?=$value->coop_name;?></td>
        <td><?=$value->content;?></td>
        <td><?=$value->create_time;?></td>
        <td><a href="/login/coop/update_coop_com/<?=$value->id;?>">编辑</a>|
        <a href="/login/coop/delete_coop_com/<?=$value->id;?>">删除</a>
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
    $("#es_9_3").addClass('active');     
});
</script>
 
 
