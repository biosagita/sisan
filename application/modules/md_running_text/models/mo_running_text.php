<?php
class mo_running_text extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnrunning_textCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(running_text)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnrunning_textData($prunning_textKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_running_text"=>$prunning_textKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(running_text)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_running_text'] = $vRow->id_running_text;		
           
			$vArrayTemp['text'] = $vRow->text;		
           
			$vArrayTemp['created_date'] = $vRow->created_date;		
           
			$vArrayTemp['modified_date'] = $vRow->modified_date;		
           
			$vArrayTemp['start_date'] = $vRow->start_date;		
           
			$vArrayTemp['expired_date'] = $vRow->expired_date;		
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreaterunning_text($pData) {
		$vData = array(
	
		   
			'id_running_text'=>$pData['vid_running_text'],					
           
			'text'=>$pData['vtext'],					
           
			'created_date'=>$pData['vcreated_date'],					
           
			'modified_date'=>$pData['vmodified_date'],					
           
			'start_date'=>$pData['vstart_date'],					
           
			'expired_date'=>$pData['vexpired_date'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
		);
		$vResult = $this->db->insert('running_text',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnrunning_textDelete($pDelrunning_textId) {
		
		$vResult = $this->db->where('id_running_text',$pDelrunning_textId)->delete('running_text');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnrunning_textRow($prunning_textId) {
	
		$this->db->where('id_running_text',$prunning_textId);
		
		$vResult = $this->db->get(running_text)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_running_text'] = $vRow->id_running_text;
           
			$vArrayTemp['text'] = $vRow->text;
           
			$vArrayTemp['created_date'] = $vRow->created_date;
           
			$vArrayTemp['modified_date'] = $vRow->modified_date;
           
			$vArrayTemp['start_date'] = $vRow->start_date;
           
			$vArrayTemp['expired_date'] = $vRow->expired_date;
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdaterunning_text($prunning_textId,$pData) {
		$vData = array(
		
		   
			'id_running_text'=>$pData['vid_running_text'],					
           
			'text'=>$pData['vtext'],					
           
			'created_date'=>$pData['vcreated_date'],					
           
			'modified_date'=>$pData['vmodified_date'],					
           
			'start_date'=>$pData['vstart_date'],					
           
			'expired_date'=>$pData['vexpired_date'],					
           
			'keterangan'=>$pData['vketerangan'],					
           			
		);
	
		$vResult = $this->db->where('id_running_text',$prunning_textId)->update('running_text',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

