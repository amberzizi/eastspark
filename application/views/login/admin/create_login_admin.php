



<div class="container">
    <div class="panel panel-default well">
        <div class="panel-heading">
            <p><span class="glyphicon glyphicon-user" style="color: rgb(61, 83, 144);"></span> 新增员工</p>
        </div>
        
        <div class="panel-body bg-info">
        <form class="form-horizontal" role="form" action="/user/login_manager/save_new_login_admin" method="post">
            <div class="row">
            <!--详细信息-->
                <div class="col-md-9">
                    <div class="row">
                        <!--line 1 col 1-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="number" class="col-sm-4 control-label">员工代码</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="number" placeholder="ES_01"/>
                                </div>
                            </div>    
                            <div class="form-group">
                                <label for="sex" class="col-sm-4 control-label">性别</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="part">
                                         <option value="0">男</option>
                                         <option value="1">女</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-4 control-label text-danger">手机</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="phone" placeholder="" name="phone"/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="company_phone" class="col-sm-4 control-label text-danger">电话</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="company_phone" placeholder="" name="company_phone"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fax" class="col-sm-4 control-label">传真</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="fax" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="college" class="col-sm-4 control-label">毕业院校</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="college" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="graduation" class="col-sm-4 control-label">毕业时间</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="graduation">
                                         <option value="2000">2000</option>
                                         <option value="2001">2001</option>
                                         <option value="2002">2002</option>
                                         <option value="2003">2003</option>
                                         <option value="2004">2004</option>
                                         <option value="2005">2005</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <!--line 1 col 2-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="col-sm-4 control-label text-danger">员工姓名</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="name" placeholder="名称" name="name"/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="part" class="col-sm-4 control-label">所在部门</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="part">
                                         <option value="1">管理部</option>
                                         <option value="2">人事部</option>
                                         <option value="3">业务部</option>
                                         <option value="4">财务部</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">E_mail</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="email" placeholder="xxx@126.com"/>
                                </div> 
                            </div>
                            <div class="form-group">
                                <label for="part_phone" class="col-sm-4 control-label">分机</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="part_phone" placeholder=""/>
                                </div> 
                            </div>
                            <div class="form-group">
                                <label for="major" class="col-sm-4 control-label">专业</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="major" placeholder=""/>
                                </div> 
                            </div> 
                            <div class="form-group">
                                <label for="record" class="col-sm-4 control-label">学历</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="record" placeholder=""/>
                                </div> 
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label><span class="glyphicon glyphicon-home" style="color: rgb(61, 83, 144);"></span> 家庭信息</label>
                        </div>
                    </div>
                    <div class="row">
                    <!--line 2 col 1-->
                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">身份证号</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">出生日期</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">家庭住址</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">婚否</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">民族</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div>
                        </div>
                        <!--line 2 col 2-->
                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">籍贯</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">联系电话</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">政治面貌</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">健康状况</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label><span class="glyphicon glyphicon-folder-open" style="color: rgb(61, 83, 144);"></span> 工作信息</label>
                        </div>
                    </div>
                    <div class="row">
                    <!--line 3 col 1-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="worktime" class="col-sm-4 control-label">入职时间</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="worktime" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">文化程度</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">用工性质</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">合同开始时间</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">合同结束时间</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div>    
                        </div>
                    <!--line 3 col 2-->
                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">技术职称</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label">银行账号</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-4 control-label text-danger">平台账户</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="username" placeholder="" name="username"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-4 control-label text-danger">平台密码</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="pw" placeholder="" name="password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="personid" class="col-sm-4 control-label text-danger">平台密码确认</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="personid" placeholder="" name="check_password"/>
                                </div>
                            </div> 
                             
                        </div>
                    </div>
                </div>
                
                <!--照片等-->
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                                <img class="img-responsive" src="/resource/images/peopleinfo.png"/>
                                <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" id="photo" placeholder=""/>
                                </div>
                            </div> 
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="personid" class="col-md-6 control-label">
                            <input class="btn btn-warning btn-lg center-block" type="submit" value="确认新增" id="submit"/>
                        </label>
                        <label for="personid" class="col-md-6 control-label">
                            <input class="btn btn-info btn-lg center-block" type="button" value="返回列表" id="canel"/>
                        </label>
                        
                        
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" style="padding-bottom: 50px;"></div>
</div>

<script type="text/javascript">

$(document).ready(function(){
    $(document).on('keypress',function(e){
        var key = window.event ? e.keyCode : e.which;  
                        if(key.toString() == "13"){  
                                    return false;  
  
                        }  
    });
    
   $('#submit').bind('click',function(){
        var temp = $('#pw').val();
        if(temp != ''){
        var hash = $.md5(temp);
        $('#pw').val(hash);
        return true;
        }
        
        return false;
   });
   $('#canel').on('click',function(){
        window.location.href='/user/login_manager/show_login_admin_list';
   });
    
});


 </script>
 <script type="text/javascript">
$(document).ready(function(){
    $("#es_9").addClass('active');    
    $("#es_9_2").addClass('active');     
});
</script>
 </body>
 </html>