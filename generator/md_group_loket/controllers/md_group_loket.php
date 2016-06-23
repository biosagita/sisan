<?php
class md_group_loket extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_group_loket');
	}
	function index() {
		$this->fngroup_loket();
	}
	function fngroup_loket()	{
		$this->load->view('vw_group_loket');
	}
	// ======================================== 'Datagrid User Section'
	function fngroup_loketData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vgroup_loketKeyword=$this->input->post('group_loketKeyword');
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
		
		$vSort='id_group_loket';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_group_loket->fngroup_loketCount($vgroup_loketKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_group_loket->fngroup_loketData($vgroup_loketKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fngroup_loketAdd() {
		$this->load->view('group_loket_add_main');
	}
	
	function fngroup_loketCreate() {
		$vData = array(
         		
			'vid_group_loket'=>$this->input->post('id_group_loket'),
       		
			'vnama_group_loket'=>$this->input->post('nama_group_loket'),
       		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       		
			'vid_group_layanan_forward'=>$this->input->post('id_group_layanan_forward'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       				
		);
		
		
	$this->mo_group_loket->fnCreategroup_loket($vData);
	}
	function fngroup_loketEdit($pgroup_loketId) {
		$vData['vgroup_loketId'] = $pgroup_loketId;
		$this->load->view('group_loket_add_main',$vData);
	}
	function fngroup_loketRow($pgroup_loketId) {
		$this->mo_group_loket->fngroup_loketRow($pgroup_loketId);
	}
	
	function fngroup_loketDelete() {
		$vDelgroup_loketId = intval($_POST['Id']);
		$this->mo_group_loket->fngroup_loketDelete($vDelgroup_loketId);
	}
	
	function fngroup_loketUpdate($pgroup_loketId) {
		$vData = array(
		
         		
			'vid_group_loket'=>$this->input->post('id_group_loket'),
       		
			'vnama_group_loket'=>$this->input->post('nama_group_loket'),
       		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       		
			'vid_group_layanan_forward'=>$this->input->post('id_group_layanan_forward'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       		

		);
		$this->mo_group_loket->fnUpdategroup_loket($pgroup_loketId,$vData);
	}
}
?>

	   