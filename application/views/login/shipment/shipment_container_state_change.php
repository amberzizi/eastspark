<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">您正在更改状态的单号为： <b><?=$container_state_info[0]->shipment_id;?></b></div>
        <form class="form-horizontal" role="form" action="/login/shipment/do_shipment_container_state" method="post">
            <input type="hidden" value="<?=$container_state_info[0]->id;?>" name="sid"/>
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
                <label for="harbour" class="col-sm-4 control-label">运抵港口</label>
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
            <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-10">
                     <button type="submit" class="btn btn-default">更改状态</button>
                     <a class="btn btn-default" href="/login/shipment/shipment_container_list_doing">返回列表</a>
                  </div>
            </div>
            
        </form>
    </div>

</div>

<script type="text/javascript">
$(document).ready(function(){
   
   var link = "<?=$container_state_info[0]->link;?>";
   var manager_id = "<?=$container_state_info[0]->manager_id;?>";
   var harbour = "<?=$container_state_info[0]->harbour;?>";
    //运单环节
    $(".es_checked[value='"+link+"']").attr('checked',true);
    $(".es_manager").val(manager_id);
    $(".es_harbour").val(harbour);
   
   
    
});


</script>




 </body>
 </html>