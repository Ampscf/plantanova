<?php

Class User_model extends CI_Model	{

	function login($mail, $pass){
	
		$this -> db -> select('id_user, mail, password,id_rol');
		$this -> db -> from('t_user');
		$this -> db -> where ('mail', $mail);
		$this -> db -> where ('password', SHA1($pass));
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

	function get_user_by_mail($mail)
	{
		$this -> db -> select('id_user,first_name,last_name,mail,state_name,farm_name,rfc,street,addr_number,colony');
		$this -> db -> from('t_user');
		$this -> db -> where ('mail', $mail);
		$this -> db -> join('t_state','t_state.id_state = t_user.id_state');
		
		$query = $this -> db -> get();

		return $query->row();
	}
	
  
}

?>