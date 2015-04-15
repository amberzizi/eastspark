<?php

class Coop_model extends CI_Model {
    
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
     /**
	 * 订舱代理 新增
	 */       
    public function add_coop_com($data){
        $this->db->insert('es_coop_com',$data);
    }
    /**
	 * 订舱代理 数量  分页结果集
	 */ 
    public function get_com_num_m(){
        $this->db->from('es_coop_com');
        $query = $this->db->count_all_results();
        return $query;
    }
    public function get_com_list_m($limit, $offset){
        $this->db->from('es_coop_com');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * 订舱代理 删除
	 */
    public function delete_coop_com_by_id($d_id){
        $this->db->delete('es_coop_com',array('id' => $d_id));
    }
    
    /**
	 * 订舱代理 根据ID 获取信息
	 */
    public function get_coop_com_info_by_id($d_id){
        $this->db->from('es_coop_com');
        $this->db->where(array('id' => $d_id));
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
	 * 订舱代理 更新 根据ID
	 */
    public function do_update_coop_com_by_id($upload_data,$did){
        $this->db->where(array('id' => $did));
        $this->db->update('es_coop_com',$upload_data);
    }
}
/** here is end of the page**/