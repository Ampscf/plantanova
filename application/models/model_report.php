<?php

Class model_report extends CI_Model	{



function get_users(){

$this -> db -> select('id_user,first_name');
		$this -> db -> from('t_user');
		$query = $this -> db -> get();
		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return null;
		}
}

function get_orders($id){
	$this -> db -> select('id_order,order_date_submit');
		$this -> db -> from('t_order');
		$this -> db -> where ('id_client', $id);
		$query = $this -> db -> get();
		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return null;
		}
	
}

function get_breakdown($id){
	$this -> db -> select('id_breakdown,variety,rootstock,volume');
		$this -> db -> from('t_breakdown');
		$this -> db -> where ('id_order', $id);
		$query = $this -> db -> get();
		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return null;
		}

}

}
?>