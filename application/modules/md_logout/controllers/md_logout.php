<?php
class md_logout extends MX_Controller {
	public function __construct() {
		parent::__construct();
	}
	function index() {
		$this->Logout();
	}
	function logout()	{
		$this->load->view('vw_logout');
	}
}
?>