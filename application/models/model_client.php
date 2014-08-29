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

	function get_process_embarker($id_client){
		$this->db->where('id_client',$id_client);
		$this->db->where('id_status',3);
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
		$this->db->where('id_status <>',4);
		$this->db->where('id_status <>',6);
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

	function get_messages($id_client){
		$query=$this->db->query('select t_oc.id_comment, t_oc.id_order, t_oc.date_comment, t_oc.comment_description 
						from t_order_comments as t_oc, t_order as t_o 
						where t_oc.id_order = t_o.id_order and t_o.id_client='.$id_client.' order by t_oc.id_comment desc');
		if($query->num_rows()>0){
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

	function get_user($id_user){
		$this->db->where('id_user',$id_user);
		$query=$this->db->get('t_user');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

}
?>