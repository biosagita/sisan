<?php
class md_app_mod extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('mo_app_mod');
	}
	function index() {
		$this->fnAppMod();
	}
	function fnAppMod()	{
		$this->load->view('vw_app_mod');
	}
	function fnGrpModData() {
		$vSort='f_grpmod_id';
		$vOrder='ASC';
		$vResult=array();
		$vRs=$this->mo_app_mod->fnGrpModCount();
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_app_mod->fnGrpModData($vSort,$vOrder);
		echo json_encode($vResult);
	}
	function fnGrpModAdd() {
		$this->load->view('grpmod_add_main');
	}
	function fnGrpModEdit($pGroupMod) {
		$vData['vGroupMod'] = $pGroupMod;
		$this->load->view('grpmod_add_main',$vData);
	}
	function fnGrpModRow($pId) {
		$this->mo_app_mod->fnGrpModRow($pId);
	}
	function fnGroupAppl() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_app_mod->fnGroupApplData($vVarQuery);
	}
	function fnGrpModCreate() {
		$vData = array(
			'vCode'=>$this->input->post('fldCode'),
			'vAppl'=>$this->input->post('fldAppl'),
			'vName'=>$this->input->post('fldName'),
			'vDesc'=>$this->input->post('fldDesc'),
			'vActv'=>'1'
		);
		$this->mo_app_mod->fnCreateGrpMod($vData);
	}
	function fnGrpModUpdate($pId) {
		$vData = array(
			'vName'=>$this->input->post('fldName'),
			'vAppl'=>$this->input->post('fldAppl'),
			'vDesc'=>$this->input->post('fldDesc')
		);
		$this->mo_app_mod->fnUpdateGrpMod($pId,$vData);
	}
	function fnGrpModDelete() {
		$vDelGrpModId = intval($_POST['Id']);
		$this->mo_app_mod->fnDeleteGrpMod($vDelGrpModId);
	}
	function fnActionData() {
		$vSort='f_action_id';
		$vOrder='ASC';
		$vResult=array();
		$vRs=$this->mo_app_mod->fnActionCount();
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_app_mod->fnActionData($vSort,$vOrder);
		echo json_encode($vResult);
	}
	function fnActionAdd() {
		$this->load->view('action_add_main');
	}
	function fnActionEdit($pAction) {
		$vData['vAction'] = $pAction;
		$this->load->view('action_add_main',$vData);
	}
	function fnActionRow($pId) {
		$this->mo_app_mod->fnActionRow($pId);
	}
	function fnActionCreate() {
		$vData = array(
			'vCode'=>$this->input->post('fldCode'),
			'vName'=>$this->input->post('fldName'),
			'vDesc'=>$this->input->post('fldDesc')
		);
		$this->mo_app_mod->fnCreateAction($vData);
	}
	function fnActionUpdate($pId) {
		$vData = array(
			'vName'=>$this->input->post('fldName'),
			'vDesc'=>$this->input->post('fldDesc')
		);
		$this->mo_app_mod->fnUpdateAction($pId,$vData);
	}
	function fnActionDelete() {
		$vDelActionId = intval($_POST['Id']);
		$this->mo_app_mod->fnDeleteAction($vDelActionId);
	}
	function fnApplData() {
		$vSort='f_app_id';
		$vOrder='ASC';
		$vResult=array();
		$vRs=$this->mo_app_mod->fnApplCount();
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_app_mod->fnApplData($vSort,$vOrder);
		echo json_encode($vResult);
	}
	function fnApplAdd() {
		$this->load->view('appl_add_main');
	}
	function fnApplEdit($pAppl) {
		$vData['vAppl'] = $pAppl;
		$this->load->view('appl_add_main',$vData);
	}
	function fnApplRow($pId) {
		$this->mo_app_mod->fnApplRow($pId);
	}
	function fnApplCreate() {
		$vData = array(
			'vId'=>$this->input->post('fldId'),
			'vCode'=>$this->input->post('fldCode'),
			'vName'=>$this->input->post('fldName'),
			'vDesc'=>$this->input->post('fldDesc'),
			'vUrl'=>$this->input->post('fldUrl'),
			'vPath'=>$this->input->post('fldPath'),
			'vActv'=>'1'
		);
		$this->mo_app_mod->fnCreateAppl($vData);
	}
	function fnApplUpdate($pId) {
		$vData = array(
			'vId'=>$this->input->post('fldId'),
			'vName'=>$this->input->post('fldName'),
			'vDesc'=>$this->input->post('fldDesc'),
			'vUrl'=>$this->input->post('fldUrl'),
			'vPath'=>$this->input->post('fldPath')
		);
		$this->mo_app_mod->fnUpdateAppl($pId,$vData);
	}
	function fnApplDelete() {
		$vDelApplId = intval($_POST['Id']);
		$this->mo_app_mod->fnDeleteAppl($vDelApplId);
	}
	function fnModulesData() {
		$vApplId=1;
		$vResult=array();
		$vRs=$this->mo_app_mod->fnModulesCount($vApplId);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_app_mod->fnModulesData($vApplId);
		echo json_encode($vResult);
	}
	function fnModulesData2($pApplId) {
		$vApplId=$pApplId;
		if(!$vApplId) {
			$vApplId=1;
		}
		$vResult=array();
		$vRs=$this->mo_app_mod->fnModulesCount($vApplId);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_app_mod->fnModulesData($vApplId);
		echo json_encode($vResult);
	}
	function fnModulesAdd() {
		$this->load->view('mods_add_main');
	}
	function fnModulesEdit($pModules) {
		$vData['vModules'] = $pModules;
		$this->load->view('mods_add_main',$vData);
	}
	function fnModsApplData() {
		$vVarQuery = $this->input->post('q');
		if(!$vVarQuery) {
			$vVarQuery='';
		}
		$this->mo_app_mod->fnModsApplData($vVarQuery);
	}
	function fnModsGroupData($pAppId) {
		$this->mo_app_mod->fnModsGroupData($pAppId);
	}
	function fnModsActvData() {
		$vActv = array(array('f_active_val'=>'0','f_active_text'=>'INACTIVE'),array('f_active_val'=>'1','f_active_text'=>'ACTIVE'));
		echo json_encode($vActv);
	}
	function fnModulesRow($pId) {
		$this->mo_app_mod->fnModulesRow($pId);
	}
	function fnModulesCreate() {
		$vData = array(
			'vCode'=>$this->input->post('fldCode'),
			'vName'=>$this->input->post('fldName'),
			'vDesc'=>$this->input->post('fldDesc'),
			'vAppl'=>$this->input->post('fldAppl'),
			'vGrpMod'=>$this->input->post('fldGrpMod'),
			'vActive'=>$this->input->post('fldActive')
		);
		$this->mo_app_mod->fnCreateModules($vData);
	}
	function fnModulesUpdate($pId) { // progress
		$vData = array(
			'vName'=>$this->input->post('fldName'),
			'vDesc'=>$this->input->post('fldDesc'),
			'vAppl'=>$this->input->post('fldAppl'),
			'vGrpMod'=>$this->input->post('fldGrpMod'),
			'vActive'=>$this->input->post('fldActive')
		);
		$this->mo_app_mod->fnUpdateModules($pId,$vData);
	}
	function fnModulesDelete() {
		$vDelApplId = intval($_POST['Id']);
		$this->mo_app_mod->fnDeleteModules($vDelApplId);
	}
	function fnModuleActionData($pModuleId) {
		$vModuleId=$pModuleId;
		if(!$vModuleId) {
			$vModuleId=35;
		}
		$vSort='f_action_id';
		$vOrder='ASC';
		$vResult=array();
		$vRs=$this->mo_app_mod->fnModuleActionCount($pModuleId);
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_app_mod->fnModuleActionData($pModuleId,$vSort,$vOrder);
		echo json_encode($vResult);
	}
	function fnModuleActionChoose($pModId) {
		$vData['vChoosenMod'] = $pModId;
		$this->load->view('mact_add_main',$vData);
	}
	function fnActionDataChoose($pModId) {
		$vSort='f_action_id';
		$vOrder='ASC';
		$vResult=array();
		$vRs=$this->mo_app_mod->fnActionCount();
		$vResult["total"]=$vRs->selectCount;
		$vResult["rows"]=$this->mo_app_mod->fnActionDataChoose($pModId,$vSort,$vOrder);
		echo json_encode($vResult);
	}
	function fnSaveModAct($pChoosenMod,$pActions) {
		$vActions = explode("_",$pActions);
		$this->mo_app_mod->fnSaveModAct($pChoosenMod,$vActions);
	}
	function fnCekAppl($pText) {
		$cekAppl = $this->mo_app_mod->fnCekAppl($pText);
		$vAppl = $cekAppl->f_app_code;
		$vOutput = '{"appl":"'.$vAppl.'"}';
		echo $vOutput;
	}
	function fnUpModSort($pModId,$pModGroup,$pModSort) {
		$vModGroup = str_replace('G','',$pModGroup);
		$this->mo_app_mod->fnUpModSort($pModId,$vModGroup,$pModSort);
	}
	function fnDownModSort($pModId,$pModGroup,$pModSort) {
		$vModGroup = str_replace('G','',$pModGroup);
		$this->mo_app_mod->fnDownModSort($pModId,$vModGroup,$pModSort);
	}
}
?>