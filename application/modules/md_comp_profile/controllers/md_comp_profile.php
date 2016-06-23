<?php
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
		$vData = array(
			'vId'=>$this->input->post('76_fldId'),
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
			'vId'=>$this->input->post('76_fldId'),
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
	function fnCompProfileDelete() {
		$vDelCompProfileId = intval($_POST['Id']);
		$this->mo_comp_profile->fnDeleteCompProfile($vDelCompProfileId);
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
?>