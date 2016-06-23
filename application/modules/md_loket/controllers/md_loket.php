<?php
class md_loket extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_loket');
	}
	function index() {
		$this->fnloket();
	}
	function fnloket()	{
		$this->load->view('vw_loket');
	}
	// ======================================== 'Datagrid User Section'
	function fnloketData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vloketKeyword=$this->input->post('loketKeyword');
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
		
		$vSort='id_loket';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_loket->fnloketCount($vloketKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_loket->fnloketData($vloketKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnloketAdd() {
		$this->load->view('loket_add_main');
	}
	
	function fnloketCreate() {
		$vData = array(
         		
			'vid_loket'=>$this->input->post('id_loket'),
       		
			'vnama_loket'=>$this->input->post('nama_loket'),
       		
			'vid_group_loket'=>$this->input->post('id_group_loket'),

			'vno_loket'=>$this->input->post('no_loket'),

			'vstatus_off'=>$this->input->post('status_off'),
			
		);
		
		
	$this->mo_loket->fnCreateloket($vData);
	}
	function fnloketEdit($ploketId) {
		$vData['vloketId'] = $ploketId;
		$this->load->view('loket_add_main',$vData);
	}
	function fnloketRow($ploketId) {
		$this->mo_loket->fnloketRow($ploketId);
	}
	
	function fnloketDelete() {
		$vDelloketId = intval($_POST['Id']);
		$this->mo_loket->fnloketDelete($vDelloketId);
	}
	
	function fnloketUpdate($ploketId) {
		$vData = array(
		
         		
			'vid_loket'=>$this->input->post('id_loket'),
       		
			'vnama_loket'=>$this->input->post('nama_loket'),
       		
			'vid_group_loket'=>$this->input->post('id_group_loket'),
       		
			'vno_loket'=>$this->input->post('no_loket'),

			'vstatus_off'=>$this->input->post('status_off'),

		);
		$this->mo_loket->fnUpdateloket($ploketId,$vData);
	}

	function fnloketComboData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_loket->fnloketComboData($vVarQuery);
	}	
}
?>

	   