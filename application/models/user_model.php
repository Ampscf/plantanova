<?php

Class User_model extends CI_Model	{

	function login($mail, $contraseña){
	
		$this -> db -> select('id_usuario, mail, contrasena');
		$this -> db -> from('t_usuario');
		$this -> db -> where ('mail', $mail);
		$this -> db -> where ('contrasena', SHA1($contraseña));
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