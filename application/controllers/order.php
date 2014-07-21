<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct() {
	   parent::__construct();
	   $this->load->model('model_user','',TRUE);
	   $this->load->model('model_order','',TRUE);
	   $this->load->model('model_breakdown','',TRUE);
	   $this->load->model('model_seeds','',TRUE);
	}

	public function index()
	{
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_body.php';
		$template['footer'] = "footer/view_footer.php";
		//Manda los datos necesarios para cargar los pedidos y datos del usuario
		$template['pedidos'] = $this->model_breakdown->get_new_orders();

		$this->load->view('main',$template);
	}

	public function dropdown_companies()
	{
		$result = $this -> model_order -> get_companies_drop();
		foreach($result as $row)
		{
			$companies[$row -> farm_name] = $row -> farm_name; 
		}
		return form_dropdown('companies', $companies);
	}
	
	//obtener la informacion de las compañia e imprimirla
	public function get_companie_info()
	{	
		
		$companie = $this->input->post('id_companie');
		
		if($companie>0){
		$comp=$this->model_user->obtenerCliente($companie);

		$first_name=$comp->result()[0]->first_name;
		$last_name=$comp->result()[0]->last_name;
		$mail=$comp->result()[0]->mail;
		$phone=$comp->result()[0]->phone;
		$street=$comp->result()[0]->street;
		$address_number=$comp->result()[0]->address_number;
		$colony=$comp->result()[0]->colony;
		$cp=$comp->result()[0]->cp;
		$social_reason=$comp->result()[0]->social_reason;

		echo "<br>";
		echo "<p><b>Razón Social:</b> ",$social_reason,"</p>";
		echo "<p><b>Calle/Colonia:</b> ",$street,",",$colony,"</p>";
		echo "<p><b>Numero: </b>",$address_number,"</p>";
		echo "<p><b>C.P.:</b> ",$cp,"</p>";
		echo "<p><b>Telefono:</b> ",$phone,"</p>";
		echo "<p><b>Nombre Completo:</b> ",$first_name," ",$last_name,"</p>";
		echo "<p><b>Correo electronico: </b>",$mail,"</p>";
		
		}else{
			echo "";
		}

		
	}
	
	//Muestra el formulario para empezar a ordenar	
	public function carga_ordenes(){
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_orders.php';
		$template['footer'] = "footer/view_footer.php";
		$template['companies'] = $this->model_order->get_companies_drop();
		
		$this->load->view('main',$template);	
		
	}
	
	public function load_zero_step()
	{
		$this->load->view('body/view_orders.php');
	}
	
	public function load_first_step($id)
	{
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_order_first.php';
		$template['footer'] = "footer/view_footer.php";
		$template['plants'] = $this->model_order->get_plants();
		$template['categories'] = $this->model_order->get_categories();
		$template['id_company']=$id;
		$template['company']=$this->model_user->get_client($id);

		$this->load->view('main',$template);	
	}
	
	public function load_second_step($id, $fecha, $idplant, $voltot, $categ, $id_order)
	{
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_order_second.php';
		$template['footer'] = "footer/view_footer.php";
		$template['sustratum'] = $this->model_order->get_sustratum();
		$template['subtype'] = $this->model_order->get_subtypes();
		$template['variety'] = $this->model_order->get_variety();
		$template['rootstock'] = $this->model_order->get_rootstock();
		$template['id_company']=$id;
		$template['company']=$this->model_user->get_client($id);
		$template['fecha']=$fecha;
		$template['id_plant']=$idplant;
		$template['planta']=$this->model_order->get_plant($idplant);
		$template['volumen']=$voltot;
		$template['categ']=$categ;
		$template['categoria']=$this->model_order->get_category($categ); 
		$template['id_order']=$this->model_order->get_order_id_order($id_order);
		$template['breakdown']=$this->model_order->get_breakdown($template['id_order']->result()[0]->id_order);
		$template['suma_volumen']=$this->model_order->suma_volumen($template['id_order']->result()[0]->id_order);

		
		$this->load->view('main',$template);	
	}

	public function load_second_step_two()
	{
		//$id, $fecha, $idplant, $voltot, $categ
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_order_second.php';
		$template['footer'] = "footer/view_footer.php";
		$template['sustratum'] = $this->model_order->get_sustratum();
		$template['subtype'] = $this->model_order->get_subtypes();
		$template['variety'] = $this->model_order->get_variety();
		$template['rootstock'] = $this->model_order->get_rootstock();
		$template['id_company']=$order->result()[0]->id_client;
		$template['company']=$this->model_user->get_client($order->result()[0]->id_client);
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['id_plant']=$order->result()[0]->id_plant;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categ']=$order->result()[0]->id_category;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category); 
		$template['id_order']=$this->model_order->get_order_id_order($this->uri->segment(3));
		$template['breakdown']=$this->model_order->get_breakdown($this->uri->segment(3));
		$template['suma_volumen']=$this->model_order->suma_volumen($this->uri->segment(3));

		
		$this->load->view('main',$template);	
	}

	function pending_order_second_next_before(){
		$id_order=$this->input->post('id_order');
		$restante=$this->input->post('restante');
		if($this->input->post('next')){

			if($restante!=0){
				
				?><script languaje="javacript">
				 alert('EL VOLUMEN RESTANTE DEBE SER IGUAL A CERO');
				location.href='load_second_step_two/<?php echo $id_order; ?>';
				</script>
				<?php
			}else{
				$template['header'] = 'header/view_admin_header.php';
				$template['body'] = 'body/view_order_last.php';
				$template['footer'] = "footer/view_footer.php";
				$template['order']=$this->model_order->get_order_id_order($id_order);
				$template['company']=$this->model_user->obtenerCliente($template['order']->result()[0]->id_client);
				$template['plant']=$this->model_order->get_plant($template['order']->result()[0]->id_plant);
				$template['category']=$this->model_order->get_category($template['order']->result()[0]->id_category);
				$template['breakdown']=$this->model_order->get_breakdown($id_order);
				$template['restante']=$restante;
			
				$this->load->view('main',$template);
			}
			
		}
		else if($this->input->post('before')){
			
			$template['order']=$this->model_order->get_order_id_order($id_order);
			$co=$this->model_order->get_order_comment($id_order);
			$template['order_comment']=$this->model_order->get_order_comment($id_order);
			

			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_order_first_data.php';
			$template['footer'] = "footer/view_footer.php";
			$template['plants'] = $this->model_order->get_plants();
			$template['categories'] = $this->model_order->get_categories();
			
			$template['company']=$this->model_user->get_client($template['order']->result()[0]->id_client);

			$this->load->view('main',$template);	

		}else if($this->input->post('save')){

		$idplant=$this->input->post('id_plant');
		$voltot=$this->input->post('voltot');
		$categ=$this->input->post('category');
		$id=$this->input->post('id_company');
		$fecha=$this->input->post('fecha');

		
		/*$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert">&times;</a>', '</div>');
		
		$this->form_validation->set_rules('sustratum','Sustrato','required|xss_clean|callback_sel_sustrato');
		$this->form_validation->set_rules('subtype','Subtipo','required|xss_clean|callback_sel_subtipo');
		$this->form_validation->set_rules('variety','Variedad','required|xss_clean');
		$this->form_validation->set_rules('rootstock','PortaInjerto','required|xss_clean');
		$this->form_validation->set_rules('volume','Volumen','required|numeric|xss_clean');*/
		
		
		/*if($this->form_validation->run() == FALSE) 
		{
			$this->load_second_step($id, $fecha, $idplant, $voltot, $categ, $id_order);
		} else {*/
			$volume=$this->input->post("volume");
			$data['id_order']=$id_order;
			$data['id_subtype']=$this->input->post('subtype');
			$data['variety']=$this->input->post('variety');
			$data['rootstock']=$this->input->post('rootstock');
			$data['volume']=$volume;

			if($this->model_order->insert_breakdown($data)>0){
				$a=$this->model_seeds->get_totalseed_order($id_order);
				$i=0; 
				$b=array();
				if($a != null)
				{
					foreach ($a as $key)
					{
						$b[$i]=$key->seed_name;		
						$i++;
					}
					if(in_array($data['variety'],$b))
					{
						$this->model_order->update_times($id_order,$data['variety'],$volume);
					} else {
						$dato['id_order']=$id_order;
						$dato['seed_name']=$data['variety'];
						$dato['order_volume']=$volume;
						$this->model_order->add_seeds($dato);
					}
					if(in_array($data['rootstock'],$b))
					{
						$this->model_order->update_times($id_order,$data['rootstock'],$volume);
					} else {
						$dati['id_order']=$id_order;
						$dati['seed_name']=$data['rootstock'];
						$dati['order_volume']=$volume;
						$this->model_order->add_seeds($dati);
					}
					
				} else {
					$dato['id_order']=$id_order;
					$dato['seed_name']=$data['variety'];
					$dato['order_volume']=$volume;
					$dati['id_order']=$id_order;
					$dati['seed_name']=$data['rootstock'];
					$dati['order_volume']=$volume;
					$this->model_order->add_seeds($dato);
					$this->model_order->add_seeds($dati);
				}
				$this->load_second_step($id, $fecha, $idplant, $voltot, $categ, $id_order);
			}
		//}
	
	}
	}

	public function order_last_next_before(){
		$id_order=$this->input->post('id_order');
		if($this->input->post('next')){
			
			$this->model_order->submit_order($id_order);
			$this->model_breakdown->fill_sowing($id_order);
			redirect("order/index");

		}
		if($this->input->post('before')){
			
			redirect("order/load_second_step_two/".$id_order);
		}
	}

	//carga las ordenes pendientes
	public function pending_order(){
		
		$a=$this->input->post();
		$id_client=$a['companies'];
		$template['id_company']=$id_client;
		$template['pending_order']=$this->model_order->get_pending_oreder($id_client);
		$template['company']=$this->model_user->get_client($id_client);
		if($id_client > 0){
			//verifica si tiene ordenes pendientes
			if($this->model_order->get_pending_oreder($id_client)!=false){
			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_pending_orders.php';
			$template['footer'] = "footer/view_footer.php";


			$this->load->view('main',$template);
			}
			else{
				$template['body']=$this->load_first_step($id_client);				
			}
		}else $this->carga_ordenes();

	}

	public function pending_order_two($id){
		
		$id_client=$id;
		$template['id_company']=$id_client;
		$template['pending_order']=$this->model_order->get_pending_oreder($id_client);
		$template['company']=$this->model_user->get_client($id_client);
		if($id_client > 0){
			//verifica si tiene ordenes pendientes
			if($this->model_order->get_pending_oreder($id_client)!=false){
			$template['header'] = 'header/view_admin_header.php';
			$template['body'] = 'body/view_pending_orders.php';
			$template['footer'] = "footer/view_footer.php";

			$this->load->view('main',$template);
			}
			else{
				$template['body']=$this->carga_ordenes();
				
			}
		}else $this->carga_ordenes();

	}

	//funcion para valorar a donde dirigirse en la orden pendiente atras o adelante
	public function pending_order_next_before(){
		if($this->input->post('next')){
			$a=$this->input->post();
			$id_client=$a['id_company'];
			$template['body']=$this->load_first_step($id_client);
			
		}
		else if($this->input->post('before')){
			$this->carga_ordenes();
		}
		
	}

	function delete_order()
	{
		foreach ($_POST as $key => $value) 
		{
			if(is_int($key))
			{
				$llave=$key;
			}
		}
		$this -> model_order -> delete_order($llave);
		$this -> model_order -> delete_order_comment($llave);
		$id_client=$this->input->post('id_client');
		$this->pending_order_two($id_client);
		//redirect("order/pending_order_two");
	}

	function delete_order_pedido()
	{
		foreach ($_POST as $key => $value) 
		{
			if(is_int($key))
			{
				$llave=$key;
			}
		}
		$this -> model_order -> delete_order($llave);
		$this -> model_order -> delete_order_comment($llave);
		$id_client=$this->input->post('id_client');
		$this->index();
		//redirect("order/pending_order_two");
	}

	public function pending_order_first_next_before(){
		$a=$this->input->post();
		$id_client=$this->input->post('id_company');
		/*$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
		//Valida que los campos que se reciban esten llenos
		$this->form_validation->set_rules('plant', 'cultivo', 'required|xss_clean|callback_sel_plant');
		$this->form_validation->set_rules('datepicker', 'fecha', 'required|xss_clean|callback_sel_date');
		$this->form_validation->set_rules('arms', 'brazos', 'required|xss_clean');
		$this->form_validation->set_rules('category', 'categoria', 'required|xss_clean|callback_sel_category');
		$this->form_validation->set_rules('volume', 'volumen', 'required|numeric|xss_clean');
		$this->form_validation->set_rules('tutoring', 'tutoreo', 'required|xss_clean');
		
		*/if($this->input->post('next')){
			/*if($this->form_validation->run() == FALSE) 
			{
				//vuelve a la pagina de registro e imprime los errores
				$this->load_first_step($id_client);
				

			}
			else{*/
				$data['id_status'] = 4;
				$data['id_plant'] = $this->input->post('plant');
				$data['id_category'] = $this->input->post('category');
				$data['id_user'] =$this->session->userdata('id');
				$data['id_client'] = $id_client;
				$fecha=$this->input->post('datepicker');
				$data['order_date_delivery'] = date("Y-m-d H:i:s", strtotime($fecha));
				$data['total_volume'] = $this->input->post('volume');
				$data['branch_number'] = $this->input->post('arms');
				$data['tutoring'] = $this->input->post('tutoring');
				$data['comment'] = $this->input->post('comment');
				$data['farmer']=$this->input->post('farmer');

				$datas=$this->input->post('comment');

				$idplant=$data['id_plant'];
				$voltot=$data['total_volume'];
				$categ=$data['id_category'];


								
				if($this->model_order->add_order($data) > 0 )
				{	$id_order=$this->model_order->get_id_order();
					$this->model_order->add_coment_oreder($datas);		
					unset($data);
					$data['msj'] = "Exito";
					$data['template'] = $this->load_second_step($id_client, $fecha, $idplant, $voltot, $categ,$id_order->result()[0]->id_order);				
				}
				else
				{
					unset($data);
					$error['msj'] = "Error";
					$error['errores'] = "Error al guardar al usuario";
					$error['template'] = $this->load_first_step($id_client);
				}
			
			//}
			
			
		}
		else if($this->input->post('before')){
			$template['body']=$this->pending_order_two($id_client);
			
		}
	}

	public function pending_order_first_next_before_update(){
		$a=$this->input->post();
		$id_client=$a['id_company'];
		/*$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		
		//Valida que los campos que se reciban esten llenos
		$this->form_validation->set_rules('plant', 'cultivo', 'required|xss_clean|callback_sel_plant');
		$this->form_validation->set_rules('datepicker', 'fecha', 'required|xss_clean|callback_sel_date');
		$this->form_validation->set_rules('arms', 'brazos', 'required|xss_clean');
		$this->form_validation->set_rules('category', 'categoria', 'required|xss_clean|callback_sel_category');
		$this->form_validation->set_rules('volume', 'volumen', 'required|numeric|xss_clean');
		$this->form_validation->set_rules('tutoring', 'tutoreo', 'required|xss_clean');
		
		*/if($this->input->post('next')){
			/*if($this->form_validation->run() == FALSE) 
			{
				//vuelve a la pagina de registro e imprime los errores
				$this->load_first_step($id_client);
				

			}
			else{*/
				$data['id_status'] = 4;
				$data['id_plant'] = $this->input->post('plant');
				$data['id_category'] = $this->input->post('category');
				$data['id_user'] =$this->session->userdata('id');
				$data['id_client'] = $id_client;
				$fecha=$this->input->post('datepicker');
				$data['order_date_delivery'] = date("Y-m-d H:i:s", strtotime($fecha));
				$data['total_volume'] = $this->input->post('volume');
				$data['branch_number'] = $this->input->post('arms');
				$data['tutoring'] = $this->input->post('tutoring');
				$data['farmer']=$this->input->post('farmer');

				$datas=$this->input->post('comment');

				$idplant=$data['id_plant'];
				$voltot=$data['total_volume'];
				$categ=$data['id_category'];

				$id_order=$this->input->post('id_order');

					
				if($this->model_order->update_order($id_order,$data) > 0 )
				{
					$this->model_order->update_coment_oreder($id_order,$datas);
					unset($data);
					$data['msj'] = "Exito";
					$data['template'] = $this->load_second_step($id_client, $fecha, $idplant, $voltot, $categ, $id_order);
				

				}
				else
				{
					$this->model_order->update_coment_oreder($id_order,$datas);
					unset($data);
					$error['msj'] = "Error";
					$error['errores'] = "Error al guardar al usuario";
					$error['template'] = $this->load_second_step($id_client, $fecha, $idplant, $voltot, $categ, $id_order);
				
				}
			
			}
			
			
		//}
		else if($this->input->post('before')){
			$template['body']=$this->pending_order_two($id_client);
			
		}
	}
	function sel_plant()
	{
		if($this->input->post('plant') == "-1")
		{
			$this->form_validation->set_message('sel_plant', 'Selecciona un %s.');
			return FALSE;
		}
		return TRUE;
	}

	function sel_category()
	{
		if($this->input->post('category') == "-1")
		{
			$this->form_validation->set_message('sel_category', 'Selecciona una %s.');
			return FALSE;
		}
		return TRUE;
	}

	function sel_date()
	{
		$fecha=$this->input->post('datepicker');
		$date= date("Y-m-d H:i:s", strtotime($fecha));
		$cdate=date("Y-m-d H:i:s");
		if($cdate > $date)
		{
			$this->form_validation->set_message('sel_date', 'La %s seleccionada es menor al dia de hoy.');
			return FALSE;
		}
		return TRUE;
	}

	//AJAX:Función que regresa todas las ciudades de un estado
	public function get_subtype()
	{	
		$id_sustratum = $this->input->post('sustratum');
		echo $id_sustratum;
	
		$subtype = $this->model_order->get_sustratum_subtype($id_sustratum);
		$result = "";
		foreach ($subtype as $key) 
		{
			$result = $result . "<option value='" . $key->id_subtype . "'>" . $key->subtype_name . "</option>";
		}
		echo $result;
	}

	function insert_breakdown()
	{
		$data['id_sustratum']=$this->input->post('sustratum');
		$data['id_subtype']==$this->input->post('subtype');
		$data['id_variety']==$this->input->post('variety');
		$data['id_rootstock']==$this->input->post('id_rootstock');
		$data['volume']==$this->input->post("volume");

		$this->model_order->insert_breakdown($data);
	
	}
	
	public function delete_breakdown()
    {
        foreach ($_POST as $key => $value)
        {
            if(is_int($key))
            {    
                $llave=$key;

            }
        }
		$a = $this->model_order->get_breakdown_seeds($llave);
		$b = $this->model_order->get_times($a->result()[0]->id_order,$a->result()[0]->variety);
		if($b->result()[0]->times==1)
		{
			$this->model_order->delete_totalseed($a->result()[0]->id_order,$a->result()[0]->variety);
			//$this->model_order->delete_totalseed($a->result()[0]->id_order,$a->result()[0]->rootstock);
		} else {
			$this->model_order->update_times2($a->result()[0]->id_order,$a->result()[0]->variety,$a->result()[0]->volume);
			//$this->model_order->update_times2($a->result()[0]->id_order,$a->result()[0]->rootstock,$a->result()[0]->volume);
		}
		$c = $this->model_order->get_times($a->result()[0]->id_order,$a->result()[0]->rootstock);
		if($c->result()[0]->times==1)
		{
			$this->model_order->delete_totalseed($a->result()[0]->id_order,$a->result()[0]->rootstock);
		} else {
			$this->model_order->update_times2($a->result()[0]->id_order,$a->result()[0]->rootstock,$a->result()[0]->volume);
		}

       	$this -> model_order -> delete_breakdown($llave);
       	echo "b",$b->result()[0]->times;
       	echo "c",$c->result()[0]->times;
       	redirect("order/load_second_step_two/".$this->uri->segment(3), "refresh");
    }
	
	public function sel_sustrato()
	{
		if($this->input->post('sustratum') == "-1")
		{
			$this->form_validation->set_message('sel_sustrato', 'Selecciona un %s.');
			return FALSE;
		}
		return TRUE;
	}
	
	public function sel_subtipo()
	{
		if($this->input->post('subtype') == "-1")
		{
			$this->form_validation->set_message('sel_subtipo', 'Selecciona un %s.');
			return FALSE;
		}
		return TRUE;
	}
	
	public function temporal()
	{
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_order_last.php';
		$template['footer'] = "footer/view_footer.php";
		
		$this->load->view('main',$template);
	}

	public function edit_order(){
		$order=$this->model_order->get_order_id_order($this->uri->segment(3));
		$total_sowing=$this->model_order->get_total_sowing($this->uri->segment(3));
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_order_sowing.php';
		$template['footer'] = "footer/view_footer.php";
		$template['id_company']=$order->result()[0]->id_client;
		$template['company']=$this->model_user->get_client($order->result()[0]->id_client);
		$template['fecha']=$order->result()[0]->order_date_submit;
		$template['id_plant']=$order->result()[0]->id_plant;
		$template['planta']=$this->model_order->get_plant($order->result()[0]->id_plant);
		$template['volumen']=$order->result()[0]->total_volume;
		$template['categ']=$order->result()[0]->id_category;
		$template['categoria']=$this->model_order->get_category($order->result()[0]->id_category); 
		$template['id_order']=$this->uri->segment(3);
		$template['client']=$this->model_user->obtenerCliente($order->result()[0]->id_client);
		$template['breakdown']=$this->model_order->get_breakdown($this->uri->segment(3));
		//$template['varial']=$this->model_breakdown->get_order_variety($this->uri->segment(3));
		//$template['injertal']=$this->model_breakdown->get_order_rootstock($this->uri->segment(3));
		$template['seeds']=$this->model_order->get_seeds($this->uri->segment(3));
		$template['sowing'] = $this->model_order->get_sowing($this->uri->segment(3));
		$template['suma']=$this->model_order->suma_volumen_sowing($this->uri->segment(3));
		$template['total_plant']=$total_sowing->sowing;	
		$template['farmer']=$order->result()[0]->farmer;


		$this->load->view('main',$template);	
	}

	public function insert_sowing()
	{
		$order=$this->uri->segment(3);
		$total_sowing=$this->model_order->get_total_sowing($this->uri->segment(3));
		$total_plant=$total_sowing->sowing;
		$volume=$this->input->post('volume');
		$total_vol=$total_plant+$volume;
		$seed_name=$this->input->post('seeds');	
		//$datos['id_breakdown']=$this->input->post('breakdown');
		$fecha=$this->input->post('datepicker');
		$datos['sowing_date'] = date("Y-m-d H:i:s", strtotime($fecha));
		$datos['volume']=$volume;
		$datos['comment']=$this->input->post('comment');
		$datos['id_order']=$order;
		$datos['seed']=$seed_name;
		
		$this->model_order->update_total_seed($seed_name,$order,$volume);
		$this->model_order->add_sowing($datos);
		$this->model_order->update_total_sowing($order, $total_vol);
		/*/Esta parte actualiza la germinacion
		$total_vol_seed=$this->model_order->get_total_sowing2($order,$seed_name);
		$this->model_order->update_germination($datos,$total_vol_seed[0]->total,$total_vol_seed[0]->order_volume);
		$sum_germ=$this->model_order->sum_germination($order);
		$this->model_order->update_volume_germination($order,$sum_germ[0]->volume);
		$this->model_order->update_status($this->uri->segment(3));*/

		redirect("breakdown/process/".$this->uri->segment(3), "refresh");

	}

	public function delete_sowing()
    {
		
        foreach ($_POST as $key => $value)
        {
            if(is_int($key))
            {    
                $llave=$key;

            }
        }
   
    	$volume=$this->model_order->get_volume_sowing($llave); 
    	$total_sowing=$this->model_order->get_total_sowing($this->uri->segment(3));
		$total_plant=$total_sowing->sowing;
		$total_vol=$total_plant - $volume[0]->volume;
		$seed_name=$this->model_order->get_seed_sowing($llave);
		$this->model_order->update_total_sowing($this->uri->segment(3), $total_vol);
		
		$this->model_order->update_total_seed2($seed_name[0]->seed,$this->uri->segment(3),$volume[0]->volume);
      
       $this->model_order-> delete_sowing($llave);
       //esta parte actualiza la germinacion 
       $id_germination=$this->model_breakdown->get_germination_id_sowing($llave);

		$volume=$this->model_breakdown->get_volume_germination($id_germination[0]->id_germination); 
    	$total_germination=$this->model_order->get_total_germ($this->uri->segment(3));
		$total_germ=$total_germination->germination;
		$total_vol=$total_germ - $volume[0]->volume;
		$this->model_order->update_total_germination($this->uri->segment(3), $total_vol);
		$this->model_breakdown-> delete_process_germination($id_germination[0]->id_germination);

       /*$total_vol_seed=$this->model_order->get_total_sowing2($this->uri->segment(3),$seed_name[0]->seed);
		$datos['id_order']=$this->uri->segment(3);
		$datos['seed']=$seed_name[0]->seed;
		$this->model_order->update_germination($datos,$total_vol_seed[0]->total,$total_vol_seed[0]->order_volume);
		$sum_germ=$this->model_order->sum_germination($this->uri->segment(3));
		$this->model_order->update_volume_germination($this->uri->segment(3),$sum_germ[0]->volume);
       *///redirect("order/edit_order/".$this->uri->segment(3), "refresh");
       redirect("breakdown/process/".$this->uri->segment(3), "refresh");
    }

    /*public function finish_sowing(){
    	$id_order=$this->input->post('id_order');
    	$this->model_order->update_status($id_order);
    	redirect("order/index", "refresh");
    }*/
	
	public function update_comment()
	{
		$id = $this->input->post('id');
		$comment = $this->input->post('coment');
		$this->model_order->update_order_comment($id, $comment);
		redirect("order/index", "refresh");
	}
}