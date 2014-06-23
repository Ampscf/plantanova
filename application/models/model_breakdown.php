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
		$this->db->or_where('id_status',"5");
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

	function get_germination($id_order){
		$result = $this->db->query('select t_b.variety,t_b.rootstock, t_p.id_process, t_p.id_process_type, t_p.process_date, t_p.scope, t_p.volume, t_p.viability, t_p.comment, t_p.id_breakdown FROM t_breakdown as t_b,t_process as t_p 
									WHERE t_b.id_breakdown=t_p.id_breakdown
									and t_p.id_process_type=1
									and t_b.id_order ='.$id_order);
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
	
	function update_order($id_order,$data)
	{
		$this->db->where('id_order', $id_order);
		$this->db->update('t_order', $data);
		return $this->db->affected_rows();
	}

	function get_process_germination()
	{
		$result = $this->db->query('select t_p.id_process, t_p.id_process_type, t_p.process_date, t_p.scope, t_p.volume, t_p.viability, t_p.comment, t_p.id_breakdown,
									t_o.id_status,t_o.id_order,t_o.id_status,
									t_b.id_breakdown,t_b.id_order
									from t_process as t_p, t_order as t_o,t_breakdown as t_b
									where t_p.id_breakdown=t_b.id_breakdown
									and t_b.id_order=t_o.id_order
									and t_o.id_status=2
									and t_p.id_process_type = 1');
																				
		if($result->num_rows() > 0) 
		{
			return $result->result();
		} 
		else 
		{
			return null;
		} 
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
		$this->db->where('id_status',5);

		$query=$this->db->get('t_order');
		
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

	


}
	
?>