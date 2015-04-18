<?php

class Shipment_model extends CI_Model {
    
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    
    /**
	 * ��װ��  ����  ��ҳ�����
     * @param ['0' ������    '1'�����]
	 */ 
    public function get_container_num($do = '0'){
        $this->db->from('es_shipment_container_list');
        $this->db->where(array('bill_num_state' => $do));
        $query = $this->db->count_all_results();
        return $query;
    }
    /**
	 * ��װ��   ��ҳ�����
     * @param ÿҳ����
     * @param ƫ����
     * @param ['0' ������    '1'�����]
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
	 * ��װ��   ��ȡ���һ������id��
	 */ 
    public function get_last_id_num(){
        $this->db->select('id');
        $this->db->order_by('id','desc');
        $this->db->limit(1,0);
        $query = $this->db->get('es_shipment_container_list');
        return $query->result()[0]->id;
    }
    
    /**
	 * ��װ��   ��ӵ����б���Ϣ
	 */ 
    public function add_new_shipment_list($date){
        
        $this->db->insert('es_shipment_container_list',$date);
    }
    /**
	 * ��װ��   ���ݼ�װ�� ID ��ȡ״̬����ֶ�
     * @parem ��װ��id
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
	 * ��װ��   ҵ��Ա���б�
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
	 * ��װ��   �ۿ��б�
     * 
	 */
    public function get_harbour_list_for_shipment(){
        $this->db->from('es_coop_harbour');
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * ��װ��   �ͻ��б�
     * 
	 */
    public function get_client_list_for_shipment(){
        $this->db->from('es_coop_client');
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * ��װ��   �����б�
     * 
	 */
    public function get_ship_list_for_shipment(){
        $this->db->from('es_ship_info');
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * ��װ��   ���մ���
     * 
	 */
    public function get_es_com_list_for_shipment(){
        $this->db->from('es_coop_com');
        $query = $this->db->get();
        return $query->result();
    }
    /**
	 * ��װ��   ����״̬��Ϣ
     * @param ����id
     * @param ��������
	 */
    public function update_shipment_container_state($sid,$data){
        $this->db->where(array('id' => $sid));
        $this->db->update('es_shipment_container_list',$data);
    }
    /**
	 * ��װ��  ��������ظ���
     * @param shipment_id
	 */
    public function check_transport_fees_if_have($data){
        $this->db->from('es_shipment_container_transport_fees');
        $this->db->where(array('shipment_id' => $data));
        $query = $this->db->count_all_results();
        return $query;
    }
    /**
	 * ��װ��   ��� ���˷�
     * 
     * @param ����
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
	 * ��װ��   ���� ����list �еĺ��˷�״̬
     * 
     * @param ��װ���б� id
     * @param ״̬  2Ϊ���� 0 δ��� 1 ���
	 */
    public function change_transport_fees_state_in_list($list_id,$state){
        $this->db->where(array('id' => $list_id));
        $this->db->update('es_shipment_container_list',array('transport_fees' => $state));
    }
    /**
	 * ��װ��   ����ID ��ȡ���˷���Ϣ
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
	 * ��װ��   ����ID ���º��˷���Ϣ
     *  
     * @param shipmentid
     * @param listid
	 */
    public function do_update_transport_fees_by_shipment_id($dataid,$listid,$data){
        $this->db->where(array('list_id' => $listid));
        $this->db->where(array('shipment_id' => $dataid));
        $this->db->update('es_shipment_container_transport_fees',$data);
        
    }
    //��ȡ��������Ϣ�б�
    public function get_list_info(){
       // $this->db->from('shipment_list');
        $this->db->order_by('id','desc');
        $query = $this->db->get('shipment_list');
        return $query->result();
    }
    
    //ɾ����
    public function delete_shipment_list_info_by_id($dele_id){
        $this->db->delete('shipment_list',array('id' => $dele_id)); 
    }
    
    //�ܵ����б�����
    public function get_shipment_list_num(){
        $query= $this->db->count_all('shipment_list');   
        return $query;
    }
    
    
    //���� ����list �еı�����״̬
    public function change_middle_apply_state_in_list($list_id,$state){
        $this->db->where(array('id' => $list_id));
        $this->db->update('shipment_list',array('middle_apply_state' => $state));
    }
    //���� ����list �е��ᵥת�ͻ�״̬
    public function change_bill_state_in_list($list_id,$state){
        $this->db->where(array('id' => $list_id));
        $this->db->update('shipment_list',array('bill_to_client_state' => $state));
    }
    //���� ����list �еĸ��ӷ�״̬
    public function change_sundries_fees_state_in_list($list_id,$state){
        $this->db->where(array('id' => $list_id));
        $this->db->update('shipment_list',array('sundries_fees_state' => $state));
    }
    

    //���º��˷���Ϣ
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
    
    //������// <!-- phpDesigner :: Timestamp [2014/10/6 9:32:31] -->
    //����������
    public function add_middle_apply($data){
        $this->db->insert('middle_apply',$data);
        $re = $this->db->affected_rows();
        if($re>0){
            return true;
        }else{
            return false;
        }
    }
    
    //����
    public function get_middle_apply_by_id($list_id){
        $this->db->where(array('list_id' => $list_id));
        $query = $this->db->get('middle_apply');
        return $query->result();
    }
    //����
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
    //�ᵥת�ͻ�
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
    
    //���ӷ�
    //��ȡ���˷����Ѿ����úõ�  ����λ  ���ӹ��   �������� Ʒ��
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