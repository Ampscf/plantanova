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

	function get_sub_user($mail){
		$this->db->where('mail',$mail);
		$query=$this->db->get('t_sub_user');
		if($query->num_rows()>0)
		{
			return $query->result();
		} 
		else return null;
	}
	
	//Obtiene los datos de todos los usuarios de la base de datos que no son administradores, es decir, los clientes
	function get_clients()
	{
		$this -> db -> select('id_user, farm_name, rfc, first_name, last_name,mail,terms_conditions');
		$this -> db -> from('t_user');
		$this -> db -> where('id_rol', 2);
		$this -> db -> where('active', 0);
		$this->db->order_by('farm_name','asc');
		
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
		$this ->db->where('id_user', $id);

		$query = $this->db->get('t_user');

		if($query->num_rows()>0) 
		{
			
			return $query->result();
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
	function insert_sub_user($data)
	{
		$this->db->insert('t_sub_user',$data);
		return $this->db->affected_rows();
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

	//---------------------------------
	// EMAIL EXISTS (true or false)
	//---------------------------------
	function email_exists($email)
	{
		$this->db->where('mail', $email);
		$query = $this->db->get('t_user');
		if( $query->num_rows() > 0 ){ 
			return true; 
		} else { 
			return false; 
		}
	}

	function update_pass_client($password,$id_user){
		$this->db->query('update t_user set password="'.$password.'" where id_user='.$id_user);
		return $this->db->affected_rows();
	}

	function get_message($id_user,$type){
		$this->db->where('id_user',$id_user);
		$this->db->where('type_message',$type);
		$query=$this->db->get('t_message');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function update_message($id_user,$type,$message){
		$datos=array('message'=>$message);
		$this->db->where('id_user',$id_user);
		$this->db->where('type_message',$type);
		$this->db->update('t_message',$datos);
		return $this->db->affected_rows();
	}

	function add_message($id_user,$type,$message){
		$datos=array('id_user'=>$id_user,
					'type_message'=>$type,
					'message'=>$message);

		$this->db->insert('t_message',$datos);
		return $this->db->affected_rows();
	}

	function insert_time($id_user,$time){
		$datos=array('id_user'=>$id_user,"login_time"=>$time);
		$this->db->insert('t_user_time',$datos);
	}

	function get_time_client(){
		$query=$this->db->get('t_user_time');
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_order($id_user){
		$this->db->where('id_client',$id_user);
		$this->db->where('id_status',1);
		$this->db->or_where('id_client',$id_user);
		$this->db->where('id_status',2);
		$this->db->or_where('id_client',$id_user);
		$this->db->where('id_status',3);
		$query=$this->db->get('t_order');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_breakdown($id_order){
		$this->db->where('id_order',$id_order);
		$query=$this->db->get('t_breakdown');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_inform_client($id_breakdown){
		$this->db->where('id_breakdown',$id_breakdown);
		$query=$this->db->get('t_client_inform');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function update_inform_client($datos){
		$this->db->where("id_breakdown",$datos['id_breakdown']);
		$this->db->update('t_client_inform',$datos);
		return $this->db->affected_rows();
	}

	function insert_inform_client($datos){
		$this->db->insert('t_client_inform',$datos);
		return $this->db->affected_rows();
	}

	function status_client_message($id_user,$status){
		$this->db->query('update t_user set message_status='.$status.' where id_user='.$id_user);
		return $this->db->affected_rows();
	}

	function seeds($variety,$rootstock,$id_order){
		$this->db->where('id_order', $id_order);
		$this->db->where('seed_name',$variety);
		$this->db->or_where('seed_name',$rootstock);
		$this->db->order_by('id_seed','desc');
		$query=$this->db->get('t_seeds');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}

	function get_germination($seed_name,$id_order){
		$this->db->where('id_order',$id_order);
		$this->db->where('seed_name',$seed_name);
		$query=$this->db->get('t_germination');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}

	}
}

?>
