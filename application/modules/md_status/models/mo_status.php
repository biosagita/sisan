<?php
class mo_status extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnstatusCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_status)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnstatusData($pstatusKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("f_status_name"=>$pstatusKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_status)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_status_id'] = $vRow->f_status_id;		
           
			$vArrayTemp['f_status_name'] = $vRow->f_status_name;		
           
			$vArrayTemp['f_status_remark'] = $vRow->f_status_remark;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatestatus($pData) {
		$vData = array(
	
		   
           
			'f_status_name'=>$pData['vf_status_name'],					
           
			'f_status_remark'=>$pData['vf_status_remark'],					
           
		);
		$vResult = $this->db->insert('t_status',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnstatusDelete($pDelstatusId) {
		
		$vResult = $this->db->where('f_status_id',$pDelstatusId)->delete('t_status');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnstatusRow($pstatusId) {
	
		$this->db->where('f_status_id',$pstatusId);
		
		$vResult = $this->db->get(t_status)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['f_status_id'] = $vRow->f_status_id;
           
			$vArrayTemp['f_status_name'] = $vRow->f_status_name;
           
			$vArrayTemp['f_status_remark'] = $vRow->f_status_remark;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatestatus($pstatusId,$pData) {
		$vData = array(
		
		   
           
			'f_status_name'=>$pData['vf_status_name'],					
           
			'f_status_remark'=>$pData['vf_status_remark'],					
           			
		);
	
		$vResult = $this->db->where('f_status_id',$pstatusId)->update('t_status',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnstatusComboData($pVarQuery) {
		$this->db->select('f_status_id,f_status_name');
		$vResult = $this->db->get('t_status')->result();
		$vstatusDataJson = array();
		foreach($vResult as $vRow):
			array_push($vstatusDataJson,$vRow);
		endforeach;
		echo json_encode($vstatusDataJson);
	}	
	
}
?>

