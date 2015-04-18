<!--时间选择器 前后月份选择箭头-->
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">您正在更改状态的单号为： <b><?=$container_state_info[0]->shipment_id;?></b>
            
        </div>
        <form class="form-horizontal" role="form" action="/login/shipment/do_shipment_container_state" method="post">
            <input type="hidden" value="<?=$container_state_info[0]->id;?>" name="sid"/>
            <div style="padding-top: 20px;padding-bottom: 10px;"></div>
            <div class="container">
                <div class="row">
                <!--表单左列  开始-->
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="link" class="col-sm-4 control-label">目前进度</label>
                                    <div class="col-sm-8" id="link">
                                        <div class="radio">
                                               <label>
                                                  <input class="es_checked" type="radio" name="link[]" id="optionsRadios1" 
                                                     value="1"/> 新单订舱
                                               </label>
                                        </div>
                                        <div class="radio">
                                               <label>
                                                  <input class="es_checked" type="radio" name="link[]" id="optionsRadios1" 
                                                     value="2" /> 塘沽装箱
                                               </label>
                                        </div>
                                        <div class="radio">
                                               <label>
                                                  <input class="es_checked" type="radio" name="link[]" id="optionsRadios1" 
                                                     value="3" /> 通关通知
                                               </label>
                                        </div>
                                        <div class="radio">
                                               <label>
                                                  <input class="es_checked" type="radio" name="link[]" id="optionsRadios1" 
                                                     value="4" /> 集港上船
                                               </label>
                                        </div>
                                                                
                                        <div class="radio">
                                               <label>
                                                  <input class="es_checked" type="radio" name="link[]" id="optionsRadios1" 
                                                     value="5" /> 提单生成
                                               </label>
                                        </div>
                                    </div>
                            </div>  
                            <div class="form-group">
                                <label for="manager_id" class="col-sm-4 control-label">操作业务员</label>
                                    <div class="col-sm-4">
                                        <select class="form-control es_manager" name="manager_id" id="manager_id">
                                            <?php foreach($manager as $value):?>
                                                <option value="<?=$value->id;?>"><?=$value->name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="turn_harbour" class="col-sm-4 control-label">中转港口</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="turn_harbour" placeholder="多个可用,隔开" name="turn_harbour"
                                         value="<?=$container_state_info[0]->turn_harbour;?>"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="harbour" class="col-sm-4 control-label">目的港口</label>
                                    <div class="col-sm-4">
                                        <select class="form-control es_harbour" name="harbour" id="harbour">
                                            <?php foreach($harbour as $value):?>
                                                <option value="<?=$value->id;?>"><?=$value->coop_harbour;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="container_num" class="col-sm-4 control-label">集装箱箱号</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="container_num" placeholder="格式：A-DNAJ897869,B-SDSD23242,A-RFRF8378..." name="container_num"
                                        value="<?php if($container_state_info[0]->container_num !== '0'){echo $container_state_info[0]->container_num;}?>"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="lading_bill" class="col-sm-4 control-label">生成提单号</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="lading_bill" placeholder="ES_01" name="lading_bill"
                                         value="<?php if($container_state_info[0]->lading_bill !== '0'){echo $container_state_info[0]->lading_bill;}?>"/>
                                    </div>
                            </div>  
                             <div class="form-group">
                                <label for="bill_num_state" class="col-sm-4 control-label">整票状态</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="bill_num_state" id="bill_num_state">
                                            <option value="0">未完成</option>
                                            <option value="1">完成</option>
                                        </select>
                                    </div>
                            </div>
                            
                    </div> 
                    <!--表单左列 结束-->
                    <!--表单右列 开始-->
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="ship_id" class="col-sm-4 control-label">船名</label>
                                    <div class="col-sm-4">
                                        <select class="form-control es_ship" name="ship_id" id="ship_id">
                                            <?php foreach($ship as $value):?>
                                                <option value="<?=$value->id;?>"><?=$value->ship_name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="voyage" class="col-sm-4 control-label">航次</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="voyage" placeholder="如：航次号" name="voyage"
                                        value="<?=$container_state_info[0]->voyage;?>"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="shipper" class="col-sm-4 control-label">托运人</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="shipper" placeholder="" name="shipper"
                                        value="<?=$container_state_info[0]->shipper;?>"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="client" class="col-sm-4 control-label">受货人</label>
                                    <div class="col-sm-4">
                                        <select class="form-control es_client" name="client" id="client">
                                            <?php foreach($client as $value):?>
                                                <option value="<?=$value->id;?>"><?=$value->coop_client;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="wharf" class="col-sm-4 control-label">装货码头</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="wharf" placeholder="如：二码头" name="wharf"
                                        value="<?php if($container_state_info[0]->wharf !== '0'){echo $container_state_info[0]->wharf;}?>"/>
                                    </div>
                            </div>
                    
                    
                            <div class="form-group">
                                <label for="in_wharf_time" class="col-sm-4 control-label">进港时间</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="in_wharf_time" placeholder="点击选择时间" name="in_wharf_time"
                                        value="<?php if($container_state_info[0]->in_wharf_time !== null){echo $container_state_info[0]->in_wharf_time;}?>"/>
                                    </div>
                            </div>
                  
                   
                            <div class="form-group">
                                <label for="out_wharf_time" class="col-sm-4 control-label">离港时间</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="out_wharf_time" placeholder="点击选择时间" name="out_wharf_time"
                                        value="<?php if($container_state_info[0]->out_wharf_time !== null){echo $container_state_info[0]->out_wharf_time;}?>"/>
                                    </div>
                            </div>
                    </div>  
                    <!--表单右列 结束-->
                </div>
                
                <div class="form-group">
                                  <div class="col-sm-offset-5 col-sm-10">
                                     <button type="submit" class="btn btn-default">更改状态</button>
                                     <a class="btn btn-default" href="/login/shipment/shipment_container_list_doing">返回列表</a>
                                  </div>
                </div>
           </div> 
        </form>
        <div class="panel-footer">
            创建时间: <?=$container_state_info[0]->create_time;?>   最后更新时间: <?=$container_state_info[0]->update_time;?>
        </div>
    </div>

</div>

<script type="text/javascript">
$('#in_wharf_time').datetimepicker();
$('#out_wharf_time').datetimepicker();

$(document).ready(function(){
   

   
   var link = "<?=$container_state_info[0]->link;?>";
   var manager_id = "<?=$container_state_info[0]->manager_id;?>";
   var harbour = "<?=$container_state_info[0]->harbour;?>";
   var client = "<?=$container_state_info[0]->client;?>";
   var ship_id = "<?=$container_state_info[0]->ship_id;?>";
    //运单环节
    $(".es_checked[value='"+link+"']").attr('checked',true);
    $(".es_manager").val(manager_id);
    $(".es_harbour").val(harbour);
    $(".es_client").val(client);
    $(".es_ship").val(ship_id);
   
   
    
});


</script>
 <script type="text/javascript">
$(document).ready(function(){
    $("#es_1").addClass('active');    
    $("#es_1_1").addClass('active');     
});
</script>



 </body>
 </html>