<?php

class Shipment_model extends CI_Model {
    
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    
    /**
	 * 集装箱  数量  分页结果集
     * @param ['0' 进行中    '1'已完成]
	 */ 
    public function get_container_num($do = '0'){
        $this->db->from('es_shipment_container_list');
        $this->db->where(array('bill_num_state' => $do));
        $query = $this->db->count_all_results();
        return $query;
    }
    /**
	 * 集装箱   分页结果集
     * @param 每页数量
     * @param 偏移量
     * @param ['0' 进行中    '1'已完成]
	 */ 
    public function get_container_list($limit, $offset,$do = '0'){
        $this->db->select('a.*,u.name as manager_name');
        $this->db->from('es_shipment_container_list a');
        $this->db->join('es_user_login u','u.id = a.manager_id','left');
        $this->db->where(array('a.bill_num_state' => $do));
        $this->db->order_by('a.id','desc');
        $this->db->limit($limit,$offset);
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
	 * 集装箱   获取最后一个插入id号
	 */ 
    public function get_last_id_num(){
        $this->db->select('id');
        $this->db->order_by('id','desc');
        $this->db->limit(1,0);
        $query = $this->db->get('es_shipment_container_list');
        return $query->result()[0]->id;
    }
    
    /**
	 * 集装箱   添加单号列表信息
	 */ 
    public function add_new_shipment_list($date){
        
        $this->db->insert('es_shipment_container_list',$date);
    }
    /**
	 * 集装箱   根据集装箱 ID 获取状态相关字段
     * @parem 集装箱id
	 */
    public function get_shipment_contaniner_state($s_id){
        $this->db->select('id,shipment_id,link,manager_id,harbour,container_num,lading_bill,bill_num_state,wharf,in_wharf_time,out_wharf_time
        ,turn_harbour,voyage,shipper,client,ship_id,create_time,update_time');
        $this->db->from('es_shipment_container_list');
        $this->db->where(array('id' => $s_id));
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
	 * 集装箱   业务部员工列表
     * 
	 */
    public function get_manager_list_for_shipment(){
        $this->db->select('id,name');
        $this->db->from('es_user_login');
        $this->db->where(array('department' => '1'));
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * 集装箱   港口列表
     * 
	 */
    public function get_harbour_list_for_shipment(){
        $this->db->from('es_coop_harbour');
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * 集装箱   客户列表
     * 
	 */
    public function get_client_list_for_shipment(){
        $this->db->from('es_coop_client');
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * 集装箱   船舶列表
     * 
	 */
    public function get_ship_list_for_shipment(){
        $this->db->from('es_ship_info');
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * 集装箱   订舱代理
     * 
	 */
    public function get_es_com_list_for_shipment(){
        $this->db->from('es_coop_com');
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * 集装箱   更新状态信息
     * @param 更新id
     * @param 更新数据
	 */
    public function update_shipment_container_state($sid,$data){
        $this->db->where(array('id' => $sid));
        $this->db->update('es_shipment_container_list',$data);
    }
    /**
	 * 集装箱  检查主键重复性
     * @param shipment_id
	 */
    public function check_transport_fees_if_have($data){
        $this->db->from('es_shipment_container_transport_fees');
        $this->db->where(array('shipment_id' => $data));
        $query = $this->db->count_all_results();
        return $query;
    }
    /**
	 * 集装箱   添加 海运费
     * 
     * @param 数据
	 */
    public function add_transport_fees($date){
        $this->db->insert('es_shipment_container_transport_fees',$date);
        $re = $this->db->affected_rows();
        if($re>0){
            return true;
        }else{
            return false;
        }
    }
    
    /**
	 * 集装箱   更改 货单list 中的海运费状态
     * 
     * @param 集装箱列表 id
     * @param 状态  2为创建 0 未完成 1 完成
	 */
    public function change_transport_fees_state_in_list($list_id,$state){
        $this->db->where(array('id' => $list_id));
        $this->db->update('es_shipment_container_list',array('transport_fees' => $state));
    }
    /**
	 * 集装箱   根据ID 获取海运费信息
     * 
     * @param shipmentid
     * @param listid
	 */
    public function get_transport_fees_by_shipment_id($data,$listid){
        $this->db->where(array('list_id' => $listid));
        $this->db->where(array('shipment_id' => $data));
        $query = $this->db->get('es_shipment_container_transport_fees');
        return $query->result();
    }
    /**
	 * 集装箱   根据ID 更新海运费信息
     *  
     * @param shipmentid
     * @param listid
	 */
    public function do_update_transport_fees_by_shipment_id($dataid,$listid,$data){
        $this->db->where(array('list_id' => $listid));
        $this->db->where(array('shipment_id' => $dataid));
        $this->db->update('es_shipment_container_transport_fees',$data);
        
    }
    //获取单号总信息列表
    public function get_list_info(){
       // $this->db->from('shipment_list');
        $this->db->order_by('id','desc');
        $query = $this->db->get('shipment_list');
        return $query->result();
    }
    
    //删除单
    public function delete_shipment_list_info_by_id($dele_id){
        $this->db->delete('shipment_list',array('id' => $dele_id)); 
    }
    
    //总单号列表数量
    public function get_shipment_list_num(){
        $query= $this->db->count_all('shipment_list');   
        return $query;
    }
    
    
    //更改 货单list 中的报关中状态
    public function change_middle_apply_state_in_list($list_id,$state){
        $this->db->where(array('id' => $list_id));
        $this->db->update('shipment_list',array('middle_apply_state' => $state));
    }
    //更改 货单list 中的提单转客户状态
    public function change_bill_state_in_list($list_id,$state){
        $this->db->where(array('id' => $list_id));
        $this->db->update('shipment_list',array('bill_to_client_state' => $state));
    }
    //更改 货单list 中的港杂费状态
    public function change_sundries_fees_state_in_list($list_id,$state){
        $this->db->where(array('id' => $list_id));
        $this->db->update('shipment_list',array('sundries_fees_state' => $state));
    }
    

    //更新海运费信息
    public function update_transport_fees($fees_id,$date){
        $this->db->where(array('id' => $fees_id));
        $this->db->update('transport_fees',$date);
        $re = $this->db->affected_rows();
        if($re >0){
            return true;
        }else{
            return false;
        }
    }
    
    //报关中// <!-- phpDesigner :: Timestamp [2014/10/6 9:32:31] -->
    //新增报关中
    public function add_middle_apply($data){
        $this->db->insert('middle_apply',$data);
        $re = $this->db->affected_rows();
        if($re>0){
            return true;
        }else{
            return false;
        }
    }
    
    //单条
    public function get_middle_apply_by_id($list_id){
        $this->db->where(array('list_id' => $list_id));
        $query = $this->db->get('middle_apply');
        return $query->result();
    }
    //更新
    public function update_middle_apply($id,$data){
        $this->db->where(array('id' => $id));
        $this->db->update('middle_apply',$data);
        $re = $this->db->affected_rows();
        if($re > 0){
            return true;
        }else{
            return false;
        }
    }
    // <!-- phpDesigner :: Timestamp [2014/10/6 13:54:28] -->
    //提单转客户
    public function add_bill_to_client($data){
        $this->db->insert('bill_to_client',$data);
        $re = $this->db->affected_rows();
        if($re>0){
            return true;
        }else{
            return false;
        }
    }
    
    public function get_bill_by_id($list_id){
        $this->db->where(array('list_id' => $list_id));
        $query = $this->db->get('bill_to_client');
        return $query->result();
        
    }
    public function update_bill_to_client($id,$data){
        $this->db->where(array('id' => $id));
        $this->db->update('bill_to_client',$data);
        $re = $this->db->affected_rows();
        if($re>0){
            return true;
        }else{
            return false;
        }
    }
    
    //港杂费
    //获取海运费中已经设置好的  代理单位  箱子规格   箱子数量 品名
    public function get_box_info_from_transport_fees($list_id){
        $this->db->select('agent,box_type,box_num,cargo_type,client');
        $this->db->where(array('list_id'=>$list_id));
        $query=$this->db->get('transport_fees');
        return $query->result();
    }
    
    public function add_sundries_fees($data){
        $this->db->insert('sundries_fees',$data);
        $re = $this->db->affected_rows();
        if($re>0){
            return true;
        }else{
            return false;
        }
        
    }














}
 
?>