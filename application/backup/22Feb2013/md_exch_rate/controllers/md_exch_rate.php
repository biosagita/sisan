<?php
class md_exch_rate extends MX_Controller {
	public function __construct() {
		parent::__construct();
	}
	function index() {
		$this->ExchRate();
	}
	function ExchRate()	{
		$this->load->view('vw_exch_rate');
	}
}
?>