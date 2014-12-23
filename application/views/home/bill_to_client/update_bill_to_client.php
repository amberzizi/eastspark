
<div class="content_cy">
    <div class="title_h1">出货编号 <?=$info_by_id[0]->shipment_id;?>提单转客户管理：</div>
    <div>
    <br />
    <br />
    </div>
    <form class="work_form" style="text-align:center; " method="post" action="/home/update_bill_to_client" enctype="multipart/form-data">
    <?php $new_url = date("Y/m/d/") . md5(time() * rand()) . '/'; ?>
    <input type="hidden" value="<?=$info_by_id[0]->id;?>" name="id"/>
    <input type="hidden" value="<?=$old_url;?>" name="old_url"/>
    <input type="hidden" value="<?=$new_url;?>" name="new_url"/>
    <input type="hidden" value="<?=$info_by_id[0]->list_id;?>" name="list_id"/>
    <input type="hidden" value="<?=$info_by_id[0]->shipment_id;?>" name="shipment_id"/>
    <?php //var_dump($old_url);?>
    <p>
    <label class="work_label_wa font_size16 color_5">提单类型 : </label>
    <select class="work_input_01" name="order_type" id="order_type">
        <option value="0">未选择</option>
        <option value="1">正本提单邮寄客户</option>
        <option value="2">电放提单传真客户</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">电子版正面上传 : </label>
    <input class="work_input_01" type="file" name="img_front"/>
    <img height="50" width="50" src="/<?=$info_by_id[0]->img_front;?>"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">电子版背面上传 : </label>
    <input class="work_input_01" type="file" name="img_back"/>
    <img height="50" width="50" src="/<?=$info_by_id[0]->img_back;?>"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">备注 : </label>
    <textarea style="width: 350px; height: 80px; border:1px solid #DDDDDD;" name="content"><?=$info_by_id[0]->content;?></textarea>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">最终确定 : </label>
    <select class="work_input_01" name="state" id="state" >
        <option value="0">未确定</option>
        <option value="1">确定</option>
    </select>
    <br />
    <br />
    <label style=" text-align: center; color: red; font-size: 15px;">最终确定后，在货单列表中将不再出现管理选项</label>
    
    </p>
    
    <br />
    <br />
    <input class="frombutton" type="submit" value="确定修改"/>
    </form>


</div>
<script type="text/javascript">
    $(document).ready(function(){
       var order_type = <?=$info_by_id[0]->order_type;?>; 
       var state =<?=$info_by_id[0]->state;?>; 
       $("#order_type").val(order_type);
       $("#state").val(state);
        
    });

</script>