<?php

Class model_report extends CI_Model	{



	function get_inforders($id){

	$this -> db -> select('id_total_seed,seed_name,order_volume,viability_total,graft_total,punch_total,transplant_total,tutoring_total,scope');
			$this -> db -> from('t_total_seed');
			$this -> db -> where('id_order', $id);
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

	function get_orders(){
		$this -> db -> select('id_order,farmer,order_date_submit');
			$this -> db -> from('t_order');
			$this->db->where('id_status <>', 4); 
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
	function get_type($name){
		$this ->db-> select('type');
			$this ->db-> from('t_seeds');
			$this ->db-> where('seed_name', $name);
			$this ->db-> limit(1);
			$query =$this -> db -> get();
			if($query->num_rows() > 0) 
			{
				return $query->result();
			} 
			else 
			{
				return null;
			}


	}
	function get_totales($id_order){
		$this ->db-> select('sowing,germination,graft,punch,transplant,tutoring');
		$this ->db-> from('t_total');
		$this ->db-> where('id_order', $id_order);
		$query = $this ->db-> get();
		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return null;
		}


	}
	function get_embark(){
		$this->db->order_by('id_order');
		$query=$this->db->get('t_embark');
		if($query->num_rows > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_infouser(){
		$this->db->order_by('first_name');
		$query=$this->db->get('t_user');
		if($query->num_rows > 0){
			return $query->result();
		}else{
			return false;
		}


	}
	function get_breakdown($id){
		$this->db->order_by('id_breakdown');
		$this ->db-> where('id_order', $id);
		$query=$this->db->get('t_breakdown');
		if($query->num_rows > 0){
			return $query->result();
		}else{
			return false;
		}

	}

	function get_germination($id){
		$this->db->order_by('id_germination');
		$this ->db-> where('id_breakdown', $id);
		$query=$this->db->get('t_breakdown');
		if($query->num_rows > 0){
			return $query->result();
		}else{
			return false;
		}

	}


	function get_sowing($id_order,$seed_name){
		$this->db->where('id_order',$id_order);
		$this->db->where('seed',$seed_name);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_sowing');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}

	}
		
	function get_germination2($id_order,$seed_name){
		$this->db->where('id_order',$id_order);
		$this->db->where('seed_name',$seed_name);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_germination');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_farmer($id_order){
		$this->db->where('id_order',$id_order);
		$this->db->select('farmer');
		$query=$this->db->get('t_order');
		if ($query->num_rows()>0) {
			return $query->result();
		}else{
			return false;
		}
	}


	function get_process($id_breakdown){
		$this->db->order_by('id_process');
		$this->db->where('id_breakdown',$id_breakdown);
		$query=$this->db->get('t_process');
		if($query->num_rows > 0){
			return $query->result();

		}else{

			return false;
		}
	}

	function get_seeds(){
		$this->db->order_by('id_order');
		$query=$this->db->get('t_seeds');
		if($query->num_rows > 0){
			return $query->result();
		}else{
			return false;
		}
	}

}
?>