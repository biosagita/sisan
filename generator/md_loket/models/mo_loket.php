<?php
class mo_loket extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnloketCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_loket)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnloketData($ploketKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_loket"=>$ploketKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_loket)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_loket'] = $vRow->id_loket;		
           
			$vArrayTemp['nama_loket'] = $vRow->nama_loket;		
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreateloket($pData) {
		$vData = array(
	
		   
			'id_loket'=>$pData['vid_loket'],					
           
			'nama_loket'=>$pData['vnama_loket'],					
           
			'id_group_loket'=>$pData['vid_group_loket'],					
           
		);
		$vResult = $this->db->insert('t_loket',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnloketDelete($pDelloketId) {
		
		$vResult = $this->db->where('id_loket',$pDelloketId)->delete('t_loket');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnloketRow($ploketId) {
	
		$this->db->where('id_loket',$ploketId);
		
		$vResult = $this->db->get(t_loket)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_loket'] = $vRow->id_loket;
           
			$vArrayTemp['nama_loket'] = $vRow->nama_loket;
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdateloket($ploketId,$pData) {
		$vData = array(
		
		   
			'id_loket'=>$pData['vid_loket'],					
           
			'nama_loket'=>$pData['vnama_loket'],					
           
			'id_group_loket'=>$pData['vid_group_loket'],					
           			
		);
	
		$vResult = $this->db->where('id_loket',$ploketId)->update('t_loket',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

