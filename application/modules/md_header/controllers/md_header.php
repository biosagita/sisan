<?php
class md_header extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_header');
	}
	function index() {
		$this->fnheader();
	}
	function fnheader()	{
		$this->load->view('vw_header');
	}
	// ======================================== 'Datagrid User Section'
	function fnheaderData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vheaderKeyword=$this->input->post('headerKeyword');
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
		
		$vSort='id_header';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_header->fnheaderCount($vheaderKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_header->fnheaderData($vheaderKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnheaderAdd() {
		$this->load->view('header_add_main');
	}
	
	function fnheaderCreate() {
		$vData = array(
         		
			'vid_header'=>$this->input->post('id_header'),
       		
			'vtext_header'=>$this->input->post('text_header'),
       				
		);
		
		
	$this->mo_header->fnCreateheader($vData);
	}
	function fnheaderEdit($pheaderId) {
		$vData['vheaderId'] = $pheaderId;
		$this->load->view('header_add_main',$vData);
	}
	function fnheaderRow($pheaderId) {
		$this->mo_header->fnheaderRow($pheaderId);
	}
	
	function fnheaderDelete() {
		$vDelheaderId = intval($_POST['Id']);
		$this->mo_header->fnheaderDelete($vDelheaderId);
	}
	
	function fnheaderUpdate($pheaderId) {
		$vData = array(
		
         		
			'vid_header'=>$this->input->post('id_header'),
       		
			'vtext_header'=>$this->input->post('text_header'),
       		

		);
		$this->mo_header->fnUpdateheader($pheaderId,$vData);
	}
}
?>

	   