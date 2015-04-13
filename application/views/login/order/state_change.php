<div class="container">
    <div class="panel panel-default well">
        <form class="form-horizontal" role="form" action="/home/get_order_state" method="post">
            <div class="form-group">
                <label for="number" class="col-sm-4 control-label">目前状态</label>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-4"><label>1</label></div> 
                             <div class="col-sm-1"><input type="radio" class="form-control" id="number" value="3232" name="state[]" checked="checked"/></div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><label>1</label></div> 
                             <div class="col-sm-1"><input type="radio" class="form-control" id="number" value="3232" name="state[]"/></div> 
                        </div>
                        <div class="row">
                            <div class="col-sm-4"><label>1</label></div> 
                             <div class="col-sm-1"><input type="radio" class="form-control" id="number" value="3232" name="state[]"/></div> 
                        </div>
                            
                           
                        
                    </div>
            </div>  
            <div class="form-group">
                <label for="number" class="col-sm-4 control-label">业务员变更</label>
                    <div class="col-sm-8">
                        <select>
                            <option>李楠</option>
                            <option>李楠1</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="number" class="col-sm-4 control-label">生成提单号</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="number" placeholder="ES_01"/>
                    </div>
            </div>  
             <div class="form-group">
                <label for="number" class="col-sm-4 control-label">整票状态</label>
                    <div class="col-sm-8">
                        <select>
                            <option>未完成</option>
                            <option>完成</option>
                        </select>
                    </div>
            </div>
            <input type="submit" value="2323"/>
        </form>
    </div>

</div>






 </body>
 </html>