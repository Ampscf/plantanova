<?php

Class model_breakdown extends CI_Model
{

	//Obtiene las ordenes que tienen un status de nuevas
	function get_new_orders()
	{
		$this->db->where('id_status',1);
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
		$query=$this->db->get('t_order');
		
		if($query->num_rows()>0)
		{
			return $query->result();
		}
		else return false;
	}
	
	//Obtiene las ordenes que tienen un estatus de terminadas
	function get_finish_orders()
	{
		$this->db->where('id_status',3);
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
									where t_o.id_order = tg.id_order
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
									where t_o.id_order = tg.id_order and t_o.id_status = 2
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
									and t_p.id_process_type = 2');
																				
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
									and t_p.id_process_type = 3');
																				
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
									and t_p.id_process_type = 4');
																				
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
									where  t_o.id_status = 2 and t_o.id_order = t_s.id_order');
		
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
	
	
}
	
?>