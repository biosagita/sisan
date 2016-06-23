<?php
class mo_admin extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function getModules($pLoginRole) {
		$this->db->distinct();
		$this->db->select('c.f_grpmod_code,c.f_grpmod_name,b.f_mod_code,b.f_mod_name');
		$this->db->from('t_role_module AS a');
		$this->db->join('t_module AS b','a.f_module_id=b.f_mod_id');
		$this->db->join('t_group_module AS c','b.f_grpmod_id=c.f_grpmod_id');
		$this->db->where('b.f_mod_active','1');
		$this->db->where('c.f_grpmod_active','1');
		$pLoginRole2=explode(",",$pLoginRole);
		$this->db->where_in('a.f_role_id',$pLoginRole2);
		$this->db->order_by("c.f_grpmod_id","asc");
		$this->db->order_by("b.f_mod_sort","asc");
		return $this->db->get()->result();
	}
	function Auth1($pLoginName,$pLoginPass) {
		$this->db->select('a.f_user_id AS logId,f_user_login AS logName,f_user_password AS logPass,b.f_emp_id as EmpId,c.f_emp_name as EmpName,c.f_comp_branch_id as BranchId,f.f_branch_code as BranchCode,f_role_branch_status as BranchStatus,f_role_data_limitation as RoleDatalimit,f_role_category as RoleCategory,g.id_group_layanan,f_role_code,h.status_reg');
		$this->db->where(array('f_user_login'=>$pLoginName,'f_user_password'=>$pLoginPass));
		$this->db->join('t_user_employee AS b','a.f_user_id=b.f_user_id');		
		$this->db->join('t_employee AS c','b.f_emp_id=c.f_emp_id');		
		$this->db->join('t_user_role AS d','a.f_user_id=d.f_user_id','Left');		
		$this->db->join('t_role AS e','d.f_role_id=e.f_role_id','Left');		
		$this->db->join('t_comp_branch AS f','c.f_comp_branch_id=f.f_branch_id','Left');		
		$this->db->join('user_group  AS g','a.id_user_group=g.id_user_group','Left');		
		$this->db->join('group_layanan  AS h','g.id_group_layanan=h.id_group_layanan','Left');		

		$this->db->from('t_user AS a');
		$vResult = $this->db->get()->result();		
		
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	function Auth2($pSessId) {
		$this->db->select('b.f_segment_id AS segment');
		$this->db->from('t_user_employee AS a');
		$this->db->join('t_employee_segment AS b','a.f_emp_segment_id=b.f_emp_segment_id');
		$this->db->where('a.f_user_id',$pSessId);
		$vResult = $this->db->get()->result();
		if($vResult) {
			$vArrayTemp = array();
			$i=0;
			foreach($vResult AS $vRow):
				$vArrayTemp[$i] = $vRow->segment;
				$i++;
			endforeach;
			return $vArrayTemp;
		} else {
			return false;
		}
	}
	function Auth3($pSessId) {
		$this->db->select('f_role_id');
		$this->db->where('f_user_id',$pSessId);
		$vResult = $this->db->get('t_user_role')->result();
		if($vResult) {
			$vArrayTemp = array();
			$i=0;
			foreach($vResult AS $vRow):
				$vArrayTemp[$i] = $vRow->f_role_id;
				$i++;
			endforeach;
			return $vArrayTemp;
		} else {
			return false;
		}
	}
	function LoginAuth1($pLoginName,$pLoginPass) {
		$result=$this->db->select('a.f_user_id, a.f_user_login, a.f_user_password, b.f_user_type_code')->from('t_user AS a')->join('t_user_type AS b','a.f_user_type_id=b.f_user_type_id')->where(array('a.f_user_login'=>$pLoginName,'a.f_user_password'=>$pLoginPass))->get()->result();
		
		if($result) {
			return $result[0];
		} else {
			return false;
		}
	}
	function LoginAuth2($pLoginId) {
		$this->db->query("select f_role_id,f_role_branch_status,f_role_data_limitation,f_role_category from t_user_role as a LEFT JOIN t_role as b ON a.f_role_id=b.f_role_id where f_user_id ='$pLoginId'");
		$vResult=$this->db->get()->result();
		if($result) {
			return $result[0];
		} else {
			return false;
		}
	}
}
?>