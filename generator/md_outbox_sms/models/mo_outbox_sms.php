<?php
class mo_outbox_sms extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnoutbox_smsCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_outbox_sms)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnoutbox_smsData($poutbox_smsKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("f_outbox_id"=>$poutbox_smsKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(t_outbox_sms)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_outbox_id'] = $vRow->f_outbox_id;		
           
			$vArrayTemp['f_outbox_date'] = $vRow->f_outbox_date;		
           
			$vArrayTemp['f_destination_number'] = $vRow->f_destination_number;		
           
			$vArrayTemp['f_outbox_message'] = $vRow->f_outbox_message;		
           
			$vArrayTemp['f_com_id'] = $vRow->f_com_id;		
           
			$vArrayTemp['f_outbox_status'] = $vRow->f_outbox_status;		
           
			$vArrayTemp['f_outbox_remark'] = $vRow->f_outbox_remark;		
           
			$vArrayTemp['f_outbox_send_date'] = $vRow->f_outbox_send_date;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreateoutbox_sms($pData) {
		$vData = array(
	
		   
			'f_outbox_id'=>$pData['vf_outbox_id'],					
           
			'f_outbox_date'=>$pData['vf_outbox_date'],					
           
			'f_destination_number'=>$pData['vf_destination_number'],					
           
			'f_outbox_message'=>$pData['vf_outbox_message'],					
           
			'f_com_id'=>$pData['vf_com_id'],					
           
			'f_outbox_status'=>$pData['vf_outbox_status'],					
           
			'f_outbox_remark'=>$pData['vf_outbox_remark'],					
           
			'f_outbox_send_date'=>$pData['vf_outbox_send_date'],					
           
		);
		$vResult = $this->db->insert('t_outbox_sms',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnoutbox_smsDelete($pDeloutbox_smsId) {
		
		$vResult = $this->db->where('f_outbox_id',$pDeloutbox_smsId)->delete('t_outbox_sms');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnoutbox_smsRow($poutbox_smsId) {
	
		$this->db->where('f_outbox_id',$poutbox_smsId);
		
		$vResult = $this->db->get(t_outbox_sms)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['f_outbox_id'] = $vRow->f_outbox_id;
           
			$vArrayTemp['f_outbox_date'] = $vRow->f_outbox_date;
           
			$vArrayTemp['f_destination_number'] = $vRow->f_destination_number;
           
			$vArrayTemp['f_outbox_message'] = $vRow->f_outbox_message;
           
			$vArrayTemp['f_com_id'] = $vRow->f_com_id;
           
			$vArrayTemp['f_outbox_status'] = $vRow->f_outbox_status;
           
			$vArrayTemp['f_outbox_remark'] = $vRow->f_outbox_remark;
           
			$vArrayTemp['f_outbox_send_date'] = $vRow->f_outbox_send_date;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdateoutbox_sms($poutbox_smsId,$pData) {
		$vData = array(
		
		   
			'f_outbox_id'=>$pData['vf_outbox_id'],					
           
			'f_outbox_date'=>$pData['vf_outbox_date'],					
           
			'f_destination_number'=>$pData['vf_destination_number'],					
           
			'f_outbox_message'=>$pData['vf_outbox_message'],					
           
			'f_com_id'=>$pData['vf_com_id'],					
           
			'f_outbox_status'=>$pData['vf_outbox_status'],					
           
			'f_outbox_remark'=>$pData['vf_outbox_remark'],					
           
			'f_outbox_send_date'=>$pData['vf_outbox_send_date'],					
           			
		);
	
		$vResult = $this->db->where('f_outbox_id',$poutbox_smsId)->update('t_outbox_sms',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

