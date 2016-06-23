<?php
class mo_video extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnvideoCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(video)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnvideoData($pvideoKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_video"=>$pvideoKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(video)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_video'] = $vRow->id_video;		
           
			$vArrayTemp['nama_video'] = $vRow->nama_video;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatevideo($pData) {
		$vData = array(
	           
			'nama_video'=>$pData['vnama_video'],					
           
		);
		$vResult = $this->db->insert('video',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnvideoDelete($pDelvideoId) {
		
		$vResult = $this->db->where('id_video',$pDelvideoId)->delete('video');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnvideoRow($pvideoId) {
	
		$this->db->where('id_video',$pvideoId);
		
		$vResult = $this->db->get(video)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_video'] = $vRow->id_video;
           
			$vArrayTemp['nama_video'] = $vRow->nama_video;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatevideo($pvideoId,$pData) {
		$vData = array(
		
		   
			'nama_video'=>$pData['vnama_video'],					
           			
		);
	
		$vResult = $this->db->where('id_video',$pvideoId)->update('video',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

