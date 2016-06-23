<?php
class md_device extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_device');
	}
	function index() {
		$this->fndevice();
	}
	function fndevice()	{
		$this->load->view('vw_device');
	}
	// ======================================== 'Datagrid User Section'
	function fndeviceData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vdeviceKeyword=$this->input->post('deviceKeyword');
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
		
		$vSort='f_device_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_device->fndeviceCount($vdeviceKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_device->fndeviceData($vdeviceKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fndeviceAdd() {
		$this->load->view('device_add_main');
	}
	
	function fndeviceCreate() {
		$vData = array(
         		
			'vf_device_id'=>$this->input->post('f_device_id'),
       		
			'vf_device_name'=>$this->input->post('f_device_name'),
       		
			'vf_device_ip'=>$this->input->post('f_device_ip'),
       		
			'vf_device_port'=>$this->input->post('f_device_port'),
       		
			'vf_device_type'=>$this->input->post('f_device_type'),
       		
			'vf_connect_type'=>$this->input->post('f_connect_type'),
       		
			'vf_description'=>$this->input->post('f_description'),
       				
		);
		
		
	$this->mo_device->fnCreatedevice($vData);
	}
	function fndeviceEdit($pdeviceId) {
		$vData['vdeviceId'] = $pdeviceId;
		$this->load->view('device_add_main',$vData);
	}
	function fndeviceRow($pdeviceId) {
		$this->mo_device->fndeviceRow($pdeviceId);
	}
	
	function fndeviceDelete() {
		$vDeldeviceId = intval($_POST['Id']);
		$this->mo_device->fndeviceDelete($vDeldeviceId);
	}
	
	function fndeviceUpdate($pdeviceId) {
		$vData = array(
		
         		
			'vf_device_id'=>$this->input->post('f_device_id'),
       		
			'vf_device_name'=>$this->input->post('f_device_name'),
       		
			'vf_device_ip'=>$this->input->post('f_device_ip'),
       		
			'vf_device_port'=>$this->input->post('f_device_port'),
       		
			'vf_device_type'=>$this->input->post('f_device_type'),
       		
			'vf_connect_type'=>$this->input->post('f_connect_type'),
       		
			'vf_description'=>$this->input->post('f_description'),
       		

		);
		$this->mo_device->fnUpdatedevice($pdeviceId,$vData);
	}
}
?>

	   