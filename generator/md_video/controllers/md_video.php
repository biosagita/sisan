<?php
class md_video extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_video');
	}
	function index() {
		$this->fnvideo();
	}
	function fnvideo()	{
		$this->load->view('vw_video');
	}
	// ======================================== 'Datagrid User Section'
	function fnvideoData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vvideoKeyword=$this->input->post('videoKeyword');
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
		
		$vSort='id_video';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_video->fnvideoCount($vvideoKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_video->fnvideoData($vvideoKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnvideoAdd() {
		$this->load->view('video_add_main');
	}
	
	function fnvideoCreate() {
		$vData = array(
         		
			'vid_video'=>$this->input->post('id_video'),
       		
			'vnama_video'=>$this->input->post('nama_video'),
       				
		);
		
		
	$this->mo_video->fnCreatevideo($vData);
	}
	function fnvideoEdit($pvideoId) {
		$vData['vvideoId'] = $pvideoId;
		$this->load->view('video_add_main',$vData);
	}
	function fnvideoRow($pvideoId) {
		$this->mo_video->fnvideoRow($pvideoId);
	}
	
	function fnvideoDelete() {
		$vDelvideoId = intval($_POST['Id']);
		$this->mo_video->fnvideoDelete($vDelvideoId);
	}
	
	function fnvideoUpdate($pvideoId) {
		$vData = array(
		
         		
			'vid_video'=>$this->input->post('id_video'),
       		
			'vnama_video'=>$this->input->post('nama_video'),
       		

		);
		$this->mo_video->fnUpdatevideo($pvideoId,$vData);
	}
}
?>

	   