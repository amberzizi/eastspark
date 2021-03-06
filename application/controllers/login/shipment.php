<?php
/**
*
* 运单  集装箱container   散货船 bulk_cargo
* 
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include_once realpath(APPLICATION_CONTROLLERS) . '/base.php';

class Shipment extends Base{
    
    public function __construct(){
        parent::__construct();
        //$this->load->helper('url');
        //$this->load->library('session');
        //$this->load->library('pagination');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('Shipment_model','shipment');
    }
    
    //public function index(){
    //    echo realpath(APPLICATION_CONTROLLERS);
     //   $date['kk']='sdsdsd';
    //    $this->load->view('headfeet/head');
      //  $this->load->view('home/order',$date);
    //}
    
//========================未完成 货单列表 开始============================   
    /**
    *
    * 运单  集装箱container   正在进行中的运单
    * @param 页码
    * 
    * 
    */
    public function shipment_container_list_doing($page = '-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        
        $this->_header['meta']['title'] = '集装箱进行中运单';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        
        //分页======
        if ($page !== '-99') {
            $pagenum = $page;
        } else {
            $pagenum = 1;
        }

        //设置每页分页显示数据条数


        $allnum = $this->shipment->get_container_num();
        $maxnum = 10;
        $config = $this->get_page($allnum, $maxnum, $pagenum,
            'login/shipment/shipment_container_list_doing/', 4);
        $this->pagination->initialize($config);
        $data['allnum'] = $allnum;
        $data['page'] = $this->pagination->create_links();
        $data['info_list'] = $this->shipment->get_container_list($maxnum, $maxnum * ($pagenum -
            1));
        //分页结束======
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_doing_list',$data);
        
        
    }
//=======================未完成=货单列表 完成============================

//========================已完成 货单列表 开始============================ 
/**
    *
    * 运单  集装箱container   已经完成的运单
    * @param 页码
    * 
    * 
    */
    public function shipment_container_list_did($page = '-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        
        $this->_header['meta']['title'] = '集装箱已经完成的运单';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        
        //分页======
        if ($page !== '-99') {
            $pagenum = $page;
        } else {
            $pagenum = 1;
        }

        //设置每页分页显示数据条数


        $allnum = $this->shipment->get_container_num('1');
        $maxnum = 10;
        $config = $this->get_page($allnum, $maxnum, $pagenum,
            'login/shipment/shipment_container_list_doing/', 4);
        $this->pagination->initialize($config);
        $data['allnum'] = $allnum;
        $data['page'] = $this->pagination->create_links();
        $data['info_list'] = $this->shipment->get_container_list($maxnum, $maxnum * ($pagenum -
            1),'1');
        //分页结束======
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_did_list',$data);
    }
    
//========================已完成 货单列表 结束============================     
    
//========================新增货单 开始============================
    /**
    *
    * 运单  集装箱container   增加新运单
    * 
    * 1
    */
    public function add_container_shipment(){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $last_id = $this->shipment->get_last_id_num();
        $new_id =(int)$last_id+1;
        $date['shipment_id']='ES'.$new_id.'COUT';
        $date['create_time']=date('Y-m-d H:i:s');
        $this->shipment->add_new_shipment_list($date);
        
        redirect('/login/shipment/shipment_container_list_doing');
    }

//========================新增货单 完成============================

//========================状态变更 开始============================
    /**
    *
    * 运单  集装箱container   更新运单状态
    * 
    * 1
    */
    public function shipment_container_state($sid='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '提单信息及状态';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';

        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-slide.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-timepicker-addon.js');
        
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        
     
     

        
        
        
        
        
        if ($sid !== '-99') {
            $s_id = $sid;
        } else {
            show_404();
            return;
        }
        //本运单现有状态信息
        $data['container_state_info'] = $this->shipment->get_shipment_contaniner_state($s_id);
        //可供选择的操作员
        $data['manager'] = $this->shipment->get_manager_list_for_shipment();
        //可运抵港口
        $data['harbour'] = $this->shipment->get_harbour_list_for_shipment();
        //客户列表
        $data['client'] = $this->shipment->get_client_list_for_shipment();
        //船舶名称列表
        $data['ship'] = $this->shipment->get_ship_list_for_shipment();
        
        
        //var_dump($data['container_state_info']);die();
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_state_change',$data);
    }
    
    /**
    *
    * 运单  集装箱container   更新运单状态
    * 
    * 1
    */
    public function do_shipment_container_state(){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $data['link'] = $this->input->post('link')[0];
        $data['manager_id'] = $this->input->post('manager_id');
        $data['harbour'] = $this->input->post('harbour');
        $data['container_num'] = '0';
        if(!empty($this->input->post('container_num'))){
            $data['container_num'] = htmlspecialchars(trim($this->input->post('container_num')));
        }
        $data['lading_bill']='0';
        if(!empty($this->input->post('lading_bill'))){
            $data['lading_bill'] = htmlspecialchars(trim($this->input->post('lading_bill')));
        }
        $data['wharf']='0';
        if(!empty($this->input->post('wharf'))){
            $data['wharf'] = htmlspecialchars(trim($this->input->post('wharf')));
        }
        $data['in_wharf_time'] = htmlspecialchars(trim($this->input->post('in_wharf_time')));
        $data['out_wharf_time'] = htmlspecialchars(trim($this->input->post('out_wharf_time')));
        $data['turn_harbour'] = htmlspecialchars(trim($this->input->post('turn_harbour')));
        $data['voyage'] = htmlspecialchars(trim($this->input->post('voyage')));
        $data['ship_id'] = $this->input->post('ship_id');
        $data['shipper'] = htmlspecialchars(trim($this->input->post('shipper')));
        $data['client'] = $this->input->post('client');
        
        $data['bill_num_state'] = $this->input->post('bill_num_state');
        
        $sid = $this->input->post('sid');
        
        $this->shipment->update_shipment_container_state($sid,$data);
        
        redirect('/login/shipment/shipment_container_list_doing');
    }


//========================状态变更 完成============================

//========================海运费用 开始============================

    /**
    *
    * 运单  集装箱container   创建海运费
    * 
    * 1
    */
    public function create_container_transport_fees($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '创建海运费';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');     
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');

        
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        //订舱代理列表
        $data['coop_com'] = $this->shipment->get_es_com_list_for_shipment();
        //客户列表
        $data['client'] = $this->shipment->get_client_list_for_shipment();
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_transport_fees',$data);
    }

    /**
    *
    * 运单  集装箱container   增加海运费
    * 
    * 1
    */
    public function add_container_transport_fees(){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $data['shipment_id'] = $this->input->post('shipment_id');
        $data['list_id'] = $this->input->post('list_id');
        $data['cargo_type'] = htmlspecialchars(trim($this->input->post('cargo_type')));
        $data['agent'] = $this->input->post('agent');
        $data['box_type'] = $this->input->post('box_type');
        $data['box_num'] = htmlspecialchars(trim($this->input->post('box_num')));
        $data['post_cost'] = htmlspecialchars(trim($this->input->post('post_cost')));
        $data['sea_cost'] = htmlspecialchars(trim($this->input->post('sea_cost')));
        $data['all_post_cost'] = htmlspecialchars(trim($this->input->post('all_post_cost')));
        $data['all_sea_cost'] = htmlspecialchars(trim($this->input->post('all_sea_cost')));
        $data['gain'] = htmlspecialchars(trim($this->input->post('gain')));
        $data['client'] = $this->input->post('client');
        $data['state'] = $this->input->post('state');
        
        $data['cargo_type_e'] = htmlspecialchars(trim($this->input->post('cargo_type_e')));
        $data['wrap_num'] = htmlspecialchars(trim($this->input->post('wrap_num')));
        $data['wrap_type'] = htmlspecialchars(trim($this->input->post('wrap_type')));
        $data['net_weight'] = htmlspecialchars(trim($this->input->post('net_weight')));
        $data['gross_weight'] = htmlspecialchars(trim($this->input->post('gross_weight')));
        $data['bulk'] = htmlspecialchars(trim($this->input->post('bulk')));
        $data['require'] = htmlspecialchars(trim($this->input->post('require')));
        
        $data['create_time'] = date('Y-m-d H:i:s');
        
        //检查是否主键重复
        $check = $this->shipment->check_transport_fees_if_have($data['shipment_id']);
        if($check != '0'){
            show_404();
            die();
        }
        
        //创建海运费记录
        try{
            $re = $this->shipment->add_transport_fees($data);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        
        
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        //初始化  2 未创建   1最终确定  0未确定
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_transport_fees_state_in_list($data['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_transport_fees_state_in_list($data['list_id'],$state);
        }
         
   
            redirect('/login/shipment/shipment_container_list_doing'); 
        
    }

    /**
    *
    * 运单  集装箱container   更新海运费
    * 
    * 1
    */

    public function update_container_transport_fees($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '管理海运费';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');     
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        //订舱代理列表
        $data['coop_com'] = $this->shipment->get_es_com_list_for_shipment();
        //客户列表
        $data['client'] = $this->shipment->get_client_list_for_shipment();
        //本单海运费信息
        $data['info'] = $this->shipment->get_transport_fees_by_shipment_id($data['shipment_id'],$data['list_id']);
        
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_update_transport_fees',$data);
    }

    /**
    *
    * 运单  集装箱container   更新海运费动作
    * 
    * 1
    */
    public function do_update_container_transport_fees(){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $data['shipment_id'] = $this->input->post('shipment_id');
        $data['list_id'] = $this->input->post('list_id');
        $data['cargo_type'] = htmlspecialchars(trim($this->input->post('cargo_type')));
        $data['agent'] = $this->input->post('agent');
        $data['box_type'] = $this->input->post('box_type');
        $data['box_num'] = htmlspecialchars(trim($this->input->post('box_num')));
        $data['post_cost'] = htmlspecialchars(trim($this->input->post('post_cost')));
        $data['sea_cost'] = htmlspecialchars(trim($this->input->post('sea_cost')));
        $data['all_post_cost'] = htmlspecialchars(trim($this->input->post('all_post_cost')));
        $data['all_sea_cost'] = htmlspecialchars(trim($this->input->post('all_sea_cost')));
        $data['gain'] = htmlspecialchars(trim($this->input->post('gain')));
        $data['client'] = $this->input->post('client');
        $data['state'] = $this->input->post('state');
        
        $data['cargo_type_e'] = htmlspecialchars(trim($this->input->post('cargo_type_e')));
        $data['wrap_num'] = htmlspecialchars(trim($this->input->post('wrap_num')));
        $data['wrap_type'] = htmlspecialchars(trim($this->input->post('wrap_type')));
        $data['net_weight'] = htmlspecialchars(trim($this->input->post('net_weight')));
        $data['gross_weight'] = htmlspecialchars(trim($this->input->post('gross_weight')));
        $data['bulk'] = htmlspecialchars(trim($this->input->post('bulk')));
        $data['require'] = htmlspecialchars(trim($this->input->post('require')));

        
        
        //更新海运费记录
        try{
            $this->shipment->do_update_transport_fees_by_shipment_id($data['shipment_id'],$data['list_id'],$data);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        
        
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        //初始化  2 未创建   1最终确定  0未确定
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_transport_fees_state_in_list($data['list_id'],$state);          
        }
         
   
            redirect('/login/shipment/shipment_container_list_doing'); 
    }
    
    /**
    *
    * 运单  集装箱container   海运费完成
    * 
    * 1
    */

    public function show_container_transport_fees($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '海运费完成';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');     
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        //订舱代理列表
        $data['coop_com'] = $this->shipment->get_es_com_list_for_shipment();
        //客户列表
        $data['client'] = $this->shipment->get_client_list_for_shipment();
        //本单海运费信息
        $data['info'] = $this->shipment->get_transport_fees_by_shipment_id($data['shipment_id'],$data['list_id']);
        
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_show_transport_fees',$data);
    }
//========================海运费用 完成============================

//========================报关前装箱 开始============================
    /**
    *
    * 运单  集装箱container   创建
    * 
    * 1
    */
    public function create_container_packing($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '创建报关前管理-装箱信息';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/uploadify/uploadify.css');
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-slide.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-timepicker-addon.js');
        
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        

        $this->_header['meta']['js'][] = addJs('/resource/uploadify/jquery.uploadify.js');
       
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        //创建传图文件夹
        $path = 'uploads/packing/'.$data['shipment_id'].'/';
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $data['path'] = $path;
        $data['file_name'] = $data['shipment_id'];
        //制作上传文件令牌
        $data['timestamp'] = time();
        $data['token'] = md5('hereistrytoupload'.$data['timestamp']);
        
       // var_dump($_SERVER['DOCUMENT_ROOT']);
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_packing',$data);
    }
    /**
    *
    * 运单  集装箱container   新增
    * 
    * 1
    */
    public function add_container_parking(){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $data['shipment_id'] = $this->input->post('shipment_id');
        $data['list_id'] = $this->input->post('list_id');
        $data['packing_date'] = htmlspecialchars(trim($this->input->post('packing_date')));
        $data['content'] = htmlspecialchars(trim($this->input->post('content')));
        $data['disk_num'] = htmlspecialchars(trim($this->input->post('disk_num')));
        $data['packing_img_url'] = $this->input->post('packing_img_url');
        $data['state'] = $this->input->post('state');
        $data['create_time'] = date('Y-m-d H:i:s');
        
        
        
        //检查是否主键重复
        $check = $this->shipment->check_packing_if_have($data['shipment_id']);
        if($check != '0'){
            show_404();
            die();
        }
        
        //创建海运费记录
        try{
            $re = $this->shipment->add_packing($data);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        
        
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        //初始化  2 未创建   1最终确定  0未确定
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_packing_state_in_list($data['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_packing_state_in_list($data['list_id'],$state);
        }
         
   
            redirect('/login/shipment/shipment_container_list_doing'); 
        
        
    }

    /**
    *
    * 运单  集装箱container   更新
    * 
    * 1
    */
    public function update_container_packing($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '创建报关前管理-装箱信息';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/uploadify/uploadify.css');
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-slide.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-timepicker-addon.js');
        
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        

        $this->_header['meta']['js'][] = addJs('/resource/uploadify/jquery.uploadify.js');
       
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        //根据id 获取报关前相关数据
        $data['info'] = $this->shipment->get_container_packing_by_id($lid,$sid);
        
        
        //准备传图携带数据
        $data['path'] = $data['info'][0]->packing_img_url;
        $data['file_name'] = $data['shipment_id'];
        //制作上传文件令牌
        $data['timestamp'] = time();
        $data['token'] = md5('hereistrytoupload'.$data['timestamp']);
        
        //扫描已上传的文件  去掉. ..
        $data['files'] = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$data['path']);
        array_shift($data['files']);
        array_shift($data['files']);
        //var_dump($data['files']);
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_update_packing',$data);
    }
    /**
    *
    * 运单  集装箱container   更新
    * 
    * 1
    */
    public function do_update_container_parking(){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $data['shipment_id'] = $this->input->post('shipment_id');
        $data['list_id'] = $this->input->post('list_id');
        $data['packing_date'] = htmlspecialchars(trim($this->input->post('packing_date')));
        $data['content'] = htmlspecialchars(trim($this->input->post('content')));
        $data['disk_num'] = htmlspecialchars(trim($this->input->post('disk_num')));
        $data['packing_img_url'] = $this->input->post('packing_img_url');
        $data['state'] = $this->input->post('state');
        
        //更新报关前记录
        try{
            $this->shipment->do_update_packing_by_shipment_id($data['shipment_id'],$data['list_id'],$data);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        
        
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        //初始化  2 未创建   1最终确定  0未确定
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_packing_state_in_list($data['list_id'],$state);          
        }
         
   
            redirect('/login/shipment/shipment_container_list_doing'); 
        
        
    }
    
    /**
    *
    * 运单  集装箱container   更新
    * 
    * 1
    */
    public function show_container_packing($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '创建报关前完成';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/uploadify/uploadify.css');
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-slide.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-timepicker-addon.js');
        
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        

        $this->_header['meta']['js'][] = addJs('/resource/uploadify/jquery.uploadify.js');
       
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        //根据id 获取报关前相关数据
        $data['info'] = $this->shipment->get_container_packing_by_id($lid,$sid);
        
        
        //准备传图携带数据
        $data['path'] = $data['info'][0]->packing_img_url;
        $data['file_name'] = $data['shipment_id'];
        //制作上传文件令牌
        $data['timestamp'] = time();
        $data['token'] = md5('hereistrytoupload'.$data['timestamp']);
        
        //扫描已上传的文件  去掉. ..
        $data['files'] = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$data['path']);
        array_shift($data['files']);
        array_shift($data['files']);
        //var_dump($data['files']);
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_show_packing',$data);
    }
//========================报关前装箱 完成============================


//========================报关中管理 开始============================
    /**
    *
    * 运单  集装箱container   报关中 创建
    * 
    * 1
    */
    public function create_container_middle_apply($sid='-99',$lid ='-99'){
       //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '报关中管理';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/uploadify/uploadify.css');
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        

        $this->_header['meta']['js'][] = addJs('/resource/uploadify/jquery.uploadify.js');
       
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
       
        
        //创建传图文件夹
        $path = 'uploads/middle_apply/'.$data['shipment_id'].'/';
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $data['path'] = $path;
        $data['file_name'] = $data['shipment_id'];
        //制作上传文件令牌
        $data['timestamp'] = time();
        $data['token'] = md5('hereistrytoupload'.$data['timestamp']);
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_middle_apply',$data);
        
        
    }
    /**
    *
    * 运单  集装箱container   报关中 增加
    * 
    * 1
    */
    
    public function add_container_middle_apply(){
         //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $data['shipment_id'] = $this->input->post('shipment_id');
        $data['list_id'] = $this->input->post('list_id');
        $data['contract'] = $this->input->post('contract');
        $data['invoice'] = $this->input->post('invoice');
        $data['packing_list'] = $this->input->post('packing_list');
        $data['permit'] = $this->input->post('permit');
        $data['proxy'] = $this->input->post('proxy');
        $data['sufferance'] = $this->input->post('sufferance');
        $data['com_check'] = $this->input->post('com_check');
        $data['tex'] = $this->input->post('tex');
        $data['before_money'] = $this->input->post('before_money');
        $data['act_money'] = $this->input->post('act_money');
        $data['final_money'] = $this->input->post('final_money');
        $data['sea_check'] = $this->input->post('sea_check');
        $data['content'] = htmlspecialchars(trim($this->input->post('content')));
        $data['state'] = $this->input->post('state');
        $data['middle_img_url'] = $this->input->post('middle_img_url');
        $data['create_time'] = date("Y-m-d H:i:s");
        
        //检查是否主键重复
        $check = $this->shipment->check_middle_apply_if_have($data['shipment_id']);
        if($check != '0'){
            show_404();
            die();
        }
        
        //创建
        try{
            $re = $this->shipment->add_middle_apply($data);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        
        
        
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_middle_apply_state_in_list($data['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_middle_apply_state_in_list($data['list_id'],$state);
        }
        redirect('/login/shipment/shipment_container_list_doing'); 
        
    }
    
    /**
    *
    * 运单  集装箱container   报关中更新
    * 
    * 1
    */
    public function update_container_middle_apply($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '创建报中更新';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/uploadify/uploadify.css');
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        

        $this->_header['meta']['js'][] = addJs('/resource/uploadify/jquery.uploadify.js');
       
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        //根据id 获取报关中相关数据
        $data['info_by_id'] = $this->shipment->get_container_middle_apply_by_id($lid,$sid);
        
        
        //准备传图携带数据
        $data['path'] = $data['info_by_id'][0]->middle_img_url;
        $data['file_name'] = $data['shipment_id'];
        //制作上传文件令牌
        $data['timestamp'] = time();
        $data['token'] = md5('hereistrytoupload'.$data['timestamp']);
        
        //扫描已上传的文件  去掉. ..
        $data['files'] = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$data['path']);
        array_shift($data['files']);
        array_shift($data['files']);
        //不要上传使用中文文件名
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_update_middle_apply',$data);
    }

    /**
    *
    * 运单  集装箱container   报关中更新
    * 
    * 1
    */
    public function do_update_container_middle_apply(){
         //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $data['shipment_id'] = $this->input->post('shipment_id');
        $data['list_id'] = $this->input->post('list_id');
        $data['contract'] = $this->input->post('contract');
        $data['invoice'] = $this->input->post('invoice');
        $data['packing_list'] = $this->input->post('packing_list');
        $data['permit'] = $this->input->post('permit');
        $data['proxy'] = $this->input->post('proxy');
        $data['sufferance'] = $this->input->post('sufferance');
        $data['com_check'] = $this->input->post('com_check');
        $data['tex'] = $this->input->post('tex');
        $data['before_money'] = $this->input->post('before_money');
        $data['act_money'] = $this->input->post('act_money');
        $data['final_money'] = $this->input->post('final_money');
        $data['sea_check'] = $this->input->post('sea_check');
        $data['content'] = htmlspecialchars(trim($this->input->post('content')));
        $data['state'] = $this->input->post('state');
        
        //更新报关中记录
        try{
            $this->shipment->do_update_container_middle_apply_by_shipment_id($data['shipment_id'],$data['list_id'],$data);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        
        
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        //初始化  2 未创建   1最终确定  0未确定
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_middle_apply_state_in_list($data['list_id'],$state);
            
        }
         
   
            redirect('/login/shipment/shipment_container_list_doing'); 
    }
/**
    *
    * 运单  集装箱container   报关中完成
    * 
    * 1
    */
    public function show_container_middle_apply($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '创建报中完成';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/uploadify/uploadify.css');
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        

        $this->_header['meta']['js'][] = addJs('/resource/uploadify/jquery.uploadify.js');
       
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        //根据id 获取报关中相关数据
        $data['info_by_id'] = $this->shipment->get_container_middle_apply_by_id($lid,$sid);
        
        
        //准备传图携带数据
        $data['path'] = $data['info_by_id'][0]->middle_img_url;
        $data['file_name'] = $data['shipment_id'];
        //制作上传文件令牌
        $data['timestamp'] = time();
        $data['token'] = md5('hereistrytoupload'.$data['timestamp']);
        
        //扫描已上传的文件  去掉. ..
        $data['files'] = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$data['path']);
        array_shift($data['files']);
        array_shift($data['files']);
        //不要上传使用中文文件名
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_show_middle_apply',$data);
    }


//========================报关中管理 完成============================

//========================提单转客户 开始============================
/**
    *
    * 运单  集装箱container   创建提单转客户 
    * 
    * 1
    */
    public function create_container_bill_to_client($sid='-99',$lid ='-99'){
       //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '提单转客户';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/uploadify/uploadify.css');
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-slide.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-timepicker-addon.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/uploadify/jquery.uploadify.js');
       
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
       
        
        //创建传图文件夹
        $path = 'uploads/bill_to_client/'.$data['shipment_id'].'/';
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $data['path'] = $path;
        $data['file_name'] = $data['shipment_id'];
        //制作上传文件令牌
        $data['timestamp'] = time();
        $data['token'] = md5('hereistrytoupload'.$data['timestamp']);
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_bill_to_client',$data);
        
        
    }

/**
    *
    * 运单  集装箱container   提单转客户  增加
    * 
    * 1
    */
    
    public function add_container_bill_to_client(){
         //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $data['shipment_id'] = $this->input->post('shipment_id');
        $data['list_id'] = $this->input->post('list_id');
        $data['order_type'] = $this->input->post('order_type');
        $data['create_time'] = date("Y-m-d H:i:s");
        $data['content'] = htmlspecialchars(trim($this->input->post('content')));
        $data['send_date'] = htmlspecialchars(trim($this->input->post('send_date')));
        $data['state'] = $this->input->post('state');
        $data['img_url'] = $this->input->post('img_url');

        
        //检查是否主键重复
        $check = $this->shipment->check_bill_to_client_if_have($data['shipment_id']);
        if($check != '0'){
            show_404();
            die();
        }
        
        //创建
        try{
            $re = $this->shipment->add_bill_to_client($data);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        
        
        
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_bill_to_client_state_in_list($data['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_bill_to_client_state_in_list($data['list_id'],$state);
        }
        redirect('/login/shipment/shipment_container_list_doing'); 
        
    }

/**
    *
    * 运单  集装箱container   报关中更新
    * 
    * 1
    */
    public function update_container_bill_to_client($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '提单转客户更新';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/uploadify/uploadify.css');
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-slide.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-timepicker-addon.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/uploadify/jquery.uploadify.js');
       
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        //根据id 获取报关中相关数据
        $data['info'] = $this->shipment->get_container_bill_to_client_by_id($lid,$sid);
        
        
        //准备传图携带数据
        $data['path'] = $data['info'][0]->img_url;
        $data['file_name'] = $data['shipment_id'];
        //制作上传文件令牌
        $data['timestamp'] = time();
        $data['token'] = md5('hereistrytoupload'.$data['timestamp']);
        
        //扫描已上传的文件  去掉. ..
        $data['files'] = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$data['path']);
        array_shift($data['files']);
        array_shift($data['files']);
        //不要上传使用中文文件名
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_update_bill_to_client',$data);
    }

    /**
    *
    * 运单  集装箱container   报关中更新
    * 
    * 1
    */
    public function do_update_container_bill_to_client(){
         //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $data['shipment_id'] = $this->input->post('shipment_id');
        $data['list_id'] = $this->input->post('list_id');
        $data['order_type'] = $this->input->post('order_type');
        $data['content'] = htmlspecialchars(trim($this->input->post('content')));
        $data['send_date'] = htmlspecialchars(trim($this->input->post('send_date')));
        $data['state'] = $this->input->post('state');
        
        //更新报关中记录
        try{
            $this->shipment->do_update_container_bill_to_client_by_shipment_id($data['shipment_id'],$data['list_id'],$data);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        
        
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        //初始化  2 未创建   1最终确定  0未确定
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_bill_to_client_state_in_list($data['list_id'],$state);
            
        }
         
   
            redirect('/login/shipment/shipment_container_list_doing'); 
    }


/**
    *
    * 运单  集装箱container   提单转客户完成
    * 
    * 1
    */
    public function show_container_bill_to_client($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '提单转客户完成';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/uploadify/uploadify.css');
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-slide.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-timepicker-addon.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/uploadify/jquery.uploadify.js');
       
        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        //根据id 获取报关中相关数据
        $data['info'] = $this->shipment->get_container_bill_to_client_by_id($lid,$sid);
        
        
        //准备传图携带数据
        $data['path'] = $data['info'][0]->img_url;
        $data['file_name'] = $data['shipment_id'];
        //制作上传文件令牌
        $data['timestamp'] = time();
        $data['token'] = md5('hereistrytoupload'.$data['timestamp']);
        
        //扫描已上传的文件  去掉. ..
        $data['files'] = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$data['path']);
        array_shift($data['files']);
        array_shift($data['files']);
        //不要上传使用中文文件名
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_show_bill_to_client',$data);
    }

//========================提单转客户 完成============================


//========================港杂费 开始============================
/**
    *
    * 运单  集装箱container   创建港杂费
    * 
    * 1
    */
    public function create_container_sundries_fees($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        $this->_header['meta']['title'] = '港杂费';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');

        
         if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        //订舱代理列表
        $data['coop_com'] = $this->shipment->get_es_com_list_for_shipment();
        //客户列表
        $data['client'] = $this->shipment->get_client_list_for_shipment();
        //箱体数量 和信息
        $data['box_info'] = $this->shipment->get_box_info_from_transport_fees($data['list_id'],$data['shipment_id']);
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_sundries_fees',$data);
    }
/**
    *
    * 运单  集装箱container   增加港杂费
    * 
    * 1
    */
    public function add_container_sundries_fees(){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        $this->_header['meta']['title'] = '港杂费';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        
        
        $data['shipment_id'] = $this->input->post('shipment_id');
        $data['list_id'] = $this->input->post('list_id');
        
        $data['fee_out'] = $this->input->post('fee_out');
        $data['tts_out'] = $this->input->post('fee_out');
        $data['thc_out'] = $this->input->post('thc_out');
        $data['ecrs_out'] = $this->input->post('ecrs_out');
        $data['chc_out'] = $this->input->post('chc_out');
        $data['se_out'] = $this->input->post('se_out');
        $data['box_out'] = $this->input->post('box_out');
        $data['ship_out'] = $this->input->post('ship_out');
        $data['file_out'] = $this->input->post('file_out');
        $data['sea_out'] = $this->input->post('sea_out');
        $data['check_out'] = $this->input->post('check_out');
        $data['unload_out'] = $this->input->post('unload_out');
        $data['water_out'] = $this->input->post('water_out');
        $data['d_out'] = $this->input->post('d_out');
        $data['search_out'] = $this->input->post('search_out');
        $data['fee_in'] = $this->input->post('fee_in');
        $data['tts_in'] = $this->input->post('fee_in');
        $data['thc_in'] = $this->input->post('thc_in');
        $data['ecrs_in'] = $this->input->post('ecrs_in');
        $data['chc_in'] = $this->input->post('chc_in');
        $data['se_in'] = $this->input->post('se_in');
        $data['box_in'] = $this->input->post('box_in');
        $data['ship_in'] = $this->input->post('ship_in');
        $data['file_in'] = $this->input->post('file_in');
        $data['sea_in'] = $this->input->post('sea_in');
        $data['check_in'] = $this->input->post('check_in');
        $data['unload_in'] = $this->input->post('unload_in');
        $data['water_in'] = $this->input->post('water_in');
        $data['d_in'] = $this->input->post('d_in');
        $data['search_in'] = $this->input->post('search_in');
        $data['agent_in'] = $this->input->post('agent_in');
        $data['gain'] = $this->input->post('gain');
        $data['box_fee_out'] = $this->input->post('box_fee_out');
        $data['boxs_fees_out'] = $this->input->post('boxs_fees_out');
        $data['box_fee_in'] = $this->input->post('box_fee_in');
        $data['boxs_fees_in'] = $this->input->post('boxs_fees_in');
        
        $data['state'] = $this->input->post('state');
        $data['create_time'] = date("Y-m-d H:i:s");
        
        
        //检查是否主键重复
        $check = $this->shipment->check_sundries_fees_if_have($data['shipment_id']);
        if($check != '0'){
            show_404();
            die();
        }
        
        //创建
        try{
            $re = $this->shipment->add_sundries_fees($data);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        
        
        
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_sundries_fees_state_in_list($data['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_sundries_fees_state_in_list($data['list_id'],$state);
        }
        redirect('/login/shipment/shipment_container_list_doing'); 
        
        
        
    
    }
/**
    *
    * 运单  集装箱container   更新港杂费
    * 
    * 1
    */
    public function update_container_sundries_fees($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '更新港杂费';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        

        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');

        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
     
        //根据id 获取报关中相关数据
        $data['info'] = $this->shipment->get_container_sundries_fees_by_id($lid,$sid);   
        //订舱代理列表
        $data['coop_com'] = $this->shipment->get_es_com_list_for_shipment();
        //客户列表
        $data['client'] = $this->shipment->get_client_list_for_shipment();
        //箱体数量 和信息
        $data['box_info'] = $this->shipment->get_box_info_from_transport_fees($data['list_id'],$data['shipment_id']);
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_update_sundries_fees',$data);
    }
    /**
    *
    * 运单  集装箱container   报关中更新
    * 
    * 1
    */
    public function do_upload_container_sundries_fees(){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        $this->_header['meta']['title'] = '港杂费';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        
        
        $data['shipment_id'] = $this->input->post('shipment_id');
        $data['list_id'] = $this->input->post('list_id');
        
        $data['fee_out'] = $this->input->post('fee_out');
        $data['tts_out'] = $this->input->post('fee_out');
        $data['thc_out'] = $this->input->post('thc_out');
        $data['ecrs_out'] = $this->input->post('ecrs_out');
        $data['chc_out'] = $this->input->post('chc_out');
        $data['se_out'] = $this->input->post('se_out');
        $data['box_out'] = $this->input->post('box_out');
        $data['ship_out'] = $this->input->post('ship_out');
        $data['file_out'] = $this->input->post('file_out');
        $data['sea_out'] = $this->input->post('sea_out');
        $data['check_out'] = $this->input->post('check_out');
        $data['unload_out'] = $this->input->post('unload_out');
        $data['water_out'] = $this->input->post('water_out');
        $data['d_out'] = $this->input->post('d_out');
        $data['search_out'] = $this->input->post('search_out');
        $data['fee_in'] = $this->input->post('fee_in');
        $data['tts_in'] = $this->input->post('fee_in');
        $data['thc_in'] = $this->input->post('thc_in');
        $data['ecrs_in'] = $this->input->post('ecrs_in');
        $data['chc_in'] = $this->input->post('chc_in');
        $data['se_in'] = $this->input->post('se_in');
        $data['box_in'] = $this->input->post('box_in');
        $data['ship_in'] = $this->input->post('ship_in');
        $data['file_in'] = $this->input->post('file_in');
        $data['sea_in'] = $this->input->post('sea_in');
        $data['check_in'] = $this->input->post('check_in');
        $data['unload_in'] = $this->input->post('unload_in');
        $data['water_in'] = $this->input->post('water_in');
        $data['d_in'] = $this->input->post('d_in');
        $data['search_in'] = $this->input->post('search_in');
        $data['agent_in'] = $this->input->post('agent_in');
        $data['gain'] = $this->input->post('gain');
        $data['box_fee_out'] = $this->input->post('box_fee_out');
        $data['boxs_fees_out'] = $this->input->post('boxs_fees_out');
        $data['box_fee_in'] = $this->input->post('box_fee_in');
        $data['boxs_fees_in'] = $this->input->post('boxs_fees_in');
        
        $data['state'] = $this->input->post('state');
        
        
        //更新
        try{
            $this->shipment->do_update_container_sundries_fees_by_shipment_id($data['shipment_id'],$data['list_id'],$data);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        
        
        
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_sundries_fees_state_in_list($data['list_id'],$state);
            
        }
        
        redirect('/login/shipment/shipment_container_list_doing'); 
    }
    
    /**
    *
    * 运单  集装箱container  完成浏览
    * 
    * 1
    */
    public function show_container_sundries_fees($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '更新港杂费';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        

        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');

        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
     
        //根据id 获取报关中相关数据
        $data['info'] = $this->shipment->get_container_sundries_fees_by_id($lid,$sid);   
        //订舱代理列表
        $data['coop_com'] = $this->shipment->get_es_com_list_for_shipment();
        //客户列表
        $data['client'] = $this->shipment->get_client_list_for_shipment();
        //箱体数量 和信息
        $data['box_info'] = $this->shipment->get_box_info_from_transport_fees($data['list_id'],$data['shipment_id']);
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_show_sundries_fees',$data);
    }
//========================港杂费 完成============================

//========================详情============================
/**
    *
    * 运单  集装箱container   显示单条详情
    * 
    * 1
    */
    public function show_shipment_container_detail($sid='-99',$lid ='-99'){
        //$this->_acl_login('shipment');
        $this->_acl_login();
        
        $this->_header['meta']['title'] = '显示运单详情';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        

        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');

        
        if ($sid !== '-99' && $lid !== '-99') {
            
        } else {
            show_404();
            die();
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        //基本信息
        $data['info_a'] = $this->shipment->get_shipment_container_detail_by_id($lid,$sid);
        //海运费
        $data['info_b'] = $this->shipment->get_transport_fees_by_shipment_id($data['shipment_id'],$data['list_id']);
        //报关前
        $data['info_c'] = $this->shipment->get_container_packing_by_id($lid,$sid);
        //报关中
        $data['info_d'] = $this->shipment->get_container_middle_apply_by_id($lid,$sid);
        //港杂费
        $data['info_e'] = $this->shipment->get_container_sundries_fees_by_id($lid,$sid);   
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/shipment/shipment_container_detail',$data);
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

}

    



/** here is the end of this page **/