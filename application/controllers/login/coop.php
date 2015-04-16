<?php
/**
*
* 合作代理  客户  管理
* 
*/


if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include_once realpath(APPLICATION_CONTROLLERS) . '/base.php';

class Coop extends Base {

    public function __construct() {
        parent::__construct();
        //添加模块CSS样式表
        //$this->_header['meta']['css'][] = addCss('/resource/css/home.css');
        //$this->load->helper('url');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('coop_model','coop');
    }


    public function index() {
        $this->_acl_login('loginuser');
        //$this->load->model('web_head_model');
        $this->_header['meta']['title'] = '合作伙伴管理';
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
    /**
    *
    * 订舱代理  列表
    * 
    */
    public function coop_com_list($page='-99') {
        $this->_acl_login('loginuser');
        //$this->load->model('web_head_model');
        $this->_header['meta']['title'] = '订舱代理管理';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        //$this->load->view('templates/header', $this->_header);
       // $this->load->view('templates/home', $data);
        //$this->load->view('templates/footer');
        
        
        //分页======
        if ($page !== '-99') {
            $pagenum = $page;
        } else {
            $pagenum = 1;
        }

        //设置每页分页显示数据条数


        $allnum = $this->coop->get_com_num_m();
        $maxnum = 5;
        $config = $this->get_page($allnum, $maxnum, $pagenum,
            'login/coop/coop_com_list/', 4);
        $this->pagination->initialize($config);
        $data['allnum'] = $allnum;
        $data['page'] = $this->pagination->create_links();
        $data['info_list'] = $this->coop->get_com_list_m($maxnum, $maxnum * ($pagenum -
            1));
        //分页结束======
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/coop_corp/booking_agent',$data);
    }
    
    /**
     *
     * 订舱代理 新增
     * 
     * 
     **/
    public function add_coop()
    {
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '新增订舱代理管理';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/coop_corp/add_booking_agent');
    }
    /**
     *
     * 订舱代理 新增
     * 
     * 
     **/
    public function do_add_coop(){
        $this->_acl_login('loginuser');
        
        $coop_name = htmlspecialchars(trim($this->input->post('coop_name')));
        $content = htmlspecialchars(trim($this->input->post('content')));
        $create_time = date('Y-m-d H:i:s');


        $upload_data = array(
            'coop_name' => $coop_name,
            'content' => $content,
            'create_time' => $create_time,
            );


        $this->coop->add_coop_com($upload_data);
        redirect('/login/coop/coop_com_list');
        
    }
    /**
     *
     * 订舱代理 删除
     * 
     * 
     **/
    public function delete_coop_com($did = '-99'){
        $this->_acl_login('loginuser');

        if ($did !== '-99') {
            $d_id = $did;
        } else {
            show_404();
            return;
        }

        $this->coop->delete_coop_com_by_id($d_id);
         redirect('/login/coop/coop_com_list');
    }
    /**
     *
     * 订舱代理 更新
     * 
     * 
     **/
     public function update_coop_com($did = '-99')
    {
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '新增订舱代理管理';
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

        $data['info'] = $this->coop->get_coop_com_info_by_id($d_id);

        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/coop_corp/update_booking_agent',$data);


    }
    /**
     *
     * 订舱代理 更新
     * 
     * 
     **/
    public function do_update_coop_com()
    {
        $this->_acl_login('loginuser');

        $coop_name = htmlspecialchars(trim($this->input->post('coop_name')));
        $content = htmlspecialchars(trim($this->input->post('content')));
        $did = htmlspecialchars(trim($this->input->post('did')));

        $upload_data = array(
            'coop_name' => $coop_name,
            'content' => $content,
            );

        $this->coop->do_update_coop_com_by_id($upload_data, $did);
        redirect('/login/coop/coop_com_list');

    }
    
    
    //====客户=======
    
    /**
    *
    * 客户  列表
    * 
    */
    public function coop_client_list($page='-99') {
        $this->_acl_login('loginuser');
        //$this->load->model('web_head_model');
        $this->_header['meta']['title'] = '订舱代理管理';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        //$this->load->view('templates/header', $this->_header);
       // $this->load->view('templates/home', $data);
        //$this->load->view('templates/footer');
        
        
        //分页======
        if ($page !== '-99') {
            $pagenum = $page;
        } else {
            $pagenum = 1;
        }

        //设置每页分页显示数据条数


        $allnum = $this->coop->get_client_num_m();
        $maxnum = 5;
        $config = $this->get_page($allnum, $maxnum, $pagenum,
            'login/coop/coop_client_list/', 4);
        $this->pagination->initialize($config);
        $data['allnum'] = $allnum;
        $data['page'] = $this->pagination->create_links();
        $data['info_list'] = $this->coop->get_client_list_m($maxnum, $maxnum * ($pagenum -
            1));
        //分页结束======
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/coop_corp/coop_client',$data);
    }
    
    /**
     *
     * 客户 新增
     * 
     * 
     **/
    public function add_client()
    {
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '新增订舱代理管理';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/coop_corp/add_client');
    }
    /**
     *
     * 客户 新增
     * 
     * 
     **/
    public function do_add_client(){
        $this->_acl_login('loginuser');
        
        $coop_client = htmlspecialchars(trim($this->input->post('coop_client')));
        $content = htmlspecialchars(trim($this->input->post('content')));
        $create_time = date('Y-m-d H:i:s');


        $upload_data = array(
            'coop_client' => $coop_client,
            'content' => $content,
            'create_time' => $create_time,
            );


        $this->coop->add_coop_client($upload_data);
        redirect('/login/coop/coop_client_list');
        
    }
    /**
     *
     * 客户 删除
     * 
     * 
     **/
    public function delete_coop_client($did = '-99'){
        $this->_acl_login('loginuser');

        if ($did !== '-99') {
            $d_id = $did;
        } else {
            show_404();
            return;
        }

        $this->coop->delete_coop_client_by_id($d_id);
         redirect('/login/coop/coop_client_list');
    }
    /**
     *
     * 客户 更新
     * 
     * 
     **/
     public function update_coop_client($did = '-99')
    {
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '新增订舱代理管理';
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

        $data['info'] = $this->coop->get_coop_client_info_by_id($d_id);

        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/coop_corp/update_coop_client',$data);


    }
    /**
     *
     * 客户 更新
     * 
     * 
     **/
    public function do_update_coop_client()
    {
        $this->_acl_login('loginuser');

        $coop_client = htmlspecialchars(trim($this->input->post('coop_client')));
        $content = htmlspecialchars(trim($this->input->post('content')));
        $did = htmlspecialchars(trim($this->input->post('did')));

        $upload_data = array(
            'coop_client' => $coop_client,
            'content' => $content,
            );

        $this->coop->do_update_coop_client_by_id($upload_data, $did);
        redirect('/login/coop/coop_client_list');

    }
    
    
    
        //====港口=======
    
    /**
    *
    * 港口  列表
    * 
    */
    public function coop_harbour_list($page='-99') {
        $this->_acl_login('loginuser');
        //$this->load->model('web_head_model');
        $this->_header['meta']['title'] = '订舱代理管理';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        //$this->load->view('templates/header', $this->_header);
       // $this->load->view('templates/home', $data);
        //$this->load->view('templates/footer');
        
        
        //分页======
        if ($page !== '-99') {
            $pagenum = $page;
        } else {
            $pagenum = 1;
        }

        //设置每页分页显示数据条数


        $allnum = $this->coop->get_harbour_num_m();
        $maxnum = 5;
        $config = $this->get_page($allnum, $maxnum, $pagenum,
            'login/coop/coop_harbour_list/', 4);
        $this->pagination->initialize($config);
        $data['allnum'] = $allnum;
        $data['page'] = $this->pagination->create_links();
        $data['info_list'] = $this->coop->get_harbour_list_m($maxnum, $maxnum * ($pagenum -
            1));
        //分页结束======
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/coop_corp/coop_harbour',$data);
    }
    
    /**
     *
     * 港口 新增
     * 
     * 
     **/
    public function add_harbour()
    {
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '新增订舱代理管理';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/coop_corp/add_harbour');
    }
    /**
     *
     * 港口 新增
     * 
     * 
     **/
    public function do_add_harbour(){
        $this->_acl_login('loginuser');
        
        $coop_harbour = htmlspecialchars(trim($this->input->post('coop_harbour')));
        $content = htmlspecialchars(trim($this->input->post('content')));
        $create_time = date('Y-m-d H:i:s');


        $upload_data = array(
            'coop_harbour' => $coop_harbour,
            'content' => $content,
            'create_time' => $create_time,
            );


        $this->coop->add_coop_harbour($upload_data);
        redirect('/login/coop/coop_harbour_list');
        
    }
    /**
     *
     * 港口 删除
     * 
     * 
     **/
    public function delete_coop_harbour($did = '-99'){
        $this->_acl_login('loginuser');

        if ($did !== '-99') {
            $d_id = $did;
        } else {
            show_404();
            return;
        }

        $this->coop->delete_coop_harbour_by_id($d_id);
         redirect('/login/coop/coop_harbour_list');
    }
    /**
     *
     * 港口 更新
     * 
     * 
     **/
     public function update_coop_harbour($did = '-99')
    {
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '新增订舱代理管理';
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

        $data['info'] = $this->coop->get_coop_harbour_info_by_id($d_id);

        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/coop_corp/update_coop_harbour',$data);


    }
    /**
     *
     * 港口 更新
     * 
     * 
     **/
    public function do_update_coop_harbour()
    {
        $this->_acl_login('loginuser');

        $coop_harbour = htmlspecialchars(trim($this->input->post('coop_harbour')));
        $content = htmlspecialchars(trim($this->input->post('content')));
        $did = htmlspecialchars(trim($this->input->post('did')));

        $upload_data = array(
            'coop_harbour' => $coop_harbour,
            'content' => $content,
            );

        $this->coop->do_update_coop_harbour_by_id($upload_data, $did);
        redirect('/login/coop/coop_harbour_list');

    }

}

/** here is the end of this page**/
