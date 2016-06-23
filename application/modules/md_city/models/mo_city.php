<?php
class mo_city extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fncityCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_city)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fncityData($pcityKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		$vcityKeyword=$pcityKeyword;
		$this->db->select("f_city_id,f_city_name,b.f_province_id,b.f_province_name");  
		$this->db->from("t_city AS a");
		$this->db->join("t_province AS b","a.f_province_id=b.f_province_id");
		$this->db->like(array("f_city_name"=>$pcityKeyword));

 		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_city_id'] = $vRow->f_city_id;		
           
			$vArrayTemp['f_city_name'] = $vRow->f_city_name;		
           
			$vArrayTemp['f_province_id'] = $vRow->f_province_name;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	function fnProvinceComboData($pVarQuery) {
		$this->db->select('f_province_id,f_province_name');
		$vResult = $this->db->get('t_province')->result();
		$vProvinceDataJson = array();
		foreach($vResult as $vRow):
			array_push($vProvinceDataJson,$vRow);
		endforeach;
		echo json_encode($vProvinceDataJson);
	}
	function fncityComboData($pVarQuery) {
		$this->db->select('f_city_id,f_city_name');
		$vResult = $this->db->get('t_city')->result();
		$vcityDataJson = array();
		foreach($vResult as $vRow):
			array_push($vcityDataJson,$vRow);
		endforeach;
		echo json_encode($vcityDataJson);
	}

	function fnCreatecity($pData) {
		$vData = array(
			'f_city_name'=>$pData['vf_city_name'],					
           
			'f_province_id'=>$pData['vf_province_id'],					
           
		);
		$vResult = $this->db->insert('t_city',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncityDelete($pDelcityId) {
		
		$vResult = $this->db->where('f_city_id',$pDelcityId)->delete('t_city');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncityRow($pcityId) {
	
		$this->db->where('f_city_id',$pcityId);
		
		$vResult = $this->db->get(t_city)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['f_city_id'] = $vRow->f_city_id;
           
			$vArrayTemp['f_city_name'] = $vRow->f_city_name;
           
			$vArrayTemp['f_province_id'] = $vRow->f_province_id;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatecity($pcityId,$pData) {
		$vData = array(
				
           
			'f_city_name'=>$pData['vf_city_name'],					
           
			'f_province_id'=>$pData['vf_province_id'],					
           			
		);
		$vResult = $this->db->where('f_city_id',$pcityId)->update('t_city',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	

	function fncityImportProcess() {
		include_once ( APPPATH."libraries/excel_reader2.php");
		$data = new Spreadsheet_Excel_Reader($_FILES['f_file']['tmp_name']);
	
		$j = -1;
		for ($i=2; $i <= ($data->rowcount($sheet_index=0)); $i++){
		  $j++;
		  $name[$j]   = $data->val($i, 1);
		  $province[$j]    = $data->val($i, 2);
				$vData = array(
				'f_city_name'=>$name[$j],					           
				'f_province_id'=>$province[$j],					        
				);	
		$vResult = $this->db->insert('t_city',$vData);				  
		}
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}	
	
}
?>

