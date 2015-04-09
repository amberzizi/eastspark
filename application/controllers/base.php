<?php

class Base extends CI_Controller {
    //页头数据
    protected $_header = null;
    //页脚数据
    protected $_footer = null;
    //构造函数
    public function __construct() {
        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('url');
        //$this->load->helper('cookie');
        //$this->load->library('session');
        
        //全站默认描述和关键字
        $this->_header['meta']['description'] = '货运管理';
        $this->_header['meta']['keywords'] = '货运管理';
        //载入全局CSS样式表
        //$this->_header['meta']['css'][] = addCss('/resource/css/global.css');
        //载入全局JS脚本
        //$this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.9.1.js');
        //载入外部库
        //错误处理
        if (isset($_GET['error'])) {
            $this->_header['error'] = $_GET['error'];
        }
        if (isset($_GET['tag'])) {
            $this->_header['tag'] = $_GET['tag'];
        }
        
    }
     ///检验前台权限
    protected function _front($code = null) {
        if($this->session->userdata('front_userid')!=null){
            return true;    
        }else{
            redirect('/user/login');
            exit();
        }
    }
    /**
    *后台用户登录状态检查
    * 
    **/
        protected function _acl_login($code = null) {
            if ($this->session->userdata('manager_uid')) {
                //超管
                if ($this->session->userdata('manager_uid') == "1") {
                    return true;
                    exit();
                } else {
                    $keyarray = array('indexuser', 'loginuser', 'house', 'community', 'datacount',);
                    if ($code == null) {
                        //无限权限制
                        return true;
                        exit();
                    } else if (in_array($code, $keyarray)) {
                        if ((isset($this->session->userdata['manager_purviews']->$code)) && ($this->session->userdata['manager_purviews']->$code == 1)) {
                            return true;
                            exit();
                        } else {
                            show_404(); //没有权限访问此模块，瞎打的
                            exit();
                        }
                    } else {
                        show_404(); //胡乱输入的模块
                        exit();
                    }
                }
            } else {
                //return true;
                redirect('/user/login_manager/admin_enter');
                exit();
            }
        }
    
        public function checkimg() {
        $path = $_POST['url'];
        $filesnames = scandir($path); //扫描文件夹内的文件名存入数组 $filesnames
        $imgs = NULL;
        foreach ($filesnames as $key => $value) {
            if ($value != '.' && $value != '..' && $value[0] != 'd' && $value[0] != 't') {
                $imgs[] = $value;
            }
        }
        $json = json_encode($imgs);
        echo $json;
    }
    
    //缩略侧视图
    //$url为原始图像地址
    //$width和$height为生成图像大小
    //$t_url为目标地址(target),建议为空
    protected function get_thumb($url,$width,$height,$t_url='') {// $url应该为相对地址
        if(!isset($url)||$url==null|$url==''){
            return 'url not give';
        }
        //未设置目标地址时，处理目标地址
        if($t_url==''){
            $arr= explode('/', $url);
            $arr[sizeof($arr)-1]='t'.$width.'x'.$height.'t'.$arr[sizeof($arr)-1];
            foreach ($arr as $value){
                $t_url.=$value.'/';
            }
            $t_url=  rtrim($t_url,'/');
        }
        //目标地址若存在，直接返回
        //路径确定存在的情况下，is_file比file_exists快14倍。
        //若路径不确定存在需改为file_exist。
        if(file_exists($t_url)){
            return $t_url;
        }
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $url;
        $config['new_image'] = $t_url;
        $config['thumb_marker'] = '';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $config['height'] = $height;
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        return $t_url;
    }
     public function isset_action($model){ //检测权限
        $keyarray = array('look'=>0,'add'=>0,'edit'=>0,'del'=>0,);
        foreach($keyarray as $key=>$val){
            if(in_array($key, $this->session->userdata['purviews']->input->$model)){//检测是否有对应的模块
                $keyarray[$key]=1; 
            }
        }
        return $keyarray;
    }
    function getip(){
        if($_SERVER['HTTP_CLIENT_IP']){
             $onlineip=$_SERVER['HTTP_CLIENT_IP'];
        }elseif($_SERVER['HTTP_X_FORWARDED_FOR']){
             $onlineip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
             $onlineip=$_SERVER['REMOTE_ADDR'];
        }
        return $onlineip;
    }
    function checkimgnum($url) {
        $basedir = dirname(dirname(dirname(__FILE__))).'/public';
        $path = $basedir.substr($url,0,-1);
        $filesnames = scandir($path); //扫描文件夹内的文件名存入数组 $filesnames
        $imgs = NULL;
        foreach ($filesnames as $key => $value) {
            if ($value != '.' && $value != '..' && $value[0] != 'd' && $value[0] != 't') {
                $imgs[] = $url.$value;
            }
        }
        return $imgs;
    }
    
    //公共方法
    
    // 上传单个文件的私有方法  返回新图片的存储地址
    protected function upload_one_file($filename, $size, $head_url, $url, $newname)
    {
        //过滤图片类型
        if ((($_FILES[$filename]["type"] == "image/gif") || ($_FILES[$filename]["type"] ==
            "image/jpeg") || ($_FILES[$filename]["type"] == "image/pjpeg")) && ($_FILES[$filename]["size"] <
            $size)) {
            //检测是否已经建立图片存放文件夹   建立
            if (!file_exists($head_url . $url)) {

                mkdir($head_url . $url, 0777, true);
            }
            //新路径和文件名
            $temp = explode('.', $_FILES[$filename]["name"]);
            $end_type = $temp[1];
            $new_file_url = $head_url . $url . $newname . '.' . $end_type;
            //转移文件
            move_uploaded_file($_FILES[$filename]["tmp_name"], $new_file_url);

            return $new_file_url;

        } else {

            return false;
        }
    }
    // 上传多个文件的私有方法  返回单次循环上传的图片的 存储地址 和 新名字 组成的关联数组
    protected function upload_one_files($filename, $size, $head_url, $url, $newname, $i)
    {
        $newname_arr = '';
        //过滤图片类型
        if ((($_FILES[$filename]["type"][$i] == "image/gif") || ($_FILES[$filename]["type"][$i] ==
            "image/jpeg") || ($_FILES[$filename]["type"][$i] == "image/pjpeg")) && ($_FILES[$filename]["size"][$i] <
            $size)) {
            //检测是否已经建立图片存放文件夹   建立
            if (!file_exists($head_url . $url)) {

                mkdir($head_url . $url, 0777, true);
            }
            //新路径和文件名
            $temp = explode('.', $_FILES[$filename]["name"][$i]);
            $end_type = $temp[1];
            $new_file_url_temp = $head_url . $url;
            $new_file_url = $head_url . $url . $newname . '.' . $end_type;
            $newname_temp = $newname . '.' . $end_type;
            //转移文件
            move_uploaded_file($_FILES[$filename]["tmp_name"][$i], $new_file_url);

            $img_arr = array(
                'new_url' => $new_file_url_temp,
                'new_name' => $newname_temp,
                );
            return $img_arr;

        } else {

            return false;
        }
    }
    
    /**
     *  分页方法 总数,每页显示数，页码,分页路径
     **/
    protected function get_page($allnum, $maxnum, $pagenum, $base, $segment = 3) {
        //分页----
        $config['base_url'] = base_url($base); //分页路径
        $config['uri_segment'] = $segment;
        $config['total_rows'] = $allnum;
        $config['per_page'] = $maxnum; //每页最大行数
        $config['use_page_numbers'] = true;
        $config['num_links'] = 5;
        //=$config['cur_tag_open'] = '<b>';
        $config['prev_link'] = '上一页'; //关闭上一页
        $config['next_link'] = '下一页'; //关闭下一页
        $config['cur_tag_open'] = '<a class="page_on">'; //自定义当前页
        $config['cur_tag_close'] = '</a>'; //自定义当前页
        $config['last_link'] = '尾页';
        $config['first_link'] = '首页';
        return $config;
        //返回配置变量数组
    }
    
    
}

?>