<?php
class mo_app_mod extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function fnGrpModCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get("t_group_module")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnGrpModData($pSort,$pOrder) {
		$this->db->select('a.f_grpmod_id,a.f_grpmod_code,a.f_grpmod_name,a.f_grpmod_active,b.f_app_code');
		$this->db->from('t_group_module AS a');
		$this->db->join('t_application AS b','b.f_app_id=a.f_app_id');
		$this->db->order_by($pSort,$pOrder);
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['appModGrpMod_id'] = $vRow->f_grpmod_id;
			$vArrayTemp['appModGrpMod_code'] = $vRow->f_grpmod_code;
			$vArrayTemp['appModGrpMod_appl'] = $vRow->f_app_code;
			$vArrayTemp['appModGrpMod_name'] = $vRow->f_grpmod_name;
			$tempActive = $vRow->f_grpmod_active;
			if($tempActive=='1') {
				$tempActive='Yes';
			} else {
				$tempActive='No';
			}
			$vArrayTemp['appModGrpMod_active'] = $tempActive;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnGrpModRow($pId) {
		$this->db->select('f_grpmod_code,f_grpmod_name,f_grpmod_desc,f_app_id');
		$this->db->where('f_grpmod_id',$pId);
		$vResult = $this->db->get('t_group_module')->result();
		$vRow = $vResult[0];
		$vData['fldCode'] = $vRow->f_grpmod_code;
		$vData['fldAppl'] = $vRow->f_app_id;
		$vData['fldName'] = $vRow->f_grpmod_name;
		$vData['fldDesc'] = $vRow->f_grpmod_desc;
		echo json_encode($vData);
	}
	function fnCreateGrpMod($pData) {
		$vData = array(
			'f_grpmod_code'=>$pData['vCode'],
			'f_app_id'=>$pData['vAppl'],
			'f_grpmod_name'=>$pData['vName'],
			'f_grpmod_desc'=>$pData['vDesc'],
			'f_grpmod_active'=>$pData['vActv']
		);
		$vResult = $this->db->insert('t_group_module',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			$vSqlErrNo = $this->db->_error_number();
			if($vSqlErrNo=='1062') {
				echo json_encode(array('msg'=>'Terjadi duplikasi data! Group Module sudah terdapat pada database'));
			} else {
				echo json_encode(array('msg'=>'Database Error!'));
			}
		}
	}
	function fnUpdateGrpMod($pId,$pData) {
		$vData = array(
			'f_app_id'=>$pData['vAppl'],
			'f_grpmod_name'=>$pData['vName'],
			'f_grpmod_desc'=>$pData['vDesc']
		);
		$vResult = $this->db->where('f_grpmod_id',$pId)->update('t_group_module',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnDeleteGrpMod($pDelGrpModId) {
		$vResult = $this->db->where('f_grpmod_id',$pDelGrpModId)->delete('t_group_module');
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnActionCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get("t_action")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnActionData($pSort,$pOrder) {
		$this->db->select('f_action_id,f_action_code,f_action_name,f_action_desc');
		$this->db->order_by($pSort,$pOrder);
		$vResult = $this->db->get("t_action")->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['appModAction_id'] = $vRow->f_action_id;
			$vArrayTemp['appModAction_code'] = $vRow->f_action_code;
			$vArrayTemp['appModAction_name'] = $vRow->f_action_name;
			$vArrayTemp['appModAction_desc'] = $vRow->f_action_desc;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnActionRow($pId) {
		$this->db->select('f_action_code,f_action_name,f_action_desc');
		$this->db->where('f_action_id',$pId);
		$vResult = $this->db->get('t_action')->result();
		$vRow = $vResult[0];
		$vData['fldCode'] = $vRow->f_action_code;
		$vData['fldName'] = $vRow->f_action_name;
		$vData['fldDesc'] = $vRow->f_action_desc;
		echo json_encode($vData);
	}
	function fnCreateAction($pData) {
		$vData = array(
			'f_action_code'=>$pData['vCode'],
			'f_action_name'=>$pData['vName'],
			'f_action_desc'=>$pData['vDesc']
		);
		$vResult = $this->db->insert('t_action',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			$vSqlErrNo = $this->db->_error_number();
			if($vSqlErrNo=='1062') {
				echo json_encode(array('msg'=>'Terjadi duplikasi data! Action sudah terdapat pada database'));
			} else {
				echo json_encode(array('msg'=>'Database Error!'));
			}
		}
	}
	function fnUpdateAction($pId,$pData) {
		$vData = array(
			'f_action_name'=>$pData['vName'],
			'f_action_desc'=>$pData['vDesc']
		);
		$vResult = $this->db->where('f_action_id',$pId)->update('t_action',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnDeleteAction($pDelActionId) {
		$vResult = $this->db->where('f_action_id',$pDelActionId)->delete('t_action');
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnApplCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get("t_application")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnApplData($pSort,$pOrder) {
		$this->db->select('f_app_id,f_app_code,f_app_name,f_app_url,f_app_path,f_app_active');
		$this->db->order_by($pSort,$pOrder);
		$vResult = $this->db->get("t_application")->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['appModAppl_id'] = $vRow->f_app_id;
			$vArrayTemp['appModAppl_code'] = $vRow->f_app_code;
			$vArrayTemp['appModAppl_name'] = $vRow->f_app_name;
			$vArrayTemp['appModAppl_url'] = $vRow->f_app_url;
			$vArrayTemp['appModAppl_path'] = $vRow->f_app_path;
			$tempActive = $vRow->f_app_active;
			if($tempActive=='1') {
				$tempActive='Yes';
			} else {
				$tempActive='No';
			}
			$vArrayTemp['appModAppl_active'] = $tempActive;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnApplRow($pId) {
		$this->db->select('f_app_code,f_app_name,f_app_desc,f_app_url,f_app_path');
		$this->db->where('f_app_id',$pId);
		$vResult = $this->db->get('t_application')->result();
		$vRow = $vResult[0];
		$vData['fldId'] = $pId;
		$vData['fldCode'] = $vRow->f_app_code;
		$vData['fldName'] = $vRow->f_app_name;
		$vData['fldDesc'] = $vRow->f_app_desc;
		$vData['fldUrl'] = $vRow->f_app_url;
		$vData['fldPath'] = $vRow->f_app_path;
		echo json_encode($vData);
	}
	function fnCreateAppl($pData) {
		$vData = array(
			'f_app_id'=>$pData['vId'],
			'f_app_code'=>$pData['vCode'],
			'f_app_name'=>$pData['vName'],
			'f_app_desc'=>$pData['vDesc'],
			'f_app_url'=>$pData['vUrl'],
			'f_app_path'=>$pData['vPath'],
			'f_app_active'=>$pData['vActv']
		);
		$vResult = $this->db->insert('t_application',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			$vSqlErrNo = $this->db->_error_number();
			if($vSqlErrNo=='1062') {
				echo json_encode(array('msg'=>'Terjadi duplikasi data! Application sudah terdapat pada database'));
			} else {
				echo json_encode(array('msg'=>'Database Error!'));
			}
		}
	}
	function fnUpdateAppl($pId,$pData) {
		$vData = array(
			'f_app_id'=>$pData['vId'],
			'f_app_name'=>$pData['vName'],
			'f_app_desc'=>$pData['vDesc'],
			'f_app_url'=>$pData['vUrl'],
			'f_app_path'=>$pData['vPath']
		);
		$vResult = $this->db->where('f_app_id',$pId)->update('t_application',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnDeleteAppl($pDelApplId) {
		$vResult = $this->db->where('f_app_id',$pDelApplId)->delete('t_application');
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnModulesCount($pApplId) {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->where('f_app_id',$pApplId)->get("t_module")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnModulesData($pApplId) {
		$res = mysql_query("SELECT f_grpmod_id, 0 as f_mod_sort, CONCAT('G', f_grpmod_id) AS f_mod_id, f_grpmod_name AS f_mod_name, '' AS f_mod_desc, 1 AS f_is_parent, f_grpmod_active AS f_mod_active FROM t_group_module WHERE f_app_id='$pApplId'
		UNION
		SELECT f_grpmod_id, f_mod_sort, f_mod_id, f_mod_name, f_mod_desc, 0 AS f_is_parent, f_mod_active FROM t_module WHERE f_app_id='$pApplId'
		ORDER BY f_grpmod_id ASC, f_mod_sort ASC");
		$vArrayTemp = array();
		$vItems = array();
		while($vRow = mysql_fetch_array($res)) {
			$vArrayTemp['appModModules_id'] = $vRow['f_mod_id']; // untuk keperluan idField & keperluan node mana upsort
			$vArrayTemp['appModModules_name'] = $vRow['f_mod_name']; // untuk keperluan treeField & keperluan node treegrid (nama module)
			$vArrayTemp['appModModules_isParent'] = $vRow['f_is_parent']; // untuk keperluan disable action button jika group module
			if($vRow['f_is_parent']!='1') {
				$vArrayTemp['appModModules_grpMod'] = 'G'.$vRow['f_grpmod_id']; // untuk keperluan node mana downsort
				$vArrayTemp['appModModules_modSort'] = $vRow['f_mod_sort']; // untuk keperluan node mana downsort
				$vArrayTemp['appModModules_desc'] = $vRow['f_mod_desc']; // untuk keperluan node treegrid (deskripsi module)
				$tempActive = $vRow['f_mod_active']; // untuk keperluan node treegrid (active module)
				if($tempActive=='1') {
					$tempActive='Yes';
				} else {
					$tempActive='No';
				}
				$vArrayTemp['appModModules_active'] = $tempActive;
				$vArrayTemp['_parentId'] = 'G'.$vRow['f_grpmod_id']; // untuk keperluan branching tree
			}
			array_push($vItems,$vArrayTemp);
			unset($vArrayTemp);
		}
		return $vItems;
	}
	function fnModulesRow($pId) {
		$this->db->select('f_mod_code,f_mod_name,f_mod_desc,f_app_id,f_grpmod_id,f_mod_active');
		$this->db->where('f_mod_id',$pId);
		$vResult = $this->db->get('t_module')->result();
		$vRow = $vResult[0];
		$vData['fldCode'] = $vRow->f_mod_code;
		$vData['fldName'] = $vRow->f_mod_name;
		$vData['fldDesc'] = $vRow->f_mod_desc;
		$vData['fldAppl'] = $vRow->f_app_id;
		$vData['fldGrpMod'] = $vRow->f_grpmod_id;
		$vData['fldActive'] = $vRow->f_mod_active;
		echo json_encode($vData);
	}
	function fnCreateModules($pData) {
		$vGrp = $pData['vGrpMod'];
		$this->db->select('MAX(f_mod_sort) as maxsort');
		$this->db->where('f_grpmod_id',$vGrp);
		$vRes = $this->db->get('t_module')->result();
		$vMaxSort = $vRes[0]->maxsort;
		$vSort = $vMaxSort+1;
		$vData = array(
			'f_mod_code'=>$pData['vCode'],
			'f_mod_name'=>$pData['vName'],
			'f_mod_desc'=>$pData['vDesc'],
			'f_mod_sort'=>$vSort,
			'f_app_id'=>$pData['vAppl'],
			'f_grpmod_id'=>$pData['vGrpMod'],
			'f_mod_active'=>$pData['vActive']
		);
		$vResult = $this->db->insert('t_module',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnUpdateModules($pId,$pData) {
		$vData = array(
			'f_mod_name'=>$pData['vName'],
			'f_mod_desc'=>$pData['vDesc'],
			'f_app_id'=>$pData['vAppl'],
			'f_grpmod_id'=>$pData['vGrpMod'],
		//	'f_mod_active'=>$pData['vActive']
		);
		$vResult = $this->db->where('f_mod_id',$pId)->update('t_module',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnDeleteModules($pDelApplId) {
		$this->db->select('f_grpmod_id,f_mod_sort');
		$this->db->where('f_mod_id',$pDelApplId);
		$vResDel = $this->db->get('t_module')->result();
		$vGrpModDel = $vResDel[0]->f_grpmod_id;
		$vModSortDel = $vResDel[0]->f_mod_sort;
		$this->db->where('f_mod_id',$pDelApplId)->delete('t_module');
		$this->db->where(array('f_grpmod_id'=>$vGrpModDel,'f_mod_sort >'=>$vModSortDel))->set('f_mod_sort','f_mod_sort-1',false)->update('t_module');
		$this->db->where('f_mod_id',$pDelApplId)->delete('t_module_action');
		echo json_encode(array('success'=>true));
	}
	function fnActionDataChoose($pModId,$pSort,$pOrder) {
		$this->db->select("b.f_mod_id,a.f_action_id,a.f_action_code,a.f_action_name,a.f_action_desc");
		$this->db->from("t_action AS a");
		$this->db->join("t_module_action AS b","b.f_action_id=a.f_action_id AND b.f_mod_id=$pModId","left");
		$this->db->order_by($pSort,$pOrder);
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vTemp = $vRow->f_mod_id;
			if($vTemp) {
				$vArrayTemp['appModAction_box'] = '1';
			} else {
				$vArrayTemp['appModAction_box'] = null;
			}
			$vArrayTemp['appModAction_id'] = $vRow->f_action_id;
			$vArrayTemp['appModAction_code'] = $vRow->f_action_code;
			$vArrayTemp['appModAction_name'] = $vRow->f_action_name;
			$vArrayTemp['appModAction_desc'] = $vRow->f_action_desc;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnSaveModAct($pChoosenMod,$pActions) {
		$this->db->where('f_mod_id',$pChoosenMod)->delete('t_module_action');
		$vItem = array();
		$vTotalActions = count($pActions);
		for($i=0;$i<$vTotalActions;$i++) {
			$vItem = array(
				'f_mod_id'=>$pChoosenMod,
				'f_action_id'=>$pActions[$i]
			);
			$this->db->insert('t_module_action',$vItem);
		}
	}
	function fnGroupApplData($pVarQuery) {
		$this->db->select('f_app_id,f_app_code');
		$this->db->like('f_app_id',$pVarQuery);
		$this->db->or_like('f_app_code',$pVarQuery);
		$this->db->order_by('f_app_id','ASC');
		$vResult = $this->db->get('t_application')->result();
		$vGroupApplDataJson = array();
		foreach($vResult as $vRow):
			array_push($vGroupApplDataJson,$vRow);
		endforeach;
		echo json_encode($vGroupApplDataJson);
	}
	function fnModsGroupData($pAppId) {
		$this->db->select('f_grpmod_id,f_grpmod_name');
		$this->db->where('f_app_id',$pAppId);
		$this->db->order_by('f_grpmod_id','ASC');
		$vResult = $this->db->get('t_group_module')->result();
		$vModsGroupDataJson = array();
		foreach($vResult as $vRow):
			array_push($vModsGroupDataJson,$vRow);
		endforeach;
		echo json_encode($vModsGroupDataJson);
	}
	function fnModsApplData($pVarQuery) {
		$this->db->select('f_app_id,f_app_name');
		$this->db->like('f_app_id',$pVarQuery);
		$this->db->or_like('f_app_name',$pVarQuery);
		$this->db->order_by('f_app_id','ASC');
		$vResult = $this->db->get('t_application')->result();
		$vModsApplDataJson = array();
		foreach($vResult as $vRow):
			array_push($vModsApplDataJson,$vRow);
		endforeach;
		echo json_encode($vModsApplDataJson);
	}
	function fnModuleActionCount($pModuleId) {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->where('f_mod_id',$pModuleId)->get("t_module_action")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnModuleActionData($pModuleId,$pSort,$pOrder) {
		$this->db->select('a.f_action_id,b.f_action_code,b.f_action_name');
		$this->db->from('t_module_action AS a');
		$this->db->join('t_action AS b','b.f_action_id=a.f_action_id','left');
		$this->db->where('a.f_mod_id',$pModuleId);
		$this->db->order_by($pSort,$pOrder);
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['appModModuleAction_id'] = $vRow->f_action_id;
			$vArrayTemp['appModModuleAction_code'] = $vRow->f_action_code;
			$vArrayTemp['appModModuleAction_name'] = $vRow->f_action_name;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnCekAppl($pText) {
		$this->db->select('f_app_code');
		$this->db->where('f_app_code',$pText);
		$vQuery1 = $this->db->get('t_application')->result();
		return $vQuery1[0];
	}
	function fnUpModSort($pModId,$pModGroup,$pModSort) {
		$pSecondModGroup = $pModGroup;
		$pSecondModSort = $pModSort-1;
		if($pModSort>1) {
			$vData1 = array (
				'f_mod_sort' => $pModSort
			);
			$vData2 = array (
				'f_mod_sort' => $pSecondModSort
			);
			$this->db->where('f_grpmod_id',$pSecondModGroup)->where('f_mod_sort',$pSecondModSort)->update('t_module',$vData1);
			$this->db->where('f_mod_id',$pModId)->update('t_module',$vData2);
		}
	}
	function fnDownModSort($pModId,$pModGroup,$pModSort) {
		$this->db->select('count(*) as selectCount');
		$this->db->where('f_grpmod_id',$pModGroup);
		$vResult = $this->db->get("t_module")->result();
		$vCount = $vResult[0]->selectCount;
		$pSecondModGroup = $pModGroup; // 5=5
		$pSecondModSort = $pModSort+1; // 6+1=7
		if($pModSort<$vCount) {
			$vData1 = array (
				'f_mod_sort' => $pModSort
			);
			$vData2 = array (
				'f_mod_sort' => $pSecondModSort
			);
			$this->db->where('f_grpmod_id',$pSecondModGroup)->where('f_mod_sort',$pSecondModSort)->update('t_module',$vData1);
			$this->db->where('f_mod_id',$pModId)->update('t_module',$vData2);
		}
	}
}
?>