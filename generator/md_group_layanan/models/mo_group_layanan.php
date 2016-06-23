<?php
class mo_group_layanan extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fngroup_layananCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_group_layanan)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fngroup_layananData($pgroup_layananKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_group_layanan"=>$pgroup_layananKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_group_layanan)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;		
           
			$vArrayTemp['nama_group_layanan'] = $vRow->nama_group_layanan;		
           
			$vArrayTemp['no_start'] = $vRow->no_start;		
           
			$vArrayTemp['no_end'] = $vRow->no_end;		
           
			$vArrayTemp['jml_tiket'] = $vRow->jml_tiket;		
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreategroup_layanan($pData) {
		$vData = array(
	
		   
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'nama_group_layanan'=>$pData['vnama_group_layanan'],					
           
			'no_start'=>$pData['vno_start'],					
           
			'no_end'=>$pData['vno_end'],					
           
			'jml_tiket'=>$pData['vjml_tiket'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
		);
		$vResult = $this->db->insert('t_group_layanan',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fngroup_layananDelete($pDelgroup_layananId) {
		
		$vResult = $this->db->where('id_group_layanan',$pDelgroup_layananId)->delete('t_group_layanan');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fngroup_layananRow($pgroup_layananId) {
	
		$this->db->where('id_group_layanan',$pgroup_layananId);
		
		$vResult = $this->db->get(t_group_layanan)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;
           
			$vArrayTemp['nama_group_layanan'] = $vRow->nama_group_layanan;
           
			$vArrayTemp['no_start'] = $vRow->no_start;
           
			$vArrayTemp['no_end'] = $vRow->no_end;
           
			$vArrayTemp['jml_tiket'] = $vRow->jml_tiket;
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdategroup_layanan($pgroup_layananId,$pData) {
		$vData = array(
		
		   
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'nama_group_layanan'=>$pData['vnama_group_layanan'],					
           
			'no_start'=>$pData['vno_start'],					
           
			'no_end'=>$pData['vno_end'],					
           
			'jml_tiket'=>$pData['vjml_tiket'],					
           
			'keterangan'=>$pData['vketerangan'],					
           			
		);
	
		$vResult = $this->db->where('id_group_layanan',$pgroup_layananId)->update('t_group_layanan',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

