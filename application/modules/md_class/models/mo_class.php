<?php
class mo_class extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnclassCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_class)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnclassData($pclassKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("f_class_name"=>$pclassKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_class)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_class_id'] = $vRow->f_class_id;		
           
			$vArrayTemp['f_class_name'] = $vRow->f_class_name;		
           
			$vArrayTemp['f_class_remark'] = $vRow->f_class_remark;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreateclass($pData) {
		$vData = array(
	
		   
           
			'f_class_name'=>$pData['vf_class_name'],					
           
			'f_class_remark'=>$pData['vf_class_remark'],					
           
		);
		$vResult = $this->db->insert('t_class',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnclassDelete($pDelclassId) {
		
		$vResult = $this->db->where('f_class_id',$pDelclassId)->delete('t_class');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnclassRow($pclassId) {
	
		$this->db->where('f_class_id',$pclassId);
		
		$vResult = $this->db->get(t_class)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['f_class_id'] = $vRow->f_class_id;
           
			$vArrayTemp['f_class_name'] = $vRow->f_class_name;
           
			$vArrayTemp['f_class_remark'] = $vRow->f_class_remark;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdateclass($pclassId,$pData) {
		$vData = array(
		
		   
           
			'f_class_name'=>$pData['vf_class_name'],					
           
			'f_class_remark'=>$pData['vf_class_remark'],					
           			
		);
	
		$vResult = $this->db->where('f_class_id',$pclassId)->update('t_class',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnclassComboData($pVarQuery) {
		$this->db->select('f_class_id,f_class_name');
		$vResult = $this->db->get('t_class')->result();
		$vclassDataJson = array();
		foreach($vResult as $vRow):
			array_push($vclassDataJson,$vRow);
		endforeach;
		echo json_encode($vclassDataJson);
	}
	
	
}
?>

