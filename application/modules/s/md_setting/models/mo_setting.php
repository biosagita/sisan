<?php
class mo_setting extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnsettingCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(setting)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnsettingData($psettingKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		
		$this->db->like(array("id_setting"=>$psettingKeyword));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get(setting)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id_setting'] = $vRow->id_setting;		
           
			$vArrayTemp['setting'] = $vRow->setting;		
           
			$vArrayTemp['nilai'] = $vRow->nilai;		
           
			$vArrayTemp['keterangan'] = $vRow->keterangan;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	
	
	function fnCreatesetting($pData) {
		$vData = array(
	
		   
			'id_setting'=>$pData['vid_setting'],					
           
			'setting'=>$pData['vsetting'],					
           
			'nilai'=>$pData['vnilai'],					
           
			'keterangan'=>$pData['vketerangan'],					
           
		);
		$vResult = $this->db->insert('setting',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnsettingDelete($pDelsettingId) {
		
		$vResult = $this->db->where('id_setting',$pDelsettingId)->delete('setting');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnsettingRow_Port_Counter_Display() {
	
		$this->db->where('setting','Port Counter Display');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];
		
			$vArrayTemp['Port_Counter_Display'] = $vRow->nilai;          		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnsettingRow_Baudrate_Counter_Display() {
	
		$this->db->where('setting','Baudrate Counter Display');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];
		
			$vArrayTemp['Baudrate_Counter_Display'] = $vRow->nilai;          		
		
		echo json_encode($vArrayTemp);
		
	}	
	function fnsettingRow_Shutdown() {
	
		$this->db->where('setting','Shutdown');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];
		
			$vArrayTemp['Shutdown'] = $vRow->nilai;          		
		
		echo json_encode($vArrayTemp);
		
	}	
	
	function fnsettingRow_Touch_Screen() {
	
		$this->db->where('setting','Touch Screen');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];
		
			$vArrayTemp['Touch_Screen'] = $vRow->nilai;          		
		
		echo json_encode($vArrayTemp);
		
	}	
	function fnsettingRow_LCD_Display() {
	
		$this->db->where('setting','LCD Display');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];
		
			$vArrayTemp['LCD_Display'] = $vRow->nilai;          		
		
		echo json_encode($vArrayTemp);
		
	}	
	function fnsettingRow_Form_2() {
	
		$this->db->where('setting','Form2');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];
		
			$vArrayTemp['Form_2'] = $vRow->nilai;          		
		
		echo json_encode($vArrayTemp);
		
	}	
	function fnsettingRow_Port_Console() {
	
		$this->db->where('setting','Port Console');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];
		
			$vArrayTemp['Port_Console'] = $vRow->nilai;          		
		
		echo json_encode($vArrayTemp);
		
	}	
	function fnsettingRow_Port_Printer() {
	
		$this->db->where('setting','Port Printer');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];
		
			$vArrayTemp['Port_Printer'] = $vRow->nilai;          		
		
		echo json_encode($vArrayTemp);
		
	}	
	function fnsettingRow_Baudrate_Printer() {
	
		$this->db->where('setting','Baudrate Printer');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];
		
			$vArrayTemp['Baudrate_Printer'] = $vRow->nilai;          		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnsettingRow_Volume_Video() {
	
		$this->db->where('setting','Volume Video');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];
		
			$vArrayTemp['volume_video'] = $vRow->nilai;          		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnsettingRow_Text_Speed() {
	
		$this->db->where('setting','Text Speed');		
		$vResult = $this->db->get(setting)->result();
		$vRow = $vResult[0];
		
			$vArrayTemp['text_speed'] = $vRow->nilai;          		
		
		echo json_encode($vArrayTemp);
		
	}	
	
	function fnUpdatesetting_Port_Counter_Display($psettingId,$pData) {
		$vData = array(		
			'nilai'=>$pData['vPort_Counter_Display'],					
		);	
		$vResult = $this->db->where('setting','Port Counter Display')->update('setting',$vData);	
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnUpdatesetting_Baudrate_Counter_Display($psettingId,$pData) {
		$vData = array(		
			'nilai'=>$pData['vBaudrate_Counter_Display'],					
		);	
		$vResult = $this->db->where('setting','Baudrate Counter Display')->update('setting',$vData);	
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	function fnUpdatesetting_Shutdown($psettingId,$pData) {
		$vData = array(		
			'nilai'=>$pData['vShutdown'],					
		);	
		$vResult = $this->db->where('setting','Shutdown')->update('setting',$vData);	
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnUpdatesetting_Touch_Screen($psettingId,$pData) {
		$vData = array(		
			'nilai'=>$pData['vTouch_Screen'],					
		);	
		$vResult = $this->db->where('setting','Touch Screen')->update('setting',$vData);	
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnUpdatesetting_LCD_Display($psettingId,$pData) {
		$vData = array(		
			'nilai'=>$pData['vLCD_Display'],					
		);	
		$vResult = $this->db->where('setting','LCD Display')->update('setting',$vData);	
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnUpdatesetting_Form_2($psettingId,$pData) {
		$vData = array(		
			'nilai'=>$pData['vForm_2'],					
		);	
		$vResult = $this->db->where('setting','Form2')->update('setting',$vData);	
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnUpdatesetting_Port_Console($psettingId,$pData) {
		$vData = array(		
			'nilai'=>$pData['vPort_Console'],					
		);	
		$vResult = $this->db->where('setting','Port Console')->update('setting',$vData);	
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnUpdatesetting_Port_Printer($psettingId,$pData) {
		$vData = array(		
			'nilai'=>$pData['vPort_Printer'],					
		);	
		$vResult = $this->db->where('setting','Port Printer')->update('setting',$vData);	
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnUpdatesetting_Baudrate_Printer($psettingId,$pData) {
		$vData = array(		
			'nilai'=>$pData['vBaudrate_Printer'],					
		);	
		$vResult = $this->db->where('setting','Baudrate Printer')->update('setting',$vData);	
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnUpdatesetting_Volume_Video($psettingId,$pData) {
		$vData = array(		
			'nilai'=>$pData['vVolume_Video'],					
		);	
		$vResult = $this->db->where('setting','volume video')->update('setting',$vData);	
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnUpdatesetting_Text_Speed($psettingId,$pData) {
		$vData = array(		
			'nilai'=>$pData['vText_Speed'],					
		);	
		$vResult = $this->db->where('setting','Text Speed')->update('setting',$vData);	
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
}
?>

