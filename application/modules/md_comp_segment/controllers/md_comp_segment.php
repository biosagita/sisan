<?php
/*
# Module Id					= N/A
# Module Name				= Company Segment
# Module Code				= md_comp_segment
# Module Description		= N/A
# Module Tables				= t_comp_segment
# Other Related Table		= N/A
# Start Date Of Developing	= 2013/03/13 @ 11:01 AM
# Project Sponsor			= Helmy Hananto
# Project Manager			= Mohamad Hilman
# System Analyst			= Mohamad Hilman
# Programmer				= Tri Pamungkas
*/
class md_comp_segment extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_comp_segment');
	}
	function index() {
		$this->fnCompSeg();
	}
	function fnCompSeg() {
		$this->load->view('vw_comp_segment');
	}
	function fnCompSegGrid() {
		$vResult=array();
		$vRs=$this->mo_comp_segment->fnCompSegCount();
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_comp_segment->fnCompSegData();
		echo json_encode($vResult);
	}
	function fnCompSegAdd() {
		$vData = array(
			'vAction'=>'add'
		);
		$this->load->view('compseg_add_main',$vData);
	}
	function fnCompSegEdit($pSegmentId) {
		$vData = array(
			'vAction'=>'edit',
			'vSegmentId'=>$pSegmentId
		);
		$this->load->view('compseg_add_main',$vData);
	}
	function fnCompSegRow($pSegmentId) {
		$this->mo_comp_segment->fnCompSegRow($pSegmentId);
	}
	function fnCompSegCreate() {
		$vData = array(
			'vId'=>$this->input->post('fldId'),
			'vComp'=>$this->input->post('fldCompany'),
			'vCode'=>$this->input->post('fldCode'),
			'vName'=>$this->input->post('fldName'),
			'vDesc'=>$this->input->post('fldDesc'),
			'vParent'=>$this->input->post('fldParent'),
			'vTop'=>$this->input->post('fldTop'),
			'vProd'=>$this->input->post('fldProd'),
			'vAct'=>$this->input->post('fldAct')
		);
		$this->mo_comp_segment->fnCompSegCreate($vData);
	}
	function fnCompSegUpdate($pSegmentId) {
		$vData = array(
			'vId'=>$this->input->post('fldId'),
			'vComp'=>$this->input->post('fldCompany'),
			'vCode'=>$this->input->post('fldCode'),
			'vName'=>$this->input->post('fldName'),
			'vDesc'=>$this->input->post('fldDesc'),
			'vParent'=>$this->input->post('fldParent'),
			'vTop'=>$this->input->post('fldTop'),
			'vProd'=>$this->input->post('fldProd'),
			'vAct'=>$this->input->post('fldAct')
		);
		$this->mo_comp_segment->fnCompSegUpdate($pSegmentId,$vData);
	}
	
	function fnCompSegCompany() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_comp_segment->fnCompSegCompanyData($vVarQuery);
	}
	function fnCompSegParent() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_comp_segment->fnCompSegParentData($vVarQuery);
	}
	function fnCompSegTop() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_comp_segment->fnCompSegTopData($vVarQuery);
	}
	function fnCompSegProduction() {
		$vProduction = array(
			array(
				'f_production_val'=>'0',
				'f_production_text'=>'NO'
			),
			array(
				'f_production_val'=>'1',
				'f_production_text'=>'YES'
			)
		);
		echo json_encode($vProduction);
	}
	function fnCompSegAction() {
		$vActive = array(
			array(
				'f_active_val'=>'0',
				'f_active_text'=>'INACTIVE'
			),
			array(
				'f_active_val'=>'1',
				'f_active_text'=>'ACTIVE'
			)
		);
		echo json_encode($vActive);
	}
}
?>