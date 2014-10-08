<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {

	function __construct() {
	   parent::__construct();
		/** incluimos el path **/
		$this->load->library('Excel');
		$this->load->model('model_user','',TRUE);
		$this->load->model('model_report','',TRUE);
		$this->load->helper('download');

	}
	public function report()
	{
		if($this->session->userdata('id_rol')!=1){
			redirect('client/index');
		}
		// Cear objeto PHPExcel
		$objPHPExcel = new PHPExcel();
		// propiedades
		$objPHPExcel->getProperties()->setCreator("plantanova")
							 ->setLastModifiedBy("plantanova")
							 ->setTitle("Office 2007 XLSX ")
							 ->setSubject("Office 2007 XLSX")
							 ->setDescription("")
							 ->setKeywords("office 2007")
							 ->setCategory("");
	
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle('DESGLOSE');
		$objPHPExcel->createSheet();
		$objPHPExcel->setActiveSheetIndex(1);
		$objPHPExcel->getActiveSheet()->setTitle('PROCESO');
		$objPHPExcel->createSheet();
		$objPHPExcel->setActiveSheetIndex(2);
		$objPHPExcel->getActiveSheet()->setTitle('EMBARQUE');
		$objPHPExcel->createSheet();
		$objPHPExcel->setActiveSheetIndex(3);
		$objPHPExcel->getActiveSheet()->setTitle('CLIENTES');

		$objPHPExcel->setActiveSheetIndex(1);
		$orders= $this->model_report->get_orders();
		$cont=1;

		foreach($orders as $key) {
			$inforders=$this->model_report->get_inforders($key->id_order);
			if($inforders){
				$totales=$this->model_report->get_totales($key->id_order);
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,$key->farmer); 
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,"Pedido"); 
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,"Fecha"); 
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,"Viabilidad");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,"Siembra");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,"Germinacion");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont,"Injerto");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont,"Pinchado");   
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont,"Transplante"); 
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10,$cont,"Tutoreo"); 
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11,$cont,"Alcance"); 
				$celdas="A".$cont.":L".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'6BBD44')));
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$cont++;
				foreach($inforders as $key2){
					$type=$this->model_report->get_type($key2->seed_name);
					$siembra=$this->model_report->get_sowing($key->id_order,$key2->seed_name);
					$germinacion=$this->model_report->get_germination2($key->id_order,$key2->seed_name);
					if($type){
						
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,$type[0]->type); 
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$key2->seed_name);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,$key2->order_volume);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,$key->order_date_submit);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,$key2->viability_total);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,$siembra[0]->volume);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,$germinacion[0]->volume);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont,$key2->graft_total);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont,$key2->punch_total);   
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont,$key2->transplant_total); 
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10,$cont,$key2->tutoring_total); 
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11,$cont,$key2->scope."%"); 
							$celdas="A".$cont.":L".$cont;
							$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'C0C0C0')));
							$objPHPExcel->getActiveSheet()->getStyle($celdas)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
							$cont++;
					}
				}

				
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL SEMBRADO");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->sowing);
				$celdas="A".$cont.":B".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$cont++;
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL GERMINADO");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->germination);
				$celdas="A".$cont.":B".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$cont++;
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL INJERTADO");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->graft);
				$celdas="A".$cont.":B".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$cont++;
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL PINCHADO ");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->punch);
				$celdas="A".$cont.":B".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$cont++;
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL TRANSPLANTADO ");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->transplant);
				$celdas="A".$cont.":B".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$cont++;
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL TUTOREADO ");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->tutoring);
				$celdas="A".$cont.":B".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
				$cont++;
				
				
				$cont++;
			}
		}
		
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	  


		/*Hoja clientes*/
		$objPHPExcel->setActiveSheetIndex(3);
		$cont=1;
		$users= $this->model_report->get_infouser();
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"NOMBRE");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,"APELLIDO");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,"CORREO ELECTRONICO");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,"RAZON SOCIAL");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,"RFC");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,"TELEFONO");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,"CELULAR");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont,"TELEFONO DE LA EMPRESA");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont,"DIRECCION");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont,"CP");
		$celdas="A".$cont.":K".$cont;
		$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'6BBD44')));
		$cont++;
		
		foreach ($users as $key) {
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,$key->first_name);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$key->last_name);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,$key->mail);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,$key->social_reason);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,$key->rfc);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,$key->phone);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,$key->cellphone);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont,$key->company_phone);
			if(empty($key->address_number)){
				$direccion="calle ".$key->street." S/N Col.".$key->colony;
			}else{
				$direccion="calle ".$key->street." No. ".$key->address_number." Col.".$key->colony;
			}
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont,$direccion);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont,$key->cp);
			$celdas="A".$cont.":K".$cont;
			$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'C0C0C0')));
			$cont++;
		}
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
		

		/*Hoja desglose*/
		$objPHPExcel->setActiveSheetIndex(0);
		$cont=1;
		$orders=$this->model_report->get_orders();
		foreach($orders as $key){
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,$key->farmer);
			$celdas="A".$cont.":Z".$cont;
			$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'6BBD44')));
			$breakdown=$this->model_report->get_breakdown($key->id_order);
			$cont++;

		foreach ($breakdown as $key2) {
			$breakdown="Combinacion :".$key2->variety."/".$key2->rootstock;
			$process=$this->model_report->get_process($key2->id_breakdown);
			if($process){
				//para injerto
				foreach ($process as $key3) {
					if($key3->id_process_type==2){
						$injerto=$key3->volume;
						$scopein=$key3->scope;
						$datein=date("d-m-Y",strtotime($key3->process_date));
					}
					if($key3->id_process_type==3){
						$pinchado=$key3->volume;
						$scopepin=$key3->scope;
						$datepin=date("d-m-Y",strtotime($key3->process_date));
					}
					if($key3->id_process_type==4){
						$transplantado=$key3->volume;
						$scopetrans=$key3->scope;
						$datetrans=date("d-m-Y",strtotime($key3->process_date));
					}
					if($key3->id_process_type==5){
						$tutoreo=$key3->volume;
						$scopetu=$key3->scope;
						$datetu=date("d-m-Y",strtotime($key3->process_date));
					}
				}
			}else{
					$injerto=0;
					$scopein=0;
					$datein='dd/mm/YY';

					$pinchado=0;
					$scopepin=0;
					$datepin='dd/mm/YY';

					$transplantado=0;
					$scopetrans=0;
					$datetrans='dd/mm/YY';

					$tutoreo=0;
					$scopetu=0;
					$datetu='dd/mm/YY';

			}

			//validamos si se definen los procesos
			if(!isset($injerto)){$injerto=0;}
			if(!isset($scopein)){$scopein=0;}
			if(!isset($datein)){$datein='dd/mm/YY';}

			if(!isset($pinchado)){$pinchado=0;}
			if(!isset($scopepin)){$scopepin=0;}
			if(!isset($datepin)){$datepin='dd/mm/YY';}

			if(!isset($transplantado)){$transplantado=0;}
			if(!isset($scopetrans)){$scopetrans=0;}
			if(!isset($datetrans)){$datetrans='dd/mm/YY';}

			if(!isset($tutoreo)){$tutoreo=0;}
			if(!isset($scopetu)){$scopetu=0;}
			if(!isset($datetu)){$datetu='dd/mm/YY';}


			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$breakdown);
			$celdas="A".$cont.":Z".$cont;
			$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'C0D3DF')));
			$cont++;
			/*etiqueteas*/
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"SEMILLA");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,"INJERTADO");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,"ALCANCE INJERTADO");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,"FECHA DE INJERTADO");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,"PINCHADO");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,"ALCANCE PINCHADO");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,"FECHA DE  PINCHADO");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont,"TRANSPLANTADO");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont,"ALCANCE TRANSPLANTADO");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont,"FECHA DE  TRANSPLANTADO");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10,$cont,"TUTOREADO");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11,$cont,"ALCANCE TUTOREADO");
					$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12,$cont,"FECHA DE TUTOREADO");
					$celdas="A".$cont.":Z".$cont;
					$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'797474')));
					$cont++;
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,$key2->variety);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$injerto);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,$scopein."%");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,$datein);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,$pinchado);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,$scopepin."%");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,$datepin);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont,$transplantado);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont,$scopetrans."%");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont,$datetrans);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10,$cont,$tutoreo);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11,$cont,$scopetu."%");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12,$cont,$datetu);
			$celdas="A".$cont.":Z".$cont;
			$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'C0C0C0')));
			$cont++;
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,$key2->rootstock);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$injerto);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,$scopein."%");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,$datein);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,$pinchado);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,$scopepin."%");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,$datepin);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont,$transplantado);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont,$scopetrans."%");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont,$datetrans);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10,$cont,$tutoreo);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11,$cont,$scopetu."%");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12,$cont,$datetu);
			$celdas="A".$cont.":Z".$cont;
			$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'C0C0C0')));
			$cont++;

		}
		$cont++;
		}

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);










		 /*Hoja embarque*/
		$objPHPExcel->setActiveSheetIndex(2);
		$cont=1;
		$embarque=$this->model_report->get_embark();
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"Orden"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,"Agicultor"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,"Embarque"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,"Fecha de entrega"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,"Volumen"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,"Transporte");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,"Fletera");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont,"Chofer");   
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont,"Cel chofer"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont,"Fecha de arrivo"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10,$cont,"Destino"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11,$cont,"Estado"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12,$cont,"Ciudad"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(13,$cont,"Contacto de entrega"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(14,$cont,"Chep");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(15,$cont,"Ensenada");
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(16,$cont,"Tipo de ensenada");   
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(17,$cont,"No aplica"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(18,$cont,"Caja de transporte"); 
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(19,$cont,"Racks"); 
		$celdas="A".$cont.":T".$cont;
		$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'6BBD44')));
		$objPHPExcel->getActiveSheet()->getStyle($celdas)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		foreach ($embarque as $key) {
			$farmer=$this->model_report->get_farmer($key->id_order);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont+1,$key->id_order);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont+1,$farmer[0]->farmer);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont+1,$key->id_embark);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont+1,date("d-m-Y",strtotime($key->date_delivery)));
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont+1,$key->volume);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont+1,$key->transport);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont+1,$key->freight);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont+1,$key->driver);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont+1,$key->driver_cel);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont+1,date("d-m-Y",strtotime($key->date_arrival)));
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10,$cont+1,$key->destiny);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11,$cont+1,$key->id_state);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12,$cont+1,$key->id_town);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(13,$cont+1,$key->arrival_contact);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(14,$cont+1,$key->chep);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(15,$cont+1,$key->ensenada);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(16,$cont+1,$key->tipo_ensenada);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(17,$cont+1,$key->no_aplica);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(18,$cont+1,$key->transport_box);
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(19,$cont+1,$key->racks); 
			$celdas="A".($cont+1).":T".($cont+1);
			$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'e5e5e5')));
			$objPHPExcel->getActiveSheet()->getStyle($celdas)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$cont++;

		}

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);


			
		$objPHPExcel->setActiveSheetIndex(0);
       	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
       	$fichero="./reportes/reporte_plantanova.xlsx";
		$objWriter->save($fichero);
		$data = file_get_contents("./reportes/reporte_plantanova.xlsx"); // Read the file's contents
		$name = 'reporte_plantanova.xlsx';
		force_download($name, $data);
	}

	public function report_body(){
		

		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_report.php';
		$template['footer'] = "footer/view_footer.php";	
		$this->load->view('main',$template);


	}



}