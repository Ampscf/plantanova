<?php

Class Order_model extends CI_Model	{

	function get_plants(){
	
		$this -> db -> select('id_plant,plant_name');
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
		$this -> db -> select('id_sustratum,sustrato_name');
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
	
	function get_sustratum_subtype($sustratum){
		$this -> db -> select('id_subtype,sustratum_name');
		$this -> db -> from('t_sustratum_subtype');
		$this -> db -> where('id_sustratum',$sustratum);

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

	function get_categories()
	{
		$this -> db -> select('id_category,category_name');
		$this -> db -> from('t_category');

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
	
	
	function get_cliente($id_cliente)
	{
		$result = $this->db->query('call s_user(' . $id_cliente . ')');
		return $result->row();
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

	function new_order($order,$client_order)
	{
		$this->db->insert('t_order',$order);
		$this->db->insert('t_client_order',$client_order);
	}

  
}

?>