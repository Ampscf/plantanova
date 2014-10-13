<?php

Class model_files extends CI_Model
{
	function update_files($datos){
		$this->db->insert('t_files',$datos);
	}

	function get_files($id_order){
		$this->db->where('id_order',$id_order);
		$this->db->where('id_files',4);
		$query=$this->db->get('t_files');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function delete_files($id_file){
		$this->db->where('id_file',$id_file);
		$this->db->delete('t_files');

	}
}
?>