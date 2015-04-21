<!--港杂费-->
<div class="container">
    <div class="panel panel-info">
    <div class="panel-heading">
        出货编号 <?=$shipment_id;?>海运费管理：
    </div>
    <div class="panel-body">
                <form class="form-horizontal" role="form"  method="post" action="/login/shipment/do_upload_container_sundries_fees">
                <input type="hidden" value="<?=$list_id;?>" name="list_id"/>
                <input type="hidden" value="<?=$shipment_id;?>" name="shipment_id"/>
                <!--第一行-->
                <div class="row">
                    <div class="col-md-6">
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
                        <!--品名-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="cargo_type" class="control-label">品名</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="cargo_type" class="form-control" type="text" name="cargo_type" value="<?=$box_info[0]->cargo_type;?>" disabled="true"/>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                         <!--箱体个数-->
                         <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="box_num" class="control-label">箱体个数</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="box_num" class="form-control" type="text" name="box_num" disabled="true" value="<?=$box_info[0]->box_num;?>"/>
                                </div>
                         </div>
                    </div>
                </div>
                <!--第二行-->
                <div class="row">
                    <div class="col-sm-12">
                        <span class="glyphicon glyphicon-list-alt" style="color: rgb(41, 159, 211);padding-bottom: 20px;"> 应付费用：</span>
                    </div>
                </div>
                <!--第三行-->
                <div class="row">
                    <!--第一列-->
                    <div class="col-sm-4">
                        <!--应付港杂费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="fee_out" class="control-label">应付港杂费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="fee_out" class="form-control" type="text" name="fee_out" value="<?=$info[0]->fee_out;?>"/>
                                </div>
                        </div>
                        <!--应付THC-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="thc_out" class="control-label">应付THC</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="thc_out" class="form-control" type="text" name="thc_out" value="<?=$info[0]->thc_out;?>"/>
                                </div>
                        </div>
                        <!--应付ECRS-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="ecrs_out" class="control-label">应付ECRSC</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="ecrs_out" class="form-control" type="text" name="ecrs_out" value="<?=$info[0]->ecrs_out;?>"/>
                                </div>
                        </div>
                        <!--应付TTS-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="tts_out" class="control-label">应付TTS</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="tts_out" class="form-control" type="text" name="tts_out" value="<?=$info[0]->tts_out;?>"/>
                                </div>
                        </div>
                        <!--应付CHC-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="chc_out" class="control-label">应付CHC</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="chc_out" class="form-control" type="text" name="chc_out" value="<?=$info[0]->chc_out;?>"/>
                                </div>
                        </div>
                    </div>
                    <!--第二列-->
                    <div class="col-sm-4">
                        <!--应付安保费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="se_out" class="control-label">应付安保费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="se_out" class="form-control" type="text" name="se_out" value="<?=$info[0]->se_out;?>"/>
                                </div>
                        </div>
                        <!--应付卸车费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="unload_out" class="control-label">应付卸车费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="unload_out" class="form-control" type="text" name="unload_out" value="<?=$info[0]->unload_out;?>"/>
                                </div>
                        </div>
                        <!--应付装箱费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="box_out" class="control-label">应付装箱费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="box_out" class="form-control" type="text" name="box_out" value="<?=$info[0]->box_out;?>"/>
                                </div>
                        </div>
                        <!--应付舱单费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="ship_out" class="control-label">应付舱单费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="ship_out" class="form-control" type="text" name="ship_out" value="<?=$info[0]->ship_out;?>"/>
                                </div>
                        </div>
                        <!--应付文件费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="file_out" class="control-label">应付文件费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="file_out" class="form-control" type="text" name="file_out" value="<?=$info[0]->file_out;?>"/>
                                </div>
                        </div>
                    </div>
                    <!--第三列-->
                    <div class="col-sm-4">
                        <!--应付报关费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="sea_out" class="control-label">应付报关费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="sea_out" class="form-control" type="text" name="sea_out" value="<?=$info[0]->sea_out;?>"/>
                                </div>
                        </div>
                        <!--应付商检费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="check_out" class="control-label">应付商检费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="check_out" class="form-control" type="text" name="check_out" value="<?=$info[0]->check_out;?>"/>
                                </div>
                        </div>
                        <!--应付水科所-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="water_out" class="control-label">应付水科所</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="water_out" class="form-control" type="text" name="water_out" value="<?=$info[0]->water_out;?>"/>
                                </div>
                        </div>
                        <!--应付危申费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="d_out" class="control-label">应付危申费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="d_out" class="form-control" type="text" name="d_out" value="<?=$info[0]->d_out;?>"/>
                                </div>
                        </div>
                        <!--应付验货费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="search_out" class="control-label">应付验货费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="search_out" class="form-control" type="text" name="search_out" value="<?=$info[0]->search_out;?>"/>
                                </div>
                        </div>
                    </div>
                
                </div>
                <!--第四行-->
                <div class="row">
                    <div class="form-group">
                        <input class="btn btn-primary center-block" id="count_out" type="button" value="计算应付金额"/>
                    </div>
                </div>
                <!--第五行-->
                <div class="row">
                    <div class="col-sm-6">
                        <!--单箱应付港杂费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="box_fee_out" class="control-label">单箱应付港杂费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="box_fee_out" class="form-control" type="text" name="box_fee_out" value="<?=$info[0]->box_fee_out;?>"/>
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!--应付港杂费总额-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="boxs_fees_out" class="control-label">应付港杂费总额</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="boxs_fees_out" class="form-control" type="text" name="boxs_fees_out" value="<?=$info[0]->boxs_fees_out;?>"/>
                                </div>
                        </div>
                    </div>
                </div>
                <!--第六行-->
                <div class="row" style="padding-bottom: 20px;">
                    <div class="col-sm-12" >
                        <span class="glyphicon glyphicon-list-alt" style="color: rgb(41, 159, 211);padding-bottom: 20px;" > 应收费用：</span>
                    </div>
                </div>
                <!--第七行-->
                <!--以下应收-->
                <div class="row">
                    <!--第一列-->
                    <div class="col-sm-4">
                        <!--应收港杂费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="fee_in" class="control-label">应收港杂费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="fee_in" class="form-control" type="text" name="fee_in" value="<?=$info[0]->fee_in;?>"/>
                                </div>
                        </div>
                        <!--应收THC-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="thc_in" class="control-label">应收THC</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="thc_in" class="form-control" type="text" name="thc_in" value="<?=$info[0]->thc_in;?>"/>
                                </div>
                        </div>
                        <!--应收ECRS-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="ecrs_in" class="control-label">应收ECRSC</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="ecrs_in" class="form-control" type="text" name="ecrs_in" value="<?=$info[0]->ecrs_in;?>"/>
                                </div>
                        </div>
                        <!--应收TTS-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="tts_in" class="control-label">应收TTS</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="tts_in" class="form-control" type="text" name="tts_in" value="<?=$info[0]->tts_in;?>"/>
                                </div>
                        </div>
                        <!--应收CHC-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="chc_in" class="control-label">应收CHC</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="chc_in" class="form-control" type="text" name="chc_in" value="<?=$info[0]->chc_in;?>"/>
                                </div>
                        </div>
                        <!--应收代理费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="agent_in" class="control-label">应收代理费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="agent_in" class="form-control" type="text" name="agent_in" value="<?=$info[0]->agent_in;?>"/>
                                </div>
                        </div>
                    </div>
                     <!--第二列-->
                    <div class="col-sm-4">
                        <!--应收安保费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="se_in" class="control-label">应收安保费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="se_in" class="form-control" type="text" name="se_in" value="<?=$info[0]->se_in;?>"/>
                                </div>
                        </div>
                        <!--应收卸车费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="unload_in" class="control-label">应收卸车费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="unload_in" class="form-control" type="text" name="unload_in" value="<?=$info[0]->unload_in;?>"/>
                                </div>
                        </div>
                        <!--应收装箱费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="box_in" class="control-label">应收装箱费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="box_in" class="form-control" type="text" name="box_in" value="<?=$info[0]->box_in;?>"/>
                                </div>
                        </div>
                        <!--应收舱单费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="ship_in" class="control-label">应收舱单费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="ship_in" class="form-control" type="text" name="ship_in" value="<?=$info[0]->ship_in;?>"/>
                                </div>
                        </div>
                        <!--应收文件费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="file_in" class="control-label">应收文件费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="file_in" class="form-control" type="text" name="file_in" value="<?=$info[0]->file_in;?>"/>
                                </div>
                        </div>
                    </div>
                     <!--第三列-->
                    <div class="col-sm-4">
                        <!--应收报关费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="sea_in" class="control-label">应收报关费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="sea_in" class="form-control" type="text" name="sea_in" value="<?=$info[0]->sea_in;?>"/>
                                </div>
                        </div>
                        <!--应收商检费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="check_in" class="control-label">应收商检费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="check_in" class="form-control" type="text" name="check_in" value="<?=$info[0]->check_in;?>"/>
                                </div>
                        </div>
                        <!--应收水科所-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="water_in" class="control-label">应收水科所</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="water_in" class="form-control" type="text" name="water_in" value="<?=$info[0]->water_in;?>"/>
                                </div>
                        </div>
                        <!--应收危申费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="d_in" class="control-label">应收危申费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="d_in" class="form-control" type="text" name="d_in" value="<?=$info[0]->d_in;?>"/>
                                </div>
                        </div>
                        <!--应收验货费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="search_in" class="control-label">应收验货费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="search_in" class="form-control" type="text" name="search_in" value="<?=$info[0]->search_in;?>"/>
                                </div>
                        </div>
                    </div>
                </div>
                <!--第八行-->
                <div class="row">
                    <div class="form-group">
                        <input class="btn btn-primary center-block" id="count_in" type="button" value="计算应收金额"/>
                    </div>
                </div>
                <!--第九行-->
                <div class="row">
                    <div class="col-sm-6">
                        <!--单箱应付港杂费-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="box_fee_in" class="control-label">单箱应收港杂费</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="box_fee_in" class="form-control" type="text" name="box_fee_in" value="<?=$info[0]->box_fee_in;?>"/>
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!--应付港杂费总额-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="boxs_fees_in" class="control-label">应收港杂费总额</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="boxs_fees_in" class="form-control" type="text" name="boxs_fees_in" value="<?=$info[0]->boxs_fees_in;?>"/>
                                </div>
                        </div>
                    </div>
                </div>
                <!--第十行-->
                <div class="row">
                    <div class="form-group">
                        <input class="btn btn-primary center-block" id="count_gain" type="button" value="计算利润"/>
                    </div>
                </div>
                <!--第十一行-->
                <div class="row">
                    <div class="col-sm-6">
                        <!--利润-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="gain" class="control-label">利润</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="gain" class="form-control" type="text" name="gain" value="<?=$info[0]->gain;?>"/>
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!--收取客户-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="client" class="control-label">收取客户 </label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="client" id="client" disabled="true">
                                    <?php foreach($client as $value):?>
                                        <option value="<?=$value->id;?>"><?=$value->coop_client;?></option>
                                    <?php endforeach;?>
                                    </select>
                                </div> 
                        </div>
                    </div>
                </div>
                <!--第十二行-->
                <div class="row">
                    <div class="col-md-6">
                            <!--最终确认-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="state" class="control-label">最终确定</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="state" id="state">
                                        <option value="0">未确定</option>
                                        <option value="1">确定</option>
                                    </select>
                                </div> 
                        </div>  
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="row" style="padding-top: 50px;">
                    <div class="col-sm-offset-5 col-sm-10">
                        <input class="btn btn-warning" type="submit" value="确定提交"/>
                        <a class="btn btn-default" href="/login/shipment/shipment_container_list_doing">返回列表</a>
                        <p><label style=" text-align: center; color: red; font-size: 15px;">最终确定后，在货单列表中将不再出现管理选项</label></p>
                        
                    </div>
                </div>
                </form>
        </div>
        <div class="panel-footer">
            
        创建时间：<?=$info[0]->create_time;?>  最后更新时间：<?=$info[0]->update_time;?>
        
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var agent = <?=$box_info[0]->agent;?>;
    var box_type = <?=$box_info[0]->box_type;?>;
    var client = <?=$box_info[0]->client;?>;
    var num =parseInt($("#box_num").val());
    $("#agent").val(agent);
    $("#box_type").val(box_type);
    $("#client").val(client);
 
    $("#count_out").bind("click",function(){
        var fee_out =parseFloat($("#fee_out").val());
        var tts_out =parseFloat($("#tts_out").val());
        var thc_out =parseFloat($("#thc_out").val());
        var ecrs_out =parseFloat($("#ecrs_out").val());
        var chc_out =parseFloat($("#chc_out").val());
        var se_out =parseFloat($("#se_out").val());
        var box_out =parseFloat($("#box_out").val());
        var ship_out =parseFloat($("#ship_out").val());
        var file_out =parseFloat($("#file_out").val());
        var sea_out =parseFloat($("#sea_out").val());
        var check_out =parseFloat($("#check_out").val());
        var unload_out =parseFloat($("#unload_out").val());
        var water_out =parseFloat($("#water_out").val());
        var d_out =parseFloat($("#d_out").val());
        var search_out =parseFloat($("#search_out").val());
        
        var all_sum = fee_out +tts_out+thc_out+ecrs_out+chc_out+se_out+box_out+unload_out;
        var all_out = num*all_sum;
        
        //有些为一票只收取一次
        var one_sum = ship_out+file_out+sea_out+check_out+water_out+d_out+search_out;
        
        var total_sum =all_sum+one_sum;
        var total_out =all_out+one_sum;
        $("#box_fee_out").val(total_sum.toFixed(2));
        $("#boxs_fees_out").val(total_out.toFixed(2));
        
    });
    $("#count_in").bind("click",function(){
        var fee_in =parseFloat($("#fee_in").val());
        var tts_in =parseFloat($("#tts_in").val());
        var thc_in =parseFloat($("#thc_in").val());
        var ecrs_in =parseFloat($("#ecrs_in").val());
        var chc_in =parseFloat($("#chc_in").val());
        var se_in =parseFloat($("#se_in").val());
        var box_in =parseFloat($("#box_in").val());
        var ship_in =parseFloat($("#ship_in").val());
        var file_in =parseFloat($("#file_in").val());
        var sea_in =parseFloat($("#sea_in").val());
        var check_in =parseFloat($("#check_in").val());
        var unload_in =parseFloat($("#unload_in").val());
        var water_in =parseFloat($("#water_in").val());
        var d_in =parseFloat($("#d_in").val());
        var search_in =parseFloat($("#search_in").val());
        var agent_in =parseFloat($("#agent_in").val());
        
        var all_sum = fee_in +tts_in+thc_in+ecrs_in+chc_in+se_in+box_in+unload_in;
        var all_in = num*all_sum;
        
         //有些为一票只收取一次
        var one_sum_in = ship_in+file_in+sea_in+check_in+water_in+d_in+search_in+agent_in;
        
        var total_sum_in =all_sum+one_sum_in;
        var total_in =all_in+one_sum_in;
        
        $("#box_fee_in").val(total_sum_in.toFixed(2));
        $("#boxs_fees_in").val(total_in.toFixed(2));
        
    });
    $("#count_gain").bind("click",function(){
        var in_cost =  parseFloat($("#boxs_fees_in").val());
        var out_cost =  parseFloat($("#boxs_fees_out").val());
        var gain = in_cost - out_cost;
        $("#gain").val(gain.toFixed(2));
    });
    
    
});

</script>

 <script type="text/javascript">
$(document).ready(function(){
    $("#es_1").addClass('active');    
    $("#es_1_1").addClass('active');     
});
</script>