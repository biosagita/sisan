<?php
class md_layanan extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_layanan');
	}
	function index() {
		$this->fnlayanan();
	}
	function fnlayanan()	{
		$this->load->view('vw_layanan');
	}
	// ======================================== 'Datagrid User Section'
	function fnlayananData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vlayananKeyword=$this->input->post('layananKeyword');
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
		
		$vSort='id_layanan';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_layanan->fnlayananCount($vlayananKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_layanan->fnlayananData($vlayananKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnlayananAdd() {
		$this->load->view('layanan_add_main');
	}
	
	function fnlayananCreate() {
		$vData = array(
         		
			'vid_layanan'=>$this->input->post('id_layanan'),
       		
			'vnama_layanan'=>$this->input->post('nama_layanan'),
       		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       		
			'vlayanan_status'=>$this->input->post('layanan_status'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       		
			'vid_layanan_forward'=>$this->input->post('id_layanan_forward'),
       		
			'vstock'=>$this->input->post('stok'),

			'vstatus_popup'=>$this->input->post('status_popup'),

			'vestimasi'=>$this->input->post('estimasi'),
			
		);
		
		
	$this->mo_layanan->fnCreatelayanan($vData);
	}
	function fnlayananEdit($playananId) {
		$vData['vlayananId'] = $playananId;
		$this->load->view('layanan_add_main',$vData);
	}
	function fnlayananRow($playananId) {
		$this->mo_layanan->fnlayananRow($playananId);
	}
	
	function fnlayananDelete() {
		$vDellayananId = intval($_POST['Id']);
		$this->mo_layanan->fnlayananDelete($vDellayananId);
	}
	
	function fnlayananUpdate($playananId) {
		$vData = array(
		
         		
			'vid_layanan'=>$this->input->post('id_layanan'),
       		
			'vnama_layanan'=>$this->input->post('nama_layanan'),
       		
			'vid_group_layanan'=>$this->input->post('id_group_layanan'),
       		
			'vlayanan_status'=>$this->input->post('layanan_status'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       		
			'vid_layanan_forward'=>$this->input->post('id_layanan_forward'),
       		
			'vstock'=>$this->input->post('stok'),

			'vstatus_popup'=>$this->input->post('status_popup'),

			'vestimasi'=>$this->input->post('estimasi'),
       		

		);
		$this->mo_layanan->fnUpdatelayanan($playananId,$vData);
	}
}
?>

	   