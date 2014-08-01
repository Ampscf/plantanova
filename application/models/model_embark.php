<?php

Class model_embark extends CI_Model	
{
	function insert_embark($datos){
		$this->db->insert('t_embark', $datos);
		return $this->db->affected_rows();
	}

	function update_embark($id_order,$datos){
		$this->db->where('id_order', $id_order);
		$this->db->update('t_embark', $datos);
		return $this->db->affected_rows();
	}
}	
?>
