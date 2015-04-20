<!--报关中管理-->
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            出货编号 <?=$shipment_id;?>报关中管理:
        </div>
        <div class="panel-body">
            <div class="container">
                <form class="form-horizontal" role="form"  method="post" action="/login/shipment/do_update_container_middle_apply">
                <div class="row">
                        
                        <input type="hidden" value="<?=$list_id;?>" name="list_id"/>
                        <input type="hidden" value="<?=$shipment_id;?>" name="shipment_id"/>
                        <!--第一列-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-th-list" style="color: rgb(41, 159, 211);"> 单据开具检查：</span>
                                </div>  
                                
                                <!--合同-->
                                <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="contract" class="control-label">合同</label>
                                </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="contract" id="contract">
                                            <option value="0">未开具</option>
                                            <option value="1">开具</option>
                                        </select>
                                    </div> 
                                </div>  
                                <!--发票-->
                                <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="invoice" class="control-label">发票</label>
                                </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="invoice" id="invoice">
                                            <option value="0">未开具</option>
                                            <option value="1">开具</option>
                                        </select>
                                    </div> 
                                </div>  
                                <!--装箱单-->
                                <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="packing_list" class="control-label">装箱单</label>
                                </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="packing_list" id="packing_list">
                                            <option value="0">未开具</option>
                                            <option value="1">开具</option>
                                        </select>
                                    </div> 
                                </div> 
                                <!--出口许可证-->
                                <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="permit" class="control-label">出口许可证</label>
                                </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="permit" id="permit">
                                            <option value="0">未开具</option>
                                            <option value="1">开具</option>
                                        </select>
                                    </div> 
                                </div>
                                <!--出口委托书-->
                                <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="proxy" class="control-label">出口委托书</label>
                                </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="proxy" id="proxy">
                                            <option value="0">未开具</option>
                                            <option value="1">开具</option>
                                        </select>
                                    </div> 
                                </div>
                                <!--商检通关单-->
                                <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="sufferance" class="control-label">商检通关单</label>
                                </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="sufferance" id="sufferance">
                                            <option value="0">未开具</option>
                                            <option value="1">开具</option>
                                        </select>
                                    </div> 
                                </div>
                                <!--商检验货-->
                                <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="com_check" class="control-label">商检验货</label>
                                </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="com_check" id="com_check">
                                            <option value="0">未开具</option>
                                            <option value="1">开具</option>
                                        </select>
                                    </div> 
                                </div>

                            </div>
                                 
                            <!--第二列-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-edit" style="color: rgb(41, 159, 211);"> 关税应收金额：</span>
                                </div>  
                                <!--关税-->
                                <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="tex" class="control-label">关税</label>
                                </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="tex" id="tex">
                                            <option value="0">请选择</option>
                                            <option value="1">预付</option>
                                            <option value="2">垫付</option>
                                        </select>
                                    </div> 
                                </div>
                                
                                <!--预付金额-->
                                <div class="form-group">
                                        <div class="col-sm-4">
                                            <label for="before_money" class="control-label" id="before_money_l">预付金额</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="before_money" class="form-control" type="text" name="before_money" value="<?=$info_by_id[0]->before_money;?>"/>
                                        </div>
                                </div>
                                <!--实际金额-->
                                <div class="form-group">
                                        <div class="col-sm-4">
                                            <label for="act_money" class="control-label" id="act_money_l">实际金额</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="act_money" class="form-control" type="text" name="act_money" value="<?=$info_by_id[0]->act_money;?>"/>
                                        </div>
                                </div>
                                <!--计算按钮-->
                                 <input class="btn btn-primary center-block" id="count" type="button" value="计算差额"/>
                                <!--应收金额-->
                                <div class="form-group" style="padding-top: 20px;">
                                        <div class="col-sm-4">
                                            <label for="final_money" class="control-label" id="final_money_l">应收金额</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <input id="final_money" class="form-control" type="text" name="final_money" value="<?=$info_by_id[0]->final_money;?>"/>
                                        </div>
                                </div>
                                <!--海关验货-->
                                <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="sea_check" class="control-label">海关验货</label>
                                </div>
                                    <div class="col-sm-7">
                                        <select class="form-control" name="sea_check" id="sea_check">
                                            <option value="0">不需</option>
                                            <option value="1">机检验货</option>
                                            <option value="2">人工验货</option>
                                            <option value="3">机检+人工验货</option>
                                        </select>
                                    </div> 
                                </div>
                                <!--备注-->
                                <div class="form-group">
                                        <div class="col-sm-4">
                                            <label for="content" class="control-label">备注</label>
                                        </div>
                                        <div class="col-sm-7">
                                            <textarea id="content" class="form-control" name="content" style="height: 50px;"><?=$info_by_id[0]->content;?></textarea>
        
                                        </div>
                                </div>
                                <!--进度确认行-->
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label for="state" class="control-label">总进度确定</label>
                                    </div>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="state" id="state">
                                                <option value="0">未完成</option>
                                                <option value="1">完成</option>
                                            </select>
                                        </div> 
                                </div>
                                
                            </div>    
                </div>
                <!--上传单据电子版-->
                <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                  <label for="inputfile" style="padding-bottom: 15px;">单据电子版整理上传</label>
                                  <div id="queue"></div>
                                  <input id="inputfile" name="packing_file" type="file" multiple="true"/>
                                  <p class="help-block">上传装箱图片，接收后缀为.RAR,.ZIP或.PDF的文件。</p>
                            </div>
                            <div class="row">
                      
                                <div class="col-md-8">
                                <p><span class="glyphicon glyphicon-inbox" style="color: rgb(41, 159, 211);"> 已上传的文件:</span> </p>
                                    <div id="files">
                                        <?php if(isset($files) && !empty($files)){?>
                                            <ul>
                                            <?php foreach($files as $value):?>
                                                <ol><a class="btn btn-default" href="/<?=$info_by_id[0]->middle_img_url.$value;?>"><?=$value;?></a></ol>
                                            <?php endforeach;?>
                                            </ul>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-primary btn-xs">刷新</a>
                                </div>
                            </div>
                    </div>
                        
                </div>

                <!--提交按钮-->
                <div class="row" style="padding-top: 50px;">
                    <div class="col-sm-offset-5 col-sm-10">
                        <input class="btn btn-warning" type="submit" value="确定提交"/>
                        <a class="btn btn-default" href="/login/shipment/shipment_container_list_doing">返回列表</a>
                        <p><label style=" text-align: center; color: red; font-size: 15px;">最终确定后，在货单列表中将不再出现管理选项</label></p>
                        
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="panel-footer">
        创建时间：<?=$info_by_id[0]->create_time;?>  最后更新时间：<?=$info_by_id[0]->update_time;?>
        </div>

    </div>
</div>



<script type="text/javascript">
$(document).ready(function(){
    var contract = <?=$info_by_id[0]->contract;?>;
    var invoice = <?=$info_by_id[0]->invoice;?>;
    var packing_list = <?=$info_by_id[0]->packing_list;?>;
    var permit = <?=$info_by_id[0]->permit;?>;
    var proxy = <?=$info_by_id[0]->proxy;?>;
    var sufferance = <?=$info_by_id[0]->sufferance;?>;
    var com_check = <?=$info_by_id[0]->com_check;?>;
    var tex = <?=$info_by_id[0]->tex;?>;
    var sea_check = <?=$info_by_id[0]->sea_check;?>;
    var state = <?=$info_by_id[0]->state;?>;
    //console.info($("#contract"));
    $("#contract").val(contract);
    $("#invoice").val(invoice);
    $("#packing_list").val(packing_list);
    $("#permit").val(permit);
    $("#proxy").val(proxy);
    $("#sufferance").val(sufferance);
    $("#com_check").val(com_check);
    $("#tex").val(tex);
    $("#sea_check").val(sea_check);
    $("#state").val(state);
    
    if(tex == '0'){
        $("#before_money_l").hide();
        $("#before_money").hide();
        $("#count").hide();
        $("#act_money_l").hide();
        $("#act_money").hide();
        $("#final_money_l").hide();
        $("#final_money").hide(); 
        $("#final_money").val('0.00');
        $("#before_money").val('0.00');
        $("#act_money").val('0.00');
    }else if(tex == '1'){
        $("#before_money_l").show();
        $("#before_money").show();
        $("#count").show();
        $("#act_money_l").show();
        $("#act_money").show();
        $("#final_money_l").show();
        $("#final_money").show();    
    }else if(tex == '2'){
       $("#final_money_l").show();
       $("#final_money").show();
       $("#before_money_l").hide();
       $("#before_money").hide();
       $("#count").hide();
       $("#act_money_l").hide();
       $("#act_money").hide();     
    }
    
    
    $("#tex").bind("change",function(){
        if($("#tex").val() == '1') {
            $("#before_money_l").show();
            $("#before_money").show();
            $("#count").show();
            $("#act_money_l").show();
            $("#act_money").show();
            $("#final_money_l").show();
            $("#final_money").show();
            $("#final_money").val('0.00');
            $("#before_money").val('0.00');
            $("#act_money").val('0.00');
        }else if($("#tex").val() == '2'){
            $("#final_money_l").show();
            $("#final_money").show();
            $("#before_money_l").hide();
            $("#before_money").hide();
            $("#count").hide();
            $("#act_money_l").hide();
            $("#act_money").hide();
            $("#final_money").val('0.00');
            $("#before_money").val('0.00');
            $("#act_money").val('0.00');
        }else{
            $("#before_money_l").hide();
            $("#before_money").hide();
            $("#count").hide();
            $("#act_money_l").hide();
            $("#act_money").hide();
            $("#final_money_l").hide();
            $("#final_money").hide();
            $("#final_money").val('0.00');
            $("#before_money").val('0.00');
            $("#act_money").val('0.00');
        }
       
        
    });
    
    
    $("#count").bind("click",function(){
        var k = parseFloat($("#act_money").val())-parseFloat($("#before_money").val());
        $("#final_money").val(k.toFixed(2));
    });
   
    
    
});

</script>
 <script type="text/javascript">
$(document).ready(function(){
    $("#es_1").addClass('active');    
    $("#es_1_1").addClass('active');     
});
</script>
<script type="text/javascript">
		$(function() {
			$('#inputfile').uploadify({
				'formData'     : {
					'timestamp' : '<?=$timestamp;?>',
					'token'     : '<?=$token;?>',
                    'path':'<?=$path;?>',
                    'file_name':'<?=$file_name;?>'
				},
				'swf'      : '/resource/uploadify/uploadify.swf',
				'uploader' : '/resource/uploadify/uploadify.php'
			});
		});
</script>