<?php
class mo_group_client extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function fnGroupClientCount($pGroupCodeKeyword,$pGroupNameKeyword) {
		$this->db->select('count(*) as selectCount');
		$this->db->like(array("f_group_client_code"=>$pGroupCode,"f_group_client_name"=>$pGroupName));
		$vResult = $this->db->get('t_group_client')->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnGroupClientData($pGroupCodeKeyword,$pGroupNameKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		$this->db->select('f_group_client_id,f_group_client_code,f_group_client_name,f_group_client_address1,f_group_client_city,f_group_client_post_code,f_group_client_phone,f_group_client_fax');
		$this->db->like(array("f_group_client_code"=>$pGroupCodeKeyword,"f_group_client_name"=>$pGroupNameKeyword));
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$vResult = $this->db->get("t_group_client")->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['groupclient_id'] = $vRow->f_group_client_id;
			$vArrayTemp['groupclient_code'] = $vRow->f_group_client_code;
			$vArrayTemp['groupclient_name'] = $vRow->f_group_client_name;
			$vArrayTemp['groupclient_address'] = $vRow->f_group_client_address1;
			$vArrayTemp['groupclient_city'] = $vRow->f_group_client_city;
			$vArrayTemp['groupclient_postcode'] = $vRow->f_group_client_post_code;
			$vArrayTemp['groupclient_phone'] = $vRow->f_group_client_phone;
			$vArrayTemp['groupclient_fax'] = $vRow->f_group_client_fax;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnGroupClientRow($pId) {
		$this->db->select('f_group_client_code,f_group_client_name,f_group_client_address1,f_group_client_address2,f_group_client_address3,f_group_client_city,f_group_client_post_code,f_group_client_phone,f_group_client_fax,f_industry_code');
		$this->db->where('f_group_client_id',$pId);
		$vResult = $this->db->get('t_group_client')->result();
		$vRow = $vResult[0];
		$vData['fldCode'] = $vRow->f_group_client_code;
		$vData['fldName'] = $vRow->f_group_client_name;
		$vData['fldAddress1'] = $vRow->f_group_client_address1;
		$vData['fldAddress2'] = $vRow->f_group_client_address2;
		$vData['fldAddress3'] = $vRow->f_group_client_address3;
		$vData['fldCity'] = $vRow->f_group_client_city;
		$vData['fldPostCode'] = $vRow->f_group_client_post_code;
		$vData['fldPhone'] = $vRow->f_group_client_phone;
		$vData['fldFax'] = $vRow->f_group_client_fax;
		$vData['fldIndustry'] = $vRow->f_industry_code;
		echo json_encode($vData);
	}
	function fnIndustryData($pVarQuery) {
		$this->db->select('Id,desc1');
		$this->db->like('Id',$pVarQuery);
		$this->db->or_like('desc1',$pVarQuery);
		$this->db->order_by('desc1','ASC');
		$vResult = $this->db->get('tbindustry_cat')->result();
		$vIndustryDataJson = array();
		foreach($vResult as $vRow):
			array_push($vIndustryDataJson,$vRow);
		endforeach;
		echo json_encode($vIndustryDataJson);
	}
	function fnGroupClientCreate($pData) {
		$vData = array(
			'f_group_client_code'=>$pData['vCode'],
			'f_group_client_name'=>$pData['vName'],
			'f_group_client_address1'=>$pData['vAddr1'],
			'f_group_client_address2'=>$pData['vAddr2'],
			'f_group_client_address3'=>$pData['vAddr3'],
			'f_group_client_city'=>$pData['vCity'],
			'f_group_client_post_code'=>$pData['vPost'],
			'f_group_client_phone'=>$pData['vPhone'],
			'f_group_client_fax'=>$pData['vFax'],
			'f_industry_code'=>$pData['vIdst'],
			'f_group_client_actve'=>$pData['vActv'],
			'f_entry_by'=>$pData['vBy'],
			'f_entry_date'=>$pData['vDate']
		);
		$vResult = $this->db->insert('t_group_client',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			// $vSqlErrNo = mysql_errno();
			$vSqlErrNo = $this->db->_error_number();
			if($vSqlErrNo=='1062') {
				echo json_encode(array('msg'=>'Terjadi duplikasi data! Group Client sudah terdapat pada database'));
			} else {
				echo json_encode(array('msg'=>'Database Error!'));
			}
		}
	}
	function fnGroupClientUpdate($pId,$pData) {
		$vData = array(
			'f_group_client_name' => $pData['vName'],
			'f_group_client_address1' => $pData['vAddr1'],
			'f_group_client_address2' => $pData['vAddr2'],
			'f_group_client_address3' => $pData['vAddr3'],
			'f_group_client_city' => $pData['vCity'],
			'f_group_client_post_code' => $pData['vPost'],
			'f_group_client_phone' => $pData['vPhone'],
			'f_group_client_fax' => $pData['vFax'],
			'f_industry_code' => $pData['vIdst'],
			'f_modify_by' => $pData['vBy'],
			'f_modify_date' => $pData['vDate']
		);
		$vResult = $this->db->where('f_group_client_id',$pId)->update('t_group_client',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Database Error!'));
		}
	}
	function fnCekIdst($pText1) {
		$this->db->select('desc1');
		$this->db->where('desc1',$pText1);
		$vQuery2 = $this->db->get('tbindustry_cat')->result();
		return $vQuery2[0];
	}
}
?>