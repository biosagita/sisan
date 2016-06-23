<?php
class md_counter extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_counter');
	}
	function index() {
		$this->fncounter();
	}
	function fncounter()	{
		$this->load->view('vw_counter');
	}
	// ======================================== 'Datagrid User Section'
	function fncounterData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vcounterKeyword=$this->input->post('counterKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vcustomerKeyword) {
			$vcustomerKeyword='';
		}
		if(!$vSort) {
		
		$vSort='id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_counter->fncounterCount($vcounterKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_counter->fncounterData($vcounterKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fncounterAdd() {
		$this->load->view('counter_add_main');
	}
	
	function fncounterCreate() {
		$vData = array(
         		
			'vid'=>$this->input->post('id'),
       				
		);
		
		
	$this->mo_counter->fnCreatecounter($vData);
	}
	function fncounterEdit($pcounterId) {
		$vData['vcounterId'] = $pcounterId;
		$this->load->view('counter_add_main',$vData);
	}
	function fncounterRow($pcounterId) {
		$this->mo_counter->fncounterRow($pcounterId);
	}
	
	function fncounterDelete() {
		$vDelcounterId = intval($_POST['Id']);
		$this->mo_counter->fncounterDelete($vDelcounterId);
	}
	
	function fncounterUpdate($pcounterId) {
		$vData = array(
		
         		
			'vid'=>$this->input->post('id'),
       		

		);
		$this->mo_counter->fnUpdatecounter($pcounterId,$vData);
	}
}
?>

	   