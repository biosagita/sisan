<?php
class md_reg_letter extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_reg_letter');
	}
	function index() {
		$this->fnRegLetter();
	}
	function fnRegLetter() {
		$this->load->view('vw_reg_letter');
	}
	function fnRegLetterData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vInsuredKeyword=$this->input->post('InsuredKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vInsuredKeyword) {
			$vInsuredKeyword='';
		}
		if(!$vSort) {
			$vSort='regletter_id';
		} else {
			if($vSort=='letter_regletter_id') {
				$vSort='regletter_id';
			} else if($vSort=='letter_regletter_date') {
				$vSort='regletter_id';
			} else if($vSort=='letter_regletter_insured') {
				$vSort='regletter_insured';
			} else if($vSort=='letter_segment') {
				$vSort='segment';
			}
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_reg_letter->fnRegLetterCount($vInsuredKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_reg_letter->fnRegLetterData($vInsuredKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}
	function fnRegLetterAdd() {
		$this->load->view('_add_main');
	}
	function fnRegLetterEdit($pRegLetter) {
		$vData['vRegLetter'] = $pRegLetter;
		$this->load->view('_add_main',$vData);
	}
	function fnRegLetterRow($pId) {
		$this->mo_reg_letter->fnRegLetterRow($pId);
	}
	function fnClassRiskData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_reg_letter->fnClassRiskData($vVarQuery);
	}
	function fnSegmentData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_reg_letter->fnSegmentData($vVarQuery);
	}
	function fnRegLetterCreate() {
		$vDate = $this->input->post('fldDate');
		$vTempDate = explode("/",$vDate);
		$vDate = $vTempDate[2]."-".$vTempDate[1]."-".$vTempDate[0];
		$vData = array(
			'vInsured'=>$this->input->post('fldInsured'),
			'vDate'=>$vDate,
			'vClassRisk'=>$this->input->post('fldClassRisk'),
			'vSegment'=>$this->input->post('fldSegment'),
			'vDescription'=>$this->input->post('fldDescription'),
			'vApprove'=>$this->input->post('fldApprove')
		);
		$this->mo_reg_letter->fnRegLetterCreate($vData);
	}
	function fnRegLetterUpdate($pRegLetterId) {
		$vDate = $this->input->post('fldDate');
		$vTempDate = explode("/",$vDate);
		$vDate = $vTempDate[2]."-".$vTempDate[1]."-".$vTempDate[0];
		$vData = array(
			'vInsured'=>$this->input->post('fldInsured'),
			'vDate'=>$vDate,
			'vClassRisk'=>$this->input->post('fldClassRisk'),
			'vSegment'=>$this->input->post('fldSegment'),
			'vDescription'=>$this->input->post('fldDescription'),
			'vApprove'=>$this->input->post('fldApprove')
		);
		$this->mo_reg_letter->fnRegLetterUpdate($pRegLetterId,$vData);
	}
	function fnCekRiskSegment($pRisk,$pSegment) {
		$vCekRisk = $this->mo_reg_letter->fnCekRisk($pRisk);
		$vRiskCode = $vCekRisk->ClassRisk;
		$vCekSegment = $this->mo_reg_letter->fnCekSegment($pSegment);
		$vSegment = $vCekSegment->Code;
		$vOutput = '{"ClassRisk":"'.$vRiskCode.'","Segment":"'.$vSegment.'"}';
		echo $vOutput;
	}
}
?>