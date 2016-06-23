<?php
class mo_employee extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnemployeeCount($vcityKeyword,$vkecKeyword,$vEmpId) {
		$this->db->select("count(*) as selectCount");
		$this->db->join("t_comp_branch AS b","a.f_comp_branch_id=b.f_branch_id","Left");		

		$this->db->from("t_employee as a");
		
		$vResult = $this->db->get()->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnemployeeData($vcityKeyword,$vkecKeyword,$vstatusKeyword,$vEmpId,$pOffset,$pRows,$pSort,$pOrder) {

		if($vcityKeyword != ''){
		$this->db->where("a.f_city_id",$vcityKeyword);
		}

		if($vkecKeyword != ''){
		$this->db->where("a.f_kec_id",$vkecKeyword);
		}
		if($vstatusKeyword != ''){
		$this->db->where("a.f_status_id",$vstatusKeyword);
		}

		if($vEmpId != ''){
		$this->db->like("a.f_emp_name",$vEmpId);
		}

		//$this->db->join("t_comp_branch AS b","a.f_comp_branch_id=b.f_branch_id","Left");		
		//$this->db->join("t_position AS e","a.f_position_id=e.f_position_id","Left");
		//$this->db->join("t_department AS f","a.f_dept_id=f.f_dept_id","Left");
		//$this->db->join("t_city AS j","a.f_city_id=j.f_city_id","Left");
		//$this->db->join("t_kecamatan AS k","a.f_kec_id=k.f_kec_id","Left");
		$this->db->join("t_status AS d","a.f_status_id=d.f_status_id","Left");
				

		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$this->db->from("t_employee as a");
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):		
//		foreach($vResult->result() as $vRow):
           
			$vArrayTemp['f_emp_id'] = $vRow->f_emp_id;		
           
			$vArrayTemp['f_emp_code'] = $vRow->f_emp_code;		

			$vArrayTemp['f_emp_no'] = $vRow->f_emp_no;		

			$vArrayTemp['f_emp_initial'] = $vRow->f_emp_initial;		
			
			$vArrayTemp['f_emp_name'] = $vRow->f_emp_name;		

			$vArrayTemp['f_status_name'] = $vRow->f_status_name;		

			$vArrayTemp['f_emp_birthplace'] = $vRow->f_emp_birthplace;		

			$vArrayTemp['f_emp_birthdate'] = $vRow->f_emp_birthdate;		
           
			$vArrayTemp['f_emp_gender'] = $vRow->f_emp_gender;		
                      
			$vArrayTemp['f_emp_address1'] = $vRow->f_emp_address1;		
           
			$vArrayTemp['f_emp_rt'] = $vRow->f_emp_rt;		
           
			$vArrayTemp['f_emp_rw'] = $vRow->f_emp_rw;		
           
			$vArrayTemp['f_city_name'] = $vRow->f_city_name;		

			$vArrayTemp['f_kec_name'] = $vRow->f_kec_name;		
                      
			$vArrayTemp['f_emp_home_phone'] = $vRow->f_emp_home_phone;		
           
			$vArrayTemp['f_emp_mobile_phone'] = $vRow->f_emp_mobile_phone;		
           
			$vArrayTemp['f_emp_pin_bb'] = $vRow->f_emp_pin_bb;		
           
			$vArrayTemp['f_emp_email'] = $vRow->f_emp_email;		
           
			$vArrayTemp['f_emp_organisation'] = $vRow->f_emp_organisation;		
			
		  $data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $data_master;                      		
		return $vItems;
	}
	function fnemployeeCountProfile($pempCompBranchKeyword,$pempStatusKeyword,$pempSegmentKeyword,$pempPositionKeyword,$vempGroupAttKeyword,$pEmpId) {
		$this->db->select("count(*) as selectCount");
		$this->db->like(array("a.f_comp_branch_id"=>$pempCompBranchKeyword,"a.f_emp_segment_id"=>$pempSegmentKeyword,"a.f_emp_id"=>$pEmpId,"a.f_status_id"=>$pempStatusKeyword,"a.f_group_att_id"=>$vempGroupAttKeyword,"a.f_position_id"=>$pempPositionKeyword));
		$this->db->join("t_comp_branch AS b","a.f_comp_branch_id=b.f_branch_id","Left");		
		$this->db->join("t_employee_segment AS c","a.f_emp_segment_id=c.f_emp_segment_id","Left");
		$this->db->join("t_status AS d","a.f_status_id=d.f_status_id","Left");
		$this->db->join("t_position AS e","a.f_position_id=e.f_position_id","Left");
				

		$this->db->from("t_employee as a");
		
		$vResult = $this->db->get()->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fnemployeeProfileData($pemployeeId,$pOffset,$pRows,$pSort,$pOrder) {
		$this->db->where(array("a.f_emp_id"=>$pemployeeId));

		$this->db->join("t_comp_branch AS b","a.f_comp_branch_id=b.f_branch_id","Left");		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$this->db->from("t_employee as a");
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_emp_id'] = $vRow->f_emp_id;		
           
			$vArrayTemp['f_emp_code'] = $vRow->f_emp_code;		

			$vArrayTemp['f_emp_no'] = $vRow->f_emp_no;		

			$vArrayTemp['f_emp_initial'] = $vRow->f_emp_initial;		
			
			$vArrayTemp['f_emp_name'] = $vRow->f_emp_name;		

			$vArrayTemp['f_status_name'] = $vRow->f_status_name;		

			$vArrayTemp['f_emp_birthplace'] = $vRow->f_emp_birthplace;		

			$vArrayTemp['f_emp_birthdate'] = $vRow->f_emp_birthdate;		
           
			$vArrayTemp['f_emp_gender'] = $vRow->f_emp_gender;		
                      
			$vArrayTemp['f_emp_address1'] = $vRow->f_emp_address1;		
           
			$vArrayTemp['f_emp_rt'] = $vRow->f_emp_rt;		
           
			$vArrayTemp['f_emp_rw'] = $vRow->f_emp_rw;		
           
			$vArrayTemp['f_city_name'] = $vRow->f_city_name;		

			$vArrayTemp['f_kec_name'] = $vRow->f_kec_name;		
                      
			$vArrayTemp['f_emp_home_phone'] = $vRow->f_emp_home_phone;		
           
			$vArrayTemp['f_emp_mobile_phone'] = $vRow->f_emp_mobile_phone;		
           
			$vArrayTemp['f_emp_pin_bb'] = $vRow->f_emp_pin_bb;		
           
			$vArrayTemp['f_emp_email'] = $vRow->f_emp_email;		
           
			$vArrayTemp['f_emp_organisation'] = $vRow->f_emp_organisation;		
           
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
	
	function fnemployeeDataFilter($pCompBranchCode) {
		
		$this->db->like(array("f_comp_branch_id"=>$pCompBranchCode));
		$this->db->like(array("f_comp_branch_id"=>$pStatusCode));
		
		$vResult = $this->db->get(t_employee)->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['f_emp_id'] = $vRow->f_emp_id;		
           
			$vArrayTemp['f_emp_code'] = $vRow->f_emp_code;		

			$vArrayTemp['f_emp_no'] = $vRow->f_emp_no;		

			$vArrayTemp['f_emp_initial'] = $vRow->f_emp_initial;		
			
			$vArrayTemp['f_emp_name'] = $vRow->f_emp_name;		

			$vArrayTemp['f_status_name'] = $vRow->f_status_name;		

			$vArrayTemp['f_emp_birthplace'] = $vRow->f_emp_birthplace;		

			$vArrayTemp['f_emp_birthdate'] = $vRow->f_emp_birthdate;		
           
			$vArrayTemp['f_emp_gender'] = $vRow->f_emp_gender;		
                      
			$vArrayTemp['f_emp_address1'] = $vRow->f_emp_address1;		
           
			$vArrayTemp['f_emp_rt'] = $vRow->f_emp_rt;		
           
			$vArrayTemp['f_emp_rw'] = $vRow->f_emp_rw;		
           
			$vArrayTemp['f_city_name'] = $vRow->f_city_name;		

			$vArrayTemp['f_kec_name'] = $vRow->f_kec_name;		
                      
			$vArrayTemp['f_emp_home_phone'] = $vRow->f_emp_home_phone;		
           
			$vArrayTemp['f_emp_mobile_phone'] = $vRow->f_emp_mobile_phone;		
           
			$vArrayTemp['f_emp_pin_bb'] = $vRow->f_emp_pin_bb;		
           
			$vArrayTemp['f_emp_email'] = $vRow->f_emp_email;		
           
			$vArrayTemp['f_emp_organisation'] = $vRow->f_emp_organisation;		
           
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
	}
		
	
	function fnCreateemployee($pData) {
		///====================Employee no================================
		$this->db->where(array("f_branch_id"=>$pData['vf_comp_branch_id']));		
		$vResult_br = $this->db->get(t_comp_branch)->result();
		foreach($vResult_br as $vRow):
		$branch_code=$vRow->f_branch_code;
		endforeach;

		$this->db->select("count(*) as count_emp_branch");		
		$this->db->where(array("f_comp_branch_id"=>$pData['vf_comp_branch_id']));		
		$vResult_count_br = $this->db->get(t_employee)->result();
		foreach($vResult_count_br as $vRow_count_br):
		$count_branch_code1=$vRow_count_br->count_emp_branch + 1;
		endforeach;		

		$this->db->select("count(*) as count_all");
		$vResult_count_all = $this->db->get(t_employee)->result();
		foreach($vResult_count_all as $vRow_count_all):
		$count_all1=$vRow_count_all->count_all + 1;
		endforeach;		
				
		//$sql=mysql_query("select f_branch_code)		
		$emp_date_start_exp=explode("-",$pData['vf_emp_start_date']);
		$emp_year=$emp_date_start_exp[0];						
		$emp_month=$emp_date_start_exp[1];
		
		$count_branch_code2=strlen($count_branch_code1);
				if ($count_branch_code2 > 1){
					$count_branch_code=$count_branch_code1;			
					}						
				else{
					$count_branch_code='0'.$count_branch_code1;					
					}	
		$count_all2=strlen($count_all1);
				if ($count_all2 > 1){
					$count_all=$count_all1;			
					}						
				else{
					$count_all='0'.$count_all1;					
					}
		$Position2=strlen($pData['vf_position_id']);
				if ($count_branch_code2 > 1){
					$PositionId=$pData['vf_position_id'];			
					}						
				else{
					$PositionId='0'.$pData['vf_position_id'];					
					}						
		$emp_year=date('Y-m');
		$emp_no=$emp_year.'.'.$count_all;
		
		//================================================================		

		$this->db->select("count(*) as count_emp_name");		
		$this->db->where(array("f_emp_name"=>$pData['vf_emp_name']));		
		$vResult_count_emp_name = $this->db->get(t_employee)->result();
		foreach($vResult_count_emp_name as $vRow_count_emp_name):
		$count_emp_name=$vRow_count_emp_name->count_emp_name;
		endforeach;		
		if	($count_emp_name > 0)	{
			}
		else{	
		$vData = array(	

			'f_emp_no'=>$emp_no,
			
			'f_emp_initial'=>$pData['vf_emp_initial'],
           
			'f_emp_name'=>$pData['vf_emp_name'],					
           
			'f_emp_gender'=>$pData['vf_emp_gender'],					
           
			'f_status_id'=>$pData['vf_status_id'],					

			'f_emp_birthdate'=>$pData['vf_emp_birthdate'],					

			'f_emp_birthplace'=>$pData['vf_emp_birthplace'],					
           
			'f_emp_address1'=>$pData['vf_emp_address1'],					
           
			'f_emp_rt'=>$pData['vf_emp_rt'],					
           
			'f_emp_rw'=>$pData['vf_emp_rw'],					
           
			'f_city_id'=>$pData['vf_city_id'],					

			'f_kec_id'=>$pData['vf_kec_id'],					
           
           
			'f_emp_home_phone'=>$pData['vf_emp_home_phone'],					
           
			'f_emp_mobile_phone'=>$pData['vf_emp_mobile_phone'],					
           
			'f_emp_pin_bb'=>$pData['vf_emp_pin_bb'],					
           
			'f_emp_email'=>$pData['vf_emp_email'],					
           
			'f_comp_branch_id'=>$pData['vf_comp_branch_id'],					

			'f_dept_id'=>$pData['vf_dept_id'],					

			'f_emp_organisation'=>$pData['vf_emp_organisation'],					
           
		);
		$vResult = $this->db->insert('t_employee',$vData);
		}
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnemployeeDelete($pDelemployeeId) {
		
		$vResult = $this->db->where('f_emp_id',$pDelemployeeId)->delete('t_employee');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnemployeeRow($pemployeeId) {
	
		$this->db->where('f_emp_id',$pemployeeId);
		
		$vResult = $this->db->get(t_employee)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['f_emp_id'] = $vRow->f_emp_id;		
           
			$vArrayTemp['f_emp_code'] = $vRow->f_emp_code;		

			$vArrayTemp['f_emp_no'] = $vRow->f_emp_no;		

			$vArrayTemp['f_emp_initial'] = $vRow->f_emp_initial;		
			
			$vArrayTemp['f_emp_name'] = $vRow->f_emp_name;		

			$vArrayTemp['f_status_id'] = $vRow->f_status_id;		

			$vArrayTemp['f_emp_birthplace'] = $vRow->f_emp_birthplace;		

			$vArrayTemp['f_emp_birthdate'] = $vRow->f_emp_birthdate;		
           
			$vArrayTemp['f_emp_gender'] = $vRow->f_emp_gender;		
                      
			$vArrayTemp['f_emp_address1'] = $vRow->f_emp_address1;		
           
			$vArrayTemp['f_emp_rt'] = $vRow->f_emp_rt;		
           
			$vArrayTemp['f_emp_rw'] = $vRow->f_emp_rw;		
           
			$vArrayTemp['f_city_id'] = $vRow->f_city_id;		

			$vArrayTemp['f_kec_id'] = $vRow->f_kec_id;		
                      
			$vArrayTemp['f_emp_home_phone'] = $vRow->f_emp_home_phone;		
           
			$vArrayTemp['f_emp_mobile_phone'] = $vRow->f_emp_mobile_phone;		
           
			$vArrayTemp['f_emp_pin_bb'] = $vRow->f_emp_pin_bb;		
           
			$vArrayTemp['f_emp_email'] = $vRow->f_emp_email;		
           
			$vArrayTemp['f_emp_organisation'] = $vRow->f_emp_organisation;		
           
           		
				$WorkStartDate = $vRow->f_emp_start_date;
				date_default_timezone_set('Asia/Jakarta');
				$CurDate=date('Y-m-d');
				$selisih = strtotime($CurDate) -  strtotime($WorkStartDate) ;
				$rangeYear = ($selisih/(60*60*24)+1) / 365;		
			$vArrayTemp['f_time_work'] = $rangeYear;
							
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdateemployee($pemployeeId,$pData) {
		$vData = array(
		
  			
			'f_emp_initial'=>$pData['vf_emp_initial'],
           
			'f_emp_name'=>$pData['vf_emp_name'],					
           
			'f_emp_gender'=>$pData['vf_emp_gender'],					
           
			'f_status_id'=>$pData['vf_status_id'],					

			'f_emp_birthdate'=>$pData['vf_emp_birthdate'],					

			'f_emp_birthplace'=>$pData['vf_emp_birthplace'],					
           
			'f_emp_address1'=>$pData['vf_emp_address1'],					
           
			'f_emp_rt'=>$pData['vf_emp_rt'],					
           
			'f_emp_rw'=>$pData['vf_emp_rw'],					
           
			'f_city_id'=>$pData['vf_city_id'],					

			'f_kec_id'=>$pData['vf_kec_id'],					
           
           
			'f_emp_home_phone'=>$pData['vf_emp_home_phone'],					
           
			'f_emp_mobile_phone'=>$pData['vf_emp_mobile_phone'],					
           
			'f_emp_pin_bb'=>$pData['vf_emp_pin_bb'],					
           
			'f_emp_email'=>$pData['vf_emp_email'],					
           
			'f_comp_branch_id'=>$pData['vf_comp_branch_id'],					

			'f_dept_id'=>$pData['vf_dept_id'],					

			'f_emp_organisation'=>$pData['vf_emp_organisation'],					
           			
		);
	
		$vResult = $this->db->where('f_emp_id',$pemployeeId)->update('t_employee',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fnemployeeImportProcess() {
		include_once ( APPPATH."libraries/excel_reader2.php");
		$data = new Spreadsheet_Excel_Reader($_FILES['f_file']['tmp_name']);
	
		$j = -1;
		for ($i=2; $i <= ($data->rowcount($sheet_index=0)); $i++){
		  $j++;
			
           
			$code[$j]= $data->val($i, 2);				
           
			$name[$j]= $data->val($i, 3);				
           
			$gender[$j]= $data->val($i, 4);					
           
			$birthplace[$j]= $data->val($i, 5);						
           
			$datebirth[$j]= $data->val($i, 6);					
           
			$religion[$j]= $data->val($i, 7);						
           
			$marital[$j]= $data->val($i, 8);					
           
			$address1[$j]= $data->val($i, 9);					
           
			$address2[$j]= $data->val($i, 10);					
           
			$address3[$j]= $data->val($i, 11);						
           
			$city_id[$j]= $data->val($i, 12);					
           
			$post_code[$j]= $data->val($i, 13);					
           
			$ext_phone[$j]= $data->val($i, 14);					
           
			$office_phone[$j]= $data->val($i, 15);						
           
			$home_phone[$j]= $data->val($i, 16);						
           
			$mobile_phone[$j]= $data->val($i, 17);					
           
			$pin_bb[$j]= $data->val($i, 18);						
           
			$email[$j]= $data->val($i, 19);					
           
			$website[$j]= $data->val($i, 20);					
           
			$acc_bank[$j]= $data->val($i, 21);					
           
			$acc_no[$j]= $data->val($i, 22);						
           
			$acc_name[$j]= $data->val($i, 23);						
           
			$insurance[$j]= $data->val($i, 24);						
           
			$insurance_no[$j]= $data->val($i, 25);						
           
			$active[$j]= $data->val($i, 26);					
           
			$branch_id[$j]= $data->val($i, 27);					
           
			$segment_id[$j]= $data->val($i, 28);						
           
			$position_id[$j]= $data->val($i, 29);					
           
			$class_id[$j]= $data->val($i, 30);						
           
			$status_id[$j]= $data->val($i, 31);					
           
			$group_att_id[$j]= $data->val($i, 32);						
           
			$start_date[$j]= $data->val($i, 33);						
           
			$out_date[$j]= $data->val($i, 34);						
           
			$reason_out[$j]= $data->val($i, 35);						
		  
				$vData = array(				
           
			'f_emp_code'=>$code[$j],					
           
			'f_emp_name'=>$name[$j],					
           
			'f_emp_gender'=>$gender[$j],					
           
			'f_emp_birthplace'=>$birthplace[$j],						
           
			'f_emp_birthdate'=>$datebirth[$j],					
           
			'f_emp_religion'=>$religion[$j],						
           
			'f_emp_marital_status'=>$marital[$j],					
           
			'f_emp_address1'=>$address1[$j],					
           
			'f_emp_address2'=>$address2[$j],						
           
			'f_emp_address3'=>$address3[$j],						
           
			'f_city_id'=>$city_id[$j],					
           
			'f_emp_post_code'=>$post_code[$j],					
           
			'f_emp_ext_phone'=>$ext_phone[$j],					
           
			'f_emp_office_phone'=>$office_phone[$j],						
           
			'f_emp_home_phone'=>$home_phone[$j],						
           
			'f_emp_mobile_phone'=>$mobile_phone[$j],					
           
			'f_emp_pin_bb'=>$pin_bb[$j],						
           
			'f_emp_email'=>$email[$j],					
           
			'f_emp_website'=>$website[$j],					
           
			'f_emp_acc_bank'=>$acc_bank[$j],					
           
			'f_emp_acc_no'=>$acc_no[$j],						
           
			'f_emp_acc_name'=>$acc_name[$j],						
           
			'f_emp_insurance'=>$insurance[$j],						
           
			'f_emp_insurance_no'=>$insurance_no[$j],						
           
			'f_emp_active'=>$active[$j],					
           
			'f_comp_branch_id'=>$branch_id[$j],						
           
			'f_emp_segment_id'=>$segment_id[$j],						
           
			'f_position_id'=>$position_id[$j],					
           
			'f_class_id'=>$class_id[$j],						
           
			'f_status_id'=>$status_id[$j],					
           
			'f_group_att_id'=>$group_att_id[$j],						
           
			'f_emp_start_date'=>$start_date[$j],						
           
			'f_emp_out_date'=>$out_date[$j],						
           
			'f_emp_reason_out'=>$reason_out[$j],					        
				);	
		$vResult = $this->db->insert('t_employee',$vData);				  
		}
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnemployeeUploadProcess($pemployeeId,$pdatas) {
		$vData = array(
		
			'f_emp_photo'=>$pdatas['vf_emp_photo'],					           				          			
		);
	
		$vResult = $this->db->where('f_emp_id',$pemployeeId)->update('t_employee',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnemployeeComboData($pVarQuery) {
	//	$this->db->select('f_emp_id,f_emp_name');

		//$this->db->join("t_position AS b","a.f_position_id=b.f_position_id","left");	
		$this->db->like(array("f_emp_name"=>$pVarQuery));		
		$this->db->from('t_employee as a');				
		$this->db->limit('100');				
		
		$vResult = $this->db->get()->result();
		$vemployeeDataJson = array();
		foreach($vResult as $vRow):
			array_push($vemployeeDataJson,$vRow);
		endforeach;
		echo json_encode($vemployeeDataJson);
	}			
//==========Print Report=======	

	function fnemployeeDataPrint($vcityKeyword,$vkecKeyword,$vstatusKeyword) {

		if($vcityKeyword > 0){
		$this->db->where("a.f_city_id",$vcityKeyword);
		}

		if($vkecKeyword > 0){
		$this->db->where("a.f_kec_id",$vkecKeyword);
		}
		if($vstatusKeyword != ''){
		$this->db->where("a.f_status_id",$vstatusKeyword);
		}

	
		$this->db->join("t_comp_branch AS b","a.f_comp_branch_id=b.f_branch_id","Left");		
		$this->db->join("t_position AS e","a.f_position_id=e.f_position_id","Left");
		$this->db->join("t_department AS f","a.f_dept_id=f.f_dept_id","Left");
		$this->db->join("t_city AS j","a.f_city_id=j.f_city_id","Left");
		$this->db->join("t_kecamatan AS k","a.f_kec_id=k.f_kec_id","Left");
		$this->db->join("t_status AS d","a.f_status_id=d.f_status_id","Left");

		$this->db->from("t_employee as a");
		
		$vResult = $this->db->get()->result();
		
		foreach($vResult as $vRow):		
			
		  $data_master[] = $vRow;           	
			
		endforeach;
		return $data_master;                      		

	}
	
}
?>

