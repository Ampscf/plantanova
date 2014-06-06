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
		$this->db->where('id_status',2);
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


}
	
?>