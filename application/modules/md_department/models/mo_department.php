<?php
class mo_department extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fndepartmentCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_department)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fndepartmentData($pdepartmentKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("f_dept_name"=>$pdepartmentKeyword));		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
			
		$this->db->join("t_employee_segment AS b","a.f_emp_segment_id=b.f_emp_segment_id","Left");

		$this->db->from("t_department as a");
		$vResult = $this->db->get()->result();
		
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_dept_id'] = $vRow->f_dept_id;		
           
			$vArrayTemp['f_dept_name'] = $vRow->f_dept_name;		

			$vArrayTemp['f_emp_segment_name'] = $vRow->f_emp_segment_name;		
           
			$vArrayTemp['f_dept_remark'] = $vRow->f_dept_remark;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatedepartment($pData) {
		$vData = array(
	
		   
			'f_emp_segment_id'=>$pData['vf_emp_segment_id'],					
           
			'f_dept_name'=>$pData['vf_dept_name'],					
           
			'f_dept_remark'=>$pData['vf_dept_remark'],					
           
		);
		$vResult = $this->db->insert('t_department',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fndepartmentDelete($pDeldepartmentId) {
		
		$vResult = $this->db->where('f_dept_id',$pDeldepartmentId)->delete('t_department');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fndepartmentRow($pdepartmentId) {
	
		$this->db->where('f_dept_id',$pdepartmentId);
		
		$vResult = $this->db->get(t_department)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['f_dept_id'] = $vRow->f_dept_id;

			$vArrayTemp['f_emp_segment_id'] = $vRow->f_emp_segment_id;
           
			$vArrayTemp['f_dept_name'] = $vRow->f_dept_name;
           
			$vArrayTemp['f_dept_remark'] = $vRow->f_dept_remark;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatedepartment($pdepartmentId,$pData) {
		$vData = array(
		
		   

			'f_emp_segment_id'=>$pData['vf_emp_segment_id'],					
           
			'f_dept_name'=>$pData['vf_dept_name'],					
           
			'f_dept_remark'=>$pData['vf_dept_remark'],					
           			
		);
	
		$vResult = $this->db->where('f_dept_id',$pdepartmentId)->update('t_department',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fndepartmentComboData($pVarQuery) {
		$this->db->select('f_dept_id,f_dept_name');
		$vResult = $this->db->get('t_department')->result();
		$vdeptDataJson = array();
		foreach($vResult as $vRow):
			array_push($vdeptDataJson,$vRow);
		endforeach;
		echo json_encode($vdeptDataJson);
	}

	function fndepartmentCombo2Data($pDivId) {
		$this->db->where('f_emp_segment_id',$pDivId);
		
		$this->db->select('f_dept_id,f_dept_name');
		$vResult = $this->db->get('t_department')->result();
		$vdeptDataJson = array();
		foreach($vResult as $vRow):
			array_push($vdeptDataJson,$vRow);
		endforeach;
		echo json_encode($vdeptDataJson);
	}
	
	
}
?>

