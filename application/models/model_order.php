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
	
	function get_companies_drop()
	{
		$this -> db -> select('id_user,farm_name');
		$this -> db -> from('t_user');
		$this -> db -> where('id_rol', 2);
		$this -> db -> where('active', 0);
		
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


	//Obtiene las plantas del catalogode la base de datos
	function get_plants()
	{
	
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
	function get_sustratum()
	{
		$this -> db -> select('id_sustratum,sustratum_name');
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
	function get_sustratum_subtype($sustratum)
	{
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
			return null;
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
			return null;
		}
	}

	function get_state_id($id_state)
	{
		$this->db->select('id_state,state_name');
		$this->db->from('t_state');
		$this->db->where('id_state',$id_state);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		{
			return $query;
		} 
		else 
		{
			return null;
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
			return null;
		}
	}
//obtiene las ciudades deacuerdo al id_state
	function get_towns_id($id_state)
	{
		$this->db->select('id_town,id_state,key_town,town_name');
		$this->db->from('t_town');
		$this->db->where('id_state',$id_state);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return null;
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
			return null;
		}
	}

	//Obtiene las ciudades de un estado por el id_town
	function get_town_id($id_town)
	{
		$this->db->select('id_town,town_name,id_state');
		$this->db->from('t_town');
		$this->db->where('id_town',$id_town);
		$query = $this->db->get();
		
		if($query->num_rows() > 0) 
		{
			return $query;
		} 
		else 
		{
			return null;
		}
	}

	//obtiene las ordenes pendientes deacuerdo al id del cliente
	function get_pending_oreder($id){
		
		$this->db->where('id_client',$id);
		$query=$this->db->get('t_order');
			
			if($query->num_rows()>0)
			{
				return $query->result();
			} 
			else return false;
	}

	//obtiene el tipo de planta de acuerdo al id de planta
	function get_plant($id_plant){
		
		$this->db->where('id_plant',$id_plant);
		$query=$this->db->get('t_plant');
			
			if($query->num_rows()>0)
			{
				return $query;
			} 
			else return false;
	}

	//obtiene el tipo de categoria deacuerdo al id de categoria
	function get_category($id_category){
		
		$this->db->where('id_category',$id_category);
		$query=$this->db->get('t_category');
			
			if($query->num_rows()>0)
			{
				return $query;
			} 
			else return false;
	}
}

?>