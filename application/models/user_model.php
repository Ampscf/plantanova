<?php

Class User_model extends CI_Model	{

	function login($mail, $contraseña){
	
		$this -> db -> select('id_usuario, mail, contraseña');
		$this -> db -> from('t_usuario');
		$this -> db -> where ('mail', $mail);
		$this -> db -> where ('contraseña', SHA1($contraseña));
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query->num_rows()==1) {
			return $query->result();
		} else {
			return false;
		}
	}
  
}

?>