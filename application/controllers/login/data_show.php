<?php
/**
 * 
 * 
 * 数据展示模块
 *
 **/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include_once realpath(APPLICATION_CONTROLLERS) . '/base.php';

class Data_show extends Base{
        
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('data_show_model','datashow');
        
    }
        
     /**
     * 提供给订舱代理的表格
     * @param 搜索注册时间区间
     */
     public function show_container_table_for_agent(){
     //$this->_acl_login('data_show');
        $this->_acl_login();   
        
        $this->_header['meta']['title'] = '订舱代理开票';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';

        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-slide.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-timepicker-addon.js');
        
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/data_show/agent/show_limited_time');
        
        
     }
     
     public function check_table_for_agent(){
        //$this->_acl_login('data_show');
        $this->_acl_login();   
        
        $this->_header['meta']['title'] = '订舱代理开票';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
  
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');

        
        $begin = htmlspecialchars(trim($this->input->post('begin')));
        $end = htmlspecialchars(trim($this->input->post('end')));
        //查看时间段内记录
        try{
            $data['info'] = $this->datashow->check_for_agent($begin,$end);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        $data['all_box']=0;
        $data['all_fees']=0;
        for($i=0;$i<count($data['info']);$i++){
            $data['all_fees']+=(float)$data['info'][$i]->boxs_fees_out;
        }
        //var_dump($result);
        
        $this->load->view('/headfeet/no_style_head',$this->_header);
        $this->load->view('/login/data_show/agent/show_table',$data);
     }
        
    /**
     * 提供给订舱代理的表格
     * @param 搜索注册时间区间
     */
     public function show_container_table_for_agent_transport(){
     //$this->_acl_login('data_show');
        $this->_acl_login();   
        
        $this->_header['meta']['title'] = '订舱代理开票-国际运费';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';

        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-slide.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/timepicker/js/jquery-ui-timepicker-addon.js');
        
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        $this->_header['meta']['css'][] = addCss('/resource/timepicker/css/jquery-ui.css');
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/data_show/agent/show_limited_time_transport');
        
        
     }
         
        
     public function check_table_for_agent_transport(){
        //$this->_acl_login('data_show');
        $this->_acl_login();   
        
        $this->_header['meta']['title'] = '订舱代理开票';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
  
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');

        
        $begin = htmlspecialchars(trim($this->input->post('begin')));
        $end = htmlspecialchars(trim($this->input->post('end')));
        //查看时间段内记录
        try{
            $data['info'] = $this->datashow->check_for_agent_transport($begin,$end);
            
        }catch(Exception $e){
            show_404();
            die();
        }
        $data['all_box']=0;
        $data['all_fees']=0;
        for($i=0;$i<count($data['info']);$i++){
            $data['all_fees']+=(float)$data['info'][$i]->all_post_cost;
        }
        //var_dump($result);
        
        $this->load->view('/headfeet/no_style_head',$this->_header);
        $this->load->view('/login/data_show/agent/show_table_transport',$data);
     }   
        
        
        
        
        
        
        
}


























/** here is the end of this page**/