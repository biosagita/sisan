<?php
/*
# Model's Module Code		= md_comp_segment
# Programmer				= Tri Pamungkas
*/
class mo_comp_segment extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function fnCompSegCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get("t_comp_segment")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnCompSegData() {
		$this->db->select("a.f_segment_id AS SegId, b.f_comp_name AS CompName, a.f_segment_code AS SegCode, a.f_segment_name AS SegName, c.f_segment_name AS SegParent, d.f_segment_name AS SegTop, a.f_segment_prod AS SegProd, a.f_segment_active AS SegAct");
		$this->db->from("t_comp_segment AS a");
		$this->db->join("t_comp_profile AS b","b.f_comp_id=a.f_comp_id","left");
		$this->db->join("t_comp_segment AS c","c.f_segment_id=a.f_parent_segment_id","left");
		$this->db->join("t_comp_segment AS d","d.f_segment_id=a.f_top_segment_id","left");
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['_78_grd1_id'] = $vRow->SegId;
			$vArrayTemp['_78_grd1_company'] = $vRow->CompName;
			$vArrayTemp['_78_grd1_code'] = $vRow->SegCode;
			$vArrayTemp['_78_grd1_name'] = $vRow->SegName;
			$vArrayTemp['_78_grd1_parent'] = $vRow->SegParent;
			$vArrayTemp['_78_grd1_top'] = $vRow->SegTop;
			if($vRow->SegProd=='1') {
				$vProduct = "Yes";
			} else {
				$vProduct = "No";
			}
			$vArrayTemp['_78_grd1_product'] = $vProduct;
			if($vRow->SegAct=='1') {
				$vActive = "Yes";
			} else {
				$vActive = "No";
			}
			$vArrayTemp['_78_grd1_active'] = $vActive;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnCompSegRow($pSegmentId) {
		$this->db->select("f_segment_id,f_comp_id,f_segment_code,f_segment_name,f_segment_desc,f_parent_segment_id,f_top_segment_id,f_segment_prod,f_segment_active");
		$this->db->where('f_segment_id',$pSegmentId);
		$vResult = $this->db->get('t_comp_segment')->result();
		$vRow = $vResult[0];
		$vData['fldId'] = $vRow->f_segment_id;
		$vData['fldCompany'] = $vRow->f_comp_id;
		$vData['fldCode'] = $vRow->f_segment_code;
		$vData['fldName'] = $vRow->f_segment_name;
		$vData['fldDesc'] = $vRow->f_segment_desc;
		$vData['fldParent'] = $vRow->f_parent_segment_id;
		$vData['fldTop'] = $vRow->f_top_segment_id;
		$vData['fldProd'] = $vRow->f_segment_prod;
		$vData['fldAct'] = $vRow->f_segment_active;
		echo json_encode($vData);
	}
	function fnCompSegCreate($pData) {
		$vData = array(
			'f_segment_id'=>$pData['vId'],
			'f_comp_id'=>$pData['vComp'],
			'f_segment_code'=>$pData['vCode'],
			'f_segment_name'=>$pData['vName'],
			'f_segment_desc'=>$pData['vDesc'],
			'f_parent_segment_id'=>$pData['vParent'],
			'f_top_segment_id'=>$pData['vTop'],
			'f_segment_prod'=>$pData['vProd'],
			'f_segment_active'=>$pData['vAct']
		);
		$vResult = $this->db->insert('t_comp_segment',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnCompSegUpdate($pSegmentId,$pData) {
		$vData = array(
			'f_segment_id'=>$pData['vId'],
			'f_comp_id'=>$pData['vComp'],
			'f_segment_code'=>$pData['vCode'],
			'f_segment_name'=>$pData['vName'],
			'f_segment_desc'=>$pData['vDesc'],
			'f_parent_segment_id'=>$pData['vParent'],
			'f_top_segment_id'=>$pData['vTop'],
			'f_segment_prod'=>$pData['vProd'],
			'f_segment_active'=>$pData['vAct']
		);
		$vResult = $this->db->where('f_segment_id',$pSegmentId)->update('t_comp_segment',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnCompSegCompanyData($pVarQuery) {
		$this->db->select('f_comp_id,f_comp_name');
		$this->db->like('f_comp_name',$pVarQuery);
		$this->db->order_by('f_comp_name','ASC');
		$vResult = $this->db->get('t_comp_profile')->result();
		$vCompanyDataJson = array();
		foreach($vResult as $vRow):
			array_push($vCompanyDataJson,$vRow);
		endforeach;
		echo json_encode($vCompanyDataJson);
	}
	function fnCompSegParentData($pVarQuery) {
		$this->db->select('f_segment_id,f_segment_name');
		$this->db->like('f_segment_name',$pVarQuery);
		$this->db->order_by('f_segment_name','ASC');
		$vResult = $this->db->get('t_comp_segment')->result();
		$vParentDataJson = array();
		foreach($vResult as $vRow):
			array_push($vParentDataJson,$vRow);
		endforeach;
		echo json_encode($vParentDataJson);
	}
	function fnCompSegTopData($pVarQuery) {
		$this->db->select('f_segment_id,f_segment_name');
		$this->db->like('f_segment_name',$pVarQuery);
		$this->db->order_by('f_segment_name','ASC');
		$vResult = $this->db->get('t_comp_segment')->result();
		$vTopDataJson = array();
		foreach($vResult as $vRow):
			array_push($vTopDataJson,$vRow);
		endforeach;
		echo json_encode($vTopDataJson);
	}
}
?>