<?php

class Ship_model extends CI_Model {
    
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
     /**
	 * 船只 新增
	 */       
    public function add_ship($data){
        $this->db->insert('es_ship_info',$data);
    }
    /**
	 * 船只 数量  分页结果集
	 */ 
    public function get_ship_num_m(){
        $this->db->from('es_ship_info');
        $query = $this->db->count_all_results();
        return $query;
    }
    public function get_ship_list_m($limit, $offset){
        $this->db->from('es_ship_info');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * 船只 删除
	 */
    public function delete_ship_by_id($d_id){
        $this->db->delete('es_ship_info',array('id' => $d_id));
    }
    
    /**
	 * 船只 根据ID 获取信息
	 */
    public function get_ship_info_by_id($d_id){
        $this->db->from('es_ship_info');
        $this->db->where(array('id' => $d_id));
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
	 * 船只 更新 根据ID
	 */
    public function do_update_ship_by_id($upload_data,$did){
        $this->db->where(array('id' => $did));
        $this->db->update('es_ship_info',$upload_data);
    }
    
    
    
}
/** here is end of the page**/