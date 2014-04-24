<?php

Class User_model extends CI_Model	{

	//Obtiene los datos del usuario correspondiente al mail agregado de la base de datos
		function login($mail, $pass){
	
		$this -> db -> select('*');
		$this -> db -> from('t_user');
		$this -> db -> where ('mail', $mail);
		$this -> db -> where('password', $pass);
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query->num_rows()==1) 
		{
			return $query->row();
		} 
		else 
		{
			return false;
		}
	}

}

?>