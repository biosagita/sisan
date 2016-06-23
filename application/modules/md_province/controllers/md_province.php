<?php
class md_province extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_province');
	}
	function index() {
		$this->fnprovince();
	}
	function fnprovince()	{
		$this->load->view('vw_province');
	}
	// ======================================== 'Datagrid User Section'
	function fnprovinceData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vprovinceKeyword=$this->input->post('provinceKeyword');
		$vSort=$this->input->post('sort');
		$vOrder=$this->input->post('order');
		if(!$vPage) {
			$vPage=1;
		}
		if(!$vRows) {
			$vRows=20;
		}
		if(!$vcustomerKeyword) {
			$vcustomerKeyword='';
		}
		if(!$vSort) {
		
		$vSort='f_province_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_province->fnprovinceCount($vprovinceKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_province->fnprovinceData($vprovinceKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnprovinceAdd() {
		$this->load->view('province_add_main');
	}
	
	function fnprovinceCreate() {
		$vData = array(
         		
			'vf_province_id'=>$this->input->post('f_province_id'),
       		
			'vf_province_name'=>$this->input->post('f_province_name'),
       				
		);
		
		
	$this->mo_province->fnCreateprovince($vData);
	}
	function fnprovinceEdit($pprovinceId) {
		$vData['vprovinceId'] = $pprovinceId;
		$this->load->view('province_add_main',$vData);
	}
	function fnprovinceRow($pprovinceId) {
		$this->mo_province->fnprovinceRow($pprovinceId);
	}
	
	function fnprovinceDelete() {
		$vDelprovinceId = intval($_POST['Id']);
		$this->mo_province->fnprovinceDelete($vDelprovinceId);
	}
	
	function fnprovinceUpdate($pprovinceId) {
		$vData = array(
		
         		
			'vf_province_id'=>$this->input->post('f_province_id'),
       		
			'vf_province_name'=>$this->input->post('f_province_name'),
       		

		);
		$this->mo_province->fnUpdateprovince($pprovinceId,$vData);
	}
}
?>

	   