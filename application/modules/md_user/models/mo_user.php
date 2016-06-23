<?php
class mo_user extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnuserCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_user)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnuserData($puserKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		$BranchId = $this->session->userdata('sBranchId');
		$EmpId = $this->session->userdata('sEmpId');
		
		$BranchStatus = $this->session->userdata('sBranchStatus');
		$RoleDataLimit = $this->session->userdata('sRoleDataLimit');
		$RoleCategory = $this->session->userdata('sRoleCategory');
		if(($BranchStatus == 1) and ($RoleDataLimit == 1) ){
		}
		if(($BranchStatus == 1) and ($RoleDataLimit == 0) ){
		$this->db->where("c.f_emp_id",$EmpId);				
		}
		if(($BranchStatus == 0) and ($RoleDataLimit == 1) ){
		$this->db->where("c.f_emp_id",$EmpId);				
		}


		$this->db->join("t_user_employee AS b","a.f_user_id=b.f_user_id","Left");

		$this->db->join("t_employee AS c","b.f_emp_id=c.f_emp_id","Left");

		$this->db->join("t_comp_branch AS d","c.f_comp_branch_id=d.f_branch_id","Left");		
		$this->db->join("t_employee_segment AS e","c.f_emp_segment_id=e.f_emp_segment_id","Left");
		$this->db->join("t_position AS f","c.f_position_id=f.f_position_id","Left");
		$this->db->join("t_department AS g","c.f_dept_id=g.f_dept_id","Left");
				
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit("1",$pOffset);
		$this->db->from("t_user as a");
	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_user_id'] = $vRow->f_user_id;		
           
			$vArrayTemp['f_user_login'] = $vRow->f_user_login;		
           
			$vArrayTemp['f_user_password'] = $vRow->f_user_password;		

			$vArrayTemp['f_emp_code'] = $vRow->f_emp_code;		

			$vArrayTemp['f_emp_initial'] = $vRow->f_emp_initial;		
			
			$vArrayTemp['f_emp_name'] = $vRow->f_emp_name;		
           
			$vArrayTemp['f_comp_branch_id'] = $vRow->f_comp_branch_id;		
			
			$vArrayTemp['f_dept_id'] = $vRow->f_dept_id;		

			$vArrayTemp['f_dept_name'] = $vRow->f_dept_name;		

			$vArrayTemp['f_comp_branch_name'] = $vRow->f_branch_name;		
			
			$vArrayTemp['f_emp_segment_id'] = $vRow->f_emp_segment_id;		

			$vArrayTemp['f_emp_segment_name'] = $vRow->f_emp_segment_name;		
			
			$vArrayTemp['f_position_id'] = $vRow->f_position_id;		

			$vArrayTemp['f_position_name'] = $vRow->f_position_name;		
			
			$vArrayTemp['f_emp_no'] = $vRow->f_emp_no;
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreateuser($pData) {
		$vData = array(
	
           
			'f_user_login'=>$pData['vf_user_login'],					
           
			'f_user_password'=>$pData['vf_user_password'],					
           
		);
		$vResult = $this->db->insert('t_user',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnuserDelete($pDeluserId) {
		
		$vResult = $this->db->where('f_user_id',$pDeluserId)->delete('t_user');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnuserRow($puserId) {
	
		$this->db->where('f_user_id',$puserId);
		
		$vResult = $this->db->get(t_user)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['f_user_id'] = $vRow->f_user_id;
           
			$vArrayTemp['f_user_login'] = $vRow->f_user_login;
           
			$vArrayTemp['f_user_password'] = $vRow->f_user_password;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdateuser($puserId,$pData) {
		$vData = array(
		
           
			'f_user_login'=>$pData['vf_user_login'],					
           
			'f_user_password'=>$pData['vf_user_password'],					
           			
		);
	
		$vResult = $this->db->where('f_user_id',$puserId)->update('t_user',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

