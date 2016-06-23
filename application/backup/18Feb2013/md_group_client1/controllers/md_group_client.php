<?php
class md_group_client extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_group_client');
	}
	function index() {
		$this->GroupClient();
	}
	function GroupClient() {
		$this->load->view('vw_group_client');
	}
	function fnGroupClientData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vGroupCodeKeyword=$this->input->post('groupclient_code');
		$vGroupNameKeyword=$this->input->post('groupclient_name');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=10;
		}
		if(!$vGroupCodeKeyword) {
			$vGroupCodeKeyword='';
		}
		if(!$vGroupNameKeyword) {
			$vGroupNameKeyword='';
		}
		if(!$vSort) {
			$vSort='f_group_client_code';
		} else {
			if($vSort=='groupclient_code') {
				$vSort='f_group_client_code';
			} else if($vSort=='groupclient_name') {
				$vSort='f_group_client_name';
			} else if($vSort=='groupclient_city') {
				$vSort='f_group_client_city';
			}
		}
		if(!$vOrder) {
			$vOrder='ASC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_group_client->fnGroupClientCount($vGroupCodeKeyword,$vGroupNameKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_group_client->fnGroupClientData($vGroupCodeKeyword,$vGroupNameKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}
	function fnGroupClientAdd() {
		$this->load->view('_add_main');
	}
	function fnGroupClientEdit($pGroupClient) {
		$vData['vGroupClient'] = $pGroupClient;
		$this->load->view('_add_main',$vData);
	}
	function fnGroupClientRow($pId) {
		$this->mo_group_client->fnGroupClientRow($pId);
	}
	function fnIndustryData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_group_client->fnIndustryData($vVarQuery);
	}
	function fnGroupClientCreate() {
		$vData = array(
			'vCode'=>strtoupper($this->input->post('fldCode')),
			'vName'=>$this->input->post('fldName'),
			'vAddr1'=>$this->input->post('fldAddress1'),
			'vAddr2'=>$this->input->post('fldAddress2'),
			'vAddr3'=>$this->input->post('fldAddress3'),
			'vCity'=>$this->input->post('fldCity'),
			'vPost'=>$this->input->post('fldPostCode'),
			'vPhone'=>$this->input->post('fldPhone'),
			'vFax'=>$this->input->post('fldFax'),
			'vIdst'=>$this->input->post('fldIndustry'),
			'vActv'=>'1',
			'vBy'=>$this->session->userdata('sName'),
			'vDate'=>date('Y-m-d H:i:s')
		);
		$this->mo_group_client->fnGroupClientCreate($vData);
	}
	function fnGroupClientUpdate($pId) {
		$vData = array(
			'vName'=>$this->input->post('fldName'),
			'vAddr1'=>$this->input->post('fldAddress1'),
			'vAddr2'=>$this->input->post('fldAddress2'),
			'vAddr3'=>$this->input->post('fldAddress3'),
			'vCity'=>$this->input->post('fldCity'),
			'vPost'=>$this->input->post('fldPostCode'),
			'vPhone'=>$this->input->post('fldPhone'),
			'vFax'=>$this->input->post('fldFax'),
			'vIdst'=>$this->input->post('fldIndustry'),
			'vBy'=>$this->session->userdata('sName'),
			'vDate'=>date('Y-m-d H:i:s')
		);
		$this->mo_group_client->fnGroupClientUpdate($pId,$vData);
	}
	function fnCekIndustry($pText) {
		$cekIdst = $this->mo_group_client->fnCekIdst($pText);
		$vIdst = $cekIdst->desc1;
		$vOutput = '{"idst":"'.$vIdst.'"}';
		echo $vOutput;
	}
}
?>