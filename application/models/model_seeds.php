<?php

Class model_seeds extends CI_Model	
{

	function get_orders(){
		$this->db->where('id_status',1);
		$this->db->or_where('id_status',2);
		$query=$this->db->get('t_order');
		if($query->num_rows()>0)
		{
			return $query->result();
		} 
		else return false;
	
	}

	function insert_seeds($data){
		$this->db->insert('t_seeds',$data);
		return $this->db->affected_rows();
	}

	function get_seeds_lists()
	{
	
		$result = $this->db->query('select id_seed, t_seeds.id_order, seed_name, batch, volume, seeds_date, type, farm_name, germ_percentage
									from `t_seeds`, `t_order`, `t_user`
									where t_seeds.id_order = t_order.id_order and t_order.id_client=t_user.id_user
									order by id_seed desc');
											
		if($result->num_rows() > 0) 
		{
			return $result->result();
		} 
		else 
		{
			return null;
		} 
	}
	
	function get_client_seeds($id)
	{
		$this->db->where('id_order',$id);
		$result=$this->db->get('t_seeds');
		if($result->num_rows()>0){
			
			return $result->result();

		}else{
			return null;
		}
	}
	
	function delete_seeds($id)
	{
		$this->db->where('id_seed',$id);
		$this->db->delete('t_seeds');	
	}

	function get_seed_id($id){
		$this->db->where('id_seed',$id);
		$query=$this->db->get('t_seeds');
		if($query->num_rows()>0){
			
			return $query;

		}else{
			return false;
		}
	}

	function update_seed($id_seed,$data)
	{
		$this->db->where('id_seed',$id_seed);
		$this->db->update('t_seeds', $data);
		return $this->db->affected_rows();
	}

	function suma_volumen_seeds($id_order){
		$this->db->where('id_order',$id_order);
		$this->db->select_sum('volume');
		$query = $this->db->get('t_seeds');
		if($query->num_rows()>0)
			{
				return $query->result()[0];
			} 
			else return null;
	}

	function update_status($id_order){
		$this->db->where('id_order',$id_order);
		$data = array(
               'id_status' => '2'
        		);
		$this->db->update('t_order',$data);
		return $this->db->affected_rows();
	}

	function select_seed_distinct(){
		$result = $this->db->query('select distinct id_order from t_seeds ');
											
		if($result->num_rows() > 0) 
		{
			return $result->result();
		} 
		else 
		{
			return null;
		} 
	}

	function get_farmer($id_order){
		$result = $this->db->query('select farmer from t_order where id_order='.$id_order);
		if($result->num_rows() > 0) 
		{
			return $result->result()[0];
		} 
		else 
		{
			return null;
		} 
	}	



}
?>
