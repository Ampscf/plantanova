<?php

Class model_report extends CI_Model	{



function get_inforders($id){

$this -> db -> select('id_total_seed,seed_name,order_volume,viability_total,graft_total,punch_total,transplant_total,tutoring_total,scope');
		$this -> db -> from('t_total_seed');
		$this -> db -> where('id_order', $id);
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

function get_orders(){
	$this -> db -> select('id_order,farmer,order_date_submit');
		$this -> db -> from('t_order');
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
function get_type($name){
	$this -> db -> select('type');
		$this -> db -> from('t_seeds');
		$this -> db -> where('seed_name', $name);
		$this -> db -> limit(1);
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
function get_totales($id_order){
	$this -> db -> select('sowing,germination,graft,punch,transplant,tutoring');
		$this -> db -> from('t_total');
		$this -> db -> where('id_order', $id_order);
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