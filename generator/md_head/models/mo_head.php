<?php
class mo_head extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnheadCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_head)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnheadData($pheadKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_head)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_header'] = $vRow->id_header;		
           
			$vArrayTemp['text_header'] = $vRow->text_header;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatehead($pData) {
		$vData = array(
	
		   
			'id_header'=>$pData['vid_header'],					
           
			'text_header'=>$pData['vtext_header'],					
           
		);
		$vResult = $this->db->insert('t_head',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnheadDelete($pDelheadId) {
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnheadRow($pheadId) {
		
		$vResult = $this->db->get(t_head)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_header'] = $vRow->id_header;
           
			$vArrayTemp['text_header'] = $vRow->text_header;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatehead($pheadId,$pData) {
		$vData = array(
		
		   
			'id_header'=>$pData['vid_header'],					
           
			'text_header'=>$pData['vtext_header'],					
           			
		);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

