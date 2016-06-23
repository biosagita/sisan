<?php
class mo_group_loket extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fngroup_loketCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(group_loket)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fngroup_loketData($pgroup_loketKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->Select("id_group_loket,nama_group_loket,b.nama_group_layanan,c.nama_group_layanan as forward,a.keterangan,voice_group");
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$this->db->join('group_layanan as b','a.id_group_layanan=b.id_group_layanan','Left');
		$this->db->join('group_layanan as c','a.id_group_layanan_forward=c.id_group_layanan','Left');
		
		$this->db->from('group_loket as a');
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;		
           
			$vArrayTemp['nama_group_loket'] = $vRow->nama_group_loket;		
           
			$vArrayTemp['id_group_layanan'] = $vRow->nama_group_layanan;		
           
			$vArrayTemp['id_group_layanan_forward'] = $vRow->forward;		
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;		

			$vArrayTemp['voice_group'] = $vRow->voice_group;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreategroup_loket($pData) {
		$vData = array(
	
		   
			'nama_group_loket'=>$pData['vnama_group_loket'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'id_group_layanan_forward'=>$pData['vid_group_layanan_forward'],					
           
			'keterangan'=>$pData['vketerangan'],					

			'voice_group'=>$pData['vvoice_group'],					
			
		);
		$vResult = $this->db->insert('group_loket',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fngroup_loketDelete($pDelgroup_loketId) {
		
		$vResult = $this->db->where('id_group_loket',$pDelgroup_loketId)->delete('group_loket');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fngroup_loketRow($pgroup_loketId) {
	
		$this->db->where('id_group_loket',$pgroup_loketId);
		
		$vResult = $this->db->get(group_loket)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_group_loket'] = $vRow->id_group_loket;
           
			$vArrayTemp['nama_group_loket'] = $vRow->nama_group_loket;
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;
           
			$vArrayTemp['id_group_layanan_forward'] = $vRow->id_group_layanan_forward;
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;
           		
			$vArrayTemp['voice_group'] = $vRow->voice_group;		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdategroup_loket($pgroup_loketId,$pData) {
		$vData = array(
           
			'nama_group_loket'=>$pData['vnama_group_loket'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'id_group_layanan_forward'=>$pData['vid_group_layanan_forward'],					
           
			'keterangan'=>$pData['vketerangan'],					

			'voice_group'=>$pData['vvoice_group'],					
			
		);
	
		$vResult = $this->db->where('id_group_loket',$pgroup_loketId)->update('group_loket',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fngroup_loketComboData($pVarQuery) {
		$this->db->select('id_group_loket,nama_group_loket');
		$vResult = $this->db->get('group_loket')->result();
		$vgroup_loketDataJson = array();
		foreach($vResult as $vRow):
			array_push($vgroup_loketDataJson,$vRow);
		endforeach;
		echo json_encode($vgroup_loketDataJson);
	}
	
}
?>

