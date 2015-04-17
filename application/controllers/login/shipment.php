<?php
/**
*
* 运单  集装箱container   散货船 bulk_cargo
* 
*/


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
        $this->_header['meta']['js'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        
     
     

        
        
        
        
        
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
        $data['recipient'] = $this->input->post('recipient');
        
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
            return;
        }
        
        $data['list_id'] = $lid;
        $data['shipment_id'] = $sid;
        
        
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
            
        }catch(mysqli_sql_exception $e){
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






//========================海运费用 完成============================







}

    



/** here is the end of this page **/