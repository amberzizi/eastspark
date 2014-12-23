
<div class="content_cy">
    <div class="title_h1">出货编号 <?=$info_by_id[0]->shipment_id;?>提单转客户管理：</div>
    <div>
    <br />
    <br />
    </div>
    <form class="work_form" style="text-align:center; " method="post" action="" enctype="multipart/form-data">

    <p>
    <label class="work_label_wa font_size16 color_5">提单类型 : </label>
    <select class="work_input_01" name="order_type" id="order_type" disabled="true">
        <option value="0">未选择</option>
        <option value="1">正本提单邮寄客户</option>
        <option value="2">电放提单传真客户</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">电子版正面 : </label>
    <img height="500" width="500" src="/<?=$info_by_id[0]->img_front;?>"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">电子版背面 : </label>
    <img height="500" width="500" src="/<?=$info_by_id[0]->img_back;?>"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">备注 : </label>
    <textarea style="width: 350px; height: 80px; border:1px solid #DDDDDD;" name="content" disabled="true"><?=$info_by_id[0]->content;?></textarea>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">最终确定 : </label>
    <select class="work_input_01" name="state" id="state" disabled="true" >
        <option value="0">未确定</option>
        <option value="1">确定</option>
    </select>
    <br />
    <br />
    
    </p>
    
    <br />
    <br />
    <label class="title_h4_lan"><a href="/">返回货单管理页</a></label>
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