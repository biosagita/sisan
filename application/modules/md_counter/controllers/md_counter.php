<?php
class md_counter extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_counter');
	}
	function index() {
		$this->fncounter();
	}
	function fncounter()	{
		$this->load->view('vw_counter');
	}
	// ======================================== 'Datagrid User Section'
	function fnqueueListData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vcounterKeyword=$this->input->post('counterKeyword');
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
		
		$vSort='id_transaksi';
		
		}
		if(!$vOrder) {
			$vOrder='ASC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_counter->fnqueueListCount($vcounterKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_counter->fnqueueListData($vcounterKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnskipListData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vcounterKeyword=$this->input->post('counterKeyword');
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
		
		$vSort='id_transaksi';
		
		}
		if(!$vOrder) {
			$vOrder='ASC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_counter->fnskipListCount($vcounterKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_counter->fnskipListData($vcounterKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	
	function fnfinishListData() {
		$vPage=$this->input->post('page');
		$vRows=$this->input->post('rows');
		$vcounterKeyword=$this->input->post('counterKeyword');
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
		
		$vSort='id_transaksi';
		
		}
		if(!$vOrder) {
			$vOrder='DESC';
		}
		$vOffset=($vPage-1)*$vRows;
		$vResult=array();
		$vRs=$this->mo_counter->fnfinishListCount($vcounterKeyword);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_counter->fnfinishListData($vcounterKeyword,$vOffset,$vRows,$vSort,$vOrder);
		echo json_encode($vResult);
	}	

	function fnGoToNext() {
		$ticket_number = $_POST['ticket_number'];
		$this->mo_counter->fnGoToNext($ticket_number);
	}

	function fnNext() {
		$vIdTransaksi = intval($_POST['Id']);
		$this->mo_counter->fnNext($vIdTransaksi);
	}

	function fnFinish() {
		$result = array(
			'success' 	=> true,
		);
		$this->mo_counter->fnFinish();
		echo json_encode($result);
	}

	function fnRecall() {
	$this->mo_counter->fnRecall();
	}
	function fnSkip() {
		$result = array(
			'success' 	=> true,
		);
		$this->mo_counter->fnSkip();
		echo json_encode($result);
	}
	function fnUndo() {
		$result = array(
			'success' 	=> true,
		);
		$vIdTransaksi = intval($_POST['Id']);
		$this->mo_counter->fnUndo($vIdTransaksi);
		echo json_encode($result);
	}

	function fnRegVisitor($IdTransaksi) {
		$vData['Id_Transaksi']=$IdTransaksi;
		$this->load->view('reg_visitor_main',$vData);
	}
	function fnCreateRegVisitor() {
		$vData = array(         		
			'vIdTransaksi'=>$this->input->post('id_transaksi'),       				
			'vNamaVisitor'=>$this->input->post('f_nama_visitor'),       				
			'vNoKTP'=>$this->input->post('f_no_ktp'),       				
			'vNoHP'=>$this->input->post('f_no_hp'),       							
		);
				
	$this->mo_counter->fnCreateRegVisitor($vData);
	}

	function fnForward() {
		$result = array(
			'success' 	=> true,
		);

		$id_layanan = $_POST['id_layanan'];
		$id_group_layanan = $_POST['id_group_layanan'];

		$this->mo_counter->fnforward($id_layanan, $id_group_layanan);
		echo json_encode($result);
	}
		
	/*
	function fnForward($vIdTransaksi,$vNoTiket) {
		$vData['vIdTransaksi'] = $vIdTransaksi;
		$vData['vNoTiket'] = $vNoTiket;
		
		$this->load->view('forward_main',$vData);
	}
	
	function fnforward1() {	
		$this->mo_counter->fnforward1();
	}		
	function fnforward2() {	
		$this->mo_counter->fnforward2();
	}		
	function fnforward3() {	
		$this->mo_counter->fnforward3();
	}		
	function fnforward4() {	
		$this->mo_counter->fnforward4();
	}		
	function fnforward5() {	
		$this->mo_counter->fnforward5();
	}		
	function fnforward6() {	
		$this->mo_counter->fnforward6();
	}		
	*/
	
	function fncounterAdd() {
		$this->load->view('counter_add_main');
	}
	
	function fncounterCreate() {
		$vData = array(
         		
			'vid'=>$this->input->post('id'),
       				
		);
		
		
	$this->mo_counter->fnCreatecounter($vData);
	}
	function fncounterEdit($pcounterId) {
		$vData['vcounterId'] = $pcounterId;
		$this->load->view('counter_add_main',$vData);
	}
	function fncounterRow($pcounterId) {
		$this->mo_counter->fncounterRow($pcounterId);
	}
	
	function fncounterDelete() {
		$vDelcounterId = intval($_POST['Id']);
		$this->mo_counter->fncounterDelete($vDelcounterId);
	}
	
	function fncounterUpdate($pcounterId) {
		$vData = array(
		
         		
			'vid'=>$this->input->post('id'),
       		

		);
		$this->mo_counter->fnUpdatecounter($pcounterId,$vData);
	}
	
	function show_image($nama_file = '') {
		if(empty($nama_file)) return 0;

		ob_get_clean();
		$image = $this->mo_counter->get_setting_direktri_transaksi() . $nama_file;
		$info = getimagesize($image);
		header('Content-Type: '.$info['mime']);
		echo file_get_contents($image);
		exit();
	}
}
?>

	   