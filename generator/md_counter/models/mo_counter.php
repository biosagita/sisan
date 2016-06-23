<?php
class mo_counter extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fncounterCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_counter)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fncounterData($pcounterKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id"=>$pcounterKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_counter)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id'] = $vRow->id;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatecounter($pData) {
		$vData = array(
	
		   
			'id'=>$pData['vid'],					
           
		);
		$vResult = $this->db->insert('t_counter',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncounterDelete($pDelcounterId) {
		
		$vResult = $this->db->where('id',$pDelcounterId)->delete('t_counter');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncounterRow($pcounterId) {
	
		$this->db->where('id',$pcounterId);
		
		$vResult = $this->db->get(t_counter)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id'] = $vRow->id;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatecounter($pcounterId,$pData) {
		$vData = array(
		
		   
			'id'=>$pData['vid'],					
           			
		);
	
		$vResult = $this->db->where('id',$pcounterId)->update('t_counter',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

