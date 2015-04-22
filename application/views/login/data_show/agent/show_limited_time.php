<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            请选择时间区间-港杂费：
        </div>
        <div class="panel-body">
        <!--时间区间-->
            <div class="row">
                <form class="form-horizontal" role="form"  method="post" action="/login/data_show/check_table_for_agent">
                    <div class="col-md-12">
                        <div class="col-sm-4">
                            <!--起始日期-->
                            <div class="form-group">
                                    <div class="col-sm-4">
                                        <label for="begin" class="control-label">起始日期</label>
                                    </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="begin" placeholder="点击选择时间" name="begin"/>
                                        </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            --
                        </div>
                        <div class="col-sm-4">
                            <!--结束日期-->
                            <div class="form-group">
                                    <div class="col-sm-4">
                                        <label for="end" class="control-label">结束日期</label>
                                    </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="end" placeholder="点击选择时间" name="end"/>
                                        </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input class="btn btn-primary" type="submit" value="生成表格"/>
                        </div>
                    </div>
                </form>
            </div>
        
        </div>
    </div>


</div>

<script type="text/javascript">

$('#begin').datetimepicker({
        showButtonPanel: false,
        showHour: false,
		showMinute: false,
        showTime: false,
        alwaysSetTime: false
        });
$('#end').datetimepicker({
        showButtonPanel: false,
        showHour: false,
		showMinute: false,
        showTime: false,
        alwaysSetTime: false
        });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#es_2").addClass('active');    
    $("#es_2_1").addClass('active');     
});
</script>
</body>
</html>