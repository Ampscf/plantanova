<?php

Class model_user extends CI_Model	{

	//Obtiene los datos del usuario correspondiente al mail agregado de la base de datos
	function login($mail)
	{
		$this -> db -> select('id_user, mail, password,id_rol');
		$this -> db -> from('t_user');
		$this -> db -> where ('mail', $mail);
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


	//Obtiene al administrador por el id
	function get_admin_by_id($id)
	{
		$result = $this->db->query('call ps_user(' . $id . ')');
		return $result->row();
	}


	//Obtiene un administrador por su mail
	function get_admin_by_mail($mail)
	{
		$this -> db -> select('id_user,first_name,last_name,mail');
		$this -> db -> from('t_user');
		$this -> db -> where ('mail', $mail);
		
		$query = $this -> db -> get();

		return $query->row();
	}
	
	
	//Agrega a un usuario nuevo a la base de datos
	function insert_client_user($data)
	{
		$this->db->insert('t_user',$data);
		return $this->db->affected_rows();
	}
}

?>