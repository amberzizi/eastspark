

<div class="container">
    <a href="/login/data_show/show_container_table_for_agent_transport">返回日期选择页</a>
    <div class="panel panel-info">
        <div class="panel-heading">
            时间区间内订舱代开票用表-国际运费:（选中一行后，拖动到目标行，可以交换先后位置。）
        </div>
        <div class="panel-body">
        
            <table class="table table-condensed noselect" onselectstart= "return false;" style="-moz-user-select: none;"><!--火狐禁止选中的样式-->
                <tr>
                    <th>序号</th>
                    <th>船名</th>
                    <th>航次</th>
                    <th>提单号</th>
                    <th>开船日</th>
                    <th>目的港</th>
                    <th>箱型</th>
                    <th>箱量</th>
                    <th>国际运费</th>
                </tr>
           <?php if(isset($info) && !empty($info)){?>     
            <?php   $i=1;
                    foreach($info as $value):?>
                <tr class="change">
                    <td id="test"><?=$i;$i++;?></td>
                    <td><?=$value->ship_name;?></td>
                    <td><?=$value->voyage;?></td>
                    <td><?=$value->lading_bill;?></td>
                    <td><?=$value->out_wharf_time;?></td>
                    <td><?=$value->coop_harbour;?></td>
                    <td><?php if($value->box_type == '1'){echo '20GP';}else if($value->box_type == '2'){echo '40GP';};?></td>
                    <td><?=$value->box_num;?></td>
                    <td>USD <?=$value->all_post_cost;?></td>
                </tr>
              
            <?php endforeach;?>
           <?php }?>
                <tr>
                    <td colspan="8">合计（USD）</td>
                    
                    <td><?=sprintf('USD %.2f',round($all_fees,2));?></td>
                </tr>
            </table>
            
        </div>
        
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    //存储鼠标按下时的元素内容
    var col;
    //存储鼠标按下时的元素序列号
    var temp_num;
    //存储鼠标按下时的元素
    var first_click;
    //当鼠标按下时
    $(document).on('mousedown','.change',function(){
        //var check = 0;
        //if(check)
        col = $(this).html();
        //暂时存储 点击行的序号  用于交换
        temp_num = $(this).children('#test').text();
        
        //隐藏该行
        //$(this).hide(500);
        //将当前元素指向存储
        first_click = this;
 
    });
    
    //当鼠标松开时
    $(document).on('mouseup','.change',function(){
       
        //先备份序号
        var temp_num2 = $(this).children('#test').text();
 
        //再变为新的序号
        $(this).children('#test').text(temp_num);
        //存储本标签内容
        var col2 = $(this).html();
        //本标签清空
        $(this).html('');
        $(this).html(col);
        $(this).children('#test').text(temp_num2);
        //暂时存储 点击行的序号  用于交换

        $(first_click).html('');
        $(first_click).html(col2);
        //$(first_click).children('#test').text(temp_num2);
        //$(first_click).show(500);
        
        
 
    });

});
</script>
</body>
</html>