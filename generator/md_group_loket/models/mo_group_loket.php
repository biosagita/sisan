<?php
class mo_group_loket extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fngroup_loketCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_group_loket)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fngroup_loketData($pgroup_loketKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_group_loket"=>$pgroup_loketKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_group_loket)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;		
           
			$vArrayTemp['nama_group_loket'] = $vRow->nama_group_loket;		
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;		
           
			$vArrayTemp['id_group_layanan_forward'] = $vRow->id_group_layanan_forward;		
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreategroup_loket($pData) {
		$vData = array(
	
		   
			'id_group_loket'=>$pData['vid_group_loket'],					
           
			'nama_group_loket'=>$pData['vnama_group_loket'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'id_group_layanan_forward'=>$pData['vid_group_layanan_forward'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
		);
		$vResult = $this->db->insert('t_group_loket',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fngroup_loketDelete($pDelgroup_loketId) {
		
		$vResult = $this->db->where('id_group_loket',$pDelgroup_loketId)->delete('t_group_loket');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fngroup_loketRow($pgroup_loketId) {
	
		$this->db->where('id_group_loket',$pgroup_loketId);
		
		$vResult = $this->db->get(t_group_loket)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;
           
			$vArrayTemp['nama_group_loket'] = $vRow->nama_group_loket;
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;
           
			$vArrayTemp['id_group_layanan_forward'] = $vRow->id_group_layanan_forward;
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdategroup_loket($pgroup_loketId,$pData) {
		$vData = array(
		
		   
			'id_group_loket'=>$pData['vid_group_loket'],					
           
			'nama_group_loket'=>$pData['vnama_group_loket'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'id_group_layanan_forward'=>$pData['vid_group_layanan_forward'],					
           
			'keterangan'=>$pData['vketerangan'],					
           			
		);
	
		$vResult = $this->db->where('id_group_loket',$pgroup_loketId)->update('t_group_loket',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

