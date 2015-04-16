<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">您正在更改状态的单号为： <b>ES1COUT</b></div>
        <form class="form-horizontal" role="form" action="/home/get_order_state" method="post">
            <div class="form-group">
                <label for="number" class="col-sm-4 control-label">目前进度</label>
                    <div class="col-sm-8">
                        <div class="radio">
                               <label>
                                  <input type="radio" name="state[]" id="optionsRadios1" 
                                     value="1" checked/> 新单订舱
                               </label>
                        </div>
                        <div class="radio">
                               <label>
                                  <input type="radio" name="state[]" id="optionsRadios1" 
                                     value="2" /> 塘沽装箱
                               </label>
                        </div>
                        <div class="radio">
                               <label>
                                  <input type="radio" name="state[]" id="optionsRadios1" 
                                     value="3" /> 通关通知
                               </label>
                        </div>
                        <div class="radio">
                               <label>
                                  <input type="radio" name="state[]" id="optionsRadios1" 
                                     value="4" /> 集港上船
                               </label>
                        </div>
                                                
                        <div class="radio">
                               <label>
                                  <input type="radio" name="state[]" id="optionsRadios1" 
                                     value="5" /> 提单生成
                               </label>
                        </div>
                    </div>
            </div>  
            <div class="form-group">
                <label for="number" class="col-sm-4 control-label">业务员变更</label>
                    <div class="col-sm-4">
                        <select class="form-control">
                            <option>李楠</option>
                            <option>李楠1</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                <label for="number" class="col-sm-4 control-label">运抵港口</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="number" placeholder="ES_01"/>
                    </div>
            </div>
            <div class="form-group">
                <label for="number" class="col-sm-4 control-label">集装箱箱号</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="number" placeholder="格式：A-DNAJ897869,B-SDSD23242,A-RFRF8378..."/>
                    </div>
            </div>
            <div class="form-group">
                <label for="number" class="col-sm-4 control-label">生成提单号</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="number" placeholder="ES_01"/>
                    </div>
            </div>  
             <div class="form-group">
                <label for="number" class="col-sm-4 control-label">整票状态</label>
                    <div class="col-sm-4">
                        <select class="form-control">
                            <option>未完成</option>
                            <option>完成</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                  <div class="col-sm-offset-5 col-sm-10">
                     <button type="submit" class="btn btn-default">更改状态</button>
                  </div>
            </div>
            
        </form>
    </div>

</div>






 </body>
 </html>