<?php
class mo_reg_letter extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function fnRegLetterCount($pInsuredKeyword) {
		$this->db->select("count(*) as selectCount");
		$this->db->like(array("regletter_insured"=>$pInsuredKeyword));
		$vResult = $this->db->get("tbregletter")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnRegLetterData($pInsuredKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		$this->db->select('regletter_id,regletter_insured,regletter_date,regletter_classrisk,segment,regletter_description,approve_by');
		$this->db->like(array("regletter_insured"=>$pInsuredKeyword));
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$vResult = $this->db->get("tbregletter")->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['letter_regletter_id'] = $vRow->regletter_id;
			$vArrayTemp['letter_regletter_insured'] = $vRow->regletter_insured;
			$vArrayTemp['letter_regletter_date'] = date("d-M-Y",strtotime($vRow->regletter_date));
			$vArrayTemp['letter_regletter_classrisk'] = $vRow->regletter_classrisk;
			$vArrayTemp['letter_segment'] = $vRow->segment;
			$vArrayTemp['letter_regletter_description'] = $vRow->regletter_description;
			$vArrayTemp['letter_approve_by'] = $vRow->approve_by;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnRegLetterRow($pId) {
		$this->db->select('regletter_insured,regletter_date,regletter_classrisk,segment,regletter_description,approve_by');
		$this->db->where("regletter_id",$pId);
		$vResult = $this->db->get("tbregletter")->result();
		$vRow = $vResult[0];
		$vData['fldInsured'] = $vRow->regletter_insured;
		$vData['fldDate'] = date("d/m/Y",strtotime($vRow->regletter_date));
		$vData['fldClassRisk'] = $vRow->regletter_classrisk;
		$vData['fldSegment'] = $vRow->segment;
		$vData['fldDescription'] = $vRow->regletter_description;
		$vData['fldApprove'] = $vRow->approve_by;
		echo json_encode($vData);
	}
	function fnClassRiskData($pVarQuery) {
		$this->db->select('ClassRisk,ClassRisk_Name');
		$this->db->like('ClassRisk',$pVarQuery);
		$this->db->order_by('ClassRisk','ASC');
		$vResult = $this->db->get('tbclassrisk')->result();
		$vClassRiskJson = array();
		foreach($vResult as $vRow):
			array_push($vClassRiskJson,$vRow);
		endforeach;
		echo json_encode($vClassRiskJson);
	}
	function fnSegmentData($pVarQuery) {
		$this->db->select('Code');
		$this->db->like('Code',$pVarQuery);
		$this->db->order_by('Code','ASC');
		$vResult = $this->db->get('tbsegment')->result();
		$vSegmentJson = array();
		foreach($vResult as $vRow):
			array_push($vSegmentJson,$vRow);
		endforeach;
		echo json_encode($vSegmentJson);
	}
	function fnRegLetterCreate($pData) {
		$vData = array(
			'regletter_insured' => $pData['vInsured'],
			'regletter_date' => $pData['vDate'],
			'regletter_classrisk' => $pData['vClassRisk'],
			'segment' => $pData['vSegment'],
			'regletter_description' => $pData['vDescription'],
			'approve_by' => $pData['vApprove'],
			'entry_by' => $this->session->userdata('sName'),
			'entry_date' => date("Y-m-d")
		);
		$vResult = $this->db->insert('tbregletter',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnRegLetterUpdate($pRegLetterId,$pData) {
		$vData = array(
			'regletter_insured' => $pData['vInsured'],
			'regletter_date' => $pData['vDate'],
			'regletter_classrisk' => $pData['vClassRisk'],
			'segment' => $pData['vSegment'],
			'regletter_description' => $pData['vDescription'],
			'approve_by' => $pData['vApprove'],
			'modify_by' => $this->session->userdata('sName'),
			'modify_date' => date("Y-m-d")
		);
		$vResult = $this->db->where('regletter_id',$pRegLetterId)->update('tbregletter',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnCekRisk($pRisk) {
		$this->db->select('ClassRisk,ClassRisk_Name');
		$this->db->where('ClassRisk',$pRisk);
		$query = $this->db->get('tbclassrisk')->result();
		return $query[0];
	}
	function fnCekSegment($pSegment) {
		$this->db->select('Code');
		$this->db->where('Code',$pSegment);
		$query = $this->db->get('tbsegment')->result();
		return $query[0];
	}
}
?>