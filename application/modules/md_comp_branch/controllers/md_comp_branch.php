<?php
class md_comp_branch extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_comp_branch');
	}
	function index() {
		$this->fnCompBranch();
	}
	function fnCompBranch() {
		$this->load->view('vw_comp_branch');
	}
	function fnCompBranchData() {
		$vResult=array();
		$vRs=$this->mo_comp_branch->fnCompBranchCount();
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_comp_branch->fnCompBranchData();
		echo json_encode($vResult);
	}
	function fnCompBranchRow($pId) {
		$this->mo_comp_branch->fnCompBranchRow($pId);
	}
	function fnCompBranchCreate() {
		$vData = array(
			'vComp'=>$this->input->post('77_fldCompanyName'),
			'vCode'=>$this->input->post('77_fldBranchCode'),
			'vName'=>$this->input->post('77_fldBranchName'),
			'vAddr1'=>$this->input->post('77_fldBranchAddress1'),
			'vAddr2'=>$this->input->post('77_fldBranchAddress2'),
			'vAddr3'=>$this->input->post('77_fldBranchAddress3'),
			'vCity'=>$this->input->post('77_fldBranchCity'),
			'vPost'=>$this->input->post('77_fldBranchPostCode'),
			'vPhone'=>$this->input->post('77_fldBranchPhone'),
			'vFax'=>$this->input->post('77_fldBranchFax'),
			'vAct'=>$this->input->post('77_fldBranchActive')
		);
		$this->mo_comp_branch->fnCompBranchCreate($vData);
	}
	function fnCompBranchUpdate($pBranchId) {
		$vData = array(
			'vComp'=>$this->input->post('77_fldCompanyName'),
			'vCode'=>$this->input->post('77_fldBranchCode'),
			'vName'=>$this->input->post('77_fldBranchName'),
			'vAddr1'=>$this->input->post('77_fldBranchAddress1'),
			'vAddr2'=>$this->input->post('77_fldBranchAddress2'),
			'vAddr3'=>$this->input->post('77_fldBranchAddress3'),
			'vCity'=>$this->input->post('77_fldBranchCity'),
			'vPost'=>$this->input->post('77_fldBranchPostCode'),
			'vPhone'=>$this->input->post('77_fldBranchPhone'),
			'vFax'=>$this->input->post('77_fldBranchFax'),
			'vAct'=>$this->input->post('77_fldBranchActive')
		);
		$this->mo_comp_branch->fnCompBranchUpdate($pBranchId,$vData);
	}
	
	function fnRemoteCompany() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_comp_branch->fnRemoteCompany($vVarQuery);
	}
	function fnRemoteProvince() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_comp_branch->fnRemoteProvince($vVarQuery);
	}
	function fnRemoteCity($pProvId) {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_comp_branch->fnRemoteCity($vVarQuery,$pProvId);
	}
	function fnRemoteActive($pProvId) {
		$vActv = array(array('f_active_val'=>'0','f_active_text'=>'INACTIVE'),array('f_active_val'=>'1','f_active_text'=>'ACTIVE'));
		echo json_encode($vActv);
	}
	function fnCompBranchComboData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_comp_branch->fnCompBranchComboData($vVarQuery);
	}		
	
}
/*
class md_comp_profile extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_comp_profile');
	}
	function index() {
		$this->fnCompProfile();
	}
	function fnCompProfile() {
		$this->load->view('vw_comp_profile');
	}
	function fnCompProfileData() {
		$vResult=array();
		$vRs=$this->mo_comp_profile->fnCompProfileCount();
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_comp_profile->fnCompProfileData();
		echo json_encode($vResult);
	}
	function fnCompProfileRow($pId) {
		$this->mo_comp_profile->fnCompProfileRow($pId);
	}
	function fnCompProfileCreate() {
		$vLastId = $this->mo_comp_profile->fnCompProfileId();
		$vData = array(
			'vId'=>$vLastId+1,
			'vCode'=>$this->input->post('76_fldCode'),
			'vName'=>$this->input->post('76_fldName'),
			'vAddr1'=>$this->input->post('76_fldAddress1'),
			'vAddr2'=>$this->input->post('76_fldAddress2'),
			'vAddr3'=>$this->input->post('76_fldAddress3'),
			'vCity'=>$this->input->post('76_fldCity'),
			'vPost'=>$this->input->post('76_fldPostCode'),
			'vPhone'=>$this->input->post('76_fldPhone'),
			'vFax'=>$this->input->post('76_fldFax'),
			'vEom'=>$this->input->post('76_fldEom')
		);
		$this->mo_comp_profile->fnCreateCompProfile($vData);
	}
	function fnCompProfileUpdate($pCompanyId) {
		$vData = array(
			'vCode'=>$this->input->post('76_fldCode'),
			'vName'=>$this->input->post('76_fldName'),
			'vAddr1'=>$this->input->post('76_fldAddress1'),
			'vAddr2'=>$this->input->post('76_fldAddress2'),
			'vAddr3'=>$this->input->post('76_fldAddress3'),
			'vCity'=>$this->input->post('76_fldCity'),
			'vPost'=>$this->input->post('76_fldPostCode'),
			'vPhone'=>$this->input->post('76_fldPhone'),
			'vFax'=>$this->input->post('76_fldFax'),
			'vEom'=>$this->input->post('76_fldEom')
		);
		$this->mo_comp_profile->fnUpdateCompProfile($pCompanyId,$vData);
	}
	
	function fnRemoteProvince() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_comp_profile->fnRemoteProvince($vVarQuery);
	}
	function fnRemoteCity($pProvId) {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_comp_profile->fnRemoteCity($vVarQuery,$pProvId);
	}
}
*/
?>