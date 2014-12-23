<?php //var_dump($box_info);?>
<div class="content_cy">
    <div class="title_h1">出货编号 <?=$shipment_id;?>海运费管理：</div>
    <div>
    <br />
    <br />
    </div>
    <form class="work_form" style="text-align:center; " method="post" action="/home/add_sundries_fees" onkeydown="if(event.keyCode==13)return false;">
    <input type="hidden" value="<?=$list_id;?>" name="list_id"/>
    <input type="hidden" value="<?=$shipment_id;?>" name="shipment_id"/>
    
    <p>
    <label class="work_label_wa font_size16 color_5">订舱代理 : </label>
    <select class="work_input_01" name="agent" id="agent" disabled="true">
        <option value="1">恒庆</option>
        <option value="2">乐高</option>
        <option value="3">日信</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">品名 : </label>
    <input id="cargo_type" class="work_input_01" type="text" name="cargo_type" value="<?=$box_info[0]->cargo_type;?>" disabled="true"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">箱型 : </label>
    <select class="work_input_01" name="box_type" id="box_type" disabled="true">
        <option value="1">20GP</option>
        <option value="2">40GP</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">箱体个数 : </label>
    <input id="box_num" class="work_input_01" type="text" name="box_num" value="<?=$box_info[0]->box_num;?>" disabled="true"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付港杂费 : </label>
    <input id="fee_out" class="work_input_03" type="text" name="fee_out" />
    </p>
    
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付THC : </label>
    <input id="thc_out" class="work_input_03" type="text" name="thc_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付ECRS : </label>
    <input id="ecrs_out" class="work_input_03" type="text" name="ecrs_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付TTS : </label>
    <input id="tts_out" class="work_input_03" type="text" name="tts_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付CHC : </label>
    <input id="chc_out" class="work_input_03" type="text" name="chc_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付安保费 : </label>
    <input id="se_out" class="work_input_03" type="text" name="se_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付卸车费 : </label>
    <input id="unload_out" class="work_input_03" type="text" name="unload_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付装箱费 : </label>
    <input id="box_out" class="work_input_03" type="text" name="box_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付舱单费 : </label>
    <input id="ship_out" class="work_input_03" type="text" name="ship_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付文件费 : </label>
    <input id="file_out" class="work_input_03" type="text" name="file_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付报关费 : </label>
    <input id="sea_out" class="work_input_03" type="text" name="sea_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付商检费 : </label>
    <input id="check_out" class="work_input_03" type="text" name="check_out" />
    </p>
    
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付水科所 : </label>
    <input id="water_out" class="work_input_03" type="text" name="water_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付危申费 : </label>
    <input id="d_out" class="work_input_03" type="text" name="d_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付验货费 : </label>
    <input id="search_out" class="work_input_03" type="text" name="search_out" />
    </p>
    
    <br />
     <input class="frombutton" id="count_out" type="button" value="计算应付金额"/>
     <br /><br />
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">单箱应付港杂费 : </label>
    <input id="box_fee_out" class="work_input_01" type="text" name="box_fee_out" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应付港杂费总额 : </label>
    <input id="boxs_fees_out" class="work_input_01" type="text" name="boxs_fees_out" />
    </p>
    
    <!--以下应收-->
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收港杂费 : </label>
    <input id="fee_in" class="work_input_03" type="text" name="fee_in" />
    </p>
    
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收THC : </label>
    <input id="thc_in" class="work_input_03" type="text" name="thc_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收ECRS : </label>
    <input id="ecrs_in" class="work_input_03" type="text" name="ecrs_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收TTS : </label>
    <input id="tts_in" class="work_input_03" type="text" name="tts_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收CHC : </label>
    <input id="chc_in" class="work_input_03" type="text" name="chc_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收安保费 : </label>
    <input id="se_in" class="work_input_03" type="text" name="se_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收卸车费 : </label>
    <input id="unload_in" class="work_input_03" type="text" name="unload_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收装箱费 : </label>
    <input id="box_in" class="work_input_03" type="text" name="box_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收舱单费 : </label>
    <input id="ship_in" class="work_input_03" type="text" name="ship_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收文件费 : </label>
    <input id="file_in" class="work_input_03" type="text" name="file_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收报关费 : </label>
    <input id="sea_in" class="work_input_03" type="text" name="sea_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收商检费 : </label>
    <input id="check_in" class="work_input_03" type="text" name="check_in" />
    </p>
    
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收水科所 : </label>
    <input id="water_in" class="work_input_03" type="text" name="water_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收危申费 : </label>
    <input id="d_in" class="work_input_03" type="text" name="d_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收验货费 : </label>
    <input id="search_in" class="work_input_03" type="text" name="search_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收代理费 : </label>
    <input id="agent_in" class="work_input_03" type="text" name="agent_in" />
    </p>
    
    <br />
     <input class="frombutton" id="count_in" type="button" value="计算应收金额"/>
     <br /><br />
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">单箱应收港杂费 : </label>
    <input id="box_fee_in" class="work_input_01" type="text" name="box_fee_in" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">应收港杂费总额 : </label>
    <input id="boxs_fees_in" class="work_input_01" type="text" name="boxs_fees_in" />
    </p>
    
    <br />
     <input class="frombutton" id="count_gain" type="button" value="计算利润"/>
     <br /><br />
    
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">利润 : </label>
    <input id="gain" class="work_input_01" type="text" name="gain" />
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">收取客户 : </label>
    <select class="work_input_01" name="client" id="client" disabled="true">
        <option value="1">东洋</option>
        <option value="2">日化</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">总进度确定 : </label>
    <select class="work_input_01" name="state">
        <option value="0">未完成</option>
        <option value="1">完成</option>
    </select>
    <br />
    <br />
    <label style=" text-align: center; color: red; font-size: 15px;">最终确定后，在货单列表中将不再出现管理选项</label>
    
    </p>
    
    <br />
    <br />
    <input class="frombutton" type="submit" value="确定"/>
    </form>


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