<div class="container">
<a href="/user/login_manager/create_login_admin" class="btn btn-info">新增员工</a><br /><br />
<div class="table-responsive table-condensed"><!--内容列表-->
    <table class="table es_table_color table-hover">
        <tr>
            <th>用户名</th>
            <th>姓名</th>
            <th>电话</th>
            <th>账户创建时间</th>
            <th>最后登录时间</th>
            <th>最后登录ip</th>
            <!--<th>推荐</th>-->
            <th>操作</th>
        </tr>
        <?php foreach($info_list as $value):?>
        <tr>
        <td><?=$value->username;?></td>
        <td><?=$value->name;?></td>
        <td><?=$value->phone;?></td>
        <td><?=$value->create_time;?></td>
        <td><?=$value->login_time;?></td>
        <td><?=$value->login_ip;?></td>
        <!--<td>
        <?php if($value->id !=='1'){?>
            <?php if($value->ifbest === '0'){ ?>
            <a href="/user/login_manager/best_user/<?=$value->id;?>">推荐</a>
            <?php }else{ ?>
            <a href="/user/login_manager/clear_best_user/<?=$value->id;?>">取消推荐</a> 
            <?php } ?>
        <?php } ?>
        </td>-->
        <td>
        <?php if($value->id !=='1'){?>
            <a href="/user/login_manager/change_admin_info/<?=$value->id;?>">编辑</a> | 
            <?php if($value->ifdel === '0'){ ?>
                <a href="/user/login_manager/del_admin/<?=$value->id;?>">冻结</a> | 
            <?php }else{?>
                <a href="/user/login_manager/clear_del_admin/<?=$value->id;?>">取消冻结</a> | 
            <?php }?>
            <a href="/user/login_manager/change_admin_purviews/<?=$value->id;?>">编辑权限</a> 
        <?php } ?>
        </td>
        
        </tr>
        <?php endforeach;?>

    </table>
</div>
<?php if($list_if_none == 'yes'){echo '没有符合条件的用户！';}?><br /><br /><br /><br />
<div class="row">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        共有员工<?=$allnum;?>位<br />
        每页显示记录5条<br />
        <?=$page;?>  共<?=$allpage;?>页，跳转到第<input type="text" value="1" id="pageinput"/>页 <input type="button" value="跳转" id="page_jump"/><br />
    </div>
</div>


</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#es_9").addClass('active');    
    $("#es_9_1").addClass('active');     
});
</script>
 </body>
 </html>