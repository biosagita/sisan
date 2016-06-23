<?php
class md_com extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_com');
	}
	function index() {
		$this->fncom();
	}
	function fncom()	{
		$this->load->view('vw_com');
	}
	// ======================================== 'Datagrid User Section'
	function fncomData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vcomKeyword=$this->input->post('comKeyword');
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
		
		$vSort='f_com_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_com->fncomCount($vcomKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_com->fncomData($vcomKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fncomAdd() {
		$this->load->view('com_add_main');
	}
	
	function fncomCreate() {
		$vData = array(
         		
			'vf_com_id'=>$this->input->post('f_com_id'),
       		
			'vf_com'=>$this->input->post('f_com'),
       		
			'vf_baudrate'=>$this->input->post('f_baudrate'),
       		
			'vf_com_status'=>$this->input->post('f_com_status'),
       		
			'vf_remark'=>$this->input->post('f_remark'),
       				
		);
		
		
	$this->mo_com->fnCreatecom($vData);
	}
	function fncomEdit($pcomId) {
		$vData['vcomId'] = $pcomId;
		$this->load->view('com_add_main',$vData);
	}
	function fncomRow($pcomId) {
		$this->mo_com->fncomRow($pcomId);
	}
	
	function fncomDelete() {
		$vDelcomId = intval($_POST['Id']);
		$this->mo_com->fncomDelete($vDelcomId);
	}
	
	function fncomUpdate($pcomId) {
		$vData = array(
		
         		
			'vf_com_id'=>$this->input->post('f_com_id'),
       		
			'vf_com'=>$this->input->post('f_com'),
       		
			'vf_baudrate'=>$this->input->post('f_baudrate'),
       		
			'vf_com_status'=>$this->input->post('f_com_status'),
       		
			'vf_remark'=>$this->input->post('f_remark'),
       		

		);
		$this->mo_com->fnUpdatecom($pcomId,$vData);
	}
}
?>

	   