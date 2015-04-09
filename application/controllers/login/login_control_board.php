<?php
/**
*
* 后台管理面板
* 
*/


if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include_once realpath(APPLICATION_CONTROLLERS) . '/base.php';

class Login_control_board extends Base {

    public function __construct() {
        parent::__construct();
        //添加模块CSS样式表
        //$this->_header['meta']['css'][] = addCss('/resource/css/home.css');
        //$this->load->helper('url');
        $this->load->library('session');
        $this->load->library('pagination');
    }


    public function index() {
        $this->_acl_login('indexuser');
        //$this->load->model('web_head_model');
        $this->_header['meta']['title'] = '后台控制面板';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        //$this->load->view('templates/header', $this->_header);
       // $this->load->view('templates/home', $data);
        //$this->load->view('templates/footer');
        
        
        $data['manager_uname'] = $this->session->userdata('manager_uname');
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/control_board',$data);
    }

}

?>
