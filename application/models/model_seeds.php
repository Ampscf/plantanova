<?php

Class model_seeds extends CI_Model	
{
	function get_orders(){
		$this->db->where('id_status',1);
		$query=$this->db->get('t_order');
		
		if($query->num_rows()>0)
		{
			return $query->result();
		} 
		else return false;
	
	}

	function insert_seeds($data){
		$this->db->insert('t_seeds',$data);
		return $this->db->affected_rows();
	}

}