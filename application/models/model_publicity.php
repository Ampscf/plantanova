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
	}
?>