<?php

Class Order_model extends CI_Model	{

	//Obtiene las plantas del catalogode la base de datos
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
	
	
	//Obtiene los sustratos de la base de datos
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
	
	//Obtiene los subtipos de sustratos
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
	
	
	//Obtiene las categorias de pedido
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
	
	
	//Obiene un cliente por su id
	function get_cliente($id_cliente)
	{
		$result = $this->db->query('call s_user(' . $id_cliente . ')');
		return $result->row();
	}

	
	//Obtiene las ordenes por status
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
	
	
	//Inserta una nueva orden
	function new_order($order,$client_order)
	{
		$this->db->insert('t_order',$order);
		$this->db->insert('t_client_order',$client_order);
	}
	
	
	//Obtiene todos los estados del pais
	function get_states()
	{
		$this->db->select('id_state,state_name');
		$this->db->from('t_state');
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return 0;
		}
	}
	
	
	//Obtiene un estado por id
	function get_state($id_state)
	{
		$this->db->select('id_state,state_name');
		$this->db->from('t_state');
		$this->db->where('id_state',$id_state);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return 0;
		}
	}
	
	
	//Obtiene todas las ciudades
	function get_towns()
	{
		$this->db->select('id_town,id_state,key_town,town_name');
		$this->db->from('t_town');
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return 0;
		}
	}
	
	
	//Obtiene las ciudades de un estado por el id_estado
	function get_town($id_state)
	{
		$this->db->select('id_town,town_name');
		$this->db->from('t_town');
		$this->db->where('id_state',$id_state);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return 0;
		}
	}
  
}

?>
