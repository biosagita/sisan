<?php
class md_reg_close extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_reg_close');
		$this->load->library('word');
	}
	function index() {
		$this->fnRegClose();
	}
	function fnRegClose()	{
		$this->load->view('vw_reg_close');
	}
	function fnRegCloseData() {
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
			$vSort='regslip_id';
		} else {
			if($vSort=='closing_regslip_id') {
				$vSort='regslip_id';
			} else if($vSort=='closing_regslip_date') {
				$vSort='regslip_id';
			} else if($vSort=='closing_regslip_insured') {
				$vSort='regslip_insured';
			} else if($vSort=='closing_segment') {
				$vSort='segment';
			}
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_reg_close->fnRegCloseCount($vInsuredKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_reg_close->fnRegCloseData($vInsuredKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}
	function fnRegCloseAdd() {
		$this->load->view('_add_main');
	}
	function fnRegCloseEdit($pRegClosing) {
		$vData['vRegClosing'] = $pRegClosing;
		$this->load->view('_add_main', $vData);
	}
	function fnRegCloseRow($pId) {
		$this->mo_reg_close->fnRegCloseRow($pId);
	}
	function fnClassRiskData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_reg_close->fnClassRiskData($vVarQuery);
	}
	function fnSegmentData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_reg_close->fnSegmentData($vVarQuery);
	}
	function fnRegCloseCreate() {
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
		$this->mo_reg_close->fnRegCloseCreate($vData);
	}
	function fnRegCloseUpdate($pRegCloseId) {
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
		$this->mo_reg_close->fnRegCloseUpdate($pRegCloseId, $vData);
	}
	function fnRegClosePrint($pSegment,$pRisk,$pId,$pDate,$pApprove) {
		if($pSegment=='kosong') {
			$vSegment = 'AXLE';
		} else {
			$vSegment = urldecode($pSegment);
		}
		if($pRisk=='kosong') {
			$vRiskCode = '[RISKCODE]';
		} else {
			$vRiskCode = urldecode($pRisk);
		}
		if($pId=='kosong') {
			$vRegNo = '[REGNO]';
		} else {
			$vRegNo = urldecode($pId);
		}
		if($pDate=='kosong') {
			$vMonthDate = '[MONTHDATE]';
			$vCurrentDate = '[CURRENTDATE]';
		} else {
			$vMonthDate = urldecode(date('m-y', strtotime($pDate)));
			$vCurrentDate = urldecode(date('d F Y', strtotime($pDate)));
		}
		if($pApprove=='kosong') {
			$vSectionHead = '[SECTIONHEAD]';
		} else {
			$vSectionHead = urldecode($pApprove);
		}
		$nowDate = date(Y).date(m).date(d);
		$nowHour = date(H).date(i).date(s);
		$nowUser = $this->session->userdata('sName');
		$filename = $nowDate.'_'.$nowHour.'_CLOSING_'.$vRegNo.'_'.$nowUser; // pendefinisian nama dokumen yang akan dibentuk
		$PHPWord = $this->word;
		$document = $PHPWord->loadTemplate(FCPATH.'/assets/Closing.docx');
		$document->setValue('zSEGMENTz', $vSegment);
		$document->setValue('zRISKCODEz', $vRiskCode);
		$document->setValue('zREGNOz', $vRegNo);
		$document->setValue('zMONTHDATEz', $vMonthDate);
		$document->setValue('zCURRENTDATEz', $vCurrentDate);
		$document->setValue('zSECTIONHEADz', $vSectionHead);
		$document->save(FCPATH.'/assets/'.$filename);
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); // mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); // tell browser what's the file name
		header('Cache-Control: max-age=0'); // no cache
		readfile(FCPATH.'/assets/'.$filename);
		unlink(FCPATH.'/assets/'.$filename);
	}
	function fnCekRiskSegment($pRisk,$pSegment) {
		$cekRisk = $this->mo_reg_close->fnCekRisk($pRisk);
		$vRiskCode = $cekRisk->ClassRisk;
		$cekSegment = $this->mo_reg_close->fnCekSegment($pSegment);
		$vSegment = $cekSegment->Code;
		$output = '{ "ClassRisk": "'.$vRiskCode.'", "Segment": "'.$vSegment.'"}';
		echo $output;
	}
}
?>