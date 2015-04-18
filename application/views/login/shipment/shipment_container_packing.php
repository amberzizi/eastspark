
<!--报关前 装箱-->
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">出货编号 <?=$shipment_id;?>报关前管理（装箱记录）：</div>
        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <form class="form-horizontal" role="form"  method="post" action="/login/shipment/add_container_parking">
                    <!--第一列-->
                    <div class="col-md-6">
                        <input type="hidden" value="<?=$list_id;?>" name="list_id"/>
                        <input type="hidden" value="<?=$shipment_id;?>" name="shipment_id"/>
                        <input type="hidden" value="<?=$path;?>" name="packing_img_url"/>
                        
                        <!--装箱日期-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="packing_date" class="control-label">装箱日期</label>
                                </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="packing_date" placeholder="点击选择时间" name="packing_date"/>
                                    </div>
                        </div>
                        <!--外存储编号-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="disk_num" class="control-label">外存储编号</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="disk_num" class="form-control" type="text" name="disk_num"/>
                                </div>
                        </div>
                        
                        <!--备注-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="content" class="control-label">备注</label>
                                </div>
                                <div class="col-sm-7">
                                    <textarea id="content" class="form-control" name="content" style="height: 250px;"></textarea>

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
                              <label for="inputfile">装箱照片整理上传</label>
                              <div id="queue"></div>
                              <input id="inputfile" name="packing_file" type="file" multiple="true"/>
                              <p class="help-block">上传装箱图片，接收后缀为.RAR,.ZIP或.PDF的文件。</p>
                              
                              
		                      
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

$('#packing_date').datetimepicker();

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