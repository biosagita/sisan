<?php
class md_status extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_status');
	}
	function index() {
		$this->fnstatus();
	}
	function fnstatus()	{
		$this->load->view('vw_status');
	}
	// ======================================== 'Datagrid User Section'
	function fnstatusData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vstatusKeyword=$this->input->post('statusKeyword');
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
		
		$vSort='f_status_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_status->fnstatusCount($vstatusKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_status->fnstatusData($vstatusKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnstatusAdd() {
		$this->load->view('status_add_main');
	}
	
	function fnstatusCreate() {
		$vData = array(
         		
			'vf_status_id'=>$this->input->post('f_status_id'),
       		
			'vf_status_name'=>$this->input->post('f_status_name'),
       		
			'vf_status_remark'=>$this->input->post('f_status_remark'),
       				
		);
		
		
	$this->mo_status->fnCreatestatus($vData);
	}
	function fnstatusEdit($pstatusId) {
		$vData['vstatusId'] = $pstatusId;
		$this->load->view('status_add_main',$vData);
	}
	function fnstatusRow($pstatusId) {
		$this->mo_status->fnstatusRow($pstatusId);
	}
	
	function fnstatusDelete() {
		$vDelstatusId = intval($_POST['Id']);
		$this->mo_status->fnstatusDelete($vDelstatusId);
	}
	
	function fnstatusUpdate($pstatusId) {
		$vData = array(
		
         		
			'vf_status_id'=>$this->input->post('f_status_id'),
       		
			'vf_status_name'=>$this->input->post('f_status_name'),
       		
			'vf_status_remark'=>$this->input->post('f_status_remark'),
       		

		);
		$this->mo_status->fnUpdatestatus($pstatusId,$vData);
	}
	
	function fnstatusComboData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_status->fnstatusComboData($vVarQuery);
	}		
}
?>

	   