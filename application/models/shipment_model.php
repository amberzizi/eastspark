<?php

class Shipment_model extends CI_Model {
    
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    //��ӵ����б���Ϣ
    public function add_new_shipment_list($date){
        
        $this->db->insert('shipment_list',$date);
    }
    
    //��ȡ��������Ϣ�б�
    public function get_list_info(){
       // $this->db->from('shipment_list');
        $this->db->order_by('id','desc');
        $query = $this->db->get('shipment_list');
        return $query->result();
    }
    //��ȡ���һ��ID��� 
    public function get_last_id_num(){
        $this->db->select('id');
        $this->db->order_by('id','desc');
        $this->db->limit(1,0);
       $query = $this->db->get('shipment_list');
        return $query->result()[0]->id;
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
    
    //���� ����list �еĺ��˷�״̬
    public function change_transport_fees_state_in_list($list_id,$state){
        $this->db->where(array('id' => $list_id));
        $this->db->update('shipment_list',array('transport_fees' => $state));
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
    
    
    // ���˷�<!-- phpDesigner :: Timestamp [2014/10/5 0:24:04] -->
    //��� ���˷�
    public function add_transport_fees($date){
        $this->db->insert('transport_fees',$date);
        $re = $this->db->affected_rows();
        if($re>0){
            return true;
        }else{
            return false;
        }
    }
    //����list_id ��ȡ�������˷���Ϣ
    public function get_fees_info_by_id($list_id){
        $this->db->where(array('list_id' => $list_id));
        $query = $this->db->get('transport_fees');
        return $query->result();
        
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