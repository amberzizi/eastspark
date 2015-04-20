<?php
/**
*
* 报价管理
* 
*/


if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include_once realpath(APPLICATION_CONTROLLERS) . '/base.php';

class Quoted_price extends Base{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('price_model','price');
    }
    /**
     *
     * 报价 列表
     * 
     * 
     **/
    public function price_list($page = '-99'){
         $this->_acl_login('loginuser');
        //$this->load->model('web_head_model');
        $this->_header['meta']['title'] = '历史报价列表';
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


        $allnum = $this->price->get_price_num_m();
        $maxnum = 5;
        $config = $this->get_page($allnum, $maxnum, $pagenum,
            'login/quoted_price/price_list/', 4);
        $this->pagination->initialize($config);
        $data['allnum'] = $allnum;
        $data['page'] = $this->pagination->create_links();
        $data['info_list'] = $this->price->get_price_list_m($maxnum, $maxnum * ($pagenum -
            1));
        //分页结束======
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/price/price_list',$data);
    }
    
    /**
     *
     * 报价 新增
     * 
     * 
     **/
    public function add_price()
    {
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '新增报价信息';
        $this->_header['meta']['keywords'] = '伊斯';
        $this->_header['meta']['description'] = '伊斯';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/price/add_price');
    }
    /**
     *
     * 报价 新增
     * 
     * 
     **/
    public function do_add_price(){
        $this->_acl_login('loginuser');
        
        $price = htmlspecialchars(trim($this->input->post('price')));
        $content = htmlspecialchars(trim($this->input->post('content')));
        $create_time = date('Y-m-d H:i:s');


        $upload_data = array(
            'price' => $price,
            'content' => $content,
            'create_time' => $create_time,
            );


        $this->price->add_price($upload_data);
        redirect('/login/quoted_price/price_list');
        
    }
    
    /**
     *
     * 报价 删除
     * 
     * 
     **/
    public function delete_price($did = '-99'){
        $this->_acl_login('loginuser');

        if ($did !== '-99') {
            $d_id = $did;
        } else {
            show_404();
            return;
        }

        $this->price->delete_price_by_id($d_id);
         redirect('/login/quoted_price/price_list');
    }
    /**
     *
     * 报价 更新
     * 
     * 
     **/
     public function update_price($did = '-99')
    {
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '新增报价管理';
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

        $data['info'] = $this->price->get_price_info_by_id($d_id);

        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/price/update_price',$data);


    }
    /**
     *
     * 报价 更新
     * 
     * 
     **/
    public function do_update_price()
    {
        $this->_acl_login('loginuser');

        $price = htmlspecialchars(trim($this->input->post('price')));
        $content = htmlspecialchars(trim($this->input->post('content')));
        $did = htmlspecialchars(trim($this->input->post('did')));

        $upload_data = array(
            'price' => $price,
            'content' => $content,
            );

        $this->price->do_update_price_by_id($upload_data, $did);
        redirect('/login/quoted_price/price_list');

    }
}

/** here is the end of this page**/