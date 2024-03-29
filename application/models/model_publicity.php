<?php
	Class model_publicity extends CI_Model
	{
		function get_publicity()
		{
			$this->db->order_by('p_name','asc');
			$query=$this->db->get('t_publicity');
			if($query->num_rows()>0)
			{
				return $query->result();
			} 
			else return false;
		}

		function get_brochure()
		{
			$query=$this->db->get('t_brochure');
			if($query->num_rows()>0)
			{
				return $query->result();
			} 
			else return false;
		}

		function update_publicity($data){
		
		$this->db->where('id_publicity',$data['id_publicity']);
		$query=$this->db->update('t_publicity',$data);


		}
		function get_information($id_pub){
			$this->db->where('id_publicity',$id_pub);
			$query=$this->db->get('t_publicity');
			return $query->result();
		}

		function get_image_p($id){
			$this->db->where('id_publicity',$id);
			$query=$this->db->get('t_publicity');
			if($query->num_rows()>0) return $query->result();
			else return false;
		}

		function add_pub_client($datos){
			$this->db->where('id_publicity',$datos['id_publicity']);
			$this->db->where('id_client',$datos['id_client']);
			$query=$this->db->get('t_pub_client');
			if($query->num_rows()>0){
				return  $query->num_rows();
			}else{
				$this->db->insert('t_pub_client', $datos);
				return $this->db->affected_rows();
			}
		}

		function get_client_pub($id_user)
		{
			$result = $this->db->query('select p_image,p.p_thum, p.id_publicity, p_name, id_pub_client
										from t_publicity AS p, t_pub_client AS c
										where p.id_publicity = c.id_publicity
										and id_client ='.$id_user);
			if($result->num_rows()>0)
			{
				return $result->result();
			}
			else return null;
		}

		function delete_client_pub($id)
		{
			$this->db->where('id_pub_client',$id);
			$this->db->delete('t_pub_client');	
		}

		function get_publicity_id_pub($id_pub_client){
			$this->db->where('id_pub_client',$id_pub_client);
			$query=$this->db->get('t_pub_client');
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false; 
			}
		}

		function insert_publicity($datos)
		{
			$this->db->insert('t_publicity',$datos);
			return $this->db->affected_rows();
		}

		function delete_publicity($id_publicity)
		{
			$this->db->where('id_publicity',$id_publicity);
			$this->db->delete('t_publicity');	
		}

		function delete_cascade_publicity($id_publicity)
		{
			$this->db->where('id_publicity',$id_publicity);
			$this->db->delete('t_pub_client');	
		}
		function insert_brochure($datos)
		{
			$this->db->insert('t_brochure',$datos);
			return $this->db->affected_rows();
		}
			
		function get_file_b($id){
			$this->db->where('id_brochure',$id);
			$query=$this->db->get('t_brochure');
			if($query->num_rows()>0) return $query->result();
			else return false;
		}
		function delete_brochure($id_brochure)
		{
			$this->db->where('id_brochure',$id_brochure);
			$this->db->delete('t_brochure');	
		}
		function get_brochure_publicity($id_pub){
			$this->db->where('id_pub',$id_pub);
			$query=$this->db->get('t_brochure');
			if($query->num_rows()>0) return $query->result();
			else return false;


		}

	}
?>