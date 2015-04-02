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
		$this->db->order_by("farm_name", "asc");
		
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
		$this->db->order_by("plant_name", "asc");

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
	
	function get_order(){
		$query=$this->db->get('t_order');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	//Obtiene los sustratos de la base de datos
	function get_sustratum()
	{
		$this -> db -> select('id_sustratum,sustratum_name');
		$this -> db -> from('t_sustratum');
		$this->db->order_by("sustratum_name", "asc");

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
		$this->db->order_by("variety_name", "asc");

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
		$this->db->order_by("rootstock_name", "asc");

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
		$this->db->order_by("subtype_name", "asc");

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
		$this->db->order_by("category_name", "asc");

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
		$this->db->where('activate',1);
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
		$this->db->order_by('variety', 'asc');
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
		$this->db->order_by("plant_name", "asc");
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
		$this->db->order_by("category_name", "asc");
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

	function insert_breakdown($data)
	{
		$this->db->insert('t_breakdown',$data);
		return $this->db->affected_rows();
	}

	function get_seeds($id_order){
		$this->db->where('id_order',$id_order);
		$this->db->order_by("seed_name", "asc");
		$query=$this->db->get('t_seeds');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function get_seeds_id_seed($id_seed){
		$this->db->where('id_seed',$id_seed);
		$query=$this->db->get('t_seeds');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}
	
	function add_seeds($data)
	{
		$this->db->insert('t_total_seed',$data);
		return $this->db->affected_rows();
	}

	function update_times($id_order, $seed_name, $volume)
	{
		$result = $this->db->query('update t_total_seed
									set times = times + 1, order_volume = order_volume +'.$volume.'
									where id_order = '.$id_order.'
									and seed_name = "'.$seed_name.'"');
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
		$this->db->query('update t_order set activate = 0 where id_order='.$id);		
	}

	function reset_order($id)
	{
		$this->db->query('update t_order set activate = 1 where id_order='.$id);		
	}

	function delete_order2($id)
	{
		$this->db->delete('t_order', array('id_order' => $id));		
		$this->db->delete('t_embark', array('id_order' => $id));
		$this->db->delete('t_files', array('id_order' => $id));	
		$this->db->delete('t_germination', array('id_order' => $id));
		$this->db->delete('t_images_process', array('id_order' => $id));
		$this->db->delete('t_order_comments', array('id_order' => $id));
		$this->db->delete('t_seeds', array('id_order' => $id));	
		$this->db->delete('t_sowing', array('id_order' => $id));
		$this->db->delete('t_total', array('id_order' => $id));	
		$this->db->delete('t_total_seed', array('id_order' => $id));
		$this->db->delete('t_breakdown', array('id_order' => $id));		
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

	function get_breakdown_seeds($id_breakdown){
		$this->db->select('id_order,variety,rootstock,volume');
		$this->db->where('id_breakdown', $id_breakdown);
		$query=$this->db->get('t_breakdown');
		if($query->num_rows()>0)
		{
			return $query;
		}
		else return false;
	}
	
	function get_times($id_order, $seed_name)
	{
		$this->db->select('times');
		$this->db->where('id_order', $id_order);
		$this->db->where('seed_name', $seed_name);
		$query=$this->db->get('t_total_seed');
		if($query->num_rows()>0)
		{
			return $query;
		}
		else return false;
	}
	
	function update_times2($id_order,$seed_name,$volume)
	{
		$result = $this->db->query('update `t_total_seed`
									set `times`=`times`- 1,`order_volume`=`order_volume`-'.$volume.'
									where `id_order` = '.$id_order.'
									and `seed_name` = "'.$seed_name.'"');
		return $this->db->affected_rows();
	}
	
	function delete_totalseed($id_order,$seed_name)
	{
		$this->db->where('id_order',$id_order);
		$this->db->where('seed_name',$seed_name);
		$this->db->delete('t_total_seed');
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

		$query = $this->db->query('select t_s.id_sowing,t_s.sowing_date, t_s.volume, t_s.id_order, t_s.comment, t_s.completed, t_s.seed,t_s.id_seed, t_o.id_status, t_o.id_order 
									from t_sowing as t_s, t_order as t_o 
									where t_s.id_order = '.$datos.' and t_o.id_status = 2 and t_s.id_order = t_o.id_order ');
		
			if($query->num_rows()>0)
			{
				return $query->result();
			}
			else return false;
	}

	function get_sowing2($datos){

		$query = $this->db->query('select t_s.id_sowing,t_s.sowing_date, t_s.volume, t_s.id_order, t_s.comment, t_s.completed, t_s.seed, t_o.id_status, t_o.id_order 
									from t_sowing as t_s, t_order as t_o 
									where t_s.id_order = '.$datos.'  and t_s.id_order = t_o.id_order ');
		
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
               'id_status' => '2'
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

	function get_seed_sowing($id){
		$this->db->select('seed');
		$this->db->where('id_sowing',$id);
		$query=$this->db->get('t_sowing');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}
	
	function get_total_germ($id_order)
	{
		$this->db->select('germination');
		$this->db->where('id_order', $id_order);
		$query=$this->db->get('t_total');
		if($query->num_rows()>0)
		{
			return $query->row(0);
		}
		else return false;	
	}

	function update_total_germination($id_order, $germ)
	{
		$data = array (
			'germination' => $germ
		);
		$this->db->where('id_order',$id_order);
		$this->db->update('t_total', $data);
		return $this->db->affected_rows();
	}
	
	function get_total_graft($id_order)
	{
		$this->db->select('graft');
		$this->db->where('id_order', $id_order);
		$query=$this->db->get('t_total');
		if($query->num_rows()>0)
		{
			return $query->row(0);
		}
		else return false;
	}
	
	function update_total_graft($id_order, $graft)
	{
		$data = array (
			'graft' => $graft
		);
		$this->db->where('id_order',$id_order);
		$this->db->update('t_total', $data);
		return $this->db->affected_rows();
	}
	
	function get_total_punch($id_order)
	{
		$this->db->select('punch');
		$this->db->where('id_order', $id_order);
		$query=$this->db->get('t_total');
		if($query->num_rows()>0)
		{
			return $query->row(0);
		}
		else return false;
	}
	
	function update_total_punch($id_order, $punch)
	{
		$data = array (
			'punch' => $punch
		);
		$this->db->where('id_order',$id_order);
		$this->db->update('t_total', $data);
		return $this->db->affected_rows();
	}
	
	function get_total_transplant($id_order)
	{
		$this->db->select('transplant');
		$this->db->where('id_order', $id_order);
		$query=$this->db->get('t_total');
		if($query->num_rows()>0)
		{
			return $query->row(0);
		}
		else return false;
	}
	
	function get_total_tutoring($id_order)
	{
		$this->db->select('tutoring');
		$this->db->where('id_order', $id_order);
		$query=$this->db->get('t_total');
		if($query->num_rows()>0)
		{
			return $query->row(0);
		}
		else return false;
	}
	function update_total_transplant($id_order, $transplant)
	{
		$data = array (
			'transplant' => $transplant
		);
		$this->db->where('id_order',$id_order);
		$this->db->update('t_total', $data);
		return $this->db->affected_rows();
	}

	function update_total_tutoring($id_order, $tutoring)
	{
		$data = array (
			'tutoring' => $tutoring
		);
		$this->db->where('id_order',$id_order);
		$this->db->update('t_total', $data);
		return $this->db->affected_rows();
	}
	
	function update_total_tutoring2($id_order,$volume)
	{
		$this->db->query('update `t_total` set tutoring= tutoring - '.$volume.' where id_order ='.$id_order);
		return $this->db->affected_rows();
	}

	function update_order_comment($id_order,$comment)
	{
		$data = array (
			'comment' => $comment
		);
		$this->db->where('id_order',$id_order);
		$this->db->update('t_order',$data);
		return $this->db->affected_rows();
	}

	function update_total_seed($seed_name,$order,$volume){
		$result = $this->db->query('update `t_total_seed`
									set `total`=`total`+'.$volume.'
									where `id_order` = '.$order.'
									and `seed_name` = "'.$seed_name.'"');
		return $this->db->affected_rows();
	}

	function update_total_seed2($seed_name,$order,$volume){
		$result = $this->db->query('update `t_total_seed`
									set `total`=`total`-'.$volume.'
									where `id_order` = '.$order.'
									and `seed_name` = "'.$seed_name.'"');
		return $this->db->affected_rows();
	}

	function get_total_sowing2($order,$seed_name){
		$this->db->where('id_order',$order);
		$this->db->where('seed_name', $seed_name);
		$query=$this->db->get('t_total_seed');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function update_germination($datos,$total,$order_volume)
	{
		$result = $this->db->query('update `t_germination`
									set `volume`=`germ_percentage` / 100 * '.$total.' ,`scope`=((`germ_percentage`/ 100 * '.$total.' / '.$order_volume.') - 1 )* 100
									where `id_order` = '.$datos['id_order'].'
									and `seed_name` = "'.$datos['seed'].'"');
		return $this->db->affected_rows();
	}

	function sum_germination($id_order){
		$this->db->where('id_order',$id_order);
		$this->db->select_sum('volume');
		$query = $this->db->get('t_germination');
		if($query->num_rows()>0)
			{
				return $query->result();
			} 
			else return null;
	}

	function update_volume_germination($order,$germination){
		$data= array('germination' =>$germination );
		$this->db->where('id_order',$order);
		$this->db->update('t_total', $data);
		return $this->db->affected_rows();

	}

	function get_order_seeds_info($id_order){
		$this->db->where('id_order', $id_order);
		$query = $this->db->get('t_total_seed');
		if($query->num_rows()>0)
			{
				return $query->result();
			} 
			else return null;
	}

	function update_total_vial($id_order,$volume,$seed,$scope)
	{
		$data=array('viability_total'=>$volume, 'scope'=>$scope);
		$this->db->where('id_order',$id_order);
		$this->db->where('seed_name',$seed);
		$this->db->update('t_total_seed',$data);
		return $this->db->affected_rows();
	}

	function get_vial_total($id_order,$seed)
	{
		$this->db->select('viability_total');
		$this->db->where('id_order', $id_order);
		$this->db->where('seed_name',$seed);
		$query=$this->db->get('t_total_seed');
		if($query->num_rows()>0)
		{
			return $query->row(0);
		}
		else return null;
	}

	function get_t_total_seed($id_order){
		$query=$this->db->query('select * from t_total_seed where id_order='.$id_order);
		if($query->num_rows()>0){
			return $query->result();
		}
		else return null;
	}

	function get_order_volume($id_order,$seed)
	{
		$this->db->select('order_volume');
		$this->db->where('id_order', $id_order);
		$this->db->where('seed_name',$seed);
		$query=$this->db->get('t_total_seed');
		if($query->num_rows()>0)
		{
			return $query->row(0);
		}
		else return null;
	}

	function register_variety($datos){

		$this->db->where('variety_name',$datos['variety_name']);
		$query=$this->db->get('t_variety');
		if($query->num_rows() == 0){
			$this->db->insert('t_variety', $datos); 		
			return $this->db->affected_rows();
		}
		else return false;
		
	}

	function register_rootstock($datos){
		$this->db->where('rootstock_name',$datos['rootstock_name']);
		$query=$this->db->get('t_rootstock');
		if($query->num_rows() == 0){
			$this->db->insert('t_rootstock', $datos); 		
			return $this->db->affected_rows();
		}
		else return false;
	}

	function get_total_graft2($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',2);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function get_total_punch2($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',3);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function get_total_transplant2($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',4);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}
	
	function get_total_tutoring2($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',5);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function get_graft($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',2);
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function get_punch($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',3);
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function get_transplant($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',4);
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function get_tutoring($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',5);
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function upload_plant($plant_name)
	{
		$data = array('plant_name' =>$plant_name);
		$this->db->insert('t_plant', $data);
		return $this->db->affected_rows();
	}

	function delete_plant($id_plant){
		$this->db->where('id_plant',$id_plant);
		$this->db->delete('t_plant');
		return $this->db->affected_rows();
	}

	function upload_sustratum($sustratum_name)
	{
		$data = array('sustratum_name' =>$sustratum_name);
		$this->db->insert('t_sustratum', $data);
		return $this->db->affected_rows();
	}

	function delete_sustratum($id_sustratum){
		$this->db->where('id_sustratum',$id_sustratum);
		$this->db->delete('t_sustratum');
		return $this->db->affected_rows();
	}

	function upload_subtype($subtype_name,$id_sustratum)
	{
		$data = array('subtype_name' =>$subtype_name,'id_sustratum' =>$id_sustratum);
		$this->db->insert('t_subtype', $data);
		return $this->db->affected_rows();
	}

	function delete_subtype($id_subtype){
		$this->db->where('id_subtype',$id_subtype);
		$this->db->delete('t_subtype');
		return $this->db->affected_rows();
	}
}