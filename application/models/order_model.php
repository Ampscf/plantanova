<?php

Class Order_model extends CI_Model	{

	function get_plants(){
	
		$this -> db -> select('plant_name');
		$this -> db -> from('t_plant');

		$query = $this -> db -> get();

		if($query->num_rows() > 0) 
		{
			return $query->result();
		} 
		else 
		{
			return 0;
		}
	}

  
}

?>