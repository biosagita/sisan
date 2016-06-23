<?php
class mo_layanan extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnlayananCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_layanan)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnlayananData($playananKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_layanan"=>$playananKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_layanan)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_layanan'] = $vRow->id_layanan;		
           
			$vArrayTemp['nama_layanan'] = $vRow->nama_layanan;		
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;		
           
			$vArrayTemp['layanan_status'] = $vRow->layanan_status;		
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;		
           
			$vArrayTemp['id_layanan_forward'] = $vRow->id_layanan_forward;		
           
			$vArrayTemp['status_barcode'] = $vRow->status_barcode;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatelayanan($pData) {
		$vData = array(
	
		   
			'id_layanan'=>$pData['vid_layanan'],					
           
			'nama_layanan'=>$pData['vnama_layanan'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'layanan_status'=>$pData['vlayanan_status'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
			'id_layanan_forward'=>$pData['vid_layanan_forward'],					
           
			'status_barcode'=>$pData['vstatus_barcode'],					
           
		);
		$vResult = $this->db->insert('t_layanan',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnlayananDelete($pDellayananId) {
		
		$vResult = $this->db->where('id_layanan',$pDellayananId)->delete('t_layanan');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnlayananRow($playananId) {
	
		$this->db->where('id_layanan',$playananId);
		
		$vResult = $this->db->get(t_layanan)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id_layanan'] = $vRow->id_layanan;
           
			$vArrayTemp['nama_layanan'] = $vRow->nama_layanan;
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;
           
			$vArrayTemp['layanan_status'] = $vRow->layanan_status;
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;
           
			$vArrayTemp['id_layanan_forward'] = $vRow->id_layanan_forward;
           
			$vArrayTemp['status_barcode'] = $vRow->status_barcode;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatelayanan($playananId,$pData) {
		$vData = array(
		
		   
			'id_layanan'=>$pData['vid_layanan'],					
           
			'nama_layanan'=>$pData['vnama_layanan'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
			'layanan_status'=>$pData['vlayanan_status'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
			'id_layanan_forward'=>$pData['vid_layanan_forward'],					
           
			'status_barcode'=>$pData['vstatus_barcode'],					
           			
		);
	
		$vResult = $this->db->where('id_layanan',$playananId)->update('t_layanan',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

