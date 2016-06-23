<?php
class md_running_text extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_running_text');
	}
	function index() {
		$this->fnrunning_text();
	}
	function fnrunning_text()	{
		$this->load->view('vw_running_text');
	}
	// ======================================== 'Datagrid User Section'
	function fnrunning_textData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vrunning_textKeyword=$this->input->post('running_textKeyword');
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
		
		$vSort='id_running_text';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_running_text->fnrunning_textCount($vrunning_textKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_running_text->fnrunning_textData($vrunning_textKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnrunning_textAdd() {
		$this->load->view('running_text_add_main');
	}
	
	function fnrunning_textCreate() {
		$vData = array(
         		
			'vid_running_text'=>$this->input->post('id_running_text'),
       		
			'vtext'=>$this->input->post('text'),
       		
			'vcreated_date'=>$this->input->post('created_date'),
       		
			'vmodified_date'=>$this->input->post('modified_date'),
       		
			'vstart_date'=>$this->input->post('start_date'),
       		
			'vexpired_date'=>$this->input->post('expired_date'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       				
		);
		
		
	$this->mo_running_text->fnCreaterunning_text($vData);
	}
	function fnrunning_textEdit($prunning_textId) {
		$vData['vrunning_textId'] = $prunning_textId;
		$this->load->view('running_text_add_main',$vData);
	}
	function fnrunning_textRow($prunning_textId) {
		$this->mo_running_text->fnrunning_textRow($prunning_textId);
	}
	
	function fnrunning_textDelete() {
		$vDelrunning_textId = intval($_POST['Id']);
		$this->mo_running_text->fnrunning_textDelete($vDelrunning_textId);
	}
	
	function fnrunning_textUpdate($prunning_textId) {
		$vData = array(
		
         		
			'vid_running_text'=>$this->input->post('id_running_text'),
       		
			'vtext'=>$this->input->post('text'),
       		
			'vcreated_date'=>$this->input->post('created_date'),
       		
			'vmodified_date'=>$this->input->post('modified_date'),
       		
			'vstart_date'=>$this->input->post('start_date'),
       		
			'vexpired_date'=>$this->input->post('expired_date'),
       		
			'vketerangan'=>$this->input->post('keterangan'),
       		

		);
		$this->mo_running_text->fnUpdaterunning_text($prunning_textId,$vData);
	}
}
?>

	   