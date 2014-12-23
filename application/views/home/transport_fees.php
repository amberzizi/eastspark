<?php //var_dump($info);?>
<div class="content_cy">
    <div class="title_h1">出货编号 <?=$shipment_id;?>海运费管理：</div>
    <div>
    <br />
    <br />
    </div>
    <form class="work_form" style="text-align:center; " method="post" action="/home/add_transport_fees">
    <input type="hidden" value="<?=$list_id;?>" name="list_id"/>
    <input type="hidden" value="<?=$shipment_id;?>" name="shipment_id"/>
    <p>
    <label class="work_label_wa font_size16 color_5">订舱代理 : </label>
    <select class="work_input_01" name="agent">
        <option value="1">恒庆</option>
        <option value="2">乐高</option>
        <option value="3">日信</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">品名 : </label>
    <input id="cargo_type" class="work_input_01" type="text" name="cargo_type"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">箱型 : </label>
    <select class="work_input_01" name="box_type">
        <option value="1">20GP</option>
        <option value="2">40GP</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">箱体个数 : </label>
    <input id="box_num" class="work_input_01" type="text" name="box_num"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">运价成本(USD):</label>
    <input id="post_cost" class="work_input_01" type="text" name="post_cost"/>
    </p>

    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">海运费(USD):</label>
    <input id="sea_cost" class="work_input_01" type="text" name="sea_cost"/>
    </p>
    
    <br />
     <input class="frombutton" id="count_all_cost" type="button" value="计算价格"/>
     <br /><br />
    <label style=" text-align: center; color: red; font-size: 15px;">请在输入箱数、成本、实收海运费后点此按钮来计算向客户收取的总费用 </label>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">总成本(USD):</label>
    <input id="all_post_cost" class="work_input_01" type="text" name="all_post_cost"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">总海运费(USD):</label>
    <input id="all_sea_cost" class="work_input_01" type="text" name="all_sea_cost"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">利润(USD):</label>
    <input id="gain" class="work_input_01" type="text" name="gain"/>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">收取客户 : </label>
    <select class="work_input_01" name="client">
        <option value="1">东洋</option>
        <option value="2">日化</option>
    </select>
    </p>
    
    <p class="padding_20">
    <label class="work_label_wa font_size16 color_5">最终确定 : </label>
    <select class="work_input_01" name="state">
        <option value="0">未确定</option>
        <option value="1">确定</option>
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