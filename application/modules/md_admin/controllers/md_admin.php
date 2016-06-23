<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class md_admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('mo_admin');
	}
	function index() {
		$vLoginStatus=$this->session->userdata('sStatus');
		if($vLoginStatus==FALSE) {
			// Kondisi Belum Login
			$this->BelumLogin();
		} else {
			// Kondisi Telah Login
			redirect(base_url(),'refresh');
		}
	}
	function BelumLogin() {
		$this->load->view('vw_admin_log');
	}
	
	function TelahLogin() {
		$vLogin['cLoginId']=$this->session->userdata('sId');
		$vLogin['cLoginName']=$this->session->userdata('sName');
		$vLogin['cLoginPassword']=$this->session->userdata('sPassword');
		$vLogin['cLoginSegment']=$this->session->userdata('sSegments');
		$vLogin['cLoginRoles']=$this->session->userdata('sRoles');
		$vLogin['cLoginStatus']=$this->session->userdata('sStatus');
		$vLoginRole=$this->session->userdata('sRoles');
		$vData['cHasil']=$this->mo_admin->getModules($vLoginRole);
		$this->load->view('vw_admin_1');
		$this->load->view('vw_admin_2');
		// Choose one of 2 item below this, the old one's or the new one's?
		// $this->load->view('oldwestview');
		if ($this->session->userdata('sRoleCode')=='Counter'){ 
		$this->load->view('vw_counter');		
		$this->load->view('vw_admin_3_menu_counter',$vData);		
		
		}
		else{
		$this->load->view('vw_admin_4',$vLogin);		
		$this->load->view('vw_admin_3',$vData);		
		}
		
		$this->load->view('vw_admin_5');
	}
	function ProsesLogin() {
	if (strpos($this->input->post('txtUsername'),'admin') !== false) {
    $admin='1';
	}
	else {
    $admin='0';		
		}

		if(($this->input->post('id_loket') =='') && ( $this->input->post('counter') =='')){
			$this->ProsesLogout();
		}
					
		if(($this->input->post('id_loket') !='') && ( $this->input->post('counter') =='1') && ($admin == 0)){
		// Proses Login
		$vPostLoginName=$this->input->post('txtUsername');
		$vPostLoginPass=$this->input->post('txtPassword');
		$vAuth1=$this->mo_admin->Auth1($vPostLoginName,$vPostLoginPass);
		if($vAuth1) {
			$vSessId = $vAuth1->logId;
			$vSessName = $vAuth1->logName;
			$vSessPass = $vAuth1->logPass;
			$vSessEmpId = $vAuth1->EmpId;			
			$vSessEmpName = $vAuth1->EmpName;
			$vSessBranchId = $vAuth1->BranchId;			
			$vBranchStatus = $vAuth1->BranchStatus;
			$vRoleDataLimit = $vAuth1->RoleDatalimit;
			$vRoleCategory = $vAuth1->RoleCategory;
			$vSessBranchCode = $vAuth1->BranchCode;			
			$vIdGroupLayanan = $vAuth1->id_group_layanan;			
			$vLoket = $this->input->post('id_loket');			
			$vRoleCode = $vAuth1->f_role_code;			
			$vStatusRegVisitor = 	$vAuth1->status_reg;		
			$vAuth2 = $this->mo_admin->Auth2($vSessId);
			$vSessSegments = implode(",",$vAuth2);
			
			$vAuth3 = $this->mo_admin->Auth3($vSessId);
			$vSessRoles = implode(",",$vAuth3);
			$vSessStatus = TRUE;
			$vLoginArray=array('sId'=>$vSessId,'sName'=>$vSessName,'sPassword'=>$vSessPass,'sEmpId'=>$vSessEmpId,'sEmpName'=>$vSessEmpName,'sBranchId'=>$vSessBranchId,'sBranchCode'=>$vSessBranchCode,'sSegments'=>$vSessSegments,'sRoles'=>$vSessRoles,'sStatus'=>$vSessStatus,'sBranchStatus'=>$vBranchStatus,'sRoleDataLimit'=>$vRoleDataLimit,'sRoleCategory'=>$vRoleCategory,'sIdGroupLayanan'=>$vIdGroupLayanan,'sIdLoket'=>$vLoket,'sRoleCode'=>$vRoleCode,'sRegVisitor'=>$vStatusRegVisitor);
			$this->session->set_userdata($vLoginArray);
			redirect(base_url(),'refresh');
		} else {
			$this->ProsesLogout();
		}
		}
		
		if(($this->input->post('id_loket') =='') && ( $this->input->post('counter') =='0') && ($admin == 1)){
		// Proses Login
		$vPostLoginName=$this->input->post('txtUsername');
		$vPostLoginPass=$this->input->post('txtPassword');
		$vAuth1=$this->mo_admin->Auth1($vPostLoginName,$vPostLoginPass);
		if($vAuth1) {
			$vSessId = $vAuth1->logId;
			$vSessName = $vAuth1->logName;
			$vSessPass = $vAuth1->logPass;
			$vSessEmpId = $vAuth1->EmpId;			
			$vSessEmpName = $vAuth1->EmpName;
			$vSessBranchId = $vAuth1->BranchId;			
			$vBranchStatus = $vAuth1->BranchStatus;
			$vRoleDataLimit = $vAuth1->RoleDatalimit;
			$vRoleCategory = $vAuth1->RoleCategory;
			$vSessBranchCode = $vAuth1->BranchCode;			
			$vIdGroupLayanan = $vAuth1->id_group_layanan;			
			$vLoket = $this->input->post('id_loket');			
			$vRoleCode = $vAuth1->f_role_code;			
			$vStatusRegVisitor = 	$vAuth1->status_reg;		
			$vAuth2 = $this->mo_admin->Auth2($vSessId);
			$vSessSegments = implode(",",$vAuth2);
			
			$vAuth3 = $this->mo_admin->Auth3($vSessId);
			$vSessRoles = implode(",",$vAuth3);
			$vSessStatus = TRUE;
			$vLoginArray=array('sId'=>$vSessId,'sName'=>$vSessName,'sPassword'=>$vSessPass,'sEmpId'=>$vSessEmpId,'sEmpName'=>$vSessEmpName,'sBranchId'=>$vSessBranchId,'sBranchCode'=>$vSessBranchCode,'sSegments'=>$vSessSegments,'sRoles'=>$vSessRoles,'sStatus'=>$vSessStatus,'sBranchStatus'=>$vBranchStatus,'sRoleDataLimit'=>$vRoleDataLimit,'sRoleCategory'=>$vRoleCategory,'sIdGroupLayanan'=>$vIdGroupLayanan,'sIdLoket'=>$vLoket,'sRoleCode'=>$vRoleCode,'sRegVisitor'=>$vStatusRegVisitor);
			$this->session->set_userdata($vLoginArray);
			redirect(base_url(),'refresh');
		} else {
			$this->ProsesLogout();
		}
		}
		
		else{
			$this->ProsesLogout();			
			}
	}
	/*
	function ProsesLogin() {
		// Proses Login
		$vPostLoginName=$this->input->post('txtUsername');
		$vPostLoginPass=$this->input->post('txtPassword');
		$vArrayAuthId=$this->mo_admin->LoginAuth1($vPostLoginName,$vPostLoginPass);
		$vAuthId=$vArrayAuthId->f_user_id;
		$_SESSION['userNm']  	= $vArrayAuthId->f_user_login; 
		$_SESSION['Group_Code'] = $vArrayAuthId->f_user_type_code;    
		$_SESSION['password'] 	= $vArrayAuthId->f_user_password; 
		if($vAuthId) {
			$vArrayAuthAs=$this->mo_admin->LoginAuth2($vAuthId);
			$vAuthAs=$vArrayAuthAs->f_role_id;
			$vLoginArray=array('sId'=>$vAuthId,'sName'=>$vPostLoginName,'sAs'=>$vAuthAs,'sStatus'=>TRUE);
			$this->session->set_userdata($vLoginArray);
			redirect(base_url(),'refresh');
		} else {
			$this->ProsesLogout();
		}
	}
	*/



	function ProsesLogout() {
		// Proses Logout
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect((base_url() . 'index.php/md_admin'),'refresh');
	}
}