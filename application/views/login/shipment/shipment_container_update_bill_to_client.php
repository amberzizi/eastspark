<!--提单转客户-->
<div class="container">
<div class="panel panel-info">
    <div class="panel-heading">
        出货编号 <?=$shipment_id;?>提单转客户管理：
    </div>
    <div class="panel-body">
        <div class="container">
            <form class="form-horizontal" role="form"  method="post" action="/login/shipment/do_update_container_bill_to_client">
            <input type="hidden" value="<?=$path;?>" name="img_url"/>
            <input type="hidden" value="<?=$list_id;?>" name="list_id"/>
            <input type="hidden" value="<?=$shipment_id;?>" name="shipment_id"/>
            <div class="row">
                <!--第一列-->
                <div class="col-md-6">
                <!--转发日期-->
                        <div class="form-group">
                            <div class="col-sm-4">
                                    <label for="send_date" class="control-label">转发日期</label>
                                </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="send_date" placeholder="点击选择时间" name="send_date"
                                         value="<?=$info[0]->send_date;?>"/>
                                    </div>
                        </div>
                    <!--提单类型-->
                    <div class="form-group">
                        <div class="col-sm-4">
                            <label for="order_type" class="control-label">提单类型</label>
                        </div>
                        <div class="col-sm-7">
                            <select class="form-control" name="order_type" id="order_type">
                                <option value="1">正本提单邮寄客户</option>
                                <option value="2">电放提单传真客户</option>
                            </select>
                        </div> 
                    </div>                  
                    <!--备注-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="content" class="control-label">备注</label>
                                </div>
                                <div class="col-sm-7">
                                    <textarea id="content" class="form-control" name="content" style="height: 250px;"><?=$info[0]->content;?></textarea>

                                </div>
                        </div>
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="state" class="control-label">最终确定</label>
                                </div>
                                <div class="col-sm-7">
                                    <select class="form-control" name="state" id="state">
                                        <option value="0">未确定</option>
                                        <option value="1">确定</option>
                                    </select>
                                </div> 
                        </div>  
                </div>
                <!--第二列-->
                <div class="col-md-6">
                    <div class="form-group">
                              <label for="inputfile">转客户提单电子版</label>
                              <div id="queue"></div>
                              <input id="inputfile" name="packing_file" type="file" multiple="true"/>
                              <p class="help-block">上传提单电子版，文件名不可为中文，接收后缀为.RAR,.ZIP或.PDF的文件。</p>
                        </div>
                    <div class="row">
                            <div class="col-md-8">
                            <p><span class="glyphicon glyphicon-inbox" style="color: rgb(41, 159, 211);"> 已上传的文件:</span> </p>
                                <div id="files">
                                    <?php if(isset($files) && !empty($files)){?>
                                        <ul>
                                        <?php foreach($files as $value):?>
                                            <ol><a class="btn btn-default" href="/<?=$info[0]->img_url.$value;?>"><?=$value;?></a></ol>
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
    创建时间: <?=$info[0]->create_time;?>   最后更新时间: <?=$info[0]->update_time;?>
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
       var order_type = <?=$info[0]->order_type;?>; 
       var state =<?=$info[0]->state;?>; 
       $("#order_type").val(order_type);
       $("#state").val(state);
        
    });

</script>
<script type="text/javascript">

$('#send_date').datetimepicker();

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