<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="../favicon.ico" />
        <meta name="renderer" content="webkit"/>
        <meta name="description" content="<?php echo $meta['description']; ?>" />
        <meta name="keywords" content="<?php echo $meta['keywords']; ?>" />
        <meta name="renderer" content="webkit"/>
        <title><?php echo $meta['title']; ?> - 伊斯货运</title>
        <?php
        foreach ($meta['css'] as $value) {
            echo $value;
        }
        foreach ($meta['js'] as $value) {
            echo $value;
        }
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    </head>
    <body>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <img src="/resource/images/bjlogin.gif" style="width: 1200px;height: 100px;" class="img-responsive"/>
        </div>
    </div>
        <div class="row">
        <!--导航栏-->
            <div class="col-md-12">
                <nav class="navbar navbar-default" role="navigation">
                   <div class="navbar-header">
                      <a class="navbar-brand" href="/login/login_control_board"><img src="/resource/images/homepic.png"/></a>
                   </div>
                   <!--分类导航-->
                   <div>
                      <ul class="nav navbar-nav">
                         <!--运单操作-->
                         <li class="dropdown" id="es_1">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                               运单操作
                               <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu es_drop_list">
                               <li id="es_1_1"><a href="/login/shipment/shipment_container_list_doing">未完成集装箱操作</a></li>
                               <li id="es_1_2"><a href="">未完成散货船操作</a></li>
                               <li id="es_1_3"><a href="/login/shipment/shipment_container_list_did">已完成集装箱查看</a></li>
                               <li id="es_1_4"><a href="">已完成散货船操作</a></li>
                                <li class="divider"></li>
                               <li id="es_1_3"><a href="">船舶信息登记</a></li>
                            </ul>
                         </li>
                         <!--数据分析-->
                         <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                               数据分析
                               <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu es_drop_list">
                               <li><a href="">区间数据选择</a></li>
                               <li><a href="">上传阶段记录</a></li>
                               <li><a href="">数据记录列表</a></li>
                               <li><a href="">自定义报表参数</a></li>
                            </ul>
                         </li>
                         <!--报价体系-->
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               报价体系
                               <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu es_drop_list">
                               <li><a href="#">报价设定</a></li>
                               <li><a href="#">历史报价查询</a></li>
                            </ul>
                         </li>
                         <!--资料存档-->
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               资料存档
                               <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu es_drop_list">
                               <li><a href="#">记录上传</a></li>
                               <li><a href="#">会议记录</a></li>
                               <li><a href="#">回忆文档备份</a></li>
                               <li class="divider"></li>
                               <li><a href="#">访客记录</a></li>
                               <li><a href="#">客户投诉及处理</a></li>
                               <li class="divider"></li>
                               <li><a href="#">市场计划跟踪</a></li>
                            </ul>
                         </li>
                         <!--人事功能-->
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               人事功能
                               <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu es_drop_list">
                               <li><a href="#">公司架构</a></li>
                               <li><a href="#">信息发布</a></li>
                               <li><a href="#">制度列表</a></li>
                               <li class="divider"></li>
                               <li><a href="#">员工资料</a></li>
                               <li><a href="#">考勤管理</a></li>
                               <li><a href="#">请假销假</a></li>
                               <li class="divider"></li>
                               <li><a href="#">用品审核</a></li>
                               <li><a href="#">固定资产</a></li>
                               <li><a href="#">报销记录</a></li>
                               <li><a href="#">奖惩记录</a></li>
                               <li class="divider"></li>
                               <li><a href="#">快递记录</a></li>
                               <li><a href="#">外出记录</a></li>
                               <li class="divider"></li>
                               <li><a href="#">车辆管理</a></li>
                            </ul>
                         </li>
                         <!--装船记录-->
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               装船记录
                               <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu es_drop_list">
                               <li><a href="#">记录上传</a></li>
                               <li><a href="#">装船记录</a></li>
                               <li><a href="#">记录备份</a></li>
                               <li><a href="#">记录发布</a></li>
                            </ul>
                         </li>
                         <!--资讯集成-->
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               资讯集成
                               <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu es_drop_list">
                               <li><a href="#">内部通讯录</a></li>
                               <li><a href="#">基础查询</a></li>
                               <li><a href="#">常用链接</a></li>
                               <li><a href="#">船运综合信息</a></li>
                            </ul>
                         </li>
                         <!--前台管理-->
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               前台管理
                               <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu es_drop_list">
                               <li><a href="#">新闻发布</a></li>
                               <li><a href="#">公司简介</a></li>
                               <li><a href="#">公司架构</a></li>
                               <li><a href="#">合作伙伴</a></li>
                               <li><a href="#">在线咨询</a></li>
                               <li><a href="#">客服功能</a></li>
                            </ul>
                         </li>
                         <!--平台管理-->
                         <li class="dropdown" id="es_9">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               平台管理
                               <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu es_drop_list">
                            <?php if(isset($this->session->userdata('manager_purviews')->loginuser) && $this->session->userdata('manager_purviews')->loginuser==='1'){?>
                               <li id="es_9_1"><a href="/user/login_manager/show_login_admin_list">账号及权限管理</a></li>            
                               <li id="es_9_2"><a href="/user/login_manager/create_login_admin">新增员工</a></li>            
                               <li class="divider"></li>
                            <?php }?>
                               <li id="es_9_3"><a href="/login/coop/coop_com_list">订舱代理管理</a></li>
                               <li id="es_9_4"><a href="/login/coop/coop_client_list">客户管理</a></li>
                               <li id="es_9_5"><a href="/login/coop/coop_harbour_list">运抵港口管理</a></li>
                               <li class="divider"></li>
                               <li><a href="#">系统设定</a></li>
                               <li><a href="#">系统日志</a></li>
                               <li><a href="#">数据分析设定</a></li>
                            </ul>
                         </li>
                         <!--个人功能-->
                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               个人功能
                               <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu es_drop_list">
                                <li><a href="#">报价现状</a></li>
                                <li class="divider"></li>
                                <li><a href="#">个人资料管理</a></li>
                                <li><a href="#">名片夹</a></li>
                                <li><a href="#">日程计划</a></li>
                                <li class="divider"></li>
                                <li><a href="#">用品申请</a></li>
                                <li><a href="#">请假申请</a></li>
                                <li><a href="#">快递记录</a></li>
                                <li><a href="#">外出登记</a></li>
                                <li><a href="#">费用报销</a></li>
                                <li><a href="#">固定资产登记</a></li>
                                <li class="divider"></li>
                                <li><a href="#">制度阅读</a></li>
                                <li><a href="#">奖惩记录</a></li>
                            </ul>
                         </li>
                      </ul>  
                   </div>
                </nav>
            
            </div>
        
        </div>
        
        <div class="row">
            <div>
                <p class="navbar-text pull-right">您好，<?=$this->session->userdata('manager_uname');?>。<a href="/user/login_manager/remove_session" class="btn btn-warning btn-xs">退出系统</a></p>
            </div>
        </div>
    
    </div>
 <script type="text/javascript">
 $(document).ready(function(){
    $(document).on('click','.es_drop_list > li',function(){
       //alert(1);
       //$(this).addClass('active'); 
    });
 });
 </script>
