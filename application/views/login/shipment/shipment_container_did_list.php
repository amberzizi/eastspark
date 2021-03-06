<div class="container">
<style type="text/css">
.es_table_color{
    background-color: #add8e6;
}
.es_table_ali th,
.es_table_ali td{
   text-align:center;
}

</style>

        <div class="panel panel-default well">
        <!--内容列表 标题-->
            <div class="table-responsive table-condensed"><!--内容列表-->
                <table class="table es_table_ali table-hover">
                    <thead>
                        <tr>
                            <th>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="出货编号作为内部运单管理编号,格式:ES_编号_集装箱C / 散货船B_OUT">
                                出货编号</a>
                            </th>
                            <th>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="在提单号生成后,操作人员该票在《提单状态变更》中录入,此列将显示本票货品提单号">
                                提单号</a>
                            </th>
                            <th>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="运单操作进度">
                                进度</a>
                            </th>
                            <th>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="操作负责人">
                                负责人</a>
                            </th>
                            <th>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="可进行本票货品各个关键环节状态更改">
                                提单状态变更</a>
                            </th>
                            <th>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="货品基本信息及订舱代理、海运费利润计算等">
                                海运费及基本信息</a>
                            </th>
                            <th>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="装箱信息等">
                                报关前管理</a>
                            </th>
                            <th>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="关税、单据电子版、是否验货等信息">
                                报关中管理</a>
                            </th>
                            <th>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="提单电子版上传备份">
                                提单转客户</a>
                            </th>
                            <th>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="港杂费用明细">
                                港杂费</a>
                            </th>
                        </tr>
                    </thead>
            <!--内容列表 具体内容-->
                    <tbody>
                    <?php if(isset($info_list) && !empty($info_list)){?>
                        <?php foreach($info_list as $value):?>
                        <tr>
                            <!--运单内部编号-->
                            <td><?=$value->shipment_id;?></td>
                            <!--提单号-->
                            <td><?php if($value->lading_bill == '0'){echo '未生成';}else{echo $value->lading_bill;}?></td>
                            <!--运单进度-->
                            <td><?php if($value->link == '1'){echo '新单订舱';}else if($value->link == '2'){echo '塘沽装箱';}else if($value->link == '3'){echo '通关通知';}
                                    else if($value->link == '4'){echo '集港上船';}else if($value->link == '5'){echo '提单生成';}?></td>
                            <!--运单操作人-->
                            <td><?=$value->manager_name;?></td>
                            <td><a class="btn btn-info btn-xs" href="/login/shipment/shipment_container_state/<?=$value->id;?>">状态变更</a></td>
                            <td><a class="btn btn-info btn-xs" href="/home/create_transport_fees/">创建</a></td>
                            <td><a class="btn btn-info btn-xs" href="/home/create_transport_fees/">创建</a></td>
                            <td><a class="btn btn-info btn-xs" href="/home/create_transport_fees/">创建</a></td>
                            <td><a class="btn btn-info btn-xs" href="/home/create_transport_fees/">创建</a></td>
                            <td><a class="btn btn-info btn-xs" href="/home/create_transport_fees/">创建</a></td>
                        </tr>
                        <?php endforeach;?>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
                <p class="pull-right">共有<?=$allnum;?>票已经完成的集装箱运单</p>
                <p class="pull-right"><?=$page;?></p>
            </div>
        </div>
    
    




</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#es_1").addClass('active'); 
    $("#es_1_3").addClass('active');     
});
</script>
<script>
   $(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

 </body>
 </html>