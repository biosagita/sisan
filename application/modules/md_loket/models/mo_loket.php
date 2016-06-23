<?php
class mo_loket extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnloketCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(loket)->result();
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
		$this->db->join('group_loket as b','a.id_group_loket=b.id_group_loket');
		$this->db->from('loket as a');
	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_loket'] = $vRow->id_loket;		
           
			$vArrayTemp['nama_loket'] = $vRow->nama_loket;		
           
			$vArrayTemp['id_group_loket'] = $vRow->nama_group_loket;		

			$vArrayTemp['no_loket'] = $vRow->no_loket;		
			if($vRow->status_off ==1){
			$status='Aktif';
			}
			else{
			$status='Tidak Aktif';
			}
			$vArrayTemp['status_off'] = $status;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreateloket($pData) {
		$vData = array(
	
           
			'nama_loket'=>$pData['vnama_loket'],					
           
			'id_group_loket'=>$pData['vid_group_loket'],	
			
			'no_loket'=>$pData['vno_loket'],					

			'status_off'=>$pData['vstatus_off'],					
           
		);
		$vResult = $this->db->insert('loket',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnloketDelete($pDelloketId) {
		
		$vResult = $this->db->where('id_loket',$pDelloketId)->delete('loket');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnloketRow($ploketId) {
	
		$this->db->where('id_loket',$ploketId);
		
		$vResult = $this->db->get(loket)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_loket'] = $vRow->id_loket;
           
			$vArrayTemp['nama_loket'] = $vRow->nama_loket;
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;
           		
			$vArrayTemp['no_loket'] = $vRow->no_loket;		

			$vArrayTemp['status_off'] = $vRow->status_off;			
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdateloket($ploketId,$pData) {
		$vData = array(
		
           
			'nama_loket'=>$pData['vnama_loket'],					
           
			'id_group_loket'=>$pData['vid_group_loket'],					

			'no_loket'=>$pData['vno_loket'],					

			'status_off'=>$pData['vstatus_off'],					
			
		);
	
		$vResult = $this->db->where('id_loket',$ploketId)->update('loket',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnloketComboData($pVarQuery) {
		$this->db->select('id_loket,nama_loket');
		$vResult = $this->db->get('loket')->result();
		$vloketDataJson = array();
		foreach($vResult as $vRow):
			array_push($vloketDataJson,$vRow);
		endforeach;
		echo json_encode($vloketDataJson);
	}
	
}
?>

