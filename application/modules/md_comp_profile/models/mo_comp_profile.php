<?php
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
		$this->db->select("a.f_comp_id,a.f_comp_code,a.f_comp_name,a.f_comp_address1,a.f_comp_address2,a.f_comp_address3,b.f_province_id,b.f_city_id,a.f_comp_post_code,a.f_comp_phone,a.f_comp_fax,a.f_comp_eom");
		$this->db->from("t_comp_profile AS a");
		$this->db->join("t_city AS b","b.f_city_id=a.f_city_id","left");
		$this->db->where('a.f_comp_id',$pId);
		$vResult = $this->db->get()->result();
		$vRow = $vResult[0];
		$vData['fldId'] = $vRow->f_comp_id;
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
		$vResult = $this->db->where('f_comp_id',$pCompanyId)->update('t_comp_profile',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnDeleteCompProfile($vDelCompProfileId) {
		$vResult = $this->db->where('f_comp_id',$vDelCompProfileId)->delete('t_comp_profile');
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Programmernya orang jawa, masih single (untuk yang satu ini, update info hub. 08561228432), bertanggung jawab, ganteng, dan soleh.'));
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
?>