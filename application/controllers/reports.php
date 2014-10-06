<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {

	function __construct() {
	   parent::__construct();
		/** incluimos el path **/
		$this->load->library('Excel');
		$this->load->model('model_user','',TRUE);
		$this->load->model('model_report','',TRUE);

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
		$objPHPExcel->getActiveSheet()->setTitle('plantanova');
		$users= $this->model_report->get_users();
		$cont=1;
		foreach($users as $key) {
		$orders=$this->model_report->get_orders($key->id_user);
		if($orders){
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"Cliente: ". $key->first_name); 
			$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,"Siembra");
			$cont++;
			foreach($orders as $key2) {
				$breakdowns=$this->model_report->get_breakdown($key2->id_order);
				if($breakdowns){
					foreach($breakdowns as $key3){
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,"PEDIDO");  
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,"FECHA");  
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,$cont,"Cantidad"); 
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,$cont,"Fecha"); 
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,$cont,"Alcance");  
						$cont++;
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"VARIEDAD");
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$key3->variety);
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,$key3->volume);  
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,$key2->order_date_submit);
						$cont++;
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,$cont,"PORTAINJERTO");
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,$cont,$key3->rootstock);  
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,$cont,$key3->volume);  
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,$cont,$key2->order_date_submit);
						$cont++;
					}

				}
			}
		
		}
	
	
	}

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$fichero="./reportes/reporte_plantanova.xlsx";
		$objWriter->save($fichero);
		$template['header'] = 'header/view_admin_header.php';
		$template['body'] = 'body/view_admin_report.php';
		$template['footer'] = "footer/view_footer.php";		
		$this->load->view('main',$template);
	}



}