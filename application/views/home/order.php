<div class="container">
<div class="content_cy">
    <div>
    <br />
    <br />
    <label class="title_h4_lan"><a href="/home/add_new_list">添加新单</a></label>
    <br />
    <br />
    </div>
    <div><!--内容列表-->
        <table  class="htable" style="text-align:center;"><!-- 列表开始 -->
            <thead style="background:#eee;">
                <td  width="5%">编号</td>
                <td width="7%">提单号</td>
                <td width="5%">出货编号</td>
                <td width="7%">海运费</td>
                <td width="7%">报关前管理</td>
                <td width="7%">报关中管理</td>
                <td width="7%">通关通知</td>
                <td width="7%">集港上船</td>
                <td width="7%">提单转客户</td>
                <td width="7%">港杂费</td>
                <td width="7%">费用生效</td>
                <td width="7%">业务员</td>
                <td width="8%">创建时间</td>
                <td width="8%">修改时间</td>
                <td width="4%">操作</td>
            </thead>
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
                <a href="/home/create_transport_fees/<?=$value->id;?>/<?=$value->shipment_id;?>">创建</a> 
                <?php }else if($value->transport_fees == '0'){?>
                <a href="/home/show_transport_fees/<?=$value->id;?>">管理</a> 
                <?php }else {?>
                <a href="/home/show_transport_fees_for_sure/<?=$value->id;?>">完成</a>
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
                <td ><?=$value->create_time;?></td>
                <td ><?=$value->update_time;?></td>
                <td ><a href="/home/delete_shipment_list_info/<?=$value->id;?>">删除</a></td>
            </tr>
            <?php endforeach;?>
            
           
        </table><!-- 列表结束 -->
        <label class="color_blue right">总共有<?=$all_num;?>条货单信息</label>  
    </div>


 </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#es_1").addClass('active'); 
    $("#es_1_1").addClass('active');     
});
</script>