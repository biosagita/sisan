<?php
class md_head extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_head');
	}
	function index() {
		$this->fnhead();
	}
	function fnhead()	{
		$this->load->view('vw_head');
	}
	// ======================================== 'Datagrid User Section'
	function fnheadData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vheadKeyword=$this->input->post('headKeyword');
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
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_head->fnheadCount($vheadKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_head->fnheadData($vheadKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnheadAdd() {
		$this->load->view('head_add_main');
	}
	
	function fnheadCreate() {
		$vData = array(
         		
			'vid_header'=>$this->input->post('id_header'),
       		
			'vtext_header'=>$this->input->post('text_header'),
       				
		);
		
		
	$this->mo_head->fnCreatehead($vData);
	}
	function fnheadEdit($pheadId) {
		$vData['vheadId'] = $pheadId;
		$this->load->view('head_add_main',$vData);
	}
	function fnheadRow($pheadId) {
		$this->mo_head->fnheadRow($pheadId);
	}
	
	function fnheadDelete() {
		$vDelheadId = intval($_POST['Id']);
		$this->mo_head->fnheadDelete($vDelheadId);
	}
	
	function fnheadUpdate($pheadId) {
		$vData = array(
		
         		
			'vid_header'=>$this->input->post('id_header'),
       		
			'vtext_header'=>$this->input->post('text_header'),
       		

		);
		$this->mo_head->fnUpdatehead($pheadId,$vData);
	}
}
?>

	   