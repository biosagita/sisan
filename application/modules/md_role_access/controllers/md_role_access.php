<?php
class md_role_access extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_role_access');
	}
	function index() {
		$this->fnRoleAccess();
	}
	function fnRoleAccess()	{
		$this->load->view('vw_role_access');
	}
	function fnRoleData() {
		$vSort='f_role_id';
		$vOrder='ASC';
		$vResult=array();
		$vRs=$this->mo_role_access->fnRoleCount();
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_role_access->fnRoleData($vSort,$vOrder);
		echo json_encode($vResult);
	}
	
	function fnRoleAdd() {
		$this->load->view('role_add_main');
	}
	function fnRoleEdit($pRoleId) {
		$vData['vRoleId'] = $pRoleId;
		$this->load->view('role_add_main',$vData);
	}
	function fnRoleRow($pRoleId) {
		$this->mo_role_access->fnRoleRow($pRoleId);
	}
	function fnRoleCreate() {
		$vData = array(
			'vCode'=>$this->input->post('fldCode'),
			'vName'=>$this->input->post('fldName'),
			'vDesc'=>$this->input->post('fldDesc'),
			'vAppl'=>$this->input->post('fldAppl'),
			'vBranchStatus'=>$this->input->post('fldBranchStatus'),
			'vDataLimit'=>$this->input->post('fldDataLimitations'),
			'vCategory'=>$this->input->post('fldCategory'),			
			'vActive'=>$this->input->post('fldActive')			
		);
		$this->mo_role_access->fnCreateRole($vData);
	}
	function fnRoleUpdate($pRoleId) {
		$vData = array(
			'vName'=>$this->input->post('fldName'),
			'vDesc'=>$this->input->post('fldDesc'),
			'vAppl'=>$this->input->post('fldAppl'),
			'vBranchStatus'=>$this->input->post('fldBranchStatus'),
			'vDataLimit'=>$this->input->post('fldDataLimitations'),
			'vCategory'=>$this->input->post('fldCategory'),						
			'vActive'=>$this->input->post('fldActive')
		);
		$this->mo_role_access->fnUpdateRole($pRoleId,$vData);
	}
	/*
	function fnRoleDelete() {
		$vRoleId = intval($_POST['Id']);
		$this->mo_role_access->fnDeleteRole($vRoleId);
	}
	*/
	
	function fnRoleApplData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_role_access->fnRoleApplData($vVarQuery);
	}
	function fnRoleActvData() {
		$vActv = array(array('f_active_val'=>'0','f_active_text'=>'INACTIVE'),array('f_active_val'=>'1','f_active_text'=>'ACTIVE'));
		echo json_encode($vActv);
	}
	// ====================
	function fnRoleModData($pRoleId) {
		$vRoleId=$pRoleId;
		if(!$vRoleId) {
			$vRoleId=1;
		}
		$vResult=array();
		$vRs=$this->mo_role_access->fnRoleModCount($vRoleId);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_role_access->fnRoleModData($vRoleId);
		echo json_encode($vResult);
	}
	function fnRoleModChoose($pRoleApp,$pRoleId) {
		$vData['vChoosenRoleApp'] = $pRoleApp;
		$vData['vChoosenRoleId'] = $pRoleId;
		$this->load->view('rolemod_add_main',$vData);
	}
	function fnRoleModDataChoose($pRoleApp,$pRoleId) {
		$vRoleApp=$pRoleApp;
		$vRoleId=$pRoleId;
		$vResult=array();
		$vRs=$this->mo_role_access->fnRoleModChooseCount($vRoleId);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_role_access->fnRoleModChooseData($vRoleApp,$vRoleId);
		echo json_encode($vResult);
	}
	function fnSaveRoleMod($pChoosenRoleId,$pModules) {
		$vModules = explode("_",$pModules);
		$this->mo_role_access->fnSaveRoleMod($pChoosenRoleId,$vModules);
	}
	// ====================
	function fnRoleModActData($pRoleId,$pRoleModuleId) {
		$vRoleId=$pRoleId;
		$vRoleModuleId=$pRoleModuleId;
		$vResult=array();
		$vRs=$this->mo_role_access->fnRoleModActCount($vRoleId);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_role_access->fnRoleModActData($vRoleId,$vRoleModuleId);
		echo json_encode($vResult);
	}
	function fnSaveRMA($pRoleId,$pRoleModuleId,$pData) {
		$vRoleId=$pRoleId;
		$vRoleModuleId=$pRoleModuleId;
		$vData=$pData;
		if($vData!="emptydata") {
			$vActions = explode("_",$vData);
		} else {
			$vActions = "emptydata";
		}
		$this->mo_role_access->fnSaveRMA($vRoleId,$vRoleModuleId,$vActions);
	}
	// ====================
	function fnRoleAction($pRoleId,$pRoleModuleId) {
		$vResult=array();
		$vResult["rows"]=$this->mo_role_access->fnRoleAction($pRoleId,$pRoleModuleId);
		echo json_encode($vResult);
	}
	function fnCrud($pRoleId,$pRoleModuleId) {
		$this->mo_role_access->fnCrud($pRoleId,$pRoleModuleId);
	}
	function fnNoCrud($pRoleId,$pRoleModuleId) {
		$this->mo_role_access->fnNoCrud($pRoleId,$pRoleModuleId);
	}
	function fnRoleAccessCrud($vmoduleId) {
		$this->mo_role_access->fnRoleAccessCrud($vmoduleId);
	}

}
?>