<?php

Class model_order extends CI_Model	
{
	//	SELECTS   //	//	SELECTS   //		//	SELECTS   //	//	SELECTS   //	//	SELECTS   //


	//Obtiene todas las ordenes existentes segun el status recibido
	function get_orders($status)
	{
		switch($status)
		{
			//Nuevos : Se hizo la orden y desglose pero no se han sembrado
			case 1:
				$result = $this->db->query('call ps_order_status(' . $status . ')');
				break;
			//Proceso : Son los que se estan sembrando o ya fueron sembrados pero no entregados
			case 2:
				$result = $this->db->query('call ps_order_status(' . $status . ')');
				break;
			//Completado : Pedidos que ya fueron entregados
			case 3:
				$result = $this->db->query('call ps_order_status(' . $status . ')');
				break;
			//Pendientes : Son los que no tienen desglose para la siembra
			case 4:
				$result = $this->db->query('call ps_order_status(' . $status . ')');
				break;
			//Obtiene todas las ordenes existentes cuando $status tiene un valor diferente a los casos anteriores
			default:
				$result = $this->db->query('call ps_order_all()');
				break;
		}
		if($result->num_rows() > 0) 
		{
			return $result->result();
		} 
		else 
		{
			return null;
		}
	}


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
			return null;
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
			return null;
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
			return null;
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
			return null;
		}
	}
}

?>