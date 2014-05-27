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
	
	//Obtiene los datos de todos los usuarios de la base de datos que no son administradores, es decir, los clientes
	function get_clients()
	{
		$this -> db -> select('id_user, farm_name, rfc, first_name, last_name');
		$this -> db -> from('t_user');
		$this -> db -> where('id_rol', 2);
		$this -> db -> where('active', 0);
		
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

	//Obtiene los datos de un �nico cliente de la base de datos para poder ser utilizado
	function get_client($id)
	{
		$this -> db -> select('farm_name');
		$this -> db -> from('t_user');
		$this -> db -> where('id_user', $id);
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

	function obtenerCliente($id){
			$this->db->where('id_user',$id);
			$query=$this->db->get('t_user');
			if($query->num_rows()>0) return $query;
			else return false;
		}

	//Modifica la informaci�n sobre un cliente, en caso de que se quiera modificar o actualizar su informaci�n
	/*function update_client($id, $town, $first_name, $last_name, $mail, $social, $rfc, $farm, $phone, $cellphone, $company_phone, $street, $num_add, $colony, $cp)
	{
		$data = array (
			'id_user' => $id,
			'id_town' => $town,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'mail' => $mail,
			'social_reason' => $social,
			'rfc' => $rfc,
			'farm_name' => $farm,	
			'phone' => $phone,
			'cellphone'	=> $cellphone,
			'company_phone'=> $company_phone,
			'street' => $street,
			'address_number' => $num_add,
			'colony' => $colony,
			'cp' => $cp,
 		)
		$this -> db -> where('id', $id);
		$this -> db -> update('t_user', $data);
	}*/
	
	//Función para cambiar el estatus de visibilidad de un cliente
	function delete_client($id)
	{
		$data = array('active' => 1);
		$this -> db -> where('id_user', $id);
		$this -> db -> update('t_user', $data);	
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
		
		$query = $this->db->get();

		return $query->row();
	}
	
	
	//Agrega a un usuario nuevo a la base de datos, $data es un arreglo que contiene todos los datos necesarios
	function insert_client_user($data)
	{
		$this->db->insert('t_user',$data);
		return $this->db->affected_rows();
	}

	function update_client_user($id_user,$data)
	{
		$this->db->where('id_user',$id_user);
		$this->db->update('t_user',$data);
		return $this->db->affected_rows();
	}
}

?>
