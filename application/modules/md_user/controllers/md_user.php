<?php
class md_user extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_user');
	}
	function index() {
		$this->fnuser();
	}
	function fnuser()	{
		$this->load->view('vw_user');
	}
	// ======================================== 'Datagrid User Section'
	function fnuserData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vuserKeyword=$this->input->post('userKeyword');
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
		
		$vSort='a.f_user_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_user->fnuserCount($vuserKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_user->fnuserData($vuserKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnuserAdd() {
		$this->load->view('user_add_main');
	}
	
	function fnuserCreate() {
		$vData = array(
         		
			'vf_user_id'=>$this->input->post('f_user_id'),
       		
			'vf_user_login'=>$this->input->post('f_user_login'),
       		
			'vf_user_password'=>$this->input->post('f_user_newpassword'),
       				
		);
		
		
	$this->mo_user->fnCreateuser($vData);
	}
	function fnuserEdit($puserId) {
		$vData['vuserId'] = $puserId;
		$this->load->view('user_add_main',$vData);
	}
	function fnuserRow($puserId) {
		$this->mo_user->fnuserRow($puserId);
	}
	
	function fnuserDelete() {
		$vDeluserId = intval($_POST['Id']);
		$this->mo_user->fnuserDelete($vDeluserId);
	}
	
	function fnuserUpdate($puserId) {
		$vData = array(
		
         		
			'vf_user_id'=>$this->input->post('f_user_id'),
       		
			'vf_user_login'=>$this->input->post('f_user_login'),
       		
			'vf_user_password'=>$this->input->post('f_user_newpassword'),
       		

		);
		$this->mo_user->fnUpdateuser($puserId,$vData);
	}
}
?>

	   