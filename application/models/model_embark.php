<?php

Class model_embark extends CI_Model	
{
	function insert_embark($datos)
	{
		$this->db->insert('t_embark', $datos);
		return $this->db->affected_rows();
	}

	function update_embark($id_order,$datos)
	{
		$this->db->where('id_order', $id_order);
		$this->db->update('t_embark', $datos);
		return $this->db->affected_rows();
	}

	function get_embark($id_order)
	{
		$this->db->where('id_order', $id_order);
		$this->db->order_by('id_embark','asc');
		$query = $this->db->get('t_embark');

		if($query->num_rows()>0)
		{
			return $query;
		}
		else return false;
	}

	function delete_embark($id_embark){
		$this->db->where('id_embark',$id_embark);
		$this->db->delete('t_embark');
		return $this->db->affected_rows();
	}

	function add_file($datos)
	{
		$this->db->insert('t_files', $datos);
		return $this->db->affected_rows();
	}

	function delete_file($id_order)
	{
		$this->db->where('id_order',$id_order);
		$this->db->delete('t_files');
		return $this->db->affected_rows();
	}

	function get_order_bills($id_order)
	{
		$this->db->where('id_order',$id_order);
		$this->db->where('id_files',1);
		$query=$this->db->get('t_files');
		if($query->num_rows > 0){
			return $query->result();
		}
		else return false;
	}

}	
?>