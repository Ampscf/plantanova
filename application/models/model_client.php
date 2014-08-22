<?php

Class model_client extends CI_Model	
{
	function update_pass($password){
		$this->db->query('update t_user set password="'.$password.'" where id_user='.$this->session->userdata('id'));
		return $this->db->affected_rows();
	}

	function get_new_order($id_client){
		$this->db->where('id_client',$id_client);
		$this->db->where('id_status',1);
		$query=$this->db->get('t_order');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_process_order($id_client){
		$this->db->where('id_client',$id_client);
		$this->db->where('id_status',2);
		$query=$this->db->get('t_order');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_final_order($id_client){
		$this->db->where('id_client',$id_client);
		$this->db->where('id_status',5);
		$query=$this->db->get('t_order');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_order($id_client){
		$this->db->where('id_client',$id_client);
		$query=$this->db->get('t_order');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_process($id_order){
		$query=$this->db->query('select t_b.id_order, t_b.id_breakdown, t_p.id_breakdown, t_p.id_process_type
							from t_breakdown as t_b , t_process as t_p 
							where t_b.id_breakdown=t_p.id_breakdown and t_b.id_order = '.$id_order.'
							order by t_p.id_process_type desc');
		if($query->num_rows()>0)
			{
				return $query->result();
			}
			else return false;
	}

	function get_germination($id_order){
		$this->db->where('id_order',$id_order);
		$query=$this->db->get('t_germination');
		if($query->num_rows()>0)
			{
				return $query->result();
			}
			else return false;
	}
}
?>