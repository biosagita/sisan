<?php
class md_client extends MX_Controller {
	public function __construct() {
		parent::__construct();
	}
	function index() {
		$this->Client();
	}
	function Client()	{
		$this->load->view('vw_client');
	}
}
?>