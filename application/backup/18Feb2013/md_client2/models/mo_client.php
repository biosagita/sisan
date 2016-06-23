<?php
class mo_client extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function fnClientCount($pCodeKeyword,$pNameKeyword) {
		$this->db->select("count(*) as selectCount");
		$this->db->like(array("Client"=>$pCodeKeyword,"Client_Name"=>$pNameKeyword));
		$vResult = $this->db->get("tbclient")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	// besok function dibawah ini pake left join baca nilai grup untuk client nya, PASTI BISA!!!
	function fnClientData($pCodeKeyword,$pNameKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		/*
		SELECT a.Id,a.Client,a.Client_Name,a.CAddress1,a.CCity,a.CPostCode,a.Phone,a.Home,a.Fax,c.f_group_client_code
		FROM tbclient AS a
		LEFT JOIN t_client_group AS b
		ON b.f_client_id=a.Id
		LEFT JOIN t_group_client AS c
		ON b.f_group_client_id=c.f_group_client_id
		WHERE a.Client LIKE '%%' AND a.Client_Name LIKE '%%'
		ORDER BY a.Client ASC
		LIMIT 0,20
		*/
		$this->db->select('a.Id,a.Client,a.Client_Name,a.CAddress1,a.CCity,a.CPostCode,a.Phone,a.Home,a.Fax,c.f_group_client_code');
		$this->db->from('tbclient AS a');
		$this->db->join('t_client_group AS b','b.f_client_id=a.Id','left');
		$this->db->join('t_group_client AS c','c.f_group_client_id=b.f_group_client_id','left');
		$this->db->like(array("a.Client"=>$pCodeKeyword,"a.Client_Name"=>$pNameKeyword));
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$vResult = $this->db->get()->result();
		/*
		$this->db->select('Id,Client,Client_Name,CAddress1,CCity,CPostCode,Phone,Home,Fax');
		$this->db->like(array("Client"=>$pCodeKeyword,"Client_Name"=>$pNameKeyword));
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$vResult = $this->db->get("tbclient")->result();
		*/
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['client_id'] = $vRow->Id;
			$vArrayTemp['client_code'] = $vRow->Client;
			$vArrayTemp['client_name'] = $vRow->Client_Name;
			$vArrayTemp['client_group'] = $vRow->f_group_client_code;
			$vArrayTemp['client_address'] = $vRow->CAddress1;
			$vArrayTemp['client_city'] = $vRow->CCity;
			$vArrayTemp['client_postcode'] = $vRow->CPostCode;
			$vArrayTemp['client_phone'] = $vRow->Phone;
			$vArrayTemp['client_home'] = $vRow->Home;
			$vArrayTemp['client_fax'] = $vRow->Fax;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnClientRow($pId) {
		$this->db->select('a.Client,a.Client_Name,a.CAddress1,a.CAddress2,a.CAddress3,a.CCity,a.CPostCode,a.Phone,a.Home,a.Fax,a.Industry,b.f_group_client_id');
		$this->db->from('tbclient AS a');
		$this->db->join('t_client_group AS b','b.f_client_id=a.Id','left');
		$this->db->where('a.Id',$pId);
		$vResult = $this->db->get()->result();
		$vRow = $vResult[0];
		$vData['fldCode'] = $vRow->Client;
		$vData['fldName'] = $vRow->Client_Name;
		$vData['fldGroup'] = $vRow->f_group_client_id; // fldGroup
		$vData['fldAddress1'] = $vRow->CAddress1;
		$vData['fldAddress2'] = $vRow->CAddress2;
		$vData['fldAddress3'] = $vRow->CAddress3;
		$vData['fldCity'] = $vRow->CCity;
		$vData['fldPostCode'] = $vRow->CPostCode;
		$vData['fldPhone'] = $vRow->Phone;
		$vData['fldFax'] = $vRow->Fax;
		$vData['fldHome'] = $vRow->Home;
		$vData['fldIndustry'] = $vRow->Industry;
		echo json_encode($vData);
	}
	function fnGroupData($pVarQuery) {
		$this->db->select('f_group_client_id,f_group_client_code,f_group_client_name');
		$this->db->like('f_group_client_code',$pVarQuery);
		$this->db->or_like('f_group_client_name',$pVarQuery);
		$this->db->order_by('f_group_client_code','ASC');
		$vResult = $this->db->get('t_group_client')->result();
		$vGroupDataJson = array();
		foreach($vResult as $vRow):
			array_push($vGroupDataJson,$vRow);
		endforeach;
		echo json_encode($vGroupDataJson);
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
	function fnCreateClient($pData1) {
		$vData = array(
			'Client' => $pData1['vCode'],
			'Client_Name' => $pData1['vName'],
			'CAddress1' => $pData1['vAddr1'],
			'CAddress2' => $pData1['vAddr2'],
			'CAddress3' => $pData1['vAddr3'],
			'CCity' => $pData1['vCity'],
			'CPostCode' => $pData1['vPost'],
			'Phone' => $pData1['vPhone'],
			'Fax' => $pData1['vFax'],
			'Home' => $pData1['vHome'],
			'Industry' => $pData1['vIdst'],
			'Active' => $pData1['vActv'],
			'user_entry' => $pData1['vBy'],
			'entry_dt' => $pData1['vDate']
		);
		$vResult = $this->db->insert('tbclient',$vData);
		if($vResult) {
			return 'success';
		} else {
			$vSqlErrNo = $this->db->_error_number();
			if($vSqlErrNo=='1062') {
				return $vSqlErrNo;
			} else {
				return 'dberror';
			}
		}
	}
	function feGetClientId($pData1) {
		$vCode = $pData1['vCode'];
		$vName = $pData1['vName'];
		$this->db->select('Id');
		$this->db->where(array('Client'=>$vCode,'Client_Name'=>$vName));
		$vResult = $this->db->get('tbclient')->result();
		return $vResult[0]->Id;
	}
	function fnCreateGrouping($pNewClientId,$pData2) {
		$vData = array(
			'f_group_client_id' => $pData2['vGroupId'],
			'f_client_id' => $pNewClientId,
			'Client' => $pData2['vGroupText']
		);
		$this->db->insert('t_client_group',$vData);
		echo json_encode(array('success'=>true));
	}
	function fnClientCreateNoGroup($pData1) {
		$vData = array(
			'Client' => $pData1['vCode'],
			'Client_Name' => $pData1['vName'],
			'CAddress1' => $pData1['vAddr1'],
			'CAddress2' => $pData1['vAddr2'],
			'CAddress3' => $pData1['vAddr3'],
			'CCity' => $pData1['vCity'],
			'CPostCode' => $pData1['vPost'],
			'Phone' => $pData1['vPhone'],
			'Fax' => $pData1['vFax'],
			'Home' => $pData1['vHome'],
			'Industry' => $pData1['vIdst'],
			'Active' => $pData1['vActv'],
			'user_entry' => $pData1['vBy'],
			'entry_dt' => $pData1['vDate']
		);
		$vResult = $this->db->insert('tbclient',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			// $vSqlErrNo = mysql_errno();
			$vSqlErrNo = $this->db->_error_number();
			if($vSqlErrNo=='1062') {
				echo json_encode(array('msg'=>'Terjadi duplikasi data! Client sudah terdapat pada database'));
			} else {
				echo json_encode(array('msg'=>'Database Error!'));
			}
		}
	}
	function fnUpdateClient($pId,$pData1) {
		$vData = array(
			'Client_Name' => $pData1['vName'],
			'CAddress1' => $pData1['vAddr1'],
			'CAddress2' => $pData1['vAddr2'],
			'CAddress3' => $pData1['vAddr3'],
			'CCity' => $pData1['vCity'],
			'CPostCode' => $pData1['vPost'],
			'Phone' => $pData1['vPhone'],
			'Fax' => $pData1['vFax'],
			'Home' => $pData1['vHome'],
			'Industry' => $pData1['vIdst']
		);
		$this->db->where('Id',$pId)->update('tbclient',$vData);
	}
	function fnDelExistGrouping($pId) {
		$this->db->where('f_client_id',$pId)->delete('t_client_group');
	}
	function fnUpdateGrouping($pId,$pData2) {
		$vData = array(
			'f_group_client_id' => $pData2['vGroupId'],
			'f_client_id' => $pId,
			'Client' => $pData2['vGroupText']
		);
		$vResult = $this->db->insert('t_client_group',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnUpdateClientNoGroup($pId,$pData1) {
		$vData = array(
			'Client_Name' => $pData1['vName'],
			'CAddress1' => $pData1['vAddr1'],
			'CAddress2' => $pData1['vAddr2'],
			'CAddress3' => $pData1['vAddr3'],
			'CCity' => $pData1['vCity'],
			'CPostCode' => $pData1['vPost'],
			'Phone' => $pData1['vPhone'],
			'Fax' => $pData1['vFax'],
			'Home' => $pData1['vHome'],
			'Industry' => $pData1['vIdst'],
			'Active' => $pData1['vActv']
		);
		$this->db->where('Id',$pId)->update('tbclient',$vData);
	}
	function fnDelExistGroupingNoGroup($pId) {
		$vResult = $this->db->where('f_client_id',$pId)->delete('t_client_group');
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnCekGroup($pText1) {
		$this->db->select('f_group_client_code');
		$this->db->where('f_group_client_code',$pText1);
		$vQuery1 = $this->db->get('t_group_client')->result();
		return $vQuery1[0];
	}
	function fnCekIdst($pText2) {
		$this->db->select('desc1');
		$this->db->where('desc1',$pText2);
		$vQuery2 = $this->db->get('tbindustry_cat')->result();
		return $vQuery2[0];
	}
	function fnCekGroupExist($pId) {
		$this->db->select('count(*) as selectCount');
		$this->db->where('f_client_id ',$pId);
		$vQuery = $this->db->get('t_client_group')->result();
		return $vQuery[0];
	}
}
?>