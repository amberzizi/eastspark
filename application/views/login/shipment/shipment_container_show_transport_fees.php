<!--海运费-->
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">出货编号 <?=$shipment_id;?>海运费信息更新：   </div>
        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <form class="form-horizontal" role="form"  method="post" action="/login/shipment/do_update_container_transport_fees">
                    <!--第一列-->
                    <div class="col-md-4">
                        <input type="hidden" value="<?=$list_id;?>" name="list_id"/>
                        <input type="hidden" value="<?=$shipment_id;?>" name="shipment_id"/>
                        
                        <!--品名-->
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="cargo_type" class="control-label">中文品名</label>
                                </div>
                                <div class="col-sm-7">
                                    <input disabled="true" id="cargo_type" class="form-control" type="text" name="cargo_type" value="<?=$info[0]->cargo_type;?>"/>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="cargo_type_e" class="control-label">英文品名</label>
                                </div>
                                <div class="col-sm-7">
                                    <input disabled="true" id="cargo_type_e" class="form-control" type="text" name="cargo_type_e" value="<?=$info[0]->cargo_type_e;?>"/>
                                </div>
                        </div>
                        
                        <!--包装-->
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="wrap_num" class="control-label">包装件数</label>
                                </div>
                                <div class="col-sm-7">
                                    <input disabled="true" id="wrap_num" class="form-control" type="text" name="wrap_num" value="<?=$info[0]->wrap_num;?>"/>
                                </div>
                        </div>
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="wrap_type" class="control-label">包装类型</label>
                                </div>
                                <div class="col-sm-7">
                                    <input id="wrap_type" class="form-control" type="text" name="wrap_type" value="<?=$info[0]->wrap_type;?>" disabled="true"/>
                                </div>
                        </div>
                         <!--重量-->
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="net_weight" class="control-label">净重KGS</label>
                                </div>
                                <div class="col-sm-7">
                                    <input disabled="true" id="net_weight" class="form-control" type="text" name="net_weight" value="<?=$info[0]->net_weight;?>"/>
                                </div>
                        </div>
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="gross_weight" class="control-label">毛重KGS</label>
                                </div>
                                <div class="col-sm-7">
                                    <input disabled="true" id="gross_weight" class="form-control" type="text" name="gross_weight" value="<?=$info[0]->gross_weight;?>"/>
                                </div>
                        </div>
                        
                        <!--体积-->
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="bulk" class="control-label">体积CBM</label>
                                </div>
                                <div class="col-sm-7">
                                    <input disabled="true" id="bulk" class="form-control" type="text" name="bulk" value="<?=$info[0]->bulk;?>"/>
                                </div>
                        </div>
                        
                        <!--要求-->
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="require" class="control-label">订舱要求</label>
                                </div>
                                <div class="col-sm-9">
                                    <input disabled="true" id="require" class="form-control" type="text" name="require" value="<?=$info[0]->require;?>"/>
                                </div>
                        </div>
                        
                    </div>
                    <!--第二列-->
                    <div class="col-md-7">
                        <!--订舱代理-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="agent" class="control-label">订舱代理</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="agent" id="agent" disabled="true">
                                    <?php foreach($coop_com as $value):?>
                                        <option value="<?=$value->id;?>"><?=$value->coop_name;?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div> 
                        </div>
                        <!--箱型-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="box_type" class="control-label">箱型</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="box_type" id="box_type" disabled="true">
                                        <option value="1">20GP</option>
                                        <option value="2">40GP</option>
                                    </select>
                                </div> 
                        </div>
                        
                        <!--收取客户-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="client" class="control-label">收取客户</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="client" id="client" disabled="true">
                                        <?php foreach($client as $value):?>
                                            <option value="<?=$value->id;?>"><?=$value->coop_client;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div> 
                        </div>
                        <!--第二列  内  第一行  左右列-->
                        <div class="row" style="padding-top: 20px;border:1px solid #0066ff;">
                            
                            
                            <div class="col-sm-6">
                                     <!--箱体个数-->
                                    <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="box_num" class="control-label">箱体个数</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input disabled="true" id="box_num" class="form-control" type="text" name="box_num" value="<?=$info[0]->box_num;?>"/>
                                            </div>
                                    </div>
                                    <!--运价成本(USD)-->
                                    <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="post_cost" class="control-label">运价成本(USD)</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input disabled="true" id="post_cost" class="form-control" type="text" name="post_cost" value="<?=$info[0]->post_cost;?>"/>
                                            </div>
                                    </div>
                                    <!--海运费(USD)-->
                                    <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="sea_cost" class="control-label">海运费(USD)</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input disabled="true" id="sea_cost" class="form-control" type="text" name="sea_cost" value="<?=$info[0]->sea_cost;?>"/>
                                            </div>
                                    </div>
                                    
                            </div>
                            <div class="col-sm-6">
                                    <!--总成本(USD)-->
                                    <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="all_post_cost" class="control-label">总成本(USD)</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input disabled="true" id="all_post_cost" class="form-control" type="text" name="all_post_cost" value="<?=$info[0]->all_post_cost;?>"/>
                                            </div>
                                    </div>
                                    <!--总海运费(USD)-->
                                    <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="all_sea_cost" class="control-label">总海运费(USD)</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input disabled="true" id="all_sea_cost" class="form-control" type="text" name="all_sea_cost" value="<?=$info[0]->all_sea_cost;?>"/>
                                            </div>
                                    </div>
                                    <!--利润(USD)-->
                                    <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="gain" class="control-label">利润(USD)</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input disabled="true" id="gain" class="form-control" type="text" name="gain" value="<?=$info[0]->gain;?>"/>
                                            </div>
                                    </div>
                            </div>
                        </div>
                        <!--第二列  内  第二行  计算按钮-->
                        <div class="row" style="padding-top: 20px;">
                            <div class="col-sm-7">
                                   <input class="btn btn-primary pull-right" id="count_all_cost" type="button" value="计算价格" disabled="true"/>
                            </div>
                            <div class="col-sm-5">
                                <label style="color: red; font-size: 15px;" class="center-block">请在输入箱数、成本、实收海运费后点此按钮来计算向客户收取的总费用 </label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--确认行-->
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                            <!--最终确认-->
                     
                    </div>
                </div>
                
                <div class="row" style="padding-top: 50px;">
                    <div class="col-sm-offset-5 col-sm-10">
                        
                        <a class="btn btn-default" href="/login/shipment/shipment_container_list_doing">返回列表</a>
                        
                    </div>
                </div>
            </div>

            </form>
        </div>
        <div class="panel-footer">
            创建时间: <?=$info[0]->create_time;?>   最后更新时间: <?=$info[0]->update_time;?>
        </div>
    </div>
</div>
                    <!--第三列-->
<script type="text/javascript">
$(document).ready(function(){
    var agent = "<?=$info[0]->agent;?>";
    var box_type = "<?=$info[0]->box_type;?>";
    var client = "<?=$info[0]->client;?>";
    
    $('#agent').val(agent);
    $('#box_type').val(box_type);
    $('#client').val(client);
});


$(document).ready(function(){
    $("#count_all_cost").bind("click",function(){
    var box_num = parseInt($("#box_num").val()); 
    var post_cost = parseFloat($("#post_cost").val());
    var sea_cost = parseFloat($("#sea_cost").val());
    var all_post_cost = box_num * post_cost;
    var all_sea_cost = box_num * sea_cost;
    var gain =  all_sea_cost - all_post_cost;
    
    $("#all_post_cost").val(all_post_cost);
    $("#all_sea_cost").val(all_sea_cost);
    $("#gain").val(gain);
    });
   
    
    
});

</script>
 <script type="text/javascript">
$(document).ready(function(){
    $("#es_1").addClass('active');    
    $("#es_1_1").addClass('active');     
});
</script>