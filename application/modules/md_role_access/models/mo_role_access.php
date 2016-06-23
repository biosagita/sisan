<?php
class mo_role_access extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function fnRoleCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get("t_role")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnRoleData($pSort,$pOrder) {
		$this->db->select('a.f_role_id,a.f_role_code,a.f_role_name,a.f_role_desc,a.f_role_branch_status,a.f_role_data_limitation,a.f_role_category,a.f_role_active,b.f_app_code,b.f_app_id');
		$this->db->from('t_role AS a');
		$this->db->join('t_application AS b','b.f_app_id=a.f_app_id');
		$this->db->order_by('b.f_app_id',$pOrder);
		$this->db->order_by($pSort,$pOrder);
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['roleaccess_role_id'] = $vRow->f_role_id;
			$vArrayTemp['roleaccess_role_code'] = $vRow->f_role_code;
			$vArrayTemp['roleaccess_role_applid'] = $vRow->f_app_id;
			$vArrayTemp['roleaccess_role_appl'] = $vRow->f_app_code;
			$vArrayTemp['roleaccess_role_name'] = $vRow->f_role_name;
			$vArrayTemp['roleaccess_role_desc'] = $vRow->f_role_desc;
			
			$tempBranchStatus = $vRow->f_role_branch_status;
			if($tempBranchStatus=='1') {
				$tempBranchStatus='Holding';
			} else {
				$tempBranchStatus='Unit';
			}
			$vArrayTemp['roleaccess_role_BranchStatus'] = $tempBranchStatus;

			$tempDataLimitation = $vRow->f_role_data_limitation;
			if($tempDataLimitation=='1') {
				$tempDataLimitation='All';
			} else {
				$tempDataLimitation='Limit';
			}
			$vArrayTemp['roleaccess_role_DataLimitation'] = $tempDataLimitation;

			$tempCategory = $vRow->f_role_category;
			if($tempCategory=='1') {
				$tempCategory='Admin';
			} else {
				$tempCategory='User';
			}
			$vArrayTemp['roleaccess_role_Category'] = $tempCategory;
			
			$tempActive = $vRow->f_role_active;
			if($tempActive=='1') {
				$tempActive='Yes';
			} else {
				$tempActive='No';
			}
			$vArrayTemp['roleaccess_role_active'] = $tempActive;
			
			
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnRoleAction($pRoleId,$pRoleModuleId) {
	//	$this->db->select('a.f_role_id,a.f_module_id,a.f_role_crud');
		$this->db->from('t_role_module AS a');
		$this->db->join('t_module AS b','a.f_module_id=b.f_mod_id');
		$this->db->join('t_role AS c','a.f_role_id=c.f_role_id');
		$this->db->where(array('a.f_role_id'=>$pRoleId,'a.f_module_id'=>$pRoleModuleId));
		
	///	$this->db->order_by('b.f_app_id',$pOrder);
	//	$this->db->order_by($pSort,$pOrder);
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['f_role_id'] = $vRow->f_role_id;
			$vArrayTemp['f_role_name'] = $vRow->f_role_code;
			
			$vArrayTemp['f_role_module'] = $vRow->f_mod_id;
			$vArrayTemp['f_role_module_name'] = $vRow->f_mod_code;
			
			$vArrayTemp['f_role_id'] = $vRow->f_role_id;
			
			$tempActive = $vRow->f_role_crud;
			if($tempActive=='1') {
				$tempActive='Crud';
			} else {
				$tempActive='No';
			}
			$vArrayTemp['f_role_crud'] = $tempActive;
			
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}	
	function fnRoleRow($pRoleId) {
		$this->db->select('f_role_code,f_role_name,f_role_desc,f_app_id,f_role_branch_status,f_role_data_limitation,f_role_category,f_role_active');
		$this->db->where('f_role_id',$pRoleId);
		$vResult = $this->db->get('t_role')->result();
		$vRow = $vResult[0];
		$vData['fldCode'] = $vRow->f_role_code;
		$vData['fldName'] = $vRow->f_role_name;
		$vData['fldDesc'] = $vRow->f_role_desc;
		$vData['fldBranchStatus'] = $vRow->f_role_branch_status;
		$vData['fldDataLimitations'] = $vRow->f_role_data_limitation;
		$vData['fldCategory'] = $vRow->f_role_category;
		
		$vData['fldAppl'] = $vRow->f_app_id;
		
		$vData['fldActive'] = $vRow->f_role_active;
		echo json_encode($vData);
	}
	function fnCreateRole($pData) {
		$vData = array(
			'f_role_code'=>$pData['vCode'],
			'f_role_name'=>$pData['vName'],
			'f_role_desc'=>$pData['vDesc'],
			'f_app_id'=>$pData['vAppl'],
			'f_role_branch_status'=>$pData['vBranchStatus'],
			'f_role_data_limitation'=>$pData['vDataLimit'],
			'f_role_category'=>$pData['vCategory'],
			
			'f_role_active'=>$pData['vActive']
		);
		
		$vResult = $this->db->insert('t_role',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnUpdateRole($pRoleId,$pData) {
		$vData = array(
			'f_role_name'=>$pData['vName'],
			'f_role_desc'=>$pData['vDesc'],
			'f_app_id'=>$pData['vAppl'],
			'f_role_branch_status'=>$pData['vBranchStatus'],
			'f_role_data_limitation'=>$pData['vDataLimit'],
			'f_role_category'=>$pData['vCategory'],			
			'f_role_active'=>$pData['vActive']
			
		);
		$vResult = $this->db->where('f_role_id',$pRoleId)->update('t_role',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnCrud($pRoleId,$pRoleModuleId) {
		$vData = array(
			'f_role_crud'=>'1',
		);
		$vResult = $this->db->where(array('f_role_id'=>$pRoleId,'f_module_id'=>$pRoleModuleId))->update('t_role_module',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnNoCrud($pRoleId,$pRoleModuleId) {
		$vData = array(
			'f_role_crud'=>'0',
		);
		$vResult = $this->db->where(array('f_role_id'=>$pRoleId,'f_module_id'=>$pRoleModuleId))->update('t_role_module',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnRoleAccessCrud($vmoduleId) {
		$Role=$this->session->userdata('sRoles');
	
		$this->db->where(array('f_module_id'=>$vmoduleId,'f_role_id'=>$Role));
		$vResult = $this->db->get(t_role_module)->result();
		$vRow = $vResult[0];           
			$vArrayTemp['crud_'.$vmoduleId] = $vRow->f_role_crud;		
           			
		echo json_encode($vArrayTemp);
	}
	
	/*
	function fnDeleteRole($pRoleId) {
		$vResult = $this->db->where('f_role_id',$pRoleId)->delete('t_role');
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	*/
	// ==================================================
	function fnRoleModCount($pRoleId) {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->where('f_role_id',$pRoleId)->get("t_role_module")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnRoleModData($pRoleId) {
		$res = mysql_query("SELECT CONCAT('G',a.f_grpmod_id) AS ModId, a.f_grpmod_id AS GroupMod, 0 AS ModSort, a.f_grpmod_name AS ModName, 1 AS IsParent
		FROM t_group_module AS a
		JOIN t_module AS b ON b.f_grpmod_id=a.f_grpmod_id
		JOIN t_role_module AS c ON b.f_mod_id=c.f_module_id AND c.f_role_id='$pRoleId'
		WHERE a.f_grpmod_active != 2
		UNION
		SELECT b.f_mod_id AS ModId, b.f_grpmod_id AS GroupMod, b.f_mod_sort AS ModSort, b.f_mod_name AS ModName, 0 AS IsParent
		FROM t_role_module AS a
		JOIN t_module AS b ON b.f_mod_id=a.f_module_id AND a.f_role_id='$pRoleId'
		ORDER BY GroupMod ASC, ModSort ASC");
		$vArrayTemp = array();
		$vItems = array();
		while($vRow = mysql_fetch_array($res)) {
			$vArrayTemp['roleaccess_rolemodule_id'] = $vRow['ModId'];
			$vArrayTemp['roleaccess_rolemodule_name'] = $vRow['ModName'];
			$vArrayTemp['roleaccess_rolemodule_isparent'] = $vRow['IsParent'];
			if($vRow['IsParent']!='1') {
				$vArrayTemp['roleaccess_rolemodule_groupmod'] = 'G'.$vRow['GroupMod'];
				$vArrayTemp['roleaccess_rolemodule_modSort'] = $vRow['ModSort'];
				$vArrayTemp['_parentId'] = 'G'.$vRow['GroupMod'];
			}
			array_push($vItems,$vArrayTemp);
			unset($vArrayTemp);
		}
		return $vItems;
	}
	function fnRoleModChooseCount($pRoleId) {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->where('f_role_id',$pRoleId)->get("t_role_module")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnRoleModChooseData($pRoleApp,$pRoleId) {
		$res = mysql_query("SELECT c.f_role_id AS ModSelected, CONCAT('G',a.f_grpmod_id) AS ModId, a.f_grpmod_id AS GroupMod, 0 AS ModSort, a.f_grpmod_name AS ModName, 1 AS IsParent
		FROM t_group_module AS a
		INNER JOIN t_module AS b ON b.f_grpmod_id=a.f_grpmod_id
		LEFT JOIN t_role_module AS c ON c.f_role_id='$pRoleId'
		WHERE a.f_app_id='$pRoleApp'
		UNION
		SELECT b.f_role_id AS ModSelected, a.f_mod_id AS ModId, a.f_grpmod_id AS GroupMod, a.f_mod_sort AS ModSort, a.f_mod_name AS ModName, 0 AS IsParent
		FROM t_module AS a
		LEFT JOIN t_role_module AS b ON b.f_module_id=a.f_mod_id AND b.f_role_id='$pRoleId'
		WHERE a.f_mod_active!=2 AND a.f_app_id='$pRoleApp'
		ORDER BY GroupMod ASC, ModSort ASC");
		$vArrayTemp = array();
		$vItems = array();
		while($vRow = mysql_fetch_array($res)) {
			$vTemp = $vRow['ModSelected'];
			if($vTemp) {
				$vArrayTemp['roleaccess_rolemodule_box'] = '1';
			} else {
				$vArrayTemp['roleaccess_rolemodule_box'] = null;
			}
			$vArrayTemp['roleaccess_rolemodule_id'] = $vRow['ModId'];
			$vArrayTemp['roleaccess_rolemodule_name'] = $vRow['ModName'];
			$vArrayTemp['roleaccess_rolemodule_isparent'] = $vRow['IsParent'];
			if($vRow['IsParent']!='1') {
				$vArrayTemp['roleaccess_rolemodule_groupmod'] = 'G'.$vRow['GroupMod'];
				$vArrayTemp['roleaccess_rolemodule_modSort'] = $vRow['ModSort'];
				$vArrayTemp['_parentId'] = 'G'.$vRow['GroupMod'];
			}
			array_push($vItems,$vArrayTemp);
			unset($vArrayTemp);
		}
		return $vItems;
	}
	function fnSaveRoleMod($pChoosenRoleId,$pModules) {
		$this->db->where('f_role_id',$pChoosenRoleId)->delete('t_role_module');
		$vItem = array();
		$vTotalModules = count($pModules);
		for($i=0;$i<$vTotalModules;$i++) {
			$vItem = array(
				'f_role_id'=>$pChoosenRoleId,
				'f_module_id'=>$pModules[$i]
			);
			$this->db->insert('t_role_module',$vItem);
		}
	}
	// ==================================================
	function fnRoleModActCount($pRoleId) {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->where('f_role_id',$pRoleId)->get("t_role_action")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnRoleModActData($pRoleId,$pRoleModuleId) {
		$this->db->distinct();
		$this->db->select("c.f_role_id,b.f_action_id,a.f_action_id,a.f_action_code,a.f_action_name");
		$this->db->from("t_action AS a");
		$this->db->join("t_module_action AS b","b.f_action_id=a.f_action_id AND b.f_mod_id='$pRoleModuleId'");
		$this->db->join("t_role_action AS c","c.f_action_id=a.f_action_id AND c.f_role_id='$pRoleId' AND c.f_module_id='$pRoleModuleId'","left");
		$this->db->order_by("b.f_action_id","ASC");
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['roleaccess_rolemoduleaction_roleid'] = $pRoleId;
			$vArrayTemp['roleaccess_rolemoduleaction_rolemoduleid'] = $pRoleModuleId;
			$vTempBox = $vRow->f_role_id;
			if($vTempBox) {
				$vArrayTemp['roleaccess_rolemoduleaction_box'] = '1';
			} else {
				$vArrayTemp['roleaccess_rolemoduleaction_box'] = null;
			}
			$vArrayTemp['roleaccess_rolemoduleaction_actionid'] = $vRow->f_action_id;
			$vArrayTemp['roleaccess_rolemoduleaction_actioncode'] = $vRow->f_action_code;
			$vArrayTemp['roleaccess_rolemoduleaction_actionname'] = $vRow->f_action_name;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnSaveRMA($pRoleId,$pRoleModuleId,$pActions) {
		$this->db->where('f_role_id',$pRoleId)->where('f_module_id',$pRoleModuleId)->delete('t_role_action');
		$vItem = array();
		if($pActions!="emptydata") {
			$vTotalActions = count($pActions);
			for($i=0;$i<$vTotalActions;$i++) {
				$vItem = array(
					'f_role_id'=>$pRoleId,
					'f_module_id'=>$pRoleModuleId,
					'f_action_id'=>$pActions[$i]
				);
				$this->db->insert('t_role_action',$vItem);
			}
		}
	}
	
	function fnRoleApplData($pVarQuery) {
		$this->db->select('f_app_id,f_app_name');
		$this->db->like('f_app_id',$pVarQuery);
		$this->db->or_like('f_app_name',$pVarQuery);
		$this->db->order_by('f_app_id','ASC');
		$vResult = $this->db->get('t_application')->result();
		$vRoleApplDataJson = array();
		foreach($vResult as $vRow):
			array_push($vRoleApplDataJson,$vRow);
		endforeach;
		echo json_encode($vRoleApplDataJson);
	}
	// ==================================================
}
?>