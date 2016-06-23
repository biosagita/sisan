<?php
class mo_laporan extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fntransaksiCount() {
		$this->db->select("count(*) as selectCount");

		$this->db->from("transaksi as a");
		
		$vResult = $this->db->get()->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
	}
	
	function fntransaksiData($vStartKeyword,$vFinishKeyword,$vOffset,$vRows,$vSort,$vOrder) {

		$start=str_replace('-','',$vStartKeyword);
		$finish=str_replace('-','',$vFinishKeyword);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");
				
		$this->db->where('tanggal_transaksi >=', $start );
		$this->db->where('tanggal_transaksi <=', $finish);

		$this->db->order_by($vSort,$vOrder);
		$this->db->limit($vRows,$vOffset);
		$this->db->from("transaksi as a");
		
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();

		foreach($vResult as $vRow):		

             
			$vArrayTemp['id_transaksi'] = $vRow->id_transaksi;		
           
			$vArrayTemp['tanggal_transaksi'] = tanggal_transaksi;		

			$vArrayTemp['waktu_ambil'] = $vRow->waktu_ambil;		

			$vArrayTemp['waktu_panggil'] = $vRow->waktu_panggil;		
			
			$vArrayTemp['no_ticket'] = $vRow->no_ticket;		

			$vArrayTemp['id_layanan'] = $vRow->nama_layanan;		

			$vArrayTemp['id_group_layanan'] = $vRow->nama_group_layanan;		

			$vArrayTemp['status_transaksi'] = $vRow->status_transaksi;		
           
			$vArrayTemp['id_user'] = $vRow->username;		
                      
			$vArrayTemp['id_loket'] = $vRow->nama_loket;		
           
		  $data_master[] = $vRow;           	
			
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $data_master;                      		
		return $vItems;
	}
//==========Print Report=======	

	function fntransaksiDataPrint($vStartKeyword,$vFinishKeyword) {

		$start=str_replace('-','',$vStartKeyword);
		$finish=str_replace('-','',$vFinishKeyword);

		$this->db->join("layanan AS b","a.id_layanan=b.id_layanan","Left");
		$this->db->join("group_layanan AS c","a.id_group_layanan=c.id_group_layanan","Left");
		$this->db->join("t_user AS d","a.id_user=d.f_user_id","Left");
		$this->db->join("loket AS e","a.id_loket=e.id_loket","Left");
				
		$this->db->where('tanggal_transaksi >=', $start );
		$this->db->where('tanggal_transaksi <=', $finish);


		$this->db->from("transaksi as a");
		
		$vResult = $this->db->get()->result();
		
		foreach($vResult as $vRow):		
			
		  $data_master[] = $vRow;           	
			
		endforeach;
		return $data_master;                      		

	}
	
}
?>

