<?php
class md_setting extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_setting');
	}
	function index() {
		$this->fnsetting();
	}
	function fnsetting()	{
		$this->load->view('vw_setting');
	}
	// ======================================== 'Datagrid User Section'
	function fnsettingData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vsettingKeyword=$this->input->post('settingKeyword');
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
		
		$vSort='id_setting';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_setting->fnsettingCount($vsettingKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_setting->fnsettingData($vsettingKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnsettingAdd() {
		$this->load->view('setting_add_main');
	}
	
	function fnsettingCreate() {
		$vData = array(
         		
			'vid_setting'=>$this->input->post('id_setting'),
       		
			'vsetting'=>$this->input->post('setting'),
       		
			'vnilai'=>$this->input->post('nilai'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       				
		);
		
		
	$this->mo_setting->fnCreatesetting($vData);
	}
	function fnsettingEdit($psettingId) {
		$vData['vsettingId'] = $psettingId;
		$this->load->view('setting_add_main',$vData);
	}
	function fnsettingRow($psettingId) {
		$this->mo_setting->fnsettingRow($psettingId);
	}
	
	function fnsettingDelete() {
		$vDelsettingId = intval($_POST['Id']);
		$this->mo_setting->fnsettingDelete($vDelsettingId);
	}
	
	function fnsettingUpdate($psettingId) {
		$vData = array(
		
         		
			'vid_setting'=>$this->input->post('id_setting'),
       		
			'vsetting'=>$this->input->post('setting'),
       		
			'vnilai'=>$this->input->post('nilai'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       		

		);
		$this->mo_setting->fnUpdatesetting($psettingId,$vData);
	}
}
?>

	   