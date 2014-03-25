<?php

Class Order_model extends CI_Model	{

	function get_plants(){
	
		$this -> db -> select('plant_name');
		$this -> db -> from('t_plant');

		$query = $this -> db -> get();

		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return 0;
		}
	}
	
	function get_sustratum(){
		$this -> db -> select('sustrato_name');
		$this -> db -> from('t_sustratum');

		$query = $this -> db -> get();

		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return 0;
		}
	}
	
	function get_sustratum_subtype(){
		$this -> db -> select('sustratum_name');
		$this -> db -> from('t_sustratum_subtype');

		$query = $this -> db -> get();

		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return 0;
		}
	}
	
	
	
	function add_order() {
	
	}

	function get_orders($tipo)
	{
		switch($tipo)
		{
			case 'nuevos':
				$result = $this->db->query('call s_order_new()');
				break;
			case 'proceso':
				$result = $this->db->query('call s_order_process()');
				break;
			case 'completados':
				$result = $this->db->query('call s_order_complete()');
				break;
		}

		return $result->result();
	}

  
}

?>