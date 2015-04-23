<?php

class Data_show_model extends CI_Model {
    
    
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function check_for_agent($begin,$end){
        $begin_time = $begin.' 00:00:00';
        $end_time = $end.' 23:59:59';
        $this->db->select('a.voyage,a.lading_bill,a.out_wharf_time,b.ship_name,c.coop_harbour,d.box_num,d.box_type,e.boxs_fees_out');
        $this->db->from('es_shipment_container_list a');
        //船名
        $this->db->join('es_ship_info b','b.id = a.ship_id','left');
        //目的港
        $this->db->join('es_coop_harbour c','c.id = a.harbour','left');
        //箱型 箱量 
        $this->db->join('es_shipment_container_transport_fees d','d.shipment_id = a.shipment_id','inner');
        //港杂费
        $this->db->join('es_shipment_container_sundries_fees e','e.shipment_id = a.shipment_id','inner');
        $this->db->where(array('a.bill_num_state' => '1'));
        $this->db->where(array('a.create_time >' => $begin_time));
        $this->db->where(array('a.create_time <' => $end_time));
        $query = $this->db->get();
        return $query->result();
    }
    
    
}
/** here is end of the page**/