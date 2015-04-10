<?php
/**
 * 后台管理者 后台登录
 * 
 * 
 * 
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
include_once realpath(APPLICATION_CONTROLLERS) . '/base.php';
//include_once dirname(dirname(__FILE__)).'/codereturn/code_return.php';
include_once realpath(APPLICATION_CONTROLLERS) . '/inc/allset.inc';//引入后 相当于本控制器的全局变量

class Login_manager extends Base {
    
    private $SALT = 'e10adc3949ba59abbe56e057f20f883e';
    
    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('session');
        //$this->load->helper('url');
       // $this->load->model('admin_login_model','manager');
       $this->load->model('user_model','manager');
    }
    
    
    public function index(){
        $this->_header['meta']['title'] = WEBSET_NAME;
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');

        //echo Code_return::$OK; 
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/login/ad_enter.php');
    }
    
    /**
     * 后台管理者登录页
     */
    public function admin_enter($check = '0'){
        
        $this->_header['meta']['title'] = WEBSET_NAME;
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery.md5.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        //生成随机token
        $temp = time();
        $data['token'] = md5($temp);
        //获取当前session 用来鉴别删除未使用的token
        $data['bind_session'] = $this->session->userdata('session_id');
        //将颁发给客户端 用来防replay的参数存入数据库（同时删除相同session的以往token） 获取提取id
        $data['token_id'] = $this->manager->ser_token_create($data['token'], $data['bind_session']);
        
        //用户登录各类错误提示标志
        $data['check'] = 'nowrong';
        if ($check == 'cap') {
            $data['check'] = 'capwrong';
        } else
            if ($check == 'upw') {
                $data['check'] = 'upwrong';
            } else
                if ($check == 'namw') {
                    $data['check'] = 'namewrong';
                } else
                    if ($check == 'del') {
                        $data['check'] = 'delwrong';
                    }
        $this->load->view('headfeet/head',$this->_header);
        $this->load->view('/login/ad_enter.php',$data);
    }
    
    /**
     * 获取验证码
     * @author Patrick Lyon <348963373@qq.com>
     * @version 20130930
     */
    public function captcha($width, $height)
    {
        $this->load->library('captcha');
        $this->captcha->init(array(
            'width' => $width,
            'height' => $height,
            'length' => 4,
            'fontPath' => './fonts/Comicbd.ttf'));
        $image = $this->captcha->generate();
        $this->session->set_userdata(array('captcha' => array($this->captcha->code)));
    }
    
    /**
     * 用户登录 检验验证码
     * @return 正确 true  错误false
     */
    private function check_captcha()
    {
        $session = $this->session->userdata('captcha');
        if (strtolower($this->input->post('captcha')) !== strtolower($session[0])) {
            return false;
        } else {
            return true;
        }
    }
    
    /**
     * 后台管理者登录验证方法
     */
    public function check_admin_info(){
        
        //=====用户登录验证码检查
        if(!$this->check_captcha()){
            //验证码错误 跳转回管理者登陆页
            redirect('/user/login_manager/admin_enter/cap');
            return;
        }
        //=====用户登录 防replay 唯一性token检验
        if (!$this->check_token()) {
         
            $this->logger('后台用户登录 防replay 唯一性token检验，有可能受到replay攻击');
            redirect('/user/login_manager/admin_enter');
            return;
        }
        
        $username = htmlspecialchars(trim($this->input->post('username')));
        $password = md5($this->SALT . trim($this->input->post('password')));
   
        //=====验证密码是否正确
        $check_result = $this->manager->check_username_password_login($username, $password);
        //=====用户密码错误登录失败 跳转
        if (!$check_result) {
        
           redirect('/user/login_manager/admin_enter/upw');
           return;     
        }
        //=====用户是否被冻结
        if($check_result[0]->ifdel == '1'){
            redirect('/user/login_manager/admin_enter/del');
           return;  
        }
        //=====登录成功 绑定session
            $this->session->set_userdata('manager_uid', $check_result[0]->id);
            $this->session->set_userdata('manager_uname', $check_result[0]->name);
            $this->session->set_userdata('manager_purviews', json_decode($check_result[0]->purviews));
       //=====存入此次登录的 loginip 登录时间等信息
            $ip = $this->session->userdata('ip_address');
            $nowtime = date('Y-m-d H:i:s');
            $this->save_session_ip_logintime($check_result[0]->id, $ip, $nowtime);
            //登录成功后跳转到控制台
            redirect('/login/login_control_board');

    }
    
    
    /**
     *功能1.0
     * 销毁管理用户登录SESSION
     */
    public function remove_session()
    {
        $this->session->sess_destroy();
        redirect('/user/login_manager/admin_enter');
    }

    /**
     *功能2.0
     * 展示后台管理人员列表
     */
    public function show_login_admin_list($page='-99'){
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '用户资料及权限管理';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');
        
        $data['manager_uname'] = $this->session->userdata('manager_uname');
        
        //=====分页========
        $pagenum = '';
        if ($page === '-99') {
            $pagenum = 1;
        } else {
            $pagenum = $page;
        }
        //设置每页分页显示数据条数
        //if($this->uri->segment(3) !== false){
        //    $this->list_num = (int)$this->uri->segment(3);
        //}
        
        $allnum = $this->manager->get_loginadmin_num();
        $maxnum = '5';
        $config = $this->get_page($allnum, $maxnum, $pagenum, '/user/login_manager/show_login_admin_list/',4);
        $this->pagination->initialize($config);
        $data['allnum'] = $allnum;
        $data['page'] = $this->pagination->create_links();
        $data['info_list'] = $this->manager->get_loginadmin_list($maxnum, $maxnum * ($pagenum - 1));
        //总页码
        $data['allpage']= ceil($allnum/$maxnum);
        //分页结束======
        
        //当无信息展示的时候  标志变量
        $data['list_if_none']='no';
        if($allnum == '0'){
            $data['list_if_none']='yes';
        }
        
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/admin/admin_list',$data);
    }
    
    /**
     * 功能3.0
     * 更改指定用户 为推荐
     * @param userid
     */
    public function best_user($uid='-99'){
        $this->_acl_login('loginuser');

        
        if($uid !== '-99'){
            $result = $this->manager->best_user_state($uid);
        }else{
            show_404();
            return;
        }
        
        if($result > 0){
           redirect('/user/login_manager/show_login_admin_list'); 
        }else{
            show_404();
            return;
        }
        
    }
    /**
     * 功能3.1
     * 更改指定用户 取消推荐
     * @param userid
     */
    public function clear_best_user($uid='-99'){
        $this->_acl_login('loginuser');

        
        if($uid !== '-99'){
            $result = $this->manager->clear_best_user_state($uid);
        }else{
            show_404();
            return;
        }
        
        if($result > 0){
           redirect('/user/login_manager/show_login_admin_list'); 
        }else{
            show_404();
            return;
        }
    }
    
    
    /**
     * 功能4.0
     * 更改指定管理员 为冻结状态
     * @param userid
     */
    public function del_admin($uid='-99'){
        $this->_acl_login('loginuser');

        if($uid !== '-99'){
            $result = $this->manager->del_admin_state($uid);
        }else{
            show_404();
            return;
        }
        
        if($result > 0){
           redirect('/user/login_manager/show_login_admin_list'); 
        }else{
            show_404();
            return;
        }
        
    }
    /**
     * 功能4.1
     * 更改指定管理员 为解冻状态
     * @param userid
     */
    public function clear_del_admin($uid='-99'){
        $this->_acl_login('loginuser');
        if($uid !== '-99'){
            $result = $this->manager->clear_del_admin_state($uid);
        }else{
            show_404();
            return;
        }
        
        if($result > 0){
           redirect('/user/login_manager/show_login_admin_list'); 
        }else{
            show_404();
            return;
        }
    }
    
    /**
     * 功能5.0
     *新增一个后台管理人员
     */
    public function create_login_admin(){
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '用户资料及权限管理';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery.md5.js');
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');

        $data['manager_uname'] = $this->session->userdata('manager_uname');
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/admin/create_login_admin',$data);
    }
    
    /**
     * 功能5.1
     *保存新增的管理人员信息
     */
    public function save_new_login_admin(){
        $this->_acl_login('loginuser');
        
        
        $temp = array('username' => htmlspecialchars(trim($this->input->post('username'))),
                        'password' => md5($this->SALT.trim($this->input->post('password'))),
                        'name' => htmlspecialchars(trim($this->input->post('name'))),
                        'phone' => htmlspecialchars(trim($this->input->post('phone'))),
                        'company_phone' => htmlspecialchars(trim($this->input->post('company_phone'))),
                        'promise' => htmlspecialchars(trim($this->input->post('promise'))),
                        'create_time' => date('Y-m-d H:i:s')
                        );
       $result = $this->manager->save_new_admin_member($temp);
       
       if($result > 0){
           redirect('/user/login_manager/show_login_admin_list'); 
        }else{
            show_404();
            return;
        }
        
    }
    /**
     * 功能5.2
     *编辑 新增管理人员 权限
     */
    public function change_admin_purviews($id='-99'){
        $this->_acl_login('loginuser');

        $this->_header['meta']['title'] = '用户资料及权限管理';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');

        $data['manager_uname'] = $this->session->userdata('manager_uname');
        
        if($id !== '-99'){
            $data['id'] = $id;
        }else{
            show_404();
            return;
        }
        
        //获取管理人员当前权限
        $result = $this->manager->get_admin_purviews_by_id($data['id']);
        if(!is_null($result[0]->purviews)){
            $data['purviews'] = $result[0]->purviews;
        }else{
            $data['purviews'] = 'no_purviews';
        }
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/admin/change_admin_purviews',$data);
    }
    /**
     * 功能5.3
     *保存 管理人员 权限 变更
     */
    public function save_admin_purviews(){
        $this->_acl_login('loginuser');
        
        $id = $this->input->post('id'); 
    
        if($this->input->post('val')){
            $purviews = json_encode($this->input->post('val'));
        }else{
            $purviews = null;
        }
        
        //更新管理人员权限
        $result = $this->manager->update_admin_purviews_by_id($id,$purviews);
        
        
           redirect('/user/login_manager/show_login_admin_list'); 

    }
    
    /**
     * 功能5.4
     *编辑 管理人员信息
     */
     public function change_admin_info($id='-99'){
        $this->_acl_login('loginuser');
        
        $this->_header['meta']['title'] = '用户资料及权限管理';
        $this->_header['meta']['js'][] = addJs('/resource/js/jquery-1.11.1.min.js');
        $this->_header['meta']['js'][] = addJs('/resource/bootstrap-3.3.4-dist/js/bootstrap.min.js');
        $this->_header['meta']['css'][] = addCss('/resource/bootstrap-3.3.4-dist/css/bootstrap.css');


        $data['manager_uname'] = $this->session->userdata('manager_uname');
        
        if($id !== '-99'){
            $data['id'] = $id;
        }else{
            show_404();
            return;
        }
        
        //获取管理人员资料
        $data['admin_info'] = $this->manager->get_admin_info_by_id($data['id']);
        
        $this->load->view('/headfeet/control_head',$this->_header);
        $this->load->view('/login/admin/change_admin_info',$data);
        
     }
     /**
     * 功能5.5
     *保存 管理人员信息更改
     */
     public function save_login_admin_info_change(){
        $this->_acl_login('loginuser');
        
        $id = $this->input->post('id'); 
        
        //var_dump($this->input->post('password'));
        
        $password = $this->input->post('password');
        $admin = $this->manager->get_admin_pw_by_id($id);
        if($password!=$admin[0]->password){
          $password = md5($this->SALT.md5($this->input->post('password')));  
        }else{
          $password =  $admin[0]->password; 
        }
        
        $temp = array('username' => htmlspecialchars(trim($this->input->post('username'))),
                        'password' => $password,
                        'name' => htmlspecialchars(trim($this->input->post('name'))),
                        'phone' => htmlspecialchars(trim($this->input->post('phone'))),
                        'company_phone' => htmlspecialchars(trim($this->input->post('company_phone'))),
                        'promise' => htmlspecialchars(trim($this->input->post('promise'))),
                        );
        $result = $this->manager->update_admin_info_by_id($id,$temp);
        
        
        redirect('/user/login_manager/show_login_admin_list'); 
       
     }
     
    /**
     * 保存用户本次登录的ip 时间
     * @param string 用户id
     * @param string IP地址
     * @param string 登录时间
     * 
     */
    private function save_session_ip_logintime($uid, $ip, $nowtime)
    {
        $this->manager->save_ip_logintime($uid, $ip, $nowtime);

    }
    /**
     * 服务器端获取 客户端提交的token 和tokenid
     * 防重发 验证token（同session的token只会保留最后一个）
     * 验证成功后删除该token 
     * 每日应该定时 清空mmf_user_index_token  做数据库计划任务  0点清空
     */
    private function check_token()
    {
        //更改为 采用hidden表单提交到服务器
        // var_dump($token = $this->session->userdata('index_token'));die();
        if ($this->input->post('token') == '' || $this->input->post('token_id') == '') {
            return false;
        }

        $token = $this->input->post('token');
        $tid = $this->input->post('token_id');

        $bind_session = $this->session->userdata('session_id');
        $result = $this->manager->check_token_if_exist($token, $tid, $bind_session);
        if ($result) {
            $this->manager->delete_token($tid);
            return $result;
        } else {
            return false;
        }
    }
    /**
     * 日志打印
     * 
     */
    private function logger($log_content = '日志测试')
    {
        $log_filename = dirname(dirname(dirname(__file__))) .
            '/logs/admin_enter_exception/' . date("Ymd") . ".log";
        $file = fopen($log_filename, "a+");
        fwrite($file, date('H:i:s') . " " . $log_content . "\r\n");
        fclose($file);

    }


}

/* End of file login_manager.php */