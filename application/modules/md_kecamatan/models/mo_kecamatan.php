<?php
class mo_kecamatan extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnkecamatanCount() {
		$this->db->select("count(*) as selectCount");
		$vResult = $this->db->get(t_kecamatan)->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnkecamatanData($pkecamatanKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		$vkecamatanKeyword=$pkecamatanKeyword;
		$this->db->select("f_kec_id,f_kec_name,b.f_city_id,b.f_city_name");  
		$this->db->from("t_kecamatan AS a");
		$this->db->join("t_city AS b","a.f_city_id=b.f_city_id","Left");
		$this->db->like(array("f_kec_name"=>$pkecamatanKeyword));

 		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_kec_id'] = $vRow->f_kec_id;		
           
			$vArrayTemp['f_kec_name'] = $vRow->f_kec_name;		
           
			$vArrayTemp['f_city_id'] = $vRow->f_city_name;		
           	
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
	function fnkecamatanComboData($pVarQuery) {
		$this->db->select('f_kec_id,f_kec_name');
		$vResult = $this->db->get('t_kecamatan')->result();
		$vkecamatanDataJson = array();
		foreach($vResult as $vRow):
			array_push($vkecamatanDataJson,$vRow);
		endforeach;
		echo json_encode($vkecamatanDataJson);
	}
	function fnkecamatanComboData2($CityId) {
		$this->db->where('f_city_id',$CityId);
		$this->db->select('f_kec_id,f_kec_name');
		$vResult = $this->db->get('t_kecamatan')->result();
		$vkecamatanDataJson = array();
		foreach($vResult as $vRow):
			array_push($vkecamatanDataJson,$vRow);
		endforeach;
		echo json_encode($vkecamatanDataJson);
	}

	function fnCreatekecamatan($pData) {
		$vData = array(
			'f_kec_name'=>$pData['vf_kec_name'],					
           
			'f_city_id'=>$pData['vf_city_id'],					
           
		);
		$vResult = $this->db->insert('t_kecamatan',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnkecamatanDelete($pDelkecamatanId) {
		
		$vResult = $this->db->where('f_kec_id',$pDelkecamatanId)->delete('t_kecamatan');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnkecamatanRow($pkecamatanId) {
	
		$this->db->where('f_kec_id',$pkecamatanId);
		
		$vResult = $this->db->get(t_kecamatan)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['f_kec_id'] = $vRow->f_kec_id;
           
			$vArrayTemp['f_kec_name'] = $vRow->f_kec_name;
           
			$vArrayTemp['f_city_id'] = $vRow->f_city_id;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatekecamatan($pkecamatanId,$pData) {
		$vData = array(
				
           
			'f_kec_name'=>$pData['vf_kec_name'],					
           
			'f_city_id'=>$pData['vf_city_id'],					
           			
		);
		$vResult = $this->db->where('f_kec_id',$pkecamatanId)->update('t_kecamatan',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	

	function fnkecamatanImportProcess() {
		include_once ( APPPATH."libraries/excel_reader2.php");
		$data = new Spreadsheet_Excel_Reader($_FILES['f_file']['tmp_name']);
	
		$j = -1;
		for ($i=2; $i <= ($data->rowcount($sheet_index=0)); $i++){
		  $j++;
		  $name[$j]   = $data->val($i, 1);
		  $province[$j]    = $data->val($i, 2);
				$vData = array(
				'f_kec_name'=>$name[$j],					           
				'f_province_id'=>$province[$j],					        
				);	
		$vResult = $this->db->insert('t_kecamatan',$vData);				  
		}
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}	
	
}
?>

