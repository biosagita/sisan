<?php
class mo_device extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fndeviceCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_device)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fndeviceData($pdeviceKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("f_device_name"=>$pdeviceKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_device)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_device_id'] = $vRow->f_device_id;		
           
			$vArrayTemp['f_device_name'] = $vRow->f_device_name;		
           
			$vArrayTemp['f_device_ip'] = $vRow->f_device_ip;		
           
			$vArrayTemp['f_device_port'] = $vRow->f_device_port;		
           
			$vArrayTemp['f_device_type'] = $vRow->f_device_type;		
           
			$vArrayTemp['f_connect_type'] = $vRow->f_connect_type;		
           
			$vArrayTemp['f_description'] = $vRow->f_description;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatedevice($pData) {
		$vData = array(
	
		   
           
			'f_device_name'=>$pData['vf_device_name'],					
           
			'f_device_ip'=>$pData['vf_device_ip'],					
           
			'f_device_port'=>$pData['vf_device_port'],					
           
			'f_device_type'=>$pData['vf_device_type'],					
           
			'f_connect_type'=>$pData['vf_connect_type'],					
           
			'f_description'=>$pData['vf_description'],					
           
		);
		$vResult = $this->db->insert('t_device',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fndeviceDelete($pDeldeviceId) {
		
		$vResult = $this->db->where('f_device_id',$pDeldeviceId)->delete('t_device');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fndeviceRow($pdeviceId) {
	
		$this->db->where('f_device_id',$pdeviceId);
		
		$vResult = $this->db->get(t_device)->result();
		$vRow = $vResult[0];
           
           
			$vArrayTemp['f_device_name'] = $vRow->f_device_name;
           
			$vArrayTemp['f_device_ip'] = $vRow->f_device_ip;
           
			$vArrayTemp['f_device_port'] = $vRow->f_device_port;
           
			$vArrayTemp['f_device_type'] = $vRow->f_device_type;
           
			$vArrayTemp['f_connect_type'] = $vRow->f_connect_type;
           
			$vArrayTemp['f_description'] = $vRow->f_description;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatedevice($pdeviceId,$pData) {
		$vData = array(
		
		   
			'f_device_id'=>$pData['vf_device_id'],					
           
			'f_device_name'=>$pData['vf_device_name'],					
           
			'f_device_ip'=>$pData['vf_device_ip'],					
           
			'f_device_port'=>$pData['vf_device_port'],					
           
			'f_device_type'=>$pData['vf_device_type'],					
           
			'f_connect_type'=>$pData['vf_connect_type'],					
           
			'f_description'=>$pData['vf_description'],					
           			
		);
	
		$vResult = $this->db->where('f_device_id',$pdeviceId)->update('t_device',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

