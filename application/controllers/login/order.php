<?php
include_once realpath(APPLICATION_CONTROLLERS) . '/base.php';

class Order extends Base{
    
    public function __construct(){
        parent::__construct();
        //$this->load->helper('url');
        //$this->load->library('session');
        //$this->load->library('pagination');
        
        
        
        
    }
    
    public function index(){
        $date['kk']='sdsdsd';
        $this->load->view('headfeet/head');
        $this->load->view('home/order',$date);
    }
    
    public function test_jq(){
        $this->_header['meta']['title'] = '货运管理列表';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery.test.js');
        $this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('home/test_jq');
    }
}

    



?>