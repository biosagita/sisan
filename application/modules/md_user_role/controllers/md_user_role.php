<?php
class md_user_role extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_user_role');
	}
	function index() {
		$this->fnUserRole();
	}
	function fnUserRole()	{
		$this->load->view('vw_user_role');
	}
	// ======================================== 'Datagrid User Section'
	function fnUserData() {

		$vSort='f_user_login';
		$vOrder='ASC';
		$vResult=array();
		$vRs=$this->mo_user_role->fnUserCount();
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_user_role->fnUserData($vSort,$vOrder);
		echo json_encode($vResult);
	}
	function fnUserAdd() {
		$this->load->view('user_add_main');
	}
	function fnUserEdit($pUserId) {
		$vData['vUserId'] = $pUserId;
		$this->load->view('user_add_main',$vData);
	}
	function fnUserRow($pUserId) {
		$this->mo_user_role->fnUserRow($pUserId);
	}
	function fnUserCreate() {
		$vData = array(
			'vLogin'=>$this->input->post('fldLogin'),
			'vPass'=>$this->input->post('fldPass'),
			'vName'=>$this->input->post('fldName'),
			'vMail'=>$this->input->post('fldMail'),
			'vDesc'=>$this->input->post('fldDesc'),
			'vid_user_group'=>$this->input->post('id_user_group'),
			'vActive'=>$this->input->post('fldActive')
		);
		$this->mo_user_role->fnCreateUser($vData);
	}
	function fnUserUpdate($pUserId) {
		$vData = array(
			'vPass'=>$this->input->post('fldPass'),
			'vName'=>$this->input->post('fldName'),
			'vMail'=>$this->input->post('fldMail'),
			'vDesc'=>$this->input->post('fldDesc'),
			'vid_user_group'=>$this->input->post('id_user_group'),
			'vActive'=>$this->input->post('fldActive')
		);
		$this->mo_user_role->fnUpdateUser($pUserId,$vData);
	}
	
	function fnUserTypeData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_user_role->fnUserTypeData($vVarQuery);
	}
	function fnUserActiveData() {
		$vActive = array(array('f_active_val'=>'0','f_active_text'=>'INACTIVE'),array('f_active_val'=>'1','f_active_text'=>'ACTIVE'));
		echo json_encode($vActive);
	}
	// ======================================== 'Datagrid User-Role Section'
	function fnUserRoleData($pUserId) {

		$vUserId=$pUserId;
		$vResult=array();
		$vRs=$this->mo_user_role->fnUserRoleCount($vUserId);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_user_role->fnUserRoleData($vUserId);
		echo json_encode($vResult);
	}
	function fnUserRoleChoose($pUserId) {
		$vData['vUserId'] = $pUserId;
		$this->load->view('userrole_add_main',$vData);
	}
	function fnUserRoleDataChoose($pUserId) {
		$vResult=array();
		$vRs=$this->mo_user_role->fnRoleCountChoose();
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_user_role->fnUserRoleDataChoose($pUserId);
		echo json_encode($vResult);
	}
	function fnSaveUserRole($pUserId,$pData) {
		$pRoles = explode("_",$pData);
		$this->mo_user_role->fnSaveUserRole($pUserId,$pRoles);
	}
	// ======================================== 'Datagrid User-Employee Section'
	function fnUserEmployeeData($pUserId) {
		$vUserId=$pUserId;
		$vResult=array();
		$vRs=$this->mo_user_role->fnUserEmployeeCount($vUserId);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_user_role->fnUserEmployeeData($vUserId);
		echo json_encode($vResult);
	}
	function fnUserEmployeeSelect($pUserId) {
		$vData['vUserId'] = $pUserId;
		$this->load->view('useremployee_add_main',$vData);
	}
	function fnEmployeeRow($pUserId) {
		$this->mo_user_role->fnEmployeeRow($pUserId);
	}
	function fnEmployeeSelect($pUserId) {
		$vUserId = $pUserId;
		$vData = array(
			'vEmployeeId'=>$this->input->post('fldDetail'),
			'vEmployeeTypeId'=>$this->input->post('fldType')
		);
		$this->mo_user_role->fnSelectEmployee($vUserId,$vData);
	}
	function fnEmployeeDetailData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_user_role->fnEmployeeDetailData($vVarQuery);
	}
	function fnEmployeeTypeData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_user_role->fnEmployeeTypeData($vVarQuery);
	}
	// ======================================== 'Other Section'
	
}
?>