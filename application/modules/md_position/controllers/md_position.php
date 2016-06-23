<?php
class md_position extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_position');
	}
	function index() {
		$this->fnposition();
	}
	function fnposition()	{
		$this->load->view('vw_position');
	}
	// ======================================== 'Datagrid User Section'
	function fnpositionData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vpositionKeyword=$this->input->post('positionKeyword');
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
		
		$vSort='f_position_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_position->fnpositionCount($vpositionKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_position->fnpositionData($vpositionKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnpositionAdd() {
		$this->load->view('position_add_main');
	}
	
	function fnpositionCreate() {
		$vData = array(
         		
			'vf_position_id'=>$this->input->post('f_position_id'),
       		
			'vf_position_name'=>$this->input->post('f_position_name'),
       		
			'vf_position_remark'=>$this->input->post('f_position_remark'),
       				
		);
		
		
	$this->mo_position->fnCreateposition($vData);
	}
	function fnpositionEdit($ppositionId) {
		$vData['vpositionId'] = $ppositionId;
		$this->load->view('position_add_main',$vData);
	}
	function fnpositionRow($ppositionId) {
		$this->mo_position->fnpositionRow($ppositionId);
	}
	
	function fnpositionDelete() {
		$vDelpositionId = intval($_POST['Id']);
		$this->mo_position->fnpositionDelete($vDelpositionId);
	}
	
	function fnpositionUpdate($ppositionId) {
		$vData = array(
		
         		
			'vf_position_id'=>$this->input->post('f_position_id'),
       		
			'vf_position_name'=>$this->input->post('f_position_name'),
       		
			'vf_position_remark'=>$this->input->post('f_position_remark'),
       		

		);
		$this->mo_position->fnUpdateposition($ppositionId,$vData);
	}
	function fnpositionComboData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_position->fnpositionComboData($vVarQuery);
	}		
	
}
?>

	   