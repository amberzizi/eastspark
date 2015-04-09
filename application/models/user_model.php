<?php

class User_model extends CI_Model {
    
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    /**
	 * 后台用户登录 制造token
	 * @param string $username  本次token
	 * @return 插入的token id
	 */        
    public function ser_token_create($token,$bind_session){
        //先删除以往没有被用到的同session token
        $this->check_same_session_and_delete($bind_session);
        $this->db->insert('es_user_login_token',array('token' => $token,'bind_session' => $bind_session));
        return $this->db->insert_id();
    }
    private function check_same_session_and_delete($bind_session){
        $this->db->delete('es_user_login_token',array('bind_session' => $bind_session));
    }
    
    /**
	 * 后台用户登录检验token
	 * @param string $username  token
     * @param string $password  tokenid
	 * @return 存在返回true 不存在返回false
	 */    
    public function check_token_if_exist($token,$tid,$session){
        $this->db->where(array('id' => $tid));
        $this->db->where(array('token' => $token));
        $this->db->where(array('bind_session' => $session));
        $this->db->from('es_user_login_token');
        $query = $this->db->get();
        $result = $query->result();
        if(count($result) == 0){
            return false;
        }else{
            return true;
        }
    }
    /**
	 *删除使用过的token
	 * @param string $username  tokenid
	 */
     public function delete_token($tid){
        $this->db->delete('es_user_login_token',array('id' => $tid));
     }
    
    /**
	 * 后台用户登录检验
	 * @param string $username  用户名
     * @param string $password  用户密码
	 * @return 存在返回该用户信息 不存在返回false
	 */
    public function check_username_password_login($username,$password){
        $this->db->where(array('username' => $username));
        $this->db->where(array('password' => $password));
        $this->db->from('es_user_login');
        $query = $this->db->get();
        $result = $query->result();
        if(count($result) == 0){
            return false;
        }else{
            return $result;
        }
        
    }
    
    /**
     * 保存用户本次登录的ip 时间
     * @param string 用户id
     * @param string IP地址
     * @param string 登录时间
	 * 
    */
    public function save_ip_logintime($id,$ip,$time){
        $data = array(
               'login_ip' => $ip,
               'login_time' => $time
            );

        $this->db->where(array('id' => $id));
        $this->db->update('es_user_login', $data); 
    }
    
    /**
     * 返回管理员数量
	 * @return 返回管理员总数量
    */
    public function get_loginadmin_num(){
        $this->db->from('es_user_login');
        $query = $this->db->count_all_results();
        return $query;
    }
    /**
    *分页展示，获取前台用户列表总数量
    *@param 每页显示数量
    *@param 页码 
    *@return 实际记录结果集
    */
    public function get_loginadmin_list($limit,$offset){
        $this->db->from('es_user_login');
        $this->db->order_by('id', 'desc');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
    *更改用户 状态为推荐状态  ifbest 1
    *@param userid
    *@return 影响行数
    */
    public function best_user_state($uid){
        $this->db->where(array('id' => $uid));
        $this->db->update('es_user_login',array('ifbest' => '1'));
        $query = $this->db->affected_rows();
        return $query;
    }
    
    /**
    *更改用户 状态为不推荐状态  ifbest 0
    *@param userid
    *@return 影响行数
    */
    public function clear_best_user_state($uid){
        $this->db->where(array('id' => $uid));
        $this->db->update('es_user_login',array('ifbest' => '0'));
        $query = $this->db->affected_rows();
        return $query;
    }
    /**
    *保存新的管理员
    *@param 管理员信息数组
    *@return 影响行数
    */
    public function save_new_admin_member($temp){
        $this->db->insert('es_user_login',$temp);
        $query = $this->db->affected_rows();
        return $query;
    }
    
    /**
    *更改管理员 状态为冻结状态  ifdel 1
    *@param userid
    *@return 影响行数
    */
    public function del_admin_state($uid){
        $this->db->where(array('id' => $uid));
        $this->db->update('es_user_login',array('ifdel' => '1'));
        $query = $this->db->affected_rows();
        return $query;
    }
    /**
    *更改管理员 状态为解冻状态  ifdel 0
    *@param userid
    *@return 影响行数
    */
    public function clear_del_admin_state($uid){
        $this->db->where(array('id' => $uid));
        $this->db->update('es_user_login',array('ifdel' => '0'));
        $query = $this->db->affected_rows();
        return $query;
    }
    
    /**
    *获取当前管理员权限
    *@param 管理员id
    *@return  权限json
    */
    public function get_admin_purviews_by_id($id){
        $this->db->select('purviews');
        $this->db->where(array('id' => $id));
        $this->db->from('es_user_login');
        $query = $this->db->get();
        return $query->result();
    }
    /**
    *更新当前管理员权限
    *@param 管理员id
    *@param 权限json
    *@return  影响行数
    */
    public function update_admin_purviews_by_id($id,$purviews){
        $this->db->where(array('id' => $id));
        $this->db->update('es_user_login',array('purviews' => $purviews));
        $query = $this->db->affected_rows();
        return $query;
    }
    
    /**
    *获取当前管理员资料
    *@param 管理员id
    *@return  资料数据集
    */
    public function get_admin_info_by_id($id){
        $this->db->where(array('id' => $id));
        $this->db->from('es_user_login');
        $query = $this->db->get();
        return $query->result();
    }
    /**
    *根据iD获取管理员密码
    *@param 管理员id
    *@return  资料数据集
    */
    public function get_admin_pw_by_id($id){
        $this->db->select('password');
        $this->db->where(array('id' => $id));
        $this->db->from('es_user_login');
        $query = $this->db->get();
        return $query->result();
    }
    /**
    *根据iD更新管理员信息
    *@param 管理员id
    *@return  影响行数
    */
    public function update_admin_info_by_id($id,$temp){
        $this->db->where(array('id' => $id));
        $this->db->update('es_user_login',$temp);
        $query = $this->db->affected_rows();
        return $query;
    }
    
}
/** here is end of the page**/