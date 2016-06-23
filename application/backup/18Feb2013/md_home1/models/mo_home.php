<?php
class mo_home extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	function getModules($pLoginAs) {
		$this->db->select('c.f_grpmod_code,c.f_grpmod_name,b.f_mod_code,b.f_mod_name,b.f_mod_new');
		$this->db->from('t_role_module AS a');
		$this->db->join('t_module AS b','a.f_module_id=b.f_mod_id');
		$this->db->join('t_group_module AS c','b.f_grpmod_id=c.f_grpmod_id');
		$this->db->where('b.f_mod_active','1');
		$this->db->where('c.f_grpmod_active','1');
		$this->db->where('a.f_role_id',$pLoginAs);
		$this->db->order_by("c.f_grpmod_id","asc");
		$this->db->order_by("b.f_mod_sort","asc");
		return $this->db->get()->result();
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
		$result=$this->db->select('f_role_id')->from('t_user_role')->where('f_user_id',$pLoginId)->get()->result();
		if($result) {
			return $result[0];
		} else {
			return false;
		}
	}
}
?>