<div class="container">
<style type="text/css">
.es_table_color{
    background-color: #add8e6;
}
</style>
    <div class="container">
        <div class="row">
            <a class="btn btn-info btn-xs" href="/home/add_new_list">添加新单</a><br /><br />
        </div>
    </div>
    <div class="table-responsive table-condensed"><!--内容列表-->
    <table class="table es_table_color table-hover">
        <thead>
              <tr>
                <th>编号</th>
                <th>提单号</th>
                <th>出货编号</th>
                <th>海运费</th>
                <th>报关前管理</th>
                <th>报关中管理</th>
                <th>通关通知</th>
                <th>集港上船</th>
                <th>提单转客户</th>
                <th>港杂费</th>
                <th>费用生效</th>
                <th>业务员</th>
                <th>操作</th>
              </tr>
        </thead>
        <tbody>
            <?php foreach($info as $value):?>
            <tr class="htable tr">
                <td ><?=$value->id;?></td>
                <td >
                <?php if($value->bill_num_state == '0'){?>
                未生效
                <?php }?>
                </td>
                <td ><?=$value->shipment_id;?></td>
                <td >
                <?php if($value->transport_fees == '2'){?>
                <a class="btn btn-info btn-xs" href="/home/create_transport_fees/<?=$value->id;?>/<?=$value->shipment_id;?>">创建</a> 
                <?php }else if($value->transport_fees == '0'){?>
                <a class="btn btn-warning btn-xs" href="/home/show_transport_fees/<?=$value->id;?>">管理</a> 
                <?php }else {?>
                <a class="btn btn-success btn-xs" href="/home/show_transport_fees_for_sure/<?=$value->id;?>">完成</a>
                <?php }?>
                </td>
                <td >
                <?php if($value->before_apply_state == '2'){?>
                创建 
                <?php }else if($value->before_apply_state == '0'){?>
                管理
                <?php }else {?>
                完成
                <?php }?>
                </td>
                <td >
                <?php if($value->middle_apply_state == '2'){?>
                <a href="/home/create_middle_apply/<?=$value->id;?>/<?=$value->shipment_id;?>">创建</a> 
                <?php }else if($value->middle_apply_state == '0'){?>
                <a href="/home/show_middle_apply/<?=$value->id;?>">管理</a>
                <?php }else {?>
                <a href="/home/show_middle_apply_for_sure/<?=$value->id;?>">完成</a>
                <?php }?>
                </td>
                <td >
                    <select>
                        <option>未完成</option>
                        <option>完成</option>
                    </select>
                </td>
                <td >
                    <select>
                        <option>未完成</option>
                        <option>完成</option>
                    </select>
                </td>
                <td >
                <?php if($value->bill_to_client_state == '2'){?>
                <a href="/home/bill_to_client/<?=$value->id;?>/<?=$value->shipment_id;?>">创建</a>
                <?php }else if($value->bill_to_client_state == '0'){?>
                <a href="/home/show_bill_to_client/<?=$value->id;?>">管理</a>
                <?php }else {?>
                <a href="/home/show_bill_to_client_for_sure/<?=$value->id;?>">完成</a>
                <?php }?>
                </td>
                <td >
                <?php if($value->sundries_fees_state == '2'){?>
                <a href="/home/sundries_fees/<?=$value->id;?>/<?=$value->shipment_id;?>">创建</a> 
                <?php }else if($value->sundries_fees_state == '0'){?>
                管理
                <?php }else {?>
                完成
                <?php }?>
                </td>
                <td >
                    <select>
                        <option>费用无效</option>
                        <option>费用生效</option>
                    </select>
                </td>
                <td >
                    <select>
                        <option>李楠</option>
                    </select>
                </td>
                <td ><a href="/home/delete_shipment_list_info/<?=$value->id;?>">删除</a></td>
            </tr>
            <?php endforeach;?>
            
            </tbody>  
        </table><!-- 列表结束 -->
        <label class="color_blue right">总共有<?=$all_num;?>条货单信息</label>  
    </div>



</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#es_1").addClass('active'); 
    $("#es_1_1").addClass('active');     
});
</script>