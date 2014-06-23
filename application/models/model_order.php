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

	//Obtiene los sustratos de la base de datos
	function get_sustratum_id($id_sustratum)
	{
		$this -> db -> select('id_sustratum,sustratum_name');
		$this -> db -> from('t_sustratum');
		$this -> db -> where('id_sustratum', $id_sustratum);
		$query = $this -> db -> get();

		if($query->num_rows() > 0) 
		{
			return $query;
		} 
		else 
		{
			return null;
		}
	}

	//Obtiene los sustratos deacuerdo al subtipo de la base de datos
	function get_id_sustratum($id_subtype)
	{
		$this -> db -> select('id_sustratum,subtype_name');
		$this -> db -> from('t_subtype');
		$this -> db -> where('id_subtype', $id_subtype);
		$query = $this -> db -> get();

		if($query->num_rows() > 0) 
		{
			return $query;
		} 
		else 
		{
			return null;
		}
	}
	
	//Obtiene todos las variedades
	function get_variety()
	{
		$this -> db -> select('*');
		$this -> db -> from('t_variety');

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
	//Obtiene todos las variedades deacuardo al id
	function get_variety_id($id_variety)
	{
		$this -> db -> select('*');
		$this -> db -> from('t_variety');
		$this -> db -> where('id_variety',$id_variety);

		$query = $this -> db -> get();

		if($query->num_rows() > 0) 
		{
			return $query;
		} 
		else 
		{
			return null;
		}
	}
	//Obtiene todos los portaingertos
	function get_rootstock()
	{
		$this -> db -> select('*');
		$this -> db -> from('t_rootstock');

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

	//Obtiene todos los portaingertos deacuerdo al id
	function get_rootstock_id($id_rootstock)
	{
		$this -> db -> select('*');
		$this -> db -> from('t_rootstock');
		$this -> db -> where('id_rootstock', $id_rootstock);

		$query = $this -> db -> get();

		if($query->num_rows() > 0) 
		{
			return $query;
		} 
		else 
		{
			return null;
		}
	}
	//Obtiene todos los subtipos
	function get_subtypes()
	{
		$this -> db -> select('*');
		$this -> db -> from('t_subtype');

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
	function get_sustratum_subtype($id_sustratum)
	{
		$this -> db -> select('id_subtype, subtype_name');
		$this -> db -> from('t_subtype');
		$this -> db -> where('id_sustratum',$id_sustratum);

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
	function get_pending_oreder($id)
	{
		
		$this->db->where('id_client',$id);
		$this->db->where('id_status', 4);
		$query=$this->db->get('t_order');
			
			if($query->num_rows()>0)
			{
				return $query->result();
			} 
			else return false;
	}
	
	function add_breakdown($data)
	{
		$this->db->insert('t_breakdown', $data);
		return $this->db->affected_rows();
	}
	
	//Obtiene los datos del desglose de un pedido
	function get_breakdown($id)
	{
		$this->db->where('id_order',$id);
		$query=$this->db->get('t_breakdown');
		
			if($query->num_rows()>0)
			{
				return $query->result();
			}
			else return false;
	}

	function get_breakdown_id_breakdown($id_breakdown)
	{
		$this->db->where('id_breakdown',$id_breakdown);
		$query=$this->db->get('t_breakdown');
		
			if($query->num_rows()>0)
			{
				return $query->result();
			}
			else return false;
	}
	

	//obtiene el tipo de planta de acuerdo al id de planta
	function get_plant($id_plant)
	{
		
		$this->db->where('id_plant',$id_plant);
		$query=$this->db->get('t_plant');
			
			if($query->num_rows()>0)
			{
				return $query;
			} 
			else return false;
	}

	//obtiene el tipo de categoria deacuerdo al id de categoria
	function get_category($id_category)
	{
		
		$this->db->where('id_category',$id_category);
		$query=$this->db->get('t_category');
			
			if($query->num_rows()>0)
			{
				return $query;
			} 
			else return false;
	}
	
	//Agrega pedidos a la base de datos en estatus pendiente
	function add_order($data)
	{
		$this->db->insert('t_order', $data);
		return $this->db->affected_rows();
	}

	function update_order($id_order,$data)
	{
		$this->db->where('id_order',$id_order);
		$this->db->update('t_order', $data);
		return $this->db->affected_rows();
	}

	function update_coment_oreder($id_order,$datas)
	{
		$data= array('comment_description' =>$datas );
		$this->db->where('id_order',$id_order);
		$this->db->update('t_order_comments', $data);
		return $this->db->affected_rows();
	}

	//agrega comenteario de la orden
	function add_coment_oreder($datas){
		$this->db->select_max('id_order');
		$query = $this->db->get('t_order');
		foreach ($query->result() as $row)
		{
		   $datos=array('id_order' =>$row->id_order ,
					'comment_description'=>$datas);
			$this->db->insert('t_order_comments',$datos);
		}

		
	}

	function get_id_order(){
		$this->db->select_max('id_order');
		$query=$this->db->get('t_order');
		if($query->num_rows()>0)
			{
				return $query;
			} 
			else return false;
	}

	function get_order_id_order($id_order){
		$this->db->where('id_order',$id_order);
		$query=$this->db->get('t_order');
		if($query->num_rows()>0)
			{
				return $query;
			} 
			else return false;
	}

	function get_order_comment($id_order){
		$this->db->where('id_order',$id_order);
		$query=$this->db->get('t_order_comments');
		if($query->num_rows()>0)
			{
				return $query;
			} 
			else return $query;
	}

	function insert_breakdown($data){
		$this->db->insert('t_breakdown',$data);
		return $this->db->affected_rows();
	}

	function suma_volumen($id_order){
		$this->db->where('id_order',$id_order);
		$this->db->select_sum('volume');
		$query = $this->db->get('t_breakdown');
		if($query->num_rows()>0)
			{
				return $query;
			} 
			else return null;
	}

	function delete_order($id)
	{
		$this->db->delete('t_order', array('id_order' => $id)); 
	}

	function delete_sowing($id)
	{
		$this->db->where('id_sowing',$id);
		$this->db->delete('t_sowing');
	}

	function delete_order_comment($id)
	{
		$this->db->delete('t_order_comments', array('id_order' => $id)); 
	}

	function delete_breakdown($id)
	{
		$this->db->where('id_breakdown',$id);
		$this->db->delete('t_breakdown');
	}
	
	//funcion que cambia el estatus del pedido a nuevo
	function submit_order($id)
	{
		$data = array(
			'id_status' => 1
		);
		$this->db->where('id_order',$id);
		$this->db->update('t_order', $data);
	}

	function add_sowing($datos)
	{
		$this->db->insert('t_sowing', $datos);
		return $this->db->affected_rows();
	}

	function get_sowing($datos){
		$this->db->where('id_order',$datos);
		$query=$this->db->get('t_sowing');
		
			if($query->num_rows()>0)
			{
				return $query->result();
			}
			else return false;
	}

	function suma_volumen_sowing($id_order){
		$this->db->where('id_order',$id_order);
		$this->db->select_sum('volume');
		$query = $this->db->get('t_sowing');
		if($query->num_rows()>0)
			{
				return $query;
			} 
			else return null;
	}

	function update_status($id_order){
		$this->db->where('id_order',$id_order);
		$data = array(
               'id_status' => '5'
        		);
		$this->db->update('t_order',$data);
		return $this->db->affected_rows();
	}
	
	function get_total_sowing($id_order)
	{
		$this->db->select('sowing');
		$this->db->where('id_order', $id_order);
		$query=$this->db->get('t_total');
		if($query->num_rows()>0)
		{
			return $query->row(0);
		}
		else return false;
	}
	
	function update_total_sowing($id_order, $sowing)
	{
		$data = array (
			'sowing' => $sowing
		);
		$this->db->where('id_order',$id_order);
		$this->db->update('t_total', $data);
		return $this->db->affected_rows();
	}

	function get_volume_sowing($id){
		$this->db->select('volume');
		$this->db->where('id_sowing',$id);
		$query=$this->db->get('t_sowing');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}
	
	function get_total_germ()
	{
		
	}

	function get_total_graft()
	{
		
	}
	
	function get_total_punch()
	{
		
	}
	
	function get_total_transplant()
	{
		
	}
}
?>