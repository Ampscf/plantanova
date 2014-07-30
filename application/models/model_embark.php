<?php

Class model_embark extends CI_Model	
{
	function insert_embark($datos){
		$this->db->insert('t_embark', $datos);
		return $this->db->affected_rows();
	}
}	
?>
