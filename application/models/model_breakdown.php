<?php

Class model_breakdown extends CI_Model
{

	//Obtiene las ordenes que tienen un status de nuevas
	function get_new_orders()
	{
		$this->db->where('id_status',1);
		$this->db->where('activate',1);
		$query=$this->db->get('t_order');
		
		if($query->num_rows()>0)
		{
			return $query->result();
		} 
		else return false;
	}
	
	//Obtiene las ordenes que tienen un estatus de en proceso
	function get_process_orders()
	{
		$this->db->where('id_status',"2");
		$this->db->where('activate',1);
		$query=$this->db->get('t_order');
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function finish_status($id_order){
		$this->db->query('update t_order set id_status=5 where id_order='.$id_order);
	}
	
	//Obtiene las ordenes que tienen un estatus de embarcados
	function get_embarker_orders()
	{
		$this->db->where('id_status',3);
		$this->db->where('activate',1);
		$query=$this->db->get('t_order');
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function get_final_orders()
	{
		$this->db->where('id_status',5);
		$this->db->where('activate',1);
		$query=$this->db->get('t_order');
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function get_all_orders()
	{
		$query=$this->db->get('t_order');
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function get_cancel_orders(){
		$this->db->where('activate',0);
		$query=$this->db->get('t_order');
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function get_user($id){
		$this->db->where('id_user',$id);
		$query=$this->db->get('t_user');

		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}
	
	function get_category($id){
		$this->db->where('id_category',$id);
		$query=$this->db->get('t_category');

		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function get_status($id){
		$this->db->where('id_status',$id);
		$query=$this->db->get('t_status');

		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function get_plant($id){
		$this->db->where('id_plant',$id);
		$query=$this->db->get('t_plant');

		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function add_germination($datos)
	{
		$this->db->insert('t_germination', $datos);
		return $this->db->affected_rows();
	}

	function add_graft($datos)
	{
		$this->db->insert('t_process', $datos);
		return $this->db->affected_rows();
	}
	
	function add_punch($datos)
	{
		$this->db->insert('t_process',$datos);
		return $this->db->affected_rows();
	}
	
	function add_transplant($datos)
	{
		$this->db->insert('t_process', $datos);
		return $this->db->affected_rows();
	}

	/*function get_germination($id_order){
		$result = $this->db->query('select t_b.variety,t_b.rootstock, t_p.id_process, t_p.id_process_type, t_p.process_date, t_p.scope, t_p.volume, t_p.viability, t_p.comment, t_p.id_breakdown 
									FROM t_breakdown as t_b,t_process as t_p 
									WHERE t_b.id_breakdown=t_p.id_breakdown
									and t_p.id_process_type=1
									and t_b.id_order ='.$id_order);
		if($result->num_rows()>0)
			{
				return $result->result();
			}
			else return false;

	}*/
	
	function get_germination($id_order)
	{
		$result = $this->db->query('select tg.id_germination, tg.id_order, tg.germ_date, tg.volume, tg.germ_percentage, tg.viability, tg.seed_name, tg.comment,t_o.id_order, t_o.id_status
									from t_germination as tg, t_order as t_o 
									where t_o.id_order = tg.id_order and t_o.id_status = 2 and tg.id_order='.$id_order.'
									order by tg.id_germination');
		if($result->num_rows()>0)
			{
				return $result->result();
			}
			else return null;
	}

	function get_final_germination($id_order)
	{
		$result = $this->db->query('select tg.id_germination, tg.id_order, tg.germ_date, tg.volume, tg.germ_percentage, tg.viability, tg.seed_name, tg.comment,  t_o.id_order, t_o.id_status
									from t_germination as tg, t_order as t_o 
									where t_o.id_order = tg.id_order and tg.id_order = '.$id_order.'
									order by tg.id_germination');
		if($result->num_rows()>0)
			{
				return $result->result();
			}
			else return false;
	}

	function get_graft($id_order){
		$result = $this->db->query('select t_b.variety,t_b.rootstock, t_p.id_process, t_p.id_process_type, t_p.process_date, t_p.scope, t_p.volume, t_p.viability, t_p.comment, t_p.id_breakdown FROM t_breakdown as t_b,t_process as t_p 
									WHERE t_b.id_breakdown=t_p.id_breakdown
									and t_p.id_process_type=2
									and t_b.id_order ='.$id_order);
		if($result->num_rows()>0)
			{
				return $result->result();
			}
			else return false;
	}
	
	function get_punch($id_order)
	{
		$result = $this->db->query('select t_b.variety,t_b.rootstock, t_p.id_process, t_p.id_process_type, t_p.process_date, t_p.scope, t_p.volume, t_p.viability, t_p.comment, t_p.id_breakdown FROM t_breakdown as t_b,t_process as t_p 
									WHERE t_b.id_breakdown=t_p.id_breakdown
									and t_p.id_process_type=3
									and t_b.id_order ='.$id_order);
		if($result->num_rows()>0)
			{
				return $result->result();
			}
			else return false;
	}
	
	function get_transplant($id_order)
	{
		$result = $this->db->query('select t_b.variety,t_b.rootstock, t_p.id_process, t_p.id_process_type, t_p.process_date, t_p.scope, t_p.volume, t_p.viability, t_p.comment, t_p.id_breakdown FROM t_breakdown as t_b,t_process as t_p 
									WHERE t_b.id_breakdown=t_p.id_breakdown
									and t_p.id_process_type=4
									and t_b.id_order ='.$id_order);
		if($result->num_rows()>0)
			{
				return $result->result();
			}
			else return false;
	}

	function delete_process($id)
	{
		$this->db->where('id_process',$id);
		$this->db->delete('t_process');
	}

	function delete_process_germination($id)
	{
		$this->db->where('id_germination',$id);
		$this->db->delete('t_germination');
	}
	
	function update_order($id_order,$data)
	{
		$this->db->where('id_order', $id_order);
		$this->db->update('t_order', $data);
		return $this->db->affected_rows();
	}

	function update_order2($id_order,$data)
	{
		$this->db->where('id_order', $id_order);
		$this->db->update('t_order', $data);
		return $this->db->affected_rows();
	}

	function get_process_germination()
	{
		$result = $this->db->query('select tg.id_germination, tg.id_order, tg.germ_date, tg.volume, tg.germ_percentage, tg.viability, tg.seed_name, tg.comment,  t_o.id_order, t_o.id_status
									from t_germination as tg, t_order as t_o 
									where t_o.id_order = tg.id_order and t_o.id_status = 2 and t_o.activate = 1
									order by tg.id_germination');
		if($result->num_rows()>0)
			{
				return $result->result();
			}
			else return null;
	
	}

	function get_process_graft()
	{
		$result = $this->db->query('select t_p.id_process, t_p.id_process_type, t_p.process_date, t_p.scope, t_p.volume, t_p.viability, t_p.comment, t_p.id_breakdown,
									t_o.id_status,t_o.id_order,t_o.id_status,
									t_b.id_breakdown,t_b.id_order
									from t_process as t_p, t_order as t_o,t_breakdown as t_b
									where t_p.id_breakdown=t_b.id_breakdown
									and t_b.id_order=t_o.id_order
									and t_o.id_status=2
									and t_p.id_process_type = 2 
									and t_o.activate=1');
																				
		if($result->num_rows() > 0) 
		{
			return $result->result();
		} 
		else 
		{
			return null;
		} 
	}

	function get_process_punch()
	{
		$result = $this->db->query('select t_p.id_process, t_p.id_process_type, t_p.process_date, t_p.scope, t_p.volume, t_p.viability, t_p.comment, t_p.id_breakdown,
									t_o.id_status,t_o.id_order,t_o.id_status,
									t_b.id_breakdown,t_b.id_order
									from t_process as t_p, t_order as t_o,t_breakdown as t_b
									where t_p.id_breakdown=t_b.id_breakdown
									and t_b.id_order=t_o.id_order
									and t_o.id_status=2
									and t_p.id_process_type = 3
									and t_o.activate=1');
																				
		if($result->num_rows() > 0) 
		{
			return $result->result();
		} 
		else 
		{
			return null;
		} 
	}

	function get_process_transplant()
	{
		$result = $this->db->query('select t_p.id_process, t_p.id_process_type, t_p.process_date, t_p.scope, t_p.volume, t_p.viability, t_p.comment, t_p.id_breakdown,
									t_o.id_status,t_o.id_order,t_o.id_status,
									t_b.id_breakdown,t_b.id_order
									from t_process as t_p, t_order as t_o,t_breakdown as t_b
									where t_p.id_breakdown=t_b.id_breakdown
									and t_b.id_order=t_o.id_order
									and t_o.id_status=2
									and t_p.id_process_type = 4
									and t_o.activate=1');
																				
		if($result->num_rows() > 0) 
		{
			return $result->result();
		} 
		else 
		{
			return null;
		} 
	}

	function get_process_sowing()
	{
		$query = $this->db->query('select t_s.id_sowing,t_s.sowing_date, t_s.volume, t_s.id_order, t_s.comment, t_s.completed, t_s.seed, t_o.id_status,t_o.id_order 
									from t_sowing as t_s, t_order as t_o 
									where  t_o.id_status = 2 and t_o.id_order = t_s.id_order and t_o.activate=1');
		
			if($query->num_rows()>0)
			{
				return $query->result();
			}
			else return false;
	}

	function get_order_id_breakdown($id_breakdown)
	{
		$this->db->where('id_breakdown',$id_breakdown);
		$query=$this->db->get('t_breakdown');
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}
	

	function fill_sowing($id_order)
	{
		$data = array(
			'id_order' => $id_order,
			'sowing' => 0,
			'germination' => 0,
			'graft' => 0,
			'punch' => 0,
			'transplant' => 0,
		);
		$this->db->insert('t_total', $data);
		return $this->db->affected_rows();
	}
	
	function update_total_sowing($id_total, $id_order, $id_breakdown)
	{
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->select_sum('volume');
		$query->$this->db->get('t_sowing');
		$data = array(
			'sowing' => $query->result()[0]
		);
		if($query->num_rows()>0)
		{
			$this->db->where('id_total', $id_total);
			$this->db->update('t_total', $data);
			return $this->db->affected_rows();
		} 
		else return null;
	}
	
	function get_all_germination($id_breakdown)
	{
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type', 1);
		$this->db->select_sum('volume');
		$query->$this->db->get('t_process');
		if($query->num_rows()>0)
		{
			return $query->result()[0];
		}
		else return false;
	}	

	function get_volume_germination($id){
		$this->db->select('volume');
		$this->db->where('id_germination',$id);
		$query=$this->db->get('t_germination');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function get_seed_name($id)
	{
		$this->db->select('seed_name');
		$this->db->where('id_germination',$id);
		$query=$this->db->get('t_germination');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function get_volume_process($id){
		$this->db->select('volume');
		$this->db->where('id_process',$id);
		$query=$this->db->get('t_process');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}
	
	function get_order_variety($id_order)
	{
		$result = $this->db->query('SELECT DISTINCT `variety`
							FROM `t_breakdown` 
							WHERE `id_order` ='.$id_order);
		if($result->num_rows()>0)
			{
				return $result->result();
			}
			else return false;
	}
	
	function get_order_rootstock($id_order)
	{
		$result = $this->db->query('SELECT DISTINCT `rootstock`
							FROM `t_breakdown` 
							WHERE `id_order` ='.$id_order);
		if($result->num_rows()>0)
			{
				return $result->result();
			}
			else return false;
	}
	
	function get_seed_total($id_order,$seed_name)
	{
		$this->db->select('total');
		$this->db->where('id_order',$id_order);
		$this->db->where('seed_name',$seed_name);
		$query=$this->db->get('t_total_seed');
		if($query->num_rows()>0)
		{
			return $query->row(0);
		}
		else return false;
	}
	
	function get_seed_volume($id_order,$seed_name)
	{
		$this->db->select('order_volume');
		$this->db->where('id_order',$id_order);
		$this->db->where('seed_name',$seed_name);
		$query=$this->db->get('t_total_seed');
		if($query->num_rows()>0)
		{
			return $query->row(0);
		}
		else return false;
	}

	function get_volume_sowing($id_order){
		$this->db->where('id_order',$id_order);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_sowing');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;

	}

	function insert_embark($datos){
		$this->db->insert('t_embark', $datos);
		return $this->db->affected_rows();
	}

	function get_embark($id_order){
		$this->db->where('id_order',$id_order);
		$query=$this->db->get('t_embark');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function update_embark($id_order,$datos){
		$this->db->where('id_order', $id_order);
		$this->db->update('t_embark', $datos);
		return $this->db->affected_rows();
	}

	function get_sowing($id_order){
		$query=$this->db->query('select t_s.* 
								from t_sowing as t_s
								left join t_germination as t_g
								on t_s.id_sowing = t_g.id_sowing
								where t_g.id_sowing is null and t_s.id_order='.$id_order);
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function get_sowing_id_sowing($id_sowing){
		$this->db->where('id_sowing',$id_sowing);
		$query=$this->db->get('t_sowing');
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}

	function get_germination_id_sowing($id_sowing){
		$this->db->where('id_sowing', $id_sowing);
		$query=$this->db->get('t_germination');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function get_seed_id_seed($id_seed){
		$this->db->where('id_seed',$id_seed);
		$query=$this->db->get('t_seeds');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function get_sum_sowing($id_seed){
		$this->db->where('id_seed',$id_seed);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_sowing');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function get_breakdown($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$query=$this->db->get('t_breakdown');
		if($query->num_rows > 0){
			return $query->result();
		}
		else return false;

	}

	function sum_seed($seed, $id_order){
		$this->db->where('seed_name',$seed);
		$this->db->where('id_order',$id_order);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_germination');
		if($query->num_rows > 0){
			return $query->result();
		}
		else return false;

	}

	function sum_graft($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',2);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return 0;
	}

	function sum_punch($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',3);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return 0;
	}

	function sum_transplant($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',4);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return 0;
	}

	function update_vial($seed_name,$order,$viability_total)
	{
		$result=$this->db->query('update `t_total_seed`
									set `viability_total`=`viability_total`-'.$viability_total.'
									where `id_order` = '.$order.'
									and `seed_name` = "'.$seed_name.'"');
		return $this->db->affected_rows();
	}

	function get_vial_total($order,$seed_name)
	{
		$this->db->select('order_volume,viability_total');
		$this->db->where('id_order',$order);
		$this->db->where('seed_name',$seed_name);
		$query=$this->db->get('t_total_seed');
		if($query->num_rows()>0)
		{
			return $query->row(0);
		}
		else return false;
	}

	function update_scope($order,$seed_name,$scope)
	{
		$result=$this->db->query('update `t_total_seed`
									set `scope`= '.$scope.'
									where `id_order` = '.$order.'
									and `seed_name` = "'.$seed_name.'"');
		return $this->db->affected_rows();		
	}

	function get_breakdown_vr($seed_name,$id_order){
		$this->db->where('variety',$seed_name);
		$this->db->where('id_order',$id_order);
		$this->db->or_where('rootstock',$seed_name);
		$this->db->where('id_order',$id_order);
		$query=$this->db->get('t_breakdown');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;

	}

	function get_volume_graft($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',2);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return false;
		}
	}


	function get_volume_punch($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',3);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function get_volume_transplant($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',4);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return false;
		}
	}

	function update_total_graft($volume_graft,$id_order){
		$this->db->query('update t_total set graft = graft - '.$volume_graft.' where id_order = '.$id_order);
		
		return $this->db->affected_rows();

	}

	function update_total_punch($volume_punch,$id_order){
		$this->db->query('update t_total set punch = punch - '.$volume_punch.' where id_order = '.$id_order);
		
		return $this->db->affected_rows();

	}

	function update_total_transplant($volume_transplant,$id_order){
		$this->db->query('update t_total set transplant = transplant - '.$volume_transplant.' where id_order = '.$id_order);
		
		return $this->db->affected_rows();

	}

	function delete_process_breakdown($id_breakdown)
	{
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->delete('t_process');
		return $this->db->affected_rows();
	}

	function get_process_id_process($id_process){
		$this->db->where('id_process',$id_process);
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_process_id_breakdown($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',3);
		$this->db->or_where('id_process_type',4);
		$this->db->where('id_breakdown',$id_breakdown);
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function get_process_id_breakdown2($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',4);
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}

	function get_process_id_breakdown3($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',3);
		$this->db->or_where('id_process_type',4);
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->or_where('id_process_type',2);
		$this->db->where('id_breakdown',$id_breakdown);
		$query=$this->db->get('t_process');
		if($query->num_rows()>0){
			return $query->result();
		}
		else return false;
	}


	function delete_process_id_breakdown_graft($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',2);
		$this->db->delete('t_process');
	}

	function delete_process_id_breakdown_punch($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',3);
		$this->db->delete('t_process');
	}

	function delete_process_id_breakdown_transplant($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$this->db->where('id_process_type',4);
		$this->db->delete('t_process');
	}

	function update_graft($id_order,$variety,$rootstock,$volume){
		$this->db->query('update `t_total_seed` set graft_total = graft_total + '.$volume.' where id_order ='.$id_order.' and seed_name = "'.$variety.'" or id_order = '.$id_order.' and seed_name = "'.$rootstock.'"');
		return $this->db->affected_rows();
	}

	function update_punch($id_order,$variety,$rootstock,$volume){
		$this->db->query('update `t_total_seed` set punch_total = punch_total + '.$volume.' where id_order ='.$id_order.' and seed_name = "'.$variety.'" or id_order = '.$id_order.' and seed_name = "'.$rootstock.'"');
		return $this->db->affected_rows();
	}

	function update_transplant($id_order,$variety,$rootstock,$volume){
		$this->db->query('update `t_total_seed` set transplant_total = transplant_total + '.$volume.' where id_order ='.$id_order.' and seed_name = "'.$variety.'" or id_order = '.$id_order.' and seed_name = "'.$rootstock.'"');
		return $this->db->affected_rows();
	}

	function update_graft2($id_order,$variety,$rootstock,$volume){
		$this->db->query('update `t_total_seed` set graft_total = graft_total - '.$volume.' where id_order ='.$id_order.' and seed_name = "'.$variety.'" or id_order = '.$id_order.' and seed_name = "'.$rootstock.'"');
		return $this->db->affected_rows();
	}

	function update_punch2($id_order,$variety,$rootstock,$volume){
		$this->db->query('update `t_total_seed` set punch_total = punch_total - '.$volume.' where id_order ='.$id_order.' and seed_name = "'.$variety.'" or id_order = '.$id_order.' and seed_name = "'.$rootstock.'"');
		return $this->db->affected_rows();
	}

	function update_transplant2($id_order,$variety,$rootstock,$volume){
		$this->db->query('update `t_total_seed` set transplant_total = transplant_total - '.$volume.' where id_order ='.$id_order.' and seed_name = "'.$variety.'" or id_order = '.$id_order.' and seed_name = "'.$rootstock.'"');
		return $this->db->affected_rows();
	}

	function get_volume_graft_seed($seed_name,$id_order){
		$this->db->where('seed_name',$seed_name);
		$this->db->where('id_order',$id_order);
		$query=$this->db->get('t_total_seed');
		if($query->num_rows > 0){
			return $query->result();
		}
		else return false;
	}

	function insert_image_process($id_order)
	{
		$this->db->set('id_order', $id_order); 
		$this->db->insert('t_images_process'); 
		return $this->db->affected_rows();
	}

	function update_image_process($id_order,$datos)
	{
		$this->db->where('id_order', $id_order);
		$this->db->update('t_images_process', $datos);
		return $this->db->affected_rows();
	}

	function get_image_process($id_order)
	{
		$this->db->where('id_order', $id_order);
		$query=$this->db->get('t_images_process');
		if($query->num_rows > 0){
			return $query;
		}
		else return false;
	}

	function get_image_injer($id_order)
	{
		$query = $this->db->query('select img_injer1, img_injer2, img_injer3
									from t_images_process
									where id_order = '.$id_order);
		if($query->num_rows > 0){
			return $query->result();
		}
		else return false;
	}

	function get_image_pinch($id_order)
	{
		$query = $this->db->query('select img_pinch1, img_pinch2, img_pinch3
									from t_images_process
									where id_order = '.$id_order);
		if($query->num_rows > 0){
			return $query->result();
		}
		else return false;
	}

	function get_image_trans($id_order)
	{
		$query = $this->db->query('select img_trans1, img_trans2, img_trans3
									from t_images_process
									where id_order = '.$id_order);
		if($query->num_rows > 0){
			return $query->result();
		}
		else return false;
	}


	function get_total_seed($order,$seed){
		$this->db->where('id_order',$order);
		$this->db->where('seed_name',$seed);
		$query=$this->db->get('t_total_seed');
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}

	
}
	
?>