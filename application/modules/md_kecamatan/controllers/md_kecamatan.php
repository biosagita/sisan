<?php
class md_kecamatan extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_kecamatan');
	}
	function index() {
		$this->fnkecamatan();
	}
	function fnkecamatan()	{
		$this->load->view('vw_kecamatan');
	}
	// ======================================== 'Datagrid User Section'
	function fnkecamatanData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vkecamatanKeyword=$this->input->post('kecamatanKeyword');
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
		
		$vSort='f_kec_id';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_kecamatan->fnkecamatanCount($vkecamatanKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_kecamatan->fnkecamatanData($vkecamatanKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnkecamatanAdd() {
		$this->load->view('kecamatan_add_main');
	}
	function fnProvinceComboData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_kecamatan->fnProvinceComboData($vVarQuery);
	}
	function fnkecamatanComboData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_kecamatan->fnkecamatanComboData($vVarQuery);
	}
	function fnkecamatanComboData2($CityId) {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_kecamatan->fnkecamatanComboData2($CityId);
	}

	function fnkecamatanCreate() {
		$vData = array(
			'vf_kec_name'=>$this->input->post('f_kec_name'),
       		
			'vf_city_id'=>$this->input->post('f_city_id'),      				
		);
	$this->mo_kecamatan->fnCreatekecamatan($vData);
	}
	function fnkecamatanEdit($pkecamatanId) {
		$vData['vkecamatanId'] = $pkecamatanId;
		$this->load->view('kecamatan_add_main',$vData);
	}
	function fnkecamatanRow($pkecamatanId) {
		$this->mo_kecamatan->fnkecamatanRow($pkecamatanId);
	}
	
	function fnkecamatanDelete() {
		$vDelkecamatanId = intval($_POST['Id']);
		$this->mo_kecamatan->fnkecamatanDelete($vDelkecamatanId);
	}
	
	function fnkecamatanUpdate($pkecamatanId) {
		$vData = array(
       		
			'vf_kec_name'=>$this->input->post('f_kec_name'),
       		
			'vf_city_id'=>$this->input->post('f_city_id'),
       		

		);
		$this->mo_kecamatan->fnUpdatekecamatan($pkecamatanId,$vData);
	}
	function fnkecamatanImport() {
		$this->load->view('kecamatan_import_main');
	}
	function fnkecamatanImportProcess() {	
				
		$this->mo_kecamatan->fnkecamatanImportProcess();
	}
	
}
?>

	   