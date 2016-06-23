<?php
class mo_layanan extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnlayananCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(layanan)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnlayananData($playananKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_layanan"=>$playananKeyword));
		$this->db->Select("id_layanan,nama_layanan,b.nama_group_layanan,c.nama_group_layanan as forward,layanan_status,a.keterangan,a.stok,a.status_popup,a.estimasi");
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$this->db->join('group_layanan as b','a.id_group_layanan=b.id_group_layanan','Left');
		$this->db->join('group_layanan as c','a.id_layanan_forward=c.id_group_layanan','Left');
		
		$this->db->from('layanan as a');
	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_layanan'] = $vRow->id_layanan;		
           
			$vArrayTemp['nama_layanan'] = $vRow->nama_layanan;		
           
			$vArrayTemp['id_group_layanan'] = $vRow->nama_group_layanan;		
			if ($vRow->layanan_status == 1){
			$sts='Aktif';
			}
			Else{
			$sts='Tidak Aktif';
			}
			$vArrayTemp['layanan_status'] = $sts;		
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;		
           
			$vArrayTemp['id_layanan_forward'] = $vRow->forward;		
           
			$vArrayTemp['stok'] = $vRow->stok;		
			if($vRow->status_popup ==1){
			$status='Aktif';
			}
			else{
			$status='Tidak Aktif';
			}
			$vArrayTemp['status_popup'] = $status;		

			$vArrayTemp['estimasi'] = $vRow->estimasi;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatelayanan($pData) {
		$vData = array(
	
			'nama_layanan'=>$pData['vnama_layanan'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'layanan_status'=>$pData['vlayanan_status'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
			'id_layanan_forward'=>$pData['vid_layanan_forward'],					
           
			'stok'=>$pData['vstock'],					

			'status_popup'=>$pData['vstatus_popup'],					

			'estimasi'=>$pData['vestimasi'],					
           
		);
		$vResult = $this->db->insert('layanan',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnlayananDelete($pDellayananId) {
		
		$vResult = $this->db->where('id_layanan',$pDellayananId)->delete('layanan');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnlayananRow($playananId) {
	
		$this->db->where('id_layanan',$playananId);
		
		$vResult = $this->db->get(layanan)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_layanan'] = $vRow->id_layanan;
           
			$vArrayTemp['nama_layanan'] = $vRow->nama_layanan;
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;
           
			$vArrayTemp['layanan_status'] = $vRow->layanan_status;
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;
           
			$vArrayTemp['id_layanan_forward'] = $vRow->id_layanan_forward;
           
			$vArrayTemp['stok'] = $vRow->stok;		

			$vArrayTemp['status_popup'] = $vRow->status_popup;		

			$vArrayTemp['estimasi'] = $vRow->estimasi;		

           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatelayanan($playananId,$pData) {
		$vData = array(
		
		              
			'nama_layanan'=>$pData['vnama_layanan'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'layanan_status'=>$pData['vlayanan_status'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
			'id_layanan_forward'=>$pData['vid_layanan_forward'],					
           
			'stok'=>$pData['vstock'],					

			'status_popup'=>$pData['vstatus_popup'],					

			'estimasi'=>$pData['vestimasi'],					
			
		);
	
		$vResult = $this->db->where('id_layanan',$playananId)->update('layanan',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

