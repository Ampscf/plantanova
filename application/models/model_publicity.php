<?php
	Class model_publicity extends CI_Model
	{
		function get_publicity()
		{
			$query=$this->db->get('t_publicity');
			if($query->num_rows()>0)
			{
				return $query->result();
			} 
			else return false;
		}

		function get_image_p($id){
			$this->db->where('id_publicity',$id);
			$query=$this->db->get('t_publicity');
			if($query->num_rows()>0) return $query->result();
			else return false;
		}

		function add_pub_client($datos){
			$this->db->insert('t_pub_client', $datos);
			return $this->db->affected_rows();
		}

		function get_client_pub($id_user)
		{
			$result = $this->db->query('select p_image, p.id_publicity
										from t_publicity AS p, t_pub_client AS c
										where p.id_publicity = c.id_publicity
										and id_client ='.$id_user);
			if($result->num_rows()>0)
			{
				return $result->result();
			}
			else return null;
		}
	}
?>