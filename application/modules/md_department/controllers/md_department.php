<?php
class md_department extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_department');
	}
	function index() {
		$this->fndepartment();
	}
	function fndepartment()	{
		$this->load->view('vw_department');
	}
	// ======================================== 'Datagrid User Section'
	function fndepartmentData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vdepartmentKeyword=$this->input->post('departmentKeyword');
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
		
		$vSort='f_dept_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_department->fndepartmentCount($vdepartmentKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_department->fndepartmentData($vdepartmentKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fndepartmentAdd() {
		$this->load->view('department_add_main');
	}
	
	function fndepartmentCreate() {
		$vData = array(
       		
			'vf_dept_name'=>$this->input->post('f_dept_name'),

			'vf_emp_segment_id'=>$this->input->post('f_emp_segment_id'),
       		
			'vf_dept_remark'=>$this->input->post('f_dept_remark'),
       				
		);
		
		
	$this->mo_department->fnCreatedepartment($vData);
	}
	function fndepartmentEdit($pdepartmentId) {
		$vData['vdepartmentId'] = $pdepartmentId;
		$this->load->view('department_add_main',$vData);
	}
	function fndepartmentRow($pdepartmentId) {
		$this->mo_department->fndepartmentRow($pdepartmentId);
	}
	
	function fndepartmentDelete() {
		$vDeldepartmentId = intval($_POST['Id']);
		$this->mo_department->fndepartmentDelete($vDeldepartmentId);
	}
	
	function fndepartmentUpdate($pdepartmentId) {
		$vData = array(
		
         		
			'vf_emp_segment_id'=>$this->input->post('f_emp_segment_id'),
       		
			'vf_dept_name'=>$this->input->post('f_dept_name'),
       		
			'vf_dept_remark'=>$this->input->post('f_dept_remark'),
       		

		);
		$this->mo_department->fnUpdatedepartment($pdepartmentId,$vData);
	}
	function fndepartmentComboData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_department->fndepartmentComboData($vVarQuery);
	}
	function fndepartmentCombo2Data($pDivId) {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_department->fndepartmentCombo2Data($pDivId);
	}
	
}
?>

	   