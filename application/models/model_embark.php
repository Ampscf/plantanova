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

		if($query->num_rows() > 0)
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

	function delete_fils($id_file)
	{
		$this->db->where('id_file',$id_file);
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

	function get_card_bill($id_file)
	{
		$this->db->where('id_file',$id_file);
		$query=$this->db->get('t_files');
		if($query->num_rows > 0){
			return $query->result();
		}
		else return false;
	}

	function get_card_bills($id_order)
	{
		$this->db->where('id_order',$id_order);
		$this->db->where('id_files',2);
		$query=$this->db->get('t_files');
		if($query->num_rows > 0){
			return $query->result();
		}
		else return false;
	}

	function get_order_dictum($id_order)
	{
		$this->db->where('id_order',$id_order);
		$this->db->where('id_files',3);
		$query=$this->db->get('t_files');
		if($query->num_rows > 0){
			return $query->result();
		}
		else return false;
	}

	function get_state($id_state){
		$this->db->where('id_state',$id_state);
		$query=$this->db->get('t_state');
		if($query->num_rows()){
			return $query->result();
		}
		else return false;
	}

	function get_town($id_town){
		$this->db->where('id_town',$id_town);
		$query=$this->db->get('t_town');
		if($query->num_rows()){
			return $query->result();
		}
		else return false;
	}

	function get_order_embark($id_order)
	{
		$this->db->where('id_order', $id_order);
		$this->db->select_sum('volume');
		$query=$this->db->get('t_embark');
		if($query->num_rows()>0)
		{
			return $query->result()[0];
		}
		else return false;
	}

}	
?>