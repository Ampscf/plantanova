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
		$objPHPExcel->getActiveSheet()->setTitle('PROCESO');


		$objPHPExcel->setActiveSheetIndex(0);
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
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,"Injerto");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,"Pinchado");   
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont,"Transplante"); 
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont,"Tutoreo"); 
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont,"Alcance"); 
				$celdas="A".$cont.":K".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'F28A8C')));
				$cont++;
				foreach($inforders as $key2){
					$type=$this->model_report->get_type($key2->seed_name);
					if($type){
						
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,$type[0]->type); 
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$key2->seed_name);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,$key2->order_volume);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,$key->order_date_submit);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,$key2->viability_total);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,$key2->graft_total);
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,$key2->punch_total);   
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont,$key2->transplant_total); 
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont,$key2->tutoring_total); 
							$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont,$key2->scope); 
							$celdas="A".$cont.":K".$cont;
							$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'C0C0C0')));
				
							$cont++;
					}
				}

				
				$cont++;

				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL SEMBRADO");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->sowing);
				$celdas="A".$cont.":K".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$cont++;
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL GERMINADO");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->germination);
				$celdas="A".$cont.":K".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$cont++;
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL INJERTADO");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->graft);
				$celdas="A".$cont.":K".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$cont++;
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL PINCHADO ");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->punch);
				$celdas="A".$cont.":K".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$cont++;
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL TRANSPLANTADO ");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->transplant);
				$celdas="A".$cont.":K".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$cont++;
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"TOTAL TUTOREADO ");
				$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$totales[0]->tutoring);
				$celdas="A".$cont.":K".$cont;
				$objPHPExcel->getActiveSheet()->getStyle($celdas)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' =>'DCDCDC')));
				$cont++;
				
				
				$cont++;
			}
		}
		


		$objPHPExcel->createSheet();
		$objPHPExcel->setActiveSheetIndex(1);
		$objPHPExcel->getActiveSheet()->setTitle('EMBARQUE');

		$embarque=$this->model_report->get_embark();
		foreach ($embarque as $key) {
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,0,"Embarque"); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,"fecha de entrega"); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,"Volumen"); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,"Transporte");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,"Fletera");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,"Chofer");   
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,$cont,"Cel chofer"); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,$cont,"Fecha de arrivo"); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,$cont,"Destino"); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10,$cont,"Estado"); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11,$cont,"Ciudad"); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12,$cont,"Contacto de entrega"); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(13,$cont,"Chep");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(14,$cont,"Ensenada");
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(15,$cont,"Tipo de ensenada");   
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(16,$cont,"No aplica"); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(17,$cont,"Caja de transporte"); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(18,$cont,"Racks"); 
			$cont++;
			
		}

		/*$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(100);*/
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
	    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
	  
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