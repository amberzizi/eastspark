<?php

class Price_model extends CI_Model {
    
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
     /**
	 * 报价 新增
	 */       
    public function add_price($data){
        $this->db->insert('es_quoted_price',$data);
    }
    /**
	 * 报价 数量  分页结果集
	 */ 
    public function get_price_num_m(){
        $this->db->from('es_quoted_price');
        $query = $this->db->count_all_results();
        return $query;
    }
    public function get_price_list_m($limit, $offset){
        $this->db->from('es_quoted_price');
        $this->db->order_by('id','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * 报价 删除
	 */
    public function delete_price_by_id($d_id){
        $this->db->delete('es_quoted_price',array('id' => $d_id));
    }
    
    /**
	 * 报价 根据ID 获取信息
	 */
    public function get_price_info_by_id($d_id){
        $this->db->from('es_quoted_price');
        $this->db->where(array('id' => $d_id));
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
	 * 报价 更新 根据ID
	 */
    public function do_update_price_by_id($upload_data,$did){
        $this->db->where(array('id' => $did));
        $this->db->update('es_quoted_price',$upload_data);
    }
    
    
    
}
/** here is end of the page**/