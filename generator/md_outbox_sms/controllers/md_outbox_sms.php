<?php
class md_outbox_sms extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_outbox_sms');
	}
	function index() {
		$this->fnoutbox_sms();
	}
	function fnoutbox_sms()	{
		$this->load->view('vw_outbox_sms');
	}
	// ======================================== 'Datagrid User Section'
	function fnoutbox_smsData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$voutbox_smsKeyword=$this->input->post('outbox_smsKeyword');
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
		
		$vSort='f_outbox_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_outbox_sms->fnoutbox_smsCount($voutbox_smsKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_outbox_sms->fnoutbox_smsData($voutbox_smsKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnoutbox_smsAdd() {
		$this->load->view('outbox_sms_add_main');
	}
	
	function fnoutbox_smsCreate() {
		$vData = array(
         		
			'vf_outbox_id'=>$this->input->post('f_outbox_id'),
       		
			'vf_outbox_date'=>$this->input->post('f_outbox_date'),
       		
			'vf_destination_number'=>$this->input->post('f_destination_number'),
       		
			'vf_outbox_message'=>$this->input->post('f_outbox_message'),
       		
			'vf_com_id'=>$this->input->post('f_com_id'),
       		
			'vf_outbox_status'=>$this->input->post('f_outbox_status'),
       		
			'vf_outbox_remark'=>$this->input->post('f_outbox_remark'),
       		
			'vf_outbox_send_date'=>$this->input->post('f_outbox_send_date'),
       				
		);
		
		
	$this->mo_outbox_sms->fnCreateoutbox_sms($vData);
	}
	function fnoutbox_smsEdit($poutbox_smsId) {
		$vData['voutbox_smsId'] = $poutbox_smsId;
		$this->load->view('outbox_sms_add_main',$vData);
	}
	function fnoutbox_smsRow($poutbox_smsId) {
		$this->mo_outbox_sms->fnoutbox_smsRow($poutbox_smsId);
	}
	
	function fnoutbox_smsDelete() {
		$vDeloutbox_smsId = intval($_POST['Id']);
		$this->mo_outbox_sms->fnoutbox_smsDelete($vDeloutbox_smsId);
	}
	
	function fnoutbox_smsUpdate($poutbox_smsId) {
		$vData = array(
		
         		
			'vf_outbox_id'=>$this->input->post('f_outbox_id'),
       		
			'vf_outbox_date'=>$this->input->post('f_outbox_date'),
       		
			'vf_destination_number'=>$this->input->post('f_destination_number'),
       		
			'vf_outbox_message'=>$this->input->post('f_outbox_message'),
       		
			'vf_com_id'=>$this->input->post('f_com_id'),
       		
			'vf_outbox_status'=>$this->input->post('f_outbox_status'),
       		
			'vf_outbox_remark'=>$this->input->post('f_outbox_remark'),
       		
			'vf_outbox_send_date'=>$this->input->post('f_outbox_send_date'),
       		

		);
		$this->mo_outbox_sms->fnUpdateoutbox_sms($poutbox_smsId,$vData);
	}
}
?>

	   