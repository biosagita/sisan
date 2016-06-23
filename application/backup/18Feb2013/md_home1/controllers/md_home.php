<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class md_home extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('mo_home');
	}
	function index() {
		$vLoginStatus=$this->session->userdata('sStatus');
		// $vLoginStatus=FALSE;
		if($vLoginStatus==FALSE) {
			// Kondisi Belum Login
			$this->BelumLogin();
		} else {
			// Kondisi Telah Login
			$this->TelahLogin();
		}
	}
	function BelumLogin() {
		$this->load->view('vw_home_log');
	}
	function TelahLogin() {
		$vLogin['cLoginId']=$this->session->userdata('sId');
		$vLogin['cLoginName']=$this->session->userdata('sName');
		$vLogin['cLoginAs']=$this->session->userdata('sAs');
		$vLoginAs=$this->session->userdata('sAs');
		$vData['cHasil']=$this->mo_home->getModules($vLoginAs);
		$this->load->view('vw_home_1');
		$this->load->view('vw_home_2');
		// Choose one of 2 item below this, the old one's or the new one's?
		// $this->load->view('oldwestview');
		$this->load->view('vw_home_3',$vData);
		$this->load->view('vw_home_4',$vLogin);
		$this->load->view('vw_home_5');
	}
	function ProsesLogin() {
		// Proses Login
		$vPostLoginName=$this->input->post('txtUsername');
		$vPostLoginPass=$this->input->post('txtPassword');
		$vArrayAuthId=$this->mo_home->LoginAuth1($vPostLoginName,$vPostLoginPass);
		$vAuthId=$vArrayAuthId->f_user_id;
		$_SESSION['userNm']  	= $vArrayAuthId->f_user_login; 
		$_SESSION['Group_Code'] = $vArrayAuthId->f_user_type_code;    
		$_SESSION['password'] 	= $vArrayAuthId->f_user_password; 
		if($vAuthId) {
			$vArrayAuthAs=$this->mo_home->LoginAuth2($vAuthId);
			$vAuthAs=$vArrayAuthAs->f_role_id;
			$vLoginArray=array('sId'=>$vAuthId,'sName'=>$vPostLoginName,'sAs'=>$vAuthAs,'sStatus'=>TRUE);
			$this->session->set_userdata($vLoginArray);
			redirect(base_url(),'refresh');
		} else {
			$this->ProsesLogout();
		}
	}
	function ProsesLogout() {
		// Proses Logout
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}
}