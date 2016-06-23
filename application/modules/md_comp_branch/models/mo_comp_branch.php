<?php
class mo_comp_branch extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function fnCompBranchCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get("t_comp_branch")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnCompBranchData() {
		$this->db->select("c.f_comp_name,a.f_branch_id,a.f_branch_code,a.f_branch_name,a.f_branch_address1,b.f_city_name,a.f_branch_post_code,a.f_branch_phone,a.f_branch_fax,a.f_branch_active");
		$this->db->from("t_comp_branch AS a");
		$this->db->join("t_city AS b","b.f_city_id=a.f_city_id","left");
		$this->db->join("t_comp_profile AS c","c.f_comp_id=a.f_comp_id","left");
		$this->db->order_by("a.f_comp_id","ASC");
		$this->db->order_by("a.f_branch_code","ASC");
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['compbranch_bid'] = $vRow->f_branch_id;
			$vArrayTemp['compbranch_bcomp'] = $vRow->f_comp_name;
			$vArrayTemp['compbranch_bcode'] = $vRow->f_branch_code;
			$vArrayTemp['compbranch_bname'] = $vRow->f_branch_name;
			$vArrayTemp['compbranch_baddr'] = $vRow->f_branch_address1;
			$vArrayTemp['compbranch_bcity'] = $vRow->f_city_name;
			$vArrayTemp['compbranch_bpost'] = $vRow->f_branch_post_code;
			$vArrayTemp['compbranch_bphone'] = $vRow->f_branch_phone;
			$vArrayTemp['compbranch_bfax'] = $vRow->f_branch_fax;
			if($vRow->f_branch_active=="1") {
				$vActive = "Yes";
			} else {
				$vActive = "No";
			}
			$vArrayTemp['compbranch_bact'] = $vActive;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnCompBranchRow($pId) {
		$this->db->select("c.f_comp_id,a.f_branch_code,a.f_branch_name,a.f_branch_address1,a.f_branch_address2,a.f_branch_address3,b.f_province_id,b.f_city_id,a.f_branch_post_code,a.f_branch_phone,a.f_branch_fax,a.f_branch_active");
		$this->db->from("t_comp_branch AS a");
		$this->db->join("t_city AS b","b.f_city_id=a.f_city_id","left");
		$this->db->join("t_comp_profile AS c","c.f_comp_id=a.f_comp_id","left");
		$this->db->where('a.f_branch_id',$pId);
		$vResult = $this->db->get()->result();
		$vRow = $vResult[0];
		$vData['fldCompName'] = $vRow->f_comp_id;
		$vData['fldBranchCode'] = $vRow->f_branch_code;
		$vData['fldBranchName'] = $vRow->f_branch_name;
		$vData['fldBranchAddr1'] = $vRow->f_branch_address1;
		$vData['fldBranchAddr2'] = $vRow->f_branch_address2;
		$vData['fldBranchAddr3'] = $vRow->f_branch_address3;
		$vData['fldBranchProv'] = $vRow->f_province_id;
		$vData['fldBranchCity'] = $vRow->f_city_id;
		$vData['fldBranchPost'] = $vRow->f_branch_post_code;
		$vData['fldBranchPhone'] = $vRow->f_branch_phone;
		$vData['fldBranchFax'] = $vRow->f_branch_fax;
		$vData['fldBranchAct'] = $vRow->f_branch_active;
		echo json_encode($vData);
	}
	function fnCompBranchCreate($pData) {
		$vData = array(
			'f_comp_id'=>$pData['vComp'],
			'f_branch_code'=>$pData['vCode'],
			'f_branch_name'=>$pData['vName'],
			'f_branch_address1'=>$pData['vAddr1'],
			'f_branch_address2'=>$pData['vAddr2'],
			'f_branch_address3'=>$pData['vAddr3'],
			'f_city_id'=>$pData['vCity'],
			'f_branch_post_code'=>$pData['vPost'],
			'f_branch_phone'=>$pData['vPhone'],
			'f_branch_fax'=>$pData['vFax'],
			'f_branch_active'=>$pData['vAct']
		);
		$vResult = $this->db->insert('t_comp_branch',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnCompBranchUpdate($pBranchId,$pData) {
		$vData = array(
			'f_comp_id'=>$pData['vComp'],
			'f_branch_code'=>$pData['vCode'],
			'f_branch_name'=>$pData['vName'],
			'f_branch_address1'=>$pData['vAddr1'],
			'f_branch_address2'=>$pData['vAddr2'],
			'f_branch_address3'=>$pData['vAddr3'],
			'f_city_id'=>$pData['vCity'],
			'f_branch_post_code'=>$pData['vPost'],
			'f_branch_phone'=>$pData['vPhone'],
			'f_branch_fax'=>$pData['vFax'],
			'f_branch_active'=>$pData['vAct']
		);
		$vResult = $this->db->where('f_branch_id',$pBranchId)->update('t_comp_branch',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnRemoteCompany($pVarQuery) {
		$this->db->select('f_comp_id,f_comp_name');
		$this->db->like('f_comp_name',$pVarQuery);
		$this->db->order_by('f_comp_name','ASC');
		$vResult = $this->db->get('t_comp_profile')->result();
		$vCompanyJson = array();
		foreach($vResult as $vRow):
			array_push($vCompanyJson,$vRow);
		endforeach;
		echo json_encode($vCompanyJson);
	}
	function fnRemoteProvince($pVarQuery) {
		$this->db->select('f_province_id,f_province_name');
		$this->db->like('f_province_name',$pVarQuery);
		$this->db->order_by('f_province_name','ASC');
		$vResult = $this->db->get('t_province')->result();
		$vProvinceJson = array();
		foreach($vResult as $vRow):
			array_push($vProvinceJson,$vRow);
		endforeach;
		echo json_encode($vProvinceJson);
	}
	function fnRemoteCity($pVarQuery,$pAppId) {
		$this->db->select('f_city_id,f_city_name');
		$this->db->where('f_province_id',$pAppId);
		$this->db->like('f_city_name',$pVarQuery);
		$this->db->order_by('f_city_id','ASC');
		$vResult = $this->db->get('t_city')->result();
		$vCityJson = array();
		foreach($vResult as $vRow):
			array_push($vCityJson,$vRow);
		endforeach;
		echo json_encode($vCityJson);
	}
	function fnCompBranchComboData($pVarQuery) {
		$this->db->select('f_branch_id,f_branch_name');
		$vResult = $this->db->get('t_comp_branch')->result();
		$vCompBranchDataJson = array();
		foreach($vResult as $vRow):
			array_push($vCompBranchDataJson,$vRow);
		endforeach;
		echo json_encode($vCompBranchDataJson);
	}	
		
}
/*
class mo_comp_profile extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function fnCompProfileCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get("t_comp_profile")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnCompProfileData() {
		$this->db->select("a.f_comp_id,a.f_comp_code,a.f_comp_name,a.f_comp_address1,b.f_city_name,a.f_comp_post_code,a.f_comp_phone,a.f_comp_fax,a.f_comp_eom");
		$this->db->from("t_comp_profile AS a");
		$this->db->join("t_city AS b","b.f_city_id=a.f_city_id","left");
		$this->db->order_by("a.f_comp_id","ASC");
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['compprofile_cid'] = $vRow->f_comp_id;
			$vArrayTemp['compprofile_ccode'] = $vRow->f_comp_code;
			$vArrayTemp['compprofile_cname'] = $vRow->f_comp_name;
			$vArrayTemp['compprofile_caddress'] = $vRow->f_comp_address1;
			$vArrayTemp['compprofile_ccity'] = $vRow->f_city_name ;
			$vArrayTemp['compprofile_cpost'] = $vRow->f_comp_post_code;
			$vArrayTemp['compprofile_cphone'] = $vRow->f_comp_phone;
			$vArrayTemp['compprofile_cfax'] = $vRow->f_comp_fax;
			$vArrayTemp['compprofile_ceom'] = $vRow->f_comp_eom;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnCompProfileRow($pId) {
		$this->db->select("a.f_comp_code,a.f_comp_name,a.f_comp_address1,a.f_comp_address2,a.f_comp_address3,b.f_province_id,b.f_city_id,a.f_comp_post_code,a.f_comp_phone,a.f_comp_fax,a.f_comp_eom");
		$this->db->from("t_comp_profile AS a");
		$this->db->join("t_city AS b","b.f_city_id=a.f_city_id","left");
		$this->db->where('a.f_comp_id',$pId);
		$vResult = $this->db->get()->result();
		$vRow = $vResult[0];
		$vData['fldCode'] = $vRow->f_comp_code;
		$vData['fldName'] = $vRow->f_comp_name;
		$vData['fldAddress1'] = $vRow->f_comp_address1;
		$vData['fldAddress2'] = $vRow->f_comp_address2;
		$vData['fldAddress3'] = $vRow->f_comp_address3;
		$vData['fldProv'] = $vRow->f_province_id;
		$vData['fldCity'] = $vRow->f_city_id;
		$vData['fldPost'] = $vRow->f_comp_post_code;
		$vData['fldPhone'] = $vRow->f_comp_phone;
		$vData['fldFax'] = $vRow->f_comp_fax;
		$vData['fldEom'] = $vRow->f_comp_eom;
		echo json_encode($vData);
	}
	function fnCompProfileId() {
		$this->db->select_max("f_comp_id","Last_Id");
		$vResult = $this->db->get("t_comp_profile")->result();
		return $vResult[0]->Last_Id;
	}
	function fnCreateCompProfile($pData) {
		$vData = array(
			'f_comp_id'=>$pData['vId'],
			'f_comp_code'=>$pData['vCode'],
			'f_comp_name'=>$pData['vName'],
			'f_comp_address1'=>$pData['vAddr1'],
			'f_comp_address2'=>$pData['vAddr2'],
			'f_comp_address3'=>$pData['vAddr3'],
			'f_city_id'=>$pData['vCity'],
			'f_comp_post_code'=>$pData['vPost'],
			'f_comp_phone'=>$pData['vPhone'],
			'f_comp_fax'=>$pData['vFax'],
			'f_comp_eom'=>$pData['vEom']
		);
		$vResult = $this->db->insert('t_comp_profile',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnUpdateCompProfile($pCompanyId,$pData) {
		$vData = array(
			'f_comp_code'=>$pData['vCode'],
			'f_comp_name'=>$pData['vName'],
			'f_comp_address1'=>$pData['vAddr1'],
			'f_comp_address2'=>$pData['vAddr2'],
			'f_comp_address3'=>$pData['vAddr3'],
			'f_city_id'=>$pData['vCity'],
			'f_comp_post_code'=>$pData['vPost'],
			'f_comp_phone'=>$pData['vPhone'],
			'f_comp_fax'=>$pData['vFax'],
			'f_comp_eom'=>$pData['vEom']
		);
		$vResult = $this->db->where('f_comp_id',$pCompanyId)->update('t_comp_profile',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnRemoteProvince($pVarQuery) {
		$this->db->select('f_province_id,f_province_name');
		$this->db->like('f_province_name',$pVarQuery);
		$this->db->order_by('f_province_name','ASC');
		$vResult = $this->db->get('t_province')->result();
		$vProvinceJson = array();
		foreach($vResult as $vRow):
			array_push($vProvinceJson,$vRow);
		endforeach;
		echo json_encode($vProvinceJson);
	}
	function fnRemoteCity($pVarQuery,$pAppId) {
		$this->db->select('f_city_id,f_city_name');
		$this->db->where('f_province_id',$pAppId);
		$this->db->like('f_city_name',$pVarQuery);
		$this->db->order_by('f_city_id','ASC');
		$vResult = $this->db->get('t_city')->result();
		$vCityJson = array();
		foreach($vResult as $vRow):
			array_push($vCityJson,$vRow);
		endforeach;
		echo json_encode($vCityJson);
	}
}
*/
?>