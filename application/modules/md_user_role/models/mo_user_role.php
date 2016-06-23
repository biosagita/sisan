<?php
class mo_user_role extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnUserCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get("t_user")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnUserData($pSort,$pOrder) {
		$this->db->select("f_user_id,f_user_login,f_user_name,f_user_email,f_user_active,nama_user_group");
		$this->db->order_by($pSort,$pOrder);
		$this->db->join('user_group as b','a.id_user_group=b.id_user_group','left');
		$this->db->from('t_user as a');
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['userrole_user_uid'] = $vRow->f_user_id;
			$vArrayTemp['userrole_user_ulogin'] = $vRow->f_user_login;
			$vArrayTemp['userrole_user_uname'] = $vRow->f_user_name;
			$vArrayTemp['userrole_user_umail'] = $vRow->f_user_email;
			$vArrayTemp['userrole_user_group'] = $vRow->nama_user_group;
			
			$tempActive = $vRow->f_user_active;
			if($tempActive=='1') {
				$tempActive='Yes';
			} else {
				$tempActive='No';
			}
			$vArrayTemp['userrole_user_uactive'] = $tempActive;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnUserRow($pUserId) {
		$this->db->select("f_user_login,f_user_password,f_user_name,f_user_email,f_user_desc,f_user_active,id_user_group");
		$this->db->where("f_user_id",$pUserId);
		$vResult = $this->db->get("t_user")->result();
		$vRow = $vResult[0];
		$vData['fldLogin'] = $vRow->f_user_login;
		$vData['fldPass'] = $vRow->f_user_password;
		$vData['fldName'] = $vRow->f_user_name;
		$vData['fldMail'] = $vRow->f_user_email;
		$vData['fldDesc'] = $vRow->f_user_desc;
		$vData['fldActive'] = $vRow->f_user_active;
		$vData['id_user_group'] = $vRow->id_user_group;
		
		echo json_encode($vData);
	}
	function fnCreateUser($pData) {
		$vData = array(
			'f_user_login'=>$pData['vLogin'],
			'f_user_password'=>$pData['vPass'],
			'f_user_name'=>$pData['vName'],
			'f_user_email'=>$pData['vMail'],
			'f_user_desc'=>$pData['vDesc'],
			'f_user_active'=>$pData['vActive'],
			'id_user_group'=>$pData['vid_user_group']
			
		);
		$vResult = $this->db->insert('t_user',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnUpdateUser($pUserId,$pData) {
		$vData = array(
			'f_user_password'=>$pData['vPass'],
			'f_user_name'=>$pData['vName'],
			'f_user_email'=>$pData['vMail'],
			'f_user_desc'=>$pData['vDesc'],
			'f_user_active'=>$pData['vActive'],
			'id_user_group'=>$pData['vid_user_group']
			
		);
		$vResult = $this->db->where('f_user_id',$pUserId)->update('t_user',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnUserTypeData($pVarQuery) {
		$this->db->select('f_user_type_id,f_user_type_name');
		$this->db->like('f_user_type_code',$pVarQuery);
		$this->db->or_like('f_user_type_name',$pVarQuery);
		$vResult = $this->db->get('t_user_type')->result();
		$vUserTypeDataJson = array();
		foreach($vResult as $vRow):
			array_push($vUserTypeDataJson,$vRow);
		endforeach;
		echo json_encode($vUserTypeDataJson);
	}
	// ============== Datagrid User-Role's Model Section
	function fnUserRoleCount($pUserId) {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->where('f_user_id',$pUserId)->get("t_user_role")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnUserRoleData($pUserId) {
		$this->db->select("b.f_role_code,b.f_role_name");
		$this->db->from("t_user_role AS a");
		$this->db->join("t_role AS b","a.f_role_id=b.f_role_id AND a.f_user_id='$pUserId'");
		$this->db->order_by("b.f_role_id","ASC");
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['userrole_userrole_rcode'] = $vRow->f_role_code;
			$vArrayTemp['userrole_userrole_rname'] = $vRow->f_role_name;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnRoleCountChoose() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get("t_role")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnUserRoleDataChoose($pUserId) {
		$this->db->select("b.f_user_id,a.f_role_id,a.f_role_name");
		$this->db->from("t_role AS a");
		$this->db->join("t_user_role AS b","a.f_role_id=b.f_role_id AND b.f_user_id='$pUserId'","left");
		$this->db->order_by("a.f_role_id","ASC");
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vTempBox = $vRow->f_user_id;
			if($vTempBox) {
				$vArrayTemp['userrole_userrole_box'] = '1';
			} else {
				$vArrayTemp['userrole_userrole_box'] = null;
			}
			$vArrayTemp['userrole_userrole_id'] = $vRow->f_role_id;
			$vArrayTemp['userrole_userrole_name'] = $vRow->f_role_name;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnSaveUserRole($pUserId,$pRoles) {
		$this->db->where('f_user_id',$pUserId)->delete('t_user_role');
		$vItem = array();
		$vTotalRoles = count($pRoles);
		for($i=0;$i<$vTotalRoles;$i++) {
			$vItem = array(
				'f_user_id'=>$pUserId,
				'f_role_id'=>$pRoles[$i]
			);
			$this->db->insert('t_user_role',$vItem);
		}
	}
	// ============== Datagrid User - Employee's Model Section
	function fnUserEmployeeCount($pUserId) {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->where('f_user_id',$pUserId)->get("t_user_employee")->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function fnUserEmployeeData($pUserId) {
		$this->db->select("a.f_emp_id,b.f_emp_code,b.f_emp_name,b.f_emp_email");
		$this->db->from("t_user_employee AS a");
		$this->db->join("t_employee AS b","b.f_emp_id=a.f_emp_id");

		$this->db->where("a.f_user_id",$pUserId);
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
			$vArrayTemp['userrole_useremployee_eid'] = $vRow->f_emp_id;
			$vArrayTemp['userrole_useremployee_ecode'] = $vRow->f_emp_code;
			$vArrayTemp['userrole_useremployee_ename'] = $vRow->f_emp_name;
			$vArrayTemp['userrole_useremployee_email'] = $vRow->f_emp_email;
			$vArrayTemp['userrole_useremployee_edesc'] = $vRow->f_emp_type_desc;
			array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnEmployeeRow($pUserId) {
		$this->db->select("f_emp_id,f_emp_type_id");
		$this->db->where("f_user_id",$pUserId);
		$vResult = $this->db->get("t_user_employee")->result();
		$vRow = $vResult[0];
		$vData['fldDetail'] = $vRow->f_emp_id;
		$vData['fldType'] = $vRow->f_emp_type_id;
		echo json_encode($vData);
	}
	function fnSelectEmployee($pUserId,$pData) {
		$vUserId = $pUserId;
		$this->db->where('f_user_id',$vUserId)->delete('t_user_employee');
		$vData = array(
			'f_user_id'=>$vUserId,
			'f_emp_id'=>$pData['vEmployeeId']
		);
		$vResult = $this->db->insert('t_user_employee',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnEmployeeDetailData($pVarQuery) {
		$this->db->select('f_emp_id,f_emp_code,f_emp_name,f_emp_email');
		$this->db->like('f_emp_code',$pVarQuery);
		$this->db->or_like('f_emp_name',$pVarQuery);
		$this->db->order_by('f_emp_id','ASC');
		$vResult = $this->db->get('t_employee')->result();
		$vEmployeeDetailJson = array();
		foreach($vResult as $vRow):
			array_push($vEmployeeDetailJson,$vRow);
		endforeach;
		echo json_encode($vEmployeeDetailJson);
	}
	function fnEmployeeTypeData($pVarQuery) {
		$this->db->select('f_emp_type_id,f_emp_type_desc');
		$this->db->like('f_emp_type_desc',$pVarQuery);
		$this->db->order_by('f_emp_type_id','ASC');
		$vResult = $this->db->get('t_employee_type')->result();
		$vEmployeeTypeJson = array();
		foreach($vResult as $vRow):
			array_push($vEmployeeTypeJson,$vRow);
		endforeach;
		echo json_encode($vEmployeeTypeJson);
	}
	// ============== Datagrid Other's Model Section
}
?>