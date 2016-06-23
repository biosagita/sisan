<?php
class md_user_group extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_user_group');
	}
	function index() {
		$this->fnuser_group();
	}
	function fnuser_group()	{
		$this->load->view('vw_user_group');
	}
	// ======================================== 'Datagrid User Section'
	function fnuser_groupData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vuser_groupKeyword=$this->input->post('user_groupKeyword');
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
		
		$vSort='id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_user_group->fnuser_groupCount($vuser_groupKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_user_group->fnuser_groupData($vuser_groupKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnuser_groupAdd() {
		$this->load->view('user_group_add_main');
	}
	
	function fnuser_groupCreate() {
		$vData = array(
         		
			'vid'=>$this->input->post('id'),
       		
			'vid_user_group'=>$this->input->post('id_user_group'),
       		
			'vnama_user_group'=>$this->input->post('nama_user_group'),
       		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       				
		);
		
		
	$this->mo_user_group->fnCreateuser_group($vData);
	}
	function fnuser_groupEdit($puser_groupId) {
		$vData['vuser_groupId'] = $puser_groupId;
		$this->load->view('user_group_add_main',$vData);
	}
	function fnuser_groupRow($puser_groupId) {
		$this->mo_user_group->fnuser_groupRow($puser_groupId);
	}
	
	function fnuser_groupDelete() {
		$vDeluser_groupId = intval($_POST['Id']);
		$this->mo_user_group->fnuser_groupDelete($vDeluser_groupId);
	}
	
	function fnuser_groupUpdate($puser_groupId) {
		$vData = array(
		
         		
			'vid'=>$this->input->post('id'),
       		
			'vid_user_group'=>$this->input->post('id_user_group'),
       		
			'vnama_user_group'=>$this->input->post('nama_user_group'),
       		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       		

		);
		$this->mo_user_group->fnUpdateuser_group($puser_groupId,$vData);
	}
	
	function fnuser_groupComboData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_user_group->fnuser_groupComboData($vVarQuery);
	}			
}
?>

	   