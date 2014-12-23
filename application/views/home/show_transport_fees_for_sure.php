<?php //var_dump($info);?>
<div class="content_cy">
    <div class="title_h1">出货编号 <?=$info_by_id[0]->shipment_id;?>海运费管理：</div>
    <div>
    <br />
    <br />
    </div>
    <form class="work_form" style="text-align:center; " method="post" action="/home/update_transport_fees">
    <input type="hidden" value="<?=$info_by_id[0]->id;?>" name="fees_id"/>
    <input type="hidden" value="<?=$info_by_id[0]->list_id;?>" name="list_id"/>
    <input type="hidden" value="<?=$info_by_id[0]->shipment_id;?>" name="shipment_id"/>
    <p>
    <label class="work_label_wa font_size16 color_5">订舱代理 : </label>
    <select id="agent" class="work_input_01" name="agent" disabled="true">
        <option value="1">恒庆</option>
        <option value="2">乐高</option>
        <option value="3">日信</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">品名 : </label>
    <input id="cargo_type" class="work_input_01" type="text" name="cargo_type" value="<?=$info_by_id[0]->cargo_type;?>" disabled="true"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">箱型 : </label>
    <select id="box_type" class="work_input_01" name="box_type" disabled="true">
        <option value="1">20GP</option>
        <option value="2">40GP</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">箱体个数 : </label>
    <input id="box_num" class="work_input_01" type="text" name="box_num" value="<?=$info_by_id[0]->box_num;?>" disabled="true"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">运价成本(USD):</label>
    <input id="post_cost" class="work_input_01" type="text" name="post_cost" value="<?=$info_by_id[0]->post_cost;?>" disabled="true"/>
    </p>

    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">海运费(USD):</label>
    <input id="sea_cost" class="work_input_01" type="text" name="sea_cost" value="<?=$info_by_id[0]->sea_cost;?>" disabled="true"/>
    </p>
    
    <br />
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">总成本(USD):</label>
    <input id="all_post_cost" class="work_input_01" type="text" name="all_post_cost" value="<?=$info_by_id[0]->all_post_cost;?>" disabled="true"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">总海运费(USD):</label>
    <input id="all_sea_cost" class="work_input_01" type="text" name="all_sea_cost" value="<?=$info_by_id[0]->all_sea_cost;?>" disabled="true"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">利润(USD):</label>
    <input id="gain" class="work_input_01" type="text" name="gain" value="<?=$info_by_id[0]->gain;?>" disabled="true"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">收取客户 : </label>
    <select id="client" class="work_input_01" name="client" disabled="true">
        <option value="1">东洋</option>
        <option value="2">日化</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">最终确定 : </label>
    <select id="state" class="work_input_01" name="state" disabled="true">
        <option value="0">未确定</option>
        <option value="1">确定</option>
    </select>
    <br />
    <br />
    </p>
    <label class="title_h4_lan"><a href="/">返回货单管理页</a></label>
    <br />
    <br />
    </form>


</div>
<script type="text/javascript">
$(document).ready(function(){
    var agent = <?=$info_by_id[0]->agent;?>;
    var box_type =<?=$info_by_id[0]->box_type;?>;
    var client = <?=$info_by_id[0]->client;?>;
    var state = <?=$info_by_id[0]->state;?>;
    
    $("#agent").val(agent);
    $("#box_type").val(box_type);
    $("#client").val(client);
    $("#state").val(state);
    
    
    
    
    
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