<?php
include_once realpath(APPLICATION_CONTROLLERS) . '/base.php';

class Home extends Base{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        //$this->load->library('session');
        $this->load->library('pagination'); 
    }
    
    
    
    
    
    //========================货单列表 开始============================
    public function index(){
        $this->_header['meta']['title'] = '货运管理列表';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/login.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/gg.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/template.css');
        $this->load->model('shipment_model','shipment');
        $date['info'] = $this->shipment->get_list_info();
        $date['all_num'] = $this->shipment->get_shipment_list_num();
        
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/home/order',$date);
    }
    //新增单
    public function add_new_list(){
        $this->load->model('shipment_model','shipment');
        $last_id = $this->shipment->get_last_id_num();
        $new_id =(int)$last_id+1;
        $date['shipment_id']='ES'.$new_id.'OUT';
        $date['create_time']=date('Y-m-d H:i:s');
        $this->shipment->add_new_shipment_list($date);
        redirect('/');
        
        
    }
    //删除单
    public function delete_shipment_list_info(){
        $dele_id = $this->uri->segment(3);
        $this->load->model('shipment_model','shipment');
        $this->shipment->delete_shipment_list_info_by_id($dele_id);
        redirect('/');
    }
    
    //========================货单列表 完成============================
    
    //========================海运费用 开始============================
    public function create_transport_fees(){
        $this->_header['meta']['title'] = '海运费用';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/login.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/gg.css');
        $date['list_id'] = $this->uri->segment(3);
        $date['shipment_id'] = $this->uri->segment(4);
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/home/transport_fees',$date);
    }
    public function add_transport_fees(){
        $this->load->model('shipment_model','shipment');
        $date['shipment_id'] = $this->input->post('shipment_id');
        $date['list_id'] = $this->input->post('list_id');
        $date['cargo_type'] = $this->input->post('cargo_type');
        $date['agent'] = $this->input->post('agent');
        $date['box_type'] = $this->input->post('box_type');
        $date['box_num'] = $this->input->post('box_num');
        $date['post_cost'] = $this->input->post('post_cost');
        $date['sea_cost'] = $this->input->post('sea_cost');
        $date['all_post_cost'] = $this->input->post('all_post_cost');
        $date['all_sea_cost'] = $this->input->post('all_sea_cost');
        $date['gain'] = $this->input->post('gain');
        $date['client'] = $this->input->post('client');
        $date['state'] = $this->input->post('state');
        $date['create_time'] = date('Y-m-d H:i:s');
        $re = $this->shipment->add_transport_fees($date);
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        if($date['state'] == '1'){
            $state = '1';
            $this->shipment->change_transport_fees_state_in_list($date['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_transport_fees_state_in_list($date['list_id'],$state);
        }
        redirect('/');
        
    }
    // <!-- phpDesigner :: Timestamp [2014/10/5 0:24:20] -->
    // <!-- phpDesigner :: Timestamp [2014/10/5 16:47:14] -->
    //更新前查看
    public function show_transport_fees(){
        $this->_header['meta']['title'] = '海运费用';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/login.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/gg.css');
        $list_id = $this->uri->segment(3);
        $this->load->model('shipment_model','shipment');
        $date['info_by_id'] = $this->shipment->get_fees_info_by_id($list_id);
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/home/update_transport_fees',$date);
        
    }
    //更新
    public function update_transport_fees(){
        $fees_id = $this->input->post('fees_id');
        
        $this->load->model('shipment_model','shipment');
        $date['shipment_id'] = $this->input->post('shipment_id');
        $date['list_id'] = $this->input->post('list_id');
        $date['cargo_type'] = $this->input->post('cargo_type');
        $date['agent'] = $this->input->post('agent');
        $date['box_type'] = $this->input->post('box_type');
        $date['box_num'] = $this->input->post('box_num');
        $date['post_cost'] = $this->input->post('post_cost');
        $date['sea_cost'] = $this->input->post('sea_cost');
        $date['all_post_cost'] = $this->input->post('all_post_cost');
        $date['all_sea_cost'] = $this->input->post('all_sea_cost');
        $date['gain'] = $this->input->post('gain');
        $date['client'] = $this->input->post('client');
        $date['state'] = $this->input->post('state');
        
        $re = $this->shipment->update_transport_fees($fees_id,$date);
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        if($date['state'] == '1'){
            $state = '1';
            $this->shipment->change_transport_fees_state_in_list($date['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_transport_fees_state_in_list($date['list_id'],$state);
        }
        redirect('/');
        
    }
    //海运费查看 
    public function show_transport_fees_for_sure(){
        $this->_header['meta']['title'] = '海运费用';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/login.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/gg.css');
        
        $list_id = $this->uri->segment(3);
        $this->load->model('shipment_model','shipment');
        $date['info_by_id'] = $this->shipment->get_fees_info_by_id($list_id);
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/home/show_transport_fees_for_sure',$date);
    }
    
    //========================海运费用 完成============================
    //========================报关前 开始============================
    //========================报关前 完成============================
    //========================报关中 开始============================
    public function create_middle_apply(){
        $this->_header['meta']['title'] = '报关中管理';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/login.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/gg.css');
        $date['list_id'] = $this->uri->segment(3);
        $date['shipment_id'] = $this->uri->segment(4);
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/home/middle_apply_state/middle_apply',$date);
        
    }
    
    public function add_middle_apply(){
        $this->load->model('shipment_model','shipment');
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
        $data['content'] = $this->input->post('content');
        $data['state'] = $this->input->post('state');
        $data['create_time'] = date("Y-m-d H:i:s");
        $re = $this->shipment->add_middle_apply($data);
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_middle_apply_state_in_list($data['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_middle_apply_state_in_list($data['list_id'],$state);
        }
        redirect('/');
        
    }
    
    public function show_middle_apply(){
        $this->_header['meta']['title'] = '报关中管理';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/login.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/gg.css');
        $this->load->model('shipment_model','shipment');
        $list_id = $this->uri->segment(3);
        
        $data['info_by_id'] = $this->shipment->get_middle_apply_by_id($list_id);
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/home/middle_apply_state/update_middle_apply',$data);
    }
    
    public function update_middle_apply(){
        $this->load->model('shipment_model','shipment');
        $id = $this->input->post('middle_id');
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
        $data['content'] = $this->input->post('content');
        $data['state'] = $this->input->post('state');
        $re = $this->shipment->update_middle_apply($id,$data);
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_middle_apply_state_in_list($data['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_middle_apply_state_in_list($data['list_id'],$state);
        }
        redirect('/');
    }
    
    public function show_middle_apply_for_sure(){
        $this->_header['meta']['title'] = '海运费用';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/login.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/gg.css');
        $this->load->model('shipment_model','shipment');
        $list_id = $this->uri->segment(3);
        
        $data['info_by_id'] = $this->shipment->get_middle_apply_by_id($list_id);
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/home/middle_apply_state/show_middle_apply_for_sure',$data);
        
    }
    

    
    //========================报关中 完成============================
    //========================提单转客户 开始============================
    public function bill_to_client(){
        $this->_header['meta']['title'] = '提单转客户管理';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/login.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/gg.css');
        $data['list_id'] = $this->uri->segment(3);
        $data['shipment_id'] = $this->uri->segment(4);
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/home/bill_to_client/bill_to_client',$data);
        
    }
    public function add_bill_to_client(){
        $this->load->model('shipment_model','shipment');
        $url = $this->input->post('img_url');
        //上传图片  
        $img_front = $this->upload_one_file('img_front',500000,'uploads/bill_to_client/',$url,'front');
        $img_back = $this->upload_one_file('img_back',500000,'uploads/bill_to_client/',$url,'back');
     
        $data['shipment_id'] = $this->input->post('shipment_id');
        $data['list_id'] = $this->input->post('list_id');
        $data['order_type'] = $this->input->post('order_type');
        $data['img_front'] = $img_front;
        $data['img_back'] = $img_back;
        $data['content'] = $this->input->post('content');
        $data['state'] = $this->input->post('state');
        $data['create_time'] = date("Y-m-d H:i:s");
        $re = $this->shipment->add_bill_to_client($data);
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_bill_state_in_list($data['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_bill_state_in_list($data['list_id'],$state);
        }
        redirect('/');
        
    }
    
    public function show_bill_to_client(){
        $this->_header['meta']['title'] = '提单转客户管理';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/login.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/gg.css');
        $this->load->model('shipment_model','shipment');
        $list_id = $this->uri->segment(3);
        $data['old_url'] ='noimg';
        $data['info_by_id'] = $this->shipment->get_bill_by_id($list_id);
        if($data['info_by_id'][0]->img_front !=false ){
           $temp = explode('/',$data['info_by_id'][0]->img_front);
           $data['old_url'] =  $temp[2].'/'.$temp[3].'/'.$temp[4].'/'.$temp[5].'/';
        }else if($data['info_by_id'][0]->img_back != false){
           $temp = explode('/',$data['info_by_id'][0]->img_back);
           $data['old_url'] =  $temp[2].'/'.$temp[3].'/'.$temp[4].'/'.$temp[5].'/';
        }
         
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/home/bill_to_client/update_bill_to_client',$data);
        
    }
    
    public function update_bill_to_client(){
        $this->load->model('shipment_model','shipment');
        $id = $this->input->post('id');
        $old_url = $this->input->post('old_url');
        $new_url = $this->input->post('new_url');
        $data['list_id'] = $this->input->post('list_id');
        if($old_url == 'noimg'){
            $img_front = $this->upload_one_file('img_front',500000,'uploads/bill_to_client/',$new_url,'front');
            $img_back = $this->upload_one_file('img_back',500000,'uploads/bill_to_client/',$new_url,'back');
     
        }else{
            $img_front = $this->upload_one_file('img_front',500000,'uploads/bill_to_client/',$old_url,'front');
            $img_back = $this->upload_one_file('img_back',500000,'uploads/bill_to_client/',$old_url,'back');
        }
       //var_dump($img_front);
        // var_dump($img_back);die();
        
        if($img_front!=false && $img_back !=false){
            $data['order_type'] = $this->input->post('order_type');
            $data['img_front'] = $img_front;
            $data['img_back'] = $img_back;
            $data['content'] = $this->input->post('content');
            $data['state'] = $this->input->post('state');
        }else if($img_front!=false && $img_back == false){
            $data['order_type'] = $this->input->post('order_type');
            $data['img_front'] = $img_front;
            $data['content'] = $this->input->post('content');
            $data['state'] = $this->input->post('state');
        }else if($img_back!=false && $img_front ==false){
            $data['order_type'] = $this->input->post('order_type');
            $data['img_back'] = $img_back;
            $data['content'] = $this->input->post('content');
            $data['state'] = $this->input->post('state');
        }else{
            $data['order_type'] = $this->input->post('order_type');
            $data['content'] = $this->input->post('content');
            $data['state'] = $this->input->post('state');
        }
        
        $re = $this->shipment->update_bill_to_client($id,$data);
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_bill_state_in_list($data['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_bill_state_in_list($data['list_id'],$state);
        }
        redirect('/');
        
    }
    
    public function show_bill_to_client_for_sure(){
        $this->_header['meta']['title'] = '提单转客户管理';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/login.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/gg.css');
        $this->load->model('shipment_model','shipment');
        $list_id = $this->uri->segment(3);
        $data['info_by_id'] = $this->shipment->get_bill_by_id($list_id);
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/home/bill_to_client/show_bill_to_client_for_sure',$data);
        
    }
    
    
    
    
    //========================提单转客户 完成============================
    //========================港杂费 开始============================
    // <!-- phpDesigner :: Timestamp [2014/10/6 20:09:24] -->
    public function sundries_fees(){
        $this->_header['meta']['title'] = '海运费管理';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/login.css');
        $this->_header['meta']['css'][] = addCss('/resource/css/gg.css');
        $this->load->model('shipment_model','shipment');
        $data['list_id'] = $this->uri->segment(3);
        $data['shipment_id'] = $this->uri->segment(4);
        $data['box_info'] = $this->shipment->get_box_info_from_transport_fees($data['list_id']);
        //var_dump($data['box_info']);die();
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/home/sundries_fees/sundries_fees',$data);
    }
    
    public function add_sundries_fees(){
        $this->load->model('shipment_model','shipment');
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
        $re = $this->shipment->add_sundries_fees($data);
        //在首次创建的时候如果 选择最终确定  也可以更改列表状态 将无法管理
        if($data['state'] == '1'){
            $state = '1';
            $this->shipment->change_sundries_fees_state_in_list($data['list_id'],$state);
            
        }else if($re == true){
            $state = '0';
            $this->shipment->change_sundries_fees_state_in_list($data['list_id'],$state);
        }
        redirect('/');
        
        
        
    
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //========================港杂费 完成============================
}



?>