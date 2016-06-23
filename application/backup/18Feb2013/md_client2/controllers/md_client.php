<?php
class md_client extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_client');
	}
	function index() {
		$this->fnClient();
	}
	function fnClient()	{
		$this->load->view('vw_client');
	}
	function fnClientData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vCodeKeyword=$this->input->post('client_code');
		$vNameKeyword=$this->input->post('client_name');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vCodeKeyword) {
			$vCodeKeyword='';
		}
		if(!$vNameKeyword) {
			$vNameKeyword='';
		}
		if(!$vSort) {
			$vSort='Client';
		} else {
			if($vSort=='client_code') {
				$vSort='Client';
			} else if($vSort=='client_name') {
				$vSort='Client_Name';
			} else if($vSort=='client_city') {
				$vSort='CCity';
			}
		}
		if(!$vOrder) {
			$vOrder='ASC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_client->fnClientCount($vCodeKeyword,$vNameKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_client->fnClientData($vCodeKeyword,$vNameKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}
	function fnClientAdd() {
		$this->load->view('_add_main');
	}
	function fnClientEdit($pClient) {
		$vData['vClient'] = $pClient;
		$this->load->view('_add_main',$vData);
	}
	function fnClientRow($pId) {
		$this->mo_client->fnClientRow($pId);
	}
	function fnGroupData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_client->fnGroupData($vVarQuery);
	}
	function fnIndustryData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_client->fnIndustryData($vVarQuery);
	}
	function fnActiveData() {
		$vActiveJson = array(array('Num'=>'0','Text'=>'NON-ACTIVE'),array('Num'=>'1','Text'=>'ACTIVE'));
		echo json_encode($vActiveJson);
	}
	function fnClientCreate() {
		$vData1 = array(
			'vCode'=>$this->input->post('fldCode'),
			'vName'=>$this->input->post('fldName'),
			'vAddr1'=>$this->input->post('fldAddress1'),
			'vAddr2'=>$this->input->post('fldAddress2'),
			'vAddr3'=>$this->input->post('fldAddress3'),
			'vCity'=>$this->input->post('fldCity'),
			'vPost'=>$this->input->post('fldPostCode'),
			'vPhone'=>$this->input->post('fldPhone'),
			'vFax'=>$this->input->post('fldFax'),
			'vHome'=>$this->input->post('fldHome'),
			'vIdst'=>$this->input->post('fldIndustry'),
			'vActv'=>'1',
			'vBy'=>$this->session->userdata('sName'),
			'vDate'=>date('Y-m-d H:i:s')
		);
		$vData2 = array(
			'vGroupId'=>$this->input->post('fldGroup'),
			'vGroupText'=>$this->input->post('fldHiddenGroup')
		);
		$vGroupState = $this->input->post('fldHiddenState');
		if($vGroupState=='groupON') {
			$vReturnCreateClient = $this->mo_client->fnCreateClient($vData1); // insert data client
			if($vReturnCreateClient=='success') {
				$vNewClientId = $this->mo_client->feGetClientId($vData1); // ambil id client yg baru diinsert
				$this->mo_client->fnCreateGrouping($vNewClientId,$vData2); // insert grouping			
			} else if($vReturnCreateClient=='1062') {
				echo json_encode(array('msg'=>'Terjadi duplikasi data! Client sudah terdapat pada database'));
			} else if($vReturnCreateClient=='dberror') {
				echo json_encode(array('msg'=>'Database Error!'));
			}

		} else if($vGroupState=='groupOFF') {
			$this->mo_client->fnClientCreateNoGroup($vData1);
		}
	}
	function fnClientUpdate($pId) {
		$vData1 = array(
			'vName'=>$this->input->post('fldName'),
			'vAddr1'=>$this->input->post('fldAddress1'),
			'vAddr2'=>$this->input->post('fldAddress2'),
			'vAddr3'=>$this->input->post('fldAddress3'),
			'vCity'=>$this->input->post('fldCity'),
			'vPost'=>$this->input->post('fldPostCode'),
			'vPhone'=>$this->input->post('fldPhone'),
			'vFax'=>$this->input->post('fldFax'),
			'vHome'=>$this->input->post('fldHome'),
			'vIdst'=>$this->input->post('fldIndustry')
		);
		$vData2 = array(
			'vGroupId'=>$this->input->post('fldGroup'),
			'vGroupText'=>$this->input->post('fldHiddenGroup')
		);
		$vGroupState = $this->input->post('fldHiddenState');
		if($vGroupState=='groupON') {
			$this->mo_client->fnUpdateClient($pId,$vData1); // update data client
			$this->mo_client->fnDelExistGrouping($pId); // delete grouping yang sudah ada untuk id
			$this->mo_client->fnUpdateGrouping($pId,$vData2); // insert grouping
		} else if($vGroupState=='groupOFF') {
			$this->mo_client->fnUpdateClientNoGroup($pId,$vData1); // update data client
			$this->mo_client->fnDelExistGroupingNoGroup($pId); // delete grouping yang sudah ada untuk id
		}
	}
	function fnCekGroupIndustry($pText1,$pText2) {
		$cekGroup = $this->mo_client->fnCekGroup($pText1);
		$vGroup = $cekGroup->f_group_client_code;
		$cekIdst = $this->mo_client->fnCekIdst($pText2);
		$vIdst = $cekIdst->desc1;
		$vOutput = '{"group":"'.$vGroup.'","idst":"'.$vIdst.'"}';
		echo $vOutput;
	}
	function fnCekGroupExist($pId) {
		$grpExist = $this->mo_client->fnCekGroupExist($pId);
		$vTotal = $grpExist->selectCount;
		$vOutput = '{"group":"'.$vTotal.'"}';
		echo $vOutput;
	}
}
?>