<?php
class md_laporan extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_laporan');

	
		
	}
	function index() {
		$this->fnlaporan();
	}
	function fnlaporan()	{
		$this->load->view('vw_laporan');
	}
	// ======================================== 'Datagrid User Section'
	function fntransaksiData() {
	
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');		
		//$vemployeeKeyword=$this->input->post('#search')	;	
		$vStartKeyword=$this->input->post('StartKeyword');
		$vFinishKeyword=$this->input->post('FinishKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vSort) {
		
		$vSort='id_transaksi';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		//$vRs=$this->mo_laporan->fntransaksiCount($vcityKeyword,$vkecKeyword,$vstatusKeyword,$vEmpId);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_laporan->fntransaksiData($vStartKeyword,$vFinishKeyword,$vOffset,$vRows,$vSort,$vOrder);		
		echo json_encode($vResult);
	}	

	
//===========Print Report================================================

	function fntransaksiDataPrint($vcityKeyword,$vkecKeyword,$vstatusKeyword){

			$pdf_filename = tempnam(sys_get_temp_dir(), "Data_Antrian_");
		   $pdf_file= "Data Antrian";
   
			$sts_scty=FALSE;
			$direct_download=TRUE;
		
		   $data_header=array('title'=>'PDF',);   
		   
         $data_master['data_master'] = $this->mo_laporan->fntransaksiDataPrint($vcityKeyword,$vkecKeyword,$vstatusKeyword);        		   
		   $output=$this->load->view('transaksi_excel',$data_master,true);   
			$scty="";

         echo $output;	
   }	
      
}
?>

	   