
<!--报关前 装箱-->
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">出货编号 <?=$shipment_id;?>报关前管理（装箱记录）记录更新：</div>
        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <form class="form-horizontal" role="form"  method="post" action="/login/shipment/do_update_container_parking">
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
                                        <input disabled="true" type="text" class="form-control" id="packing_date" placeholder="点击选择时间" name="packing_date" 
                                        value="<?=$info[0]->packing_date;?>"/>
                                    </div>
                        </div>
                        <!--外存储编号-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="disk_num" class="control-label">外存储编号</label>
                                </div>
                                <div class="col-sm-6">
                                    <input id="disk_num" class="form-control" type="text" name="disk_num"
                                     value="<?=$info[0]->disk_num;?>" disabled="true"/>
                                </div>
                        </div>
                        
                        <!--备注-->
                        <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="content" class="control-label">备注</label>
                                </div>
                                <div class="col-sm-7">
                                    <textarea id="content" class="form-control" name="content" style="height: 250px;" disabled="true"><?=$info[0]->content;?></textarea>

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
                        
                        <div class="row">
                            <div class="col-md-8">
                            <p><span class="glyphicon glyphicon-inbox" style="color: rgb(41, 159, 211);"> 已上传的文件:</span> </p>
                                <div id="files">
                                    <?php if(isset($files) && !empty($files)){?>
                                        <ul>
                                        <?php foreach($files as $value):?>
                                            <ol><a class="btn btn-default" href="/<?=$info[0]->packing_img_url.$value;?>"><?=$value;?></a></ol>
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