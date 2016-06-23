<?php
class mo_setting extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnsettingCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_setting)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnsettingData($psettingKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_setting"=>$psettingKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_setting)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_setting'] = $vRow->id_setting;		
           
			$vArrayTemp['setting'] = $vRow->setting;		
           
			$vArrayTemp['nilai'] = $vRow->nilai;		
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatesetting($pData) {
		$vData = array(
	
		   
			'id_setting'=>$pData['vid_setting'],					
           
			'setting'=>$pData['vsetting'],					
           
			'nilai'=>$pData['vnilai'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
		);
		$vResult = $this->db->insert('t_setting',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnsettingDelete($pDelsettingId) {
		
		$vResult = $this->db->where('id_setting',$pDelsettingId)->delete('t_setting');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnsettingRow($psettingId) {
	
		$this->db->where('id_setting',$psettingId);
		
		$vResult = $this->db->get(t_setting)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_setting'] = $vRow->id_setting;
           
			$vArrayTemp['setting'] = $vRow->setting;
           
			$vArrayTemp['nilai'] = $vRow->nilai;
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatesetting($psettingId,$pData) {
		$vData = array(
		
		   
			'id_setting'=>$pData['vid_setting'],					
           
			'setting'=>$pData['vsetting'],					
           
			'nilai'=>$pData['vnilai'],					
           
			'keterangan'=>$pData['vketerangan'],					
           			
		);
	
		$vResult = $this->db->where('id_setting',$psettingId)->update('t_setting',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

