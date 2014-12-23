<?php //var_dump($info);?>
<div class="content_cy">
    <div class="title_h1">出货编号 <?=$info_by_id[0]->shipment_id;?>报关中管理：</div>
    <div>
    <br />
    <br />
    </div>
    <form class="work_form" style="text-align:center; " method="post" action="">
     <p>
    <label class="work_label_wa font_size16 color_5">出口公司单据: </label>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">合同 : </label>
    <select class="work_input_01" name="contract" id="contract" disabled="true">
        <option value="0">未开具</option>
        <option value="1">开具</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">发票 : </label>
    <select class="work_input_01" name="invoice" id="invoice" disabled="true">
        <option value="0">未开具</option>
        <option value="1">开具</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">装箱单 : </label>
    <select class="work_input_01" name="packing_list" id="packing_list" disabled="true">
        <option value="0">未开具</option>
        <option value="1">开具</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">出口许可证 : </label>
    <select class="work_input_01" name="permit" id="permit" disabled="true">
        <option value="0">未开具</option>
        <option value="1">开具</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">出口委托书 : </label>
    <select class="work_input_01" name="proxy" id="proxy" disabled="true">
        <option value="0">未开具</option>
        <option value="1">开具</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">商检通关单 : </label>
    <select class="work_input_01" name="sufferance" id="sufferance" disabled="true">
        <option value="0">未开具</option>
        <option value="1">开具</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">商检验货 : </label>
    <select class="work_input_01" name="com_check" id="com_check" disabled="true">
        <option value="0">不需</option>
        <option value="1">需要</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">关税 : </label>
    <select id="tex" class="work_input_01" name="tex" id="tex" disabled="true">
        <option value="0">请选择</option>
        <option value="1">预付</option>
        <option value="2">垫付</option>
    </select>
    </p>
    
    
    <p class="padding_20">
    <label id="before_money_l" class="work_label_wa font_size16 color_5">预付金额 : </label>
    <input id="before_money" class="work_input_01" type="text" name="before_money" value="<?=$info_by_id[0]->before_money;?>" disabled="true"/>
    </p>
    
    <p class="padding_20">
    <label id="act_money_l" class="work_label_wa font_size16 color_5">实际金额 : </label>
    <input id="act_money" class="work_input_01" type="text" name="act_money" value="<?=$info_by_id[0]->act_money;?>" disabled="true"/>
    </p>
    
    <p class="padding_20">
    <label id="final_money_l" class="work_label_wa font_size16 color_5">应收金额 : </label>
    <input id="final_money" class="work_input_01" type="text" name="final_money" value="<?=$info_by_id[0]->final_money;?>" disabled="true"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">海关验货 : </label>
    <select class="work_input_01" name="sea_check" id="sea_check" disabled="true">
        <option value="0">不需</option>
        <option value="1">机检验货</option>
        <option value="2">人工验货</option>
        <option value="3">机检+人工验货</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">备注 : </label>
    <textarea style="width: 350px; height: 80px; border:1px solid #DDDDDD;" name="content" disabled="true"><?=$info_by_id[0]->content;?></textarea>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">总进度确定 : </label>
    <select class="work_input_01" name="state" id="state" disabled="true">
        <option value="0">未完成</option>
        <option value="1">完成</option>
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

   
    
    
});

</script>