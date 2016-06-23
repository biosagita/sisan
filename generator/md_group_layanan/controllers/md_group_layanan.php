<?php
class md_group_layanan extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_group_layanan');
	}
	function index() {
		$this->fngroup_layanan();
	}
	function fngroup_layanan()	{
		$this->load->view('vw_group_layanan');
	}
	// ======================================== 'Datagrid User Section'
	function fngroup_layananData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vgroup_layananKeyword=$this->input->post('group_layananKeyword');
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
		
		$vSort='id_group_layanan';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_group_layanan->fngroup_layananCount($vgroup_layananKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_group_layanan->fngroup_layananData($vgroup_layananKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fngroup_layananAdd() {
		$this->load->view('group_layanan_add_main');
	}
	
	function fngroup_layananCreate() {
		$vData = array(
         		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       		
			'vnama_group_layanan'=>$this->input->post('nama_group_layanan'),
       		
			'vno_start'=>$this->input->post('no_start'),
       		
			'vno_end'=>$this->input->post('no_end'),
       		
			'vjml_tiket'=>$this->input->post('jml_tiket'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       				
		);
		
		
	$this->mo_group_layanan->fnCreategroup_layanan($vData);
	}
	function fngroup_layananEdit($pgroup_layananId) {
		$vData['vgroup_layananId'] = $pgroup_layananId;
		$this->load->view('group_layanan_add_main',$vData);
	}
	function fngroup_layananRow($pgroup_layananId) {
		$this->mo_group_layanan->fngroup_layananRow($pgroup_layananId);
	}
	
	function fngroup_layananDelete() {
		$vDelgroup_layananId = intval($_POST['Id']);
		$this->mo_group_layanan->fngroup_layananDelete($vDelgroup_layananId);
	}
	
	function fngroup_layananUpdate($pgroup_layananId) {
		$vData = array(
		
         		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       		
			'vnama_group_layanan'=>$this->input->post('nama_group_layanan'),
       		
			'vno_start'=>$this->input->post('no_start'),
       		
			'vno_end'=>$this->input->post('no_end'),
       		
			'vjml_tiket'=>$this->input->post('jml_tiket'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       		

		);
		$this->mo_group_layanan->fnUpdategroup_layanan($pgroup_layananId,$vData);
	}
}
?>

	   