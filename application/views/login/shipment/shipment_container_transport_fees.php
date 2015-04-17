<!--海运费-->
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">出货编号 <?=$shipment_id;?>海运费管理：</div>
        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <form class="form-horizontal" role="form"  method="post" action="/login/shipment/add_container_transport_fees">
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
                                    <input id="cargo_type" class="form-control" type="text" name="cargo_type"/>
                                </div>
                        </div>
                        
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="cargo_type_e" class="control-label">英文品名</label>
                                </div>
                                <div class="col-sm-7">
                                    <input id="cargo_type_e" class="form-control" type="text" name="cargo_type_e"/>
                                </div>
                        </div>
                        
                        <!--包装-->
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="wrap_num" class="control-label">包装件数</label>
                                </div>
                                <div class="col-sm-7">
                                    <input id="wrap_num" class="form-control" type="text" name="wrap_num"/>
                                </div>
                        </div>
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="wrap_type" class="control-label">包装类型</label>
                                </div>
                                <div class="col-sm-7">
                                    <input id="wrap_type" class="form-control" type="text" name="wrap_type"/>
                                </div>
                        </div>
                         <!--重量-->
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="net_weight" class="control-label">净重KGS</label>
                                </div>
                                <div class="col-sm-7">
                                    <input id="net_weight" class="form-control" type="text" name="net_weight"/>
                                </div>
                        </div>
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="gross_weight" class="control-label">毛重KGS</label>
                                </div>
                                <div class="col-sm-7">
                                    <input id="gross_weight" class="form-control" type="text" name="gross_weight"/>
                                </div>
                        </div>
                        
                        <!--体积-->
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="bulk" class="control-label">体积CBM</label>
                                </div>
                                <div class="col-sm-7">
                                    <input id="bulk" class="form-control" type="text" name="bulk"/>
                                </div>
                        </div>
                        
                        <!--要求-->
                        <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="require" class="control-label">订舱要求</label>
                                </div>
                                <div class="col-sm-9">
                                    <input id="require" class="form-control" type="text" name="require"/>
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
                                    <select class="form-control" name="agent" id="agent">
                                        <option value="1">恒庆</option>
                                        <option value="2">乐高</option>
                                        <option value="3">日信</option>
                                    </select>
                                </div> 
                        </div>
                        <!--箱型-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="box_type" class="control-label">箱型</label>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" name="box_type" id="box_type">
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
                                    <select class="form-control" name="client" id="client">
                                        <option value="1">东洋</option>
                                        <option value="2">日化</option>
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
                                                <input id="box_num" class="form-control" type="text" name="box_num"/>
                                            </div>
                                    </div>
                                    <!--运价成本(USD)-->
                                    <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="post_cost" class="control-label">运价成本(USD)</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input id="post_cost" class="form-control" type="text" name="post_cost"/>
                                            </div>
                                    </div>
                                    <!--海运费(USD)-->
                                    <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="sea_cost" class="control-label">海运费(USD)</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input id="sea_cost" class="form-control" type="text" name="sea_cost"/>
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
                                                <input id="all_post_cost" class="form-control" type="text" name="all_post_cost"/>
                                            </div>
                                    </div>
                                    <!--总海运费(USD)-->
                                    <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="all_sea_cost" class="control-label">总海运费(USD)</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input id="all_sea_cost" class="form-control" type="text" name="all_sea_cost"/>
                                            </div>
                                    </div>
                                    <!--利润(USD)-->
                                    <div class="form-group">
                                            <div class="col-sm-6">
                                                <label for="gain" class="control-label">利润(USD)</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input id="gain" class="form-control" type="text" name="gain"/>
                                            </div>
                                    </div>
                            </div>
                        </div>
                        <!--第二列  内  第二行  计算按钮-->
                        <div class="row" style="padding-top: 20px;">
                            <div class="col-sm-7">
                                   <input class="btn btn-primary pull-right" id="count_all_cost" type="button" value="计算价格"/>
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
                </div>
                
                <div class="row" style="padding-top: 50px;">
                    <div class="col-sm-offset-5 col-sm-10">
                        <input class="btn btn-warning" type="submit" value="确定提交"/>
                        <a class="btn btn-default" href="/login/shipment/shipment_container_list_doing">返回列表</a>
                        <p><label style=" text-align: center; color: red; font-size: 15px;">最终确定后，在货单列表中将不再出现管理选项</label></p>
                        
                    </div>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
                    <!--第三列-->
<script type="text/javascript">
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