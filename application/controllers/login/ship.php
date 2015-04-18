<?php
/**
*
* 船只 管理
* 
*/


if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include_once realpath(APPLICATION_CONTROLLERS) . '/base.php';

class Ship extends Base {

    public function __construct() {
        parent::__construct();
        //添加模块CSS样式表
        //$this->_header['meta']['css'][] = addCss('/resource/css/home.css');
        //$this->load->helper('url');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('ship_model','ship');
    }

    /**
    *
    * 船只 列表
    * 
    */
    public function ship_list($page='-99') {
        $this->_acl_login('loginuser');
        //$this->load->model('web_head_model');
        $this->_header['meta']['title'] = '船舶信息列表';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        
        //分页======
        if ($page !== '-99') {
            $pagenum = $page;
        } else {
            $pagenum = 1;
        }

        //设置每页分页显示数据条数


        $allnum = $this->ship->get_ship_num_m();
        $maxnum = 5;
        $config = $this->get_page($allnum, $maxnum, $pagenum,
            'login/ship/ship_list/', 4);
        $this->pagination->initialize($config);
        $data['allnum'] = $allnum;
        $data['page'] = $this->pagination->create_links();
        $data['info_list'] = $this->ship->get_ship_list_m($maxnum, $maxnum * ($pagenum -
            1));
        //分页结束======
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/ship/ship_list',$data);
    }
    
    /**
     *
     * 船只 新增
     * 
     * 
     **/
    public function add_ship()
    {
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '新增船舶信息';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/ship/add_ship');
    }
    /**
     *
     * 船只 新增
     * 
     * 
     **/
    public function do_add_ship(){
        $this->_acl_login('loginuser');
        
        $ship_name = htmlspecialchars(trim($this->input->post('ship_name')));
        $content = htmlspecialchars(trim($this->input->post('content')));
        $create_time = date('Y-m-d H:i:s');


        $upload_data = array(
            'ship_name' => $ship_name,
            'content' => $content,
            'create_time' => $create_time,
            );


        $this->ship->add_ship($upload_data);
        redirect('/login/ship/ship_list');
        
    }
    /**
     *
     * 船只 删除
     * 
     * 
     **/
    public function delete_ship($did = '-99'){
        $this->_acl_login('loginuser');

        if ($did !== '-99') {
            $d_id = $did;
        } else {
            show_404();
            return;
        }

        $this->ship->delete_ship_by_id($d_id);
         redirect('/login/ship/ship_list');
    }
    /**
     *
     * 船只 更新
     * 
     * 
     **/
     public function update_ship($did = '-99')
    {
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '新增船只管理';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');

        if ($did !== '-99') {
            $d_id = $did;
        } else {
            show_404();
            return;
        }

        $data['info'] = $this->ship->get_ship_info_by_id($d_id);

        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/ship/update_ship',$data);


    }
    /**
     *
     * 船只 更新
     * 
     * 
     **/
    public function do_update_ship()
    {
        $this->_acl_login('loginuser');

        $ship_name = htmlspecialchars(trim($this->input->post('ship_name')));
        $content = htmlspecialchars(trim($this->input->post('content')));
        $did = htmlspecialchars(trim($this->input->post('did')));

        $upload_data = array(
            'ship_name' => $ship_name,
            'content' => $content,
            );

        $this->ship->do_update_ship_by_id($upload_data, $did);
        redirect('/login/ship/ship_list');

    }
    
    


}

/** here is the end of this page**/
