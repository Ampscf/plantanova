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

}	
?>