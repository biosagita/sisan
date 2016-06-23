<?php
class mo_user_group extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnuser_groupCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(user_group)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnuser_groupData($puser_groupKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id"=>$puser_groupKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$this->db->join('group_layanan as b','a.id_group_layanan=b.id_group_layanan');
		$this->db->from('user_group as a');
	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id'] = $vRow->id;		
           
			$vArrayTemp['id_user_group'] = $vRow->id_user_group;		
           
			$vArrayTemp['nama_user_group'] = $vRow->nama_user_group;		
           
			$vArrayTemp['id_group_layanan'] = $vRow->nama_group_layanan;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreateuser_group($pData) {
		$vData = array(
	
		   
			'id'=>$pData['vid'],					
           
			'id_user_group'=>$pData['vid_user_group'],					
           
			'nama_user_group'=>$pData['vnama_user_group'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           
		);
		$vResult = $this->db->insert('user_group',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnuser_groupDelete($pDeluser_groupId) {
		
		$vResult = $this->db->where('id',$pDeluser_groupId)->delete('user_group');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnuser_groupRow($puser_groupId) {
	
		$this->db->where('id',$puser_groupId);
		
		$vResult = $this->db->get(user_group)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id'] = $vRow->id;
           
			$vArrayTemp['id_user_group'] = $vRow->id_user_group;
           
			$vArrayTemp['nama_user_group'] = $vRow->nama_user_group;
           
			$vArrayTemp['id_group_layanan'] = $vRow->id_group_layanan;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdateuser_group($puser_groupId,$pData) {
		$vData = array(
		
		   
			'id'=>$pData['vid'],					
           
			'id_user_group'=>$pData['vid_user_group'],					
           
			'nama_user_group'=>$pData['vnama_user_group'],					
           
			'id_group_layanan'=>$pData['vid_group_layanan'],					
           			
		);
	
		$vResult = $this->db->where('id',$puser_groupId)->update('user_group',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnuser_groupComboData($pVarQuery) {
		$this->db->select('id_user_group,nama_user_group');
		$vResult = $this->db->get('user_group')->result();
		$vUGDataJson = array();
		foreach($vResult as $vRow):
			array_push($vUGDataJson,$vRow);
		endforeach;
		echo json_encode($vUGDataJson);
	}		
}
?>

