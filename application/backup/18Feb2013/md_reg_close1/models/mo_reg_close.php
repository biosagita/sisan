<?php
class mo_reg_close extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function fnRegCloseCount($pInsuredKeyword) {
		$this->db->select("count(*) as selectCount");
		$this->db->like(array("regslip_insured"=>$pInsuredKeyword));
		$vResult = $this->db->get("tbregclosing")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnRegCloseData($pInsuredKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		$this->db->select('regslip_id,regslip_insured,regslip_date,regslip_classrisk,segment,regslip_desc,approve_by');
		$this->db->like(array("regslip_insured"=>$pInsuredKeyword));
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$vResult = $this->db->get("tbregclosing")->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['closing_regslip_id'] = $vRow->regslip_id;
			$vArrayTemp['closing_regslip_insured'] = $vRow->regslip_insured;
			$vArrayTemp['closing_regslip_date'] = date("d-M-Y",strtotime($vRow->regslip_date));
			$vArrayTemp['closing_regslip_classrisk'] = $vRow->regslip_classrisk;
			$vArrayTemp['closing_segment'] = $vRow->segment;
			$vArrayTemp['closing_regslip_desc'] = $vRow->regslip_desc;
			$vArrayTemp['closing_approve_by'] = $vRow->approve_by;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnRegCloseRow($pId) {
		$this->db->select('regslip_insured,regslip_date,regslip_classrisk,segment,regslip_desc,approve_by');
		$this->db->where("regslip_id",$pId);
		$vResult = $this->db->get("tbregclosing")->result();
		$vRow = $vResult[0];
		$vData['fldInsured'] = $vRow->regslip_insured;
		$vData['fldDate'] = date("d/m/Y",strtotime($vRow->regslip_date));
		$vData['fldClassRisk'] = $vRow->regslip_classrisk;
		$vData['fldSegment'] = $vRow->segment;
		$vData['fldDescription'] = $vRow->regslip_desc;
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
	function fnRegCloseCreate($pData) {
		$vData = array(
			'regslip_insured' => $pData['vInsured'],
			'regslip_date' => $pData['vDate'],
			'regslip_classrisk' => $pData['vClassRisk'],
			'segment' => $pData['vSegment'],
			'regslip_desc' => $pData['vDescription'],
			'approve_by' => $pData['vApprove'],
			'entry_by' => $this->session->userdata('sName'),
			'entry_date' => date("Y-m-d")
		);
		$vResult = $this->db->insert('tbregclosing',$vData); 
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnRegCloseUpdate($pRegCloseId,$pData) {
		$vData = array(
			'regslip_insured' => $pData['vInsured'],
			'regslip_date' => $pData['vDate'],
			'regslip_classrisk' => $pData['vClassRisk'],
			'segment' => $pData['vSegment'],
			'regslip_desc' => $pData['vDescription'],
			'approve_by' => $pData['vApprove'],
			'modify_by' => $this->session->userdata('sName'),
			'modify_date' => date("Y-m-d")
		);
		$vResult = $this->db->where('regslip_id',$pRegCloseId)->update('tbregclosing',$vData);
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