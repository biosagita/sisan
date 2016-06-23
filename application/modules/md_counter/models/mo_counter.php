<?php
class mo_counter extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	// ============== Datagrid User's Model Section
	function fnqueueListCount() {
		$Loket= $this->session->userdata('sIdLoket');
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');	
		$currentDate=date('Ymd');

		/*
		$this->db->where(array("status_transaksi"=>"0","tanggal_transaksi"=>$currentDate,"id_group_layanan"=>$GroupLayanan));
		$this->db->select("count(*) as selectCount");
		$this->db->from('transaksi as a');	
		$vResult = $this->db->get()->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
		*/

		$q = 'SELECT pl.id_group_layanan FROM loket lo JOIN prioritas_layanan pl ON (lo.id_group_loket = pl.id_group_loket) WHERE lo.id_loket = ' . $Loket;
		$query = $this->db->query($q);
		$listlayanan = array();
		foreach ($query->result() as $vRow)
		{
		   $listlayanan[] = $vRow->id_group_layanan;
		}

		$q = 'SELECT count(*) as selectCount FROM transaksi tr JOIN group_layanan gl ON (tr.id_group_layanan = gl.id_group_layanan) WHERE tr.id_group_layanan IN ('.join(',', $listlayanan).') AND tr.status_transaksi = 0 AND tr.tanggal_transaksi = "'.$currentDate.'"';
		//echo $q;
		$query = $this->db->query($q);

		foreach ($query->result() as $vRow)
		{
		   return $vRow;
		}

		return false;
	}
	
	function fnqueueListData($pcounterKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		$Loket= $this->session->userdata('sIdLoket');
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');	
		$currentDate=date('Ymd');

		/*
		$this->db->where(array("status_transaksi"=>"0","tanggal_transaksi"=>$currentDate,"a.id_group_layanan"=>$GroupLayanan));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$this->db->join('layanan as b', 'a.id_layanan=b.id_layanan','Left');	
		
		$this->db->from('transaksi as a');	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id'] = $vRow->id_transaksi;		
			$vArrayTemp['type'] = $vRow->nama_layanan;		
			$vArrayTemp['queue_no'] = $vRow->no_ticket;		
			$vArrayTemp['time'] = $vRow->waktu_ambil;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		*/
		
		$vArrayTemp = array();
		$vItems = array();

		$q = 'SELECT pl.id_group_layanan, pl.id_group_loket FROM loket lo JOIN prioritas_layanan pl ON (lo.id_group_loket = pl.id_group_loket) WHERE lo.id_loket = ' . $Loket;
		$query = $this->db->query($q);
		$listlayanan = array();
		$grouploket = '';
		foreach ($query->result() as $vRow)
		{
		   $listlayanan[] = $vRow->id_group_layanan;
		   $grouploket = $vRow->id_group_loket;
		}

		$q = 'SELECT gl.nama_group_layanan, tr.id_transaksi, tr.no_ticket_awal, tr.no_ticket, tr.waktu_ambil FROM transaksi tr JOIN group_layanan gl ON (tr.id_group_layanan = gl.id_group_layanan) JOIN prioritas_layanan pl ON (tr.id_group_layanan = pl.id_group_layanan) WHERE pl.id_group_loket = ('.$grouploket.') AND tr.id_group_layanan IN ('.join(',', $listlayanan).') AND tr.status_transaksi = 0 AND tr.tanggal_transaksi = "'.$currentDate.'" ORDER BY pl.Prioritas ASC, tr.id_transaksi LIMIT ' . $pOffset . ',' . $pRows;
		$query = $this->db->query($q);
		//echo $q;

		foreach ($query->result() as $vRow)
		{
		   $vArrayTemp['id'] = $vRow->id_transaksi;		
			$vArrayTemp['type'] = $vRow->nama_group_layanan;		
			$vArrayTemp['queue_no'] = $vRow->no_ticket_awal . $vRow->no_ticket;		
			$vArrayTemp['time'] = $vRow->waktu_ambil;
			$vArrayTemp['btn_next'] = '<a class="own_undo" onclick="fnNext('.$vRow->id_transaksi.');return false;" href="#" style="color:#fff;">Next</a>';

			array_push($vItems,$vArrayTemp);
		}

		return $vItems;
	}

//=========Skip List===========
	function fnskipListCount() {
		$Loket= $this->session->userdata('sIdLoket');
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');	
		$currentDate=date('Ymd');	
	
		/*
		$this->db->where(array("status_transaksi"=>"3","tanggal_transaksi"=>$currentDate,"id_group_layanan"=>$GroupLayanan));
		$this->db->select("count(*) as selectCount");
		$this->db->from('transaksi as a');	
		$vResult = $this->db->get()->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
		*/
	
		$q = 'SELECT pl.id_group_layanan FROM loket lo JOIN prioritas_layanan pl ON (lo.id_group_loket = pl.id_group_loket) WHERE lo.id_loket = ' . $Loket;
		$query = $this->db->query($q);
		$listlayanan = array();
		foreach ($query->result() as $vRow)
		{
		   $listlayanan[] = $vRow->id_group_layanan;
		}

		$q = 'SELECT count(*) as selectCount FROM transaksi tr JOIN group_layanan gl ON (tr.id_group_layanan = gl.id_group_layanan) WHERE tr.id_group_layanan IN ('.join(',', $listlayanan).') AND tr.status_transaksi = 3 AND tr.tanggal_transaksi = "'.$currentDate.'"';
		//echo $q;
		$query = $this->db->query($q);

		foreach ($query->result() as $vRow)
		{
		   return $vRow;
		}

		return false;
	}
	
	function fnskipListData($pcounterKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		/*
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
		$currentDate=date('Ymd');	
		$this->db->where(array("status_transaksi"=>"3","tanggal_transaksi"=>$currentDate,"a.id_group_layanan"=>$GroupLayanan));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$this->db->join('layanan as b', 'a.id_layanan=b.id_layanan','Left');	
		
		$this->db->from('transaksi as a');	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id'] = $vRow->id_transaksi;		
			$vArrayTemp['type'] = $vRow->nama_layanan;		
			$vArrayTemp['queue_no'] = $vRow->no_ticket;		
			$vArrayTemp['time'] = $vRow->waktu_ambil;
			$vArrayTemp['btn_undo'] = '<a class="own_undo" onclick="fnUndo('.$vRow->id_transaksi.');return false;" href="#" style="color:#fff;">Undo</a>';
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
		*/
	
		$Loket= $this->session->userdata('sIdLoket');
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');	
		$currentDate=date('Ymd');
		
		$vArrayTemp = array();
		$vItems = array();

		$q = 'SELECT pl.id_group_layanan, pl.id_group_loket FROM loket lo JOIN prioritas_layanan pl ON (lo.id_group_loket = pl.id_group_loket) WHERE lo.id_loket = ' . $Loket;
		$query = $this->db->query($q);
		$listlayanan = array();
		$grouploket = '';
		foreach ($query->result() as $vRow)
		{
		   $listlayanan[] = $vRow->id_group_layanan;
		   $grouploket = $vRow->id_group_loket;
		}

		$q = 'SELECT gl.nama_group_layanan, tr.id_transaksi, tr.no_ticket_awal, tr.no_ticket, tr.waktu_ambil FROM transaksi tr JOIN group_layanan gl ON (tr.id_group_layanan = gl.id_group_layanan) JOIN prioritas_layanan pl ON (tr.id_group_layanan = pl.id_group_layanan) WHERE pl.id_group_loket = ('.$grouploket.') AND tr.id_group_layanan IN ('.join(',', $listlayanan).') AND tr.status_transaksi = 3 AND tr.tanggal_transaksi = "'.$currentDate.'" ORDER BY pl.Prioritas ASC, tr.id_transaksi LIMIT ' . $pOffset . ',' . $pRows;
		$query = $this->db->query($q);
		//echo $q;

		foreach ($query->result() as $vRow)
		{
		   $vArrayTemp['id'] = $vRow->id_transaksi;		
			$vArrayTemp['type'] = $vRow->nama_group_layanan;		
			$vArrayTemp['queue_no'] = $vRow->no_ticket_awal . $vRow->no_ticket;		
			$vArrayTemp['time'] = $vRow->waktu_ambil;
			$vArrayTemp['btn_undo'] = '<a class="own_undo" onclick="fnUndo('.$vRow->id_transaksi.');return false;" href="#" style="color:#fff;">Undo</a>';

			array_push($vItems,$vArrayTemp);
		}

		return $vItems;
	}	
//=========Skip List===========
	function fnfinishListCount() {
		/*
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');	
		$currentDate=date('Ymd');	
		$this->db->where(array("status_transaksi"=>"5","tanggal_transaksi"=>$currentDate,"id_group_layanan"=>$GroupLayanan));
		$this->db->select("count(*) as selectCount");
		$this->db->from('transaksi as a');	
		$vResult = $this->db->get()->result();
		if($vResult) {
			return $vResult[0];
		} else {
			return false;
		}
		*/
		
		$Loket= $this->session->userdata('sIdLoket');
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');	
		$currentDate=date('Ymd');
	
		$q = 'SELECT pl.id_group_layanan FROM loket lo JOIN prioritas_layanan pl ON (lo.id_group_loket = pl.id_group_loket) WHERE lo.id_loket = ' . $Loket;
		$query = $this->db->query($q);
		$listlayanan = array();
		foreach ($query->result() as $vRow)
		{
		   $listlayanan[] = $vRow->id_group_layanan;
		}

		$q = 'SELECT count(*) as selectCount FROM transaksi tr JOIN group_layanan gl ON (tr.id_group_layanan = gl.id_group_layanan) WHERE tr.id_group_layanan IN ('.join(',', $listlayanan).') AND tr.status_transaksi = 5 AND tr.tanggal_transaksi = "'.$currentDate.'"';
		//echo $q;
		$query = $this->db->query($q);

		foreach ($query->result() as $vRow)
		{
		   return $vRow;
		}

		return false;
	}
	
	function fnfinishListData($pcounterKeyword,$pOffset,$pRows,$pSort,$pOrder) {
		/*
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');	
		$currentDate=date('Ymd');	
		$this->db->where(array("status_transaksi"=>"5","tanggal_transaksi"=>$currentDate,"a.id_group_layanan"=>$GroupLayanan));
		
		$this->db->order_by($pSort,$pOrder);
		$this->db->limit($pRows,$pOffset);
		$this->db->join('layanan as b', 'a.id_layanan=b.id_layanan','Left');	
		
		$this->db->from('transaksi as a');	
		$vResult = $this->db->get()->result();
		$vArrayTemp = array();
		$vItems = array();
		foreach($vResult as $vRow):
           
			$vArrayTemp['id'] = $vRow->id_transaksi;		
			$vArrayTemp['type'] = $vRow->nama_layanan;		
			$vArrayTemp['queue_no'] = $vRow->no_ticket;		
			$vArrayTemp['time'] = $vRow->waktu_ambil;		
           	
		array_push($vItems,$vArrayTemp);
		endforeach;
		return $vItems;
		*/
	
		$Loket= $this->session->userdata('sIdLoket');
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');	
		$currentDate=date('Ymd');
		
		$vArrayTemp = array();
		$vItems = array();

		$q = 'SELECT pl.id_group_layanan, pl.id_group_loket FROM loket lo JOIN prioritas_layanan pl ON (lo.id_group_loket = pl.id_group_loket) WHERE lo.id_loket = ' . $Loket;
		$query = $this->db->query($q);
		$listlayanan = array();
		$grouploket = '';
		foreach ($query->result() as $vRow)
		{
		   $listlayanan[] = $vRow->id_group_layanan;
		   $grouploket = $vRow->id_group_loket;
		}

		$q = 'SELECT gl.nama_group_layanan, tr.id_transaksi, tr.no_ticket_awal, tr.no_ticket, tr.waktu_ambil, tr.waktu_panggil FROM transaksi tr JOIN group_layanan gl ON (tr.id_group_layanan = gl.id_group_layanan) JOIN prioritas_layanan pl ON (tr.id_group_layanan = pl.id_group_layanan) WHERE pl.id_group_loket = ('.$grouploket.') AND tr.id_group_layanan IN ('.join(',', $listlayanan).') AND tr.status_transaksi = 5 AND tr.tanggal_transaksi = "'.$currentDate.'" ORDER BY tr.waktu_panggil LIMIT ' . $pOffset . ',' . $pRows;
		$query = $this->db->query($q);
		//echo $q;

		foreach ($query->result() as $vRow)
		{
		   $vArrayTemp['id'] = $vRow->id_transaksi;		
			$vArrayTemp['type'] = $vRow->nama_group_layanan;		
			$vArrayTemp['queue_no'] = $vRow->no_ticket_awal . $vRow->no_ticket;		
			$vArrayTemp['time'] = $vRow->waktu_panggil;

			array_push($vItems,$vArrayTemp);
		}

		return $vItems;
	}

	function fnGoToNext($ticket_number) {
		$lenticketnumber 	= strlen($ticket_number);
		$no_ticket_awal 	= strtoupper(substr($ticket_number, 0, 1));
		$no_ticket 			= substr($ticket_number, 1, $lenticketnumber);

		$vArrayTemp = array(
			'id_transaksi' 		=> '',
			'no_tiket' 			=> '',
			'transaction' 		=> '',
			'start' 			=> '',
			'sRegVisitor' 		=> '',
			'layanan_forward' 	=> '',
			'id_group_layanan' 	=> '',
		);

		$tanggal_transaksi=date('Ymd');
		$waktu_panggil=date("H:i:s");
		$waktu_finish=$waktu_panggil;
		
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
		$Loket= $this->session->userdata('sIdLoket');	

		$q = 'SELECT pl.id_group_layanan FROM loket lo JOIN prioritas_layanan pl ON (lo.id_group_loket = pl.id_group_loket) WHERE lo.id_loket = ' . $Loket;
		$query = $this->db->query($q);
		$listlayanan = array();
		foreach ($query->result() as $vRow)
		{
		   $listlayanan[] = $vRow->id_group_layanan;
		}

		$cal_next=$this->db->query("Select a.nama_file,id_transaksi,no_ticket,no_ticket_awal,nama_layanan,waktu_ambil, b.id_group_layanan, b.id_layanan_forward from transaksi as a left join layanan as b ON a.id_layanan=b.id_layanan JOIN prioritas_layanan pl ON (a.id_group_layanan = pl.id_group_layanan) where status_transaksi='0' and a.id_group_layanan IN (".join(',', $listlayanan).") and tanggal_transaksi='$tanggal_transaksi' and no_ticket_awal='$no_ticket_awal' and no_ticket='$no_ticket' order by pl.Prioritas ASC, id_transaksi asc LIMIT 1");

		$vRow_next = $cal_next->row_array(); 

		if(!empty($vRow_next['id_transaksi'])) {

			$id_transaksi=$vRow_next['id_transaksi'];
			$next_id=$vRow_next['no_ticket'];	
			$no_ticket_awal=$vRow_next['no_ticket_awal'];
			$transaction=$vRow_next['nama_layanan'];
			$waktu_ambil=$vRow_next['waktu_ambil'];
			$id_layanan_forward=$vRow_next['id_layanan_forward'];
			$id_group_layanan=$vRow_next['id_group_layanan'];

			$ct_id_lay=$this->db->query("Select tanggal_transaksi,no_ticket_awal,no_ticket,waktu_panggil,id_layanan from transaksi where status_transaksi IN (1,2) and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
			$_countmk3 = $ct_id_lay->row_array(); 

			$q = 'SELECT * FROM layanan';
			$query = $this->db->query($q);
			$daftarlayanan = array();
			foreach ($query->result() as $vRow)
			{
			   $daftarlayanan[$vRow->id_layanan] = (array) $vRow;
			}

			$vArrayTemp['id_transaksi'] = $id_transaksi;
			$vArrayTemp['no_tiket'] = $next_id;		           			
			$vArrayTemp['transaction'] = $transaction;		           			
			$vArrayTemp['start'] = $waktu_ambil;		           						
			$vArrayTemp['sRegVisitor'] = $this->session->userdata('sRegVisitor');
			$vArrayTemp['layanan_forward'] = !empty($daftarlayanan[$id_layanan_forward]) ? $daftarlayanan[$id_layanan_forward]['nama_layanan'] : '';
			$vArrayTemp['id_group_layanan'] = $daftarlayanan[$daftarlayanan[$id_layanan_forward]['id_layanan_forward']]['id_layanan_group'];
			
			$vArrayTemp['nama_file'] = $vRow_next['nama_file'];

			$sql=$this->db->query("UPDATE transaksi set  status_transaksi='1',waktu_panggil='$waktu_panggil',id_loket='$Loket', id_user='".$this->session->userdata('sId')."' where  no_ticket='$next_id' and no_ticket_awal='$no_ticket_awal' and id_group_layanan IN (".join(',', $listlayanan).") and tanggal_transaksi='$tanggal_transaksi'");

			if ($_countmk3['tanggal_transaksi'] > '0')
			{
				$sql=$this->db->query("UPDATE transaksi set waktu_finish='$waktu_finish', status_transaksi='5', id_user='".$this->session->userdata('sId')."' where no_ticket='$_countmk3[no_ticket]' and no_ticket_awal='$_countmk3[no_ticket_awal]' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi' ");

				$id_layanan_forward = $daftarlayanan[$_countmk3['id_layanan']]['id_layanan_forward'];

				  if(!empty($id_layanan_forward)) {
				  	$vItems = array(
						'tanggal_transaksi' => $tanggal_transaksi,
						'waktu_ambil' 		=> $waktu_panggil,
						'no_ticket_awal' 	=> $_countmk3['no_ticket_awal'],
						'no_ticket' 		=> $_countmk3['no_ticket'],
						'id_layanan' 		=> $id_layanan_forward,
						'id_group_layanan' 	=> $daftarlayanan[$id_layanan_forward]['id_group_layanan'],
					);

					$sql=$this->db->query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket_awal,no_ticket,id_layanan,id_group_layanan) 
				  VALUES ('$vItems[tanggal_transaksi]', '$vItems[waktu_ambil]','$vItems[no_ticket_awal]', '$vItems[no_ticket]','$vItems[id_layanan]','$vItems[id_group_layanan]')");
				  }
			}
		}
		echo json_encode($vArrayTemp);
	}

	function fnFinish() {
		$tanggal_transaksi=date('Ymd');
		$waktu_panggil=date("H:i:s");
		$waktu_finish=$waktu_panggil;
		
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
		$Loket= $this->session->userdata('sIdLoket');

		$ct_id_lay=$this->db->query("Select tanggal_transaksi,no_ticket_awal,no_ticket,no_ticket_awal,group_layanan.nama_group_layanan,waktu_panggil,id_layanan,transaksi.id_group_layanan from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi IN (1,2) and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
		$_countmk3 = $ct_id_lay->row_array(); 

		if ($_countmk3['tanggal_transaksi'] > '0')
		{
		  $sql=$this->db->query("UPDATE transaksi set waktu_finish='$waktu_finish', status_transaksi='5', id_user='".$this->session->userdata('sId')."' where no_ticket='$_countmk3[no_ticket]' and no_ticket_awal='$_countmk3[no_ticket_awal]' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi' ");

		  	$q = 'SELECT * FROM layanan';
			$query = $this->db->query($q);
			$daftarlayanan = array();
			foreach ($query->result() as $vRow)
			{
			   $daftarlayanan[$vRow->id_layanan] = (array) $vRow;
			}

			$id_layanan_forward = $daftarlayanan[$_countmk3['id_layanan']]['id_layanan_forward'];

			if(!empty($id_layanan_forward)) {
				$vItems = array(
					'tanggal_transaksi' => $tanggal_transaksi,
					'waktu_ambil' 		=> $waktu_panggil,
					'no_ticket_awal' 	=> $_countmk3['no_ticket_awal'],
					'no_ticket' 		=> $_countmk3['no_ticket'],
					'id_layanan' 		=> $id_layanan_forward,
					'id_group_layanan' 	=> $daftarlayanan[$id_layanan_forward]['id_group_layanan'],
				);

				$sql=$this->db->query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket_awal,no_ticket,id_layanan,id_group_layanan) 
				VALUES ('$vItems[tanggal_transaksi]', '$vItems[waktu_ambil]','$vItems[no_ticket_awal]', '$vItems[no_ticket]','$vItems[id_layanan]','$vItems[id_group_layanan]')");
			}
		}
	}
	
	function fnNext($id_transaksi='') {
	$tanggal_transaksi=date('Ymd');
	$waktu_panggil=date("H:i:s");
	$waktu_finish=$waktu_panggil;
	
	$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
	$Loket= $this->session->userdata('sIdLoket');

	$q = 'SELECT pl.id_group_layanan, pl.id_group_loket FROM loket lo JOIN prioritas_layanan pl ON (lo.id_group_loket = pl.id_group_loket) WHERE lo.id_loket = ' . $Loket;
		$query = $this->db->query($q);
		$listlayanan = array();
		$grouploket = '';
		foreach ($query->result() as $vRow)
		{
		   $listlayanan[] = $vRow->id_group_layanan;
		   $grouploket = $vRow->id_group_loket;
		}	

	$addWhere = !empty($id_transaksi) ? ('id_transaksi = "'.$id_transaksi.'" AND ') : '';

	$cal_next=$this->db->query('SELECT tr.nama_file,gl.nama_group_layanan, tr.id_transaksi, tr.no_ticket_awal, tr.no_ticket, tr.waktu_ambil FROM transaksi tr JOIN group_layanan gl ON (tr.id_group_layanan = gl.id_group_layanan) JOIN prioritas_layanan pl ON (tr.id_group_layanan = pl.id_group_layanan) WHERE '.$addWhere.' pl.id_group_loket = ('.$grouploket.') AND tr.id_group_layanan IN ('.join(',', $listlayanan).') AND tr.status_transaksi = 0 AND tr.tanggal_transaksi = "'.$tanggal_transaksi.'" ORDER BY pl.Prioritas ASC, tr.id_transaksi LIMIT 1');
	$vRow_next = $cal_next->row_array(); 
	$id_transaksi=$vRow_next['id_transaksi'];
	$next_id=$vRow_next['no_ticket'];	
	$no_ticket_awal=$vRow_next['no_ticket_awal'];
	$transaction=$vRow_next['nama_layanan'];
	$waktu_ambil=$vRow_next['waktu_ambil'];
	$id_layanan_forward=$vRow_next['id_layanan_forward'];
	$id_group_layanan=$vRow_next['id_group_layanan'];

	$ct_id_lay=$this->db->query("Select tanggal_transaksi,no_ticket_awal,no_ticket,waktu_panggil,id_layanan,transaksi.id_group_layanan from transaksi where status_transaksi = 2 and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
	$_countmk3 = $ct_id_lay->row_array(); 

	$ct_id_skip=$this->db->query("Select id_transaksi from transaksi where status_transaksi='2' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc ");
	$id_skip = $ct_id_skip->row_array(); 
	$skip_id=$id_skip['id_transaksi'];

	
    //cek Layanan Forward-------------------------------------------
    $data_fwd=$this->db->query("Select id_group_layanan,id_layanan_forward from layanan where id_layanan='$_countmk3[id_layanan]'");
	$data_fw = $data_fwd->row_array(); 

	
    $sql_cek_fw_group=$this->db->query("Select id_group_layanan from layanan where id_layanan='$data_fw[id_layanan_forward]'");
	$data_fw_group = $sql_cek_fw_group->row_array(); 

	$q = 'SELECT * FROM layanan';
	$query = $this->db->query($q);
	$daftarlayanan = array();
	foreach ($query->result() as $vRow)
	{
	   $daftarlayanan[$vRow->id_layanan] = (array) $vRow;
	}


			$vArrayTemp['id_transaksi'] = $id_transaksi;		           			

			$vArrayTemp['no_tiket'] = $next_id;		           			
			$vArrayTemp['transaction'] = $transaction;		           			
			$vArrayTemp['start'] = $waktu_ambil;		           						
			$vArrayTemp['sRegVisitor'] = $this->session->userdata('sRegVisitor');
			$vArrayTemp['layanan_forward'] = !empty($daftarlayanan[$id_layanan_forward]) ? $daftarlayanan[$id_layanan_forward]['nama_layanan'] : '';
			$vArrayTemp['id_group_layanan'] = $daftarlayanan[$daftarlayanan[$id_layanan_forward]['id_layanan_forward']]['id_layanan_group'];
			
			$vArrayTemp['nama_file'] = $vRow_next['nama_file'];
			
		echo json_encode($vArrayTemp);

	  $sql=$this->db->query("UPDATE transaksi set  status_transaksi='1',waktu_panggil='$waktu_panggil',id_loket='$Loket', id_user='".$this->session->userdata('sId')."' where no_ticket='$next_id' and no_ticket_awal='$no_ticket_awal' and id_group_layanan IN (".join(',', $listlayanan).") and tanggal_transaksi='$tanggal_transaksi'");

	if ($_countmk3['tanggal_transaksi'] > '0')
	{
		/*
	  $sql=$this->db->query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
	  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '$data_fw[id_layanan_forward]','$data_fw_group[id_group_layanan]','0')");
	  */
	  $sql=$this->db->query("UPDATE transaksi set waktu_finish='$waktu_finish', status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and no_ticket_awal='$_countmk3[no_ticket_awal]' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi' ");

	  $id_layanan_forward = $daftarlayanan[$_countmk3['id_layanan']]['id_layanan_forward'];

	  if(!empty($id_layanan_forward)) {
	  	$vItems = array(
			'tanggal_transaksi' => $tanggal_transaksi,
			'waktu_ambil' 		=> $waktu_panggil,
			'no_ticket_awal' 	=> $_countmk3['no_ticket_awal'],
			'no_ticket' 		=> $_countmk3['no_ticket'],
			'id_layanan' 		=> $id_layanan_forward,
			'id_group_layanan' 	=> $daftarlayanan[$id_layanan_forward]['id_group_layanan'],
		);

		$sql=$this->db->query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket_awal,no_ticket,id_layanan,id_group_layanan) 
	  VALUES ('$vItems[tanggal_transaksi]', '$vItems[waktu_ambil]','$vItems[no_ticket_awal]', '$vItems[no_ticket]','$vItems[id_layanan]','$vItems[id_group_layanan]')");
	  }
	}
	else{
	//close cek layanan forward------------------------------------------------------------------------------
    }
	
	}

	function fnCreateRegVisitor($pData) {
		$vData = array(
			'ktp'=>$pData['vNoKTP'],					           
			'no_hp'=>$pData['vNoHP'],					           
			'nama_visitor'=>$pData['vNamaVisitor'],					           
			'id_transaksi'=>$pData['vIdTransaksi'],					           			
		);
		$vResult = $this->db->insert('visitor',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}

	function fnRecall() {
	$tanggal_transaksi=date('Ymd');
	$waktu_panggil=date("H:i:s");
	
	$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
	$Loket= $this->session->userdata('sIdLoket');	


	$ct_id_lay=$this->db->query("Select tanggal_transaksi,no_ticket_awal,no_ticket,group_layanan.nama_group_layanan,waktu_panggil,id_layanan,transaksi.id_group_layanan from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi IN (1,2) and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
	$_countmk3 = $ct_id_lay->row_array(); 
	
		$sql=$this->db->query("UPDATE transaksi set  status_transaksi='1' where no_ticket='$_countmk3[no_ticket]' and no_ticket_awal='$_countmk3[no_ticket_awal]' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'");  
		
	}

	function fnSkip() {
	$tanggal_transaksi=date('Ymd');
	$waktu_panggil=date("H:i:s");
	
	$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
	$Loket= $this->session->userdata('sIdLoket');	
	$ct_id_lay=$this->db->query("Select tanggal_transaksi,no_ticket_awal,no_ticket,group_layanan.nama_group_layanan,waktu_panggil,id_layanan,transaksi.id_group_layanan from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi IN (1,2) and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
	$_countmk3 = $ct_id_lay->row_array(); 
	
	$sql=$this->db->query("UPDATE transaksi set  status_transaksi='3' where no_ticket='$_countmk3[no_ticket]' and no_ticket_awal='$_countmk3[no_ticket_awal]' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'");
	  
	}
	
	function fnUndo($vIdTransaksi) {
	  $sql=$this->db->query("UPDATE transaksi set  status_transaksi='0', id_loket='' where id_transaksi='$vIdTransaksi' ");
	}

	function fnforward($id_layanan, $id_group_layanan) {
		$Loket= $this->session->userdata('sIdLoket');
		$GroupLayanan= $this->session->userdata('sIdGroupLayanan');	
		$tmp = date('Ymd H:i:s');
		$tmpdate = explode(' ', $tmp);
		$currentDate = $tmpdate[0];
		$currentTime = $tmpdate[1];
		$waktu_finish = $tmpdate[1];

		$vItems = array(
			'tanggal_transaksi' => $currentDate,
			'waktu_ambil' 		=> $currentTime,
			'no_ticket_awal' 	=> '',
			'no_ticket' 		=> '',
			'id_layanan' 		=> $id_layanan,
			'id_group_layanan' 	=> $id_group_layanan,
		);

		$q = 'SELECT pl.id_group_layanan, pl.id_group_loket FROM loket lo JOIN prioritas_layanan pl ON (lo.id_group_loket = pl.id_group_loket) WHERE lo.id_loket = ' . $Loket;
		$query = $this->db->query($q);
		$listlayanan = array();
		$grouploket = '';
		foreach ($query->result() as $vRow)
		{
		   $listlayanan[] = $vRow->id_group_layanan;
		   $grouploket = $vRow->id_group_loket;
		}

		$q = 'SELECT gl.nama_group_layanan, tr.id_transaksi, tr.no_ticket, tr.waktu_ambil, tr.no_ticket_awal, tr.id_layanan, tr.id_group_layanan FROM transaksi tr JOIN group_layanan gl ON (tr.id_group_layanan = gl.id_group_layanan) JOIN prioritas_layanan pl ON (tr.id_group_layanan = pl.id_group_layanan) WHERE pl.id_group_loket = ('.$grouploket.') AND tr.id_group_layanan IN ('.join(',', $listlayanan).') AND tr.status_transaksi IN (2) AND tr.tanggal_transaksi = "'.$currentDate.'" ORDER BY pl.Prioritas ASC, tr.id_transaksi LIMIT 1';
		$query = $this->db->query($q);

		$id_transaksi = '';
		foreach ($query->result() as $vRow)
		{
			$id_transaksi 				= $vRow->id_transaksi;
		   	$vItems['no_ticket_awal'] 	= $vRow->no_ticket_awal;
		   	$vItems['no_ticket'] 		= $vRow->no_ticket;
		}

		$sql=$this->db->query("UPDATE transaksi set waktu_finish='$waktu_finish', status_transaksi='5', id_user='".$this->session->userdata('sId')."', id_loket = ".$Loket." where id_transaksi=".$id_transaksi);

		$sql=$this->db->query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket_awal,no_ticket,id_layanan,id_group_layanan) 
	  VALUES ('$vItems[tanggal_transaksi]', '$vItems[waktu_ambil]','$vItems[no_ticket_awal]', '$vItems[no_ticket]','$vItems[id_layanan]','$vItems[id_group_layanan]')");
	}


	/*
	function fnforward1() {
		
	$tanggal_transaksi=date('Ymd');
	$waktu_panggil=date("H:i:s");
	
	$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
	$Loket= $this->session->userdata('sIdLoket');	

	$cal_next=$this->db->query("Select id_transaksi,no_ticket,nama_layanan,waktu_ambil from transaksi as a left join layanan as b ON a.id_layanan=b.id_layanan where status_transaksi='0' and a.id_group_layanan='$GroupLayanan' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc  ");
	$vRow_next = $cal_next->row_array(); 
	$id_transaksi=$vRow_next['id_transaksi'];
	$next_id=$vRow_next['no_ticket'];	
	$transaction=$vRow_next['nama_layanan'];
	$waktu_ambil=$vRow_next['waktu_ambil'];

	$ct_id_lay=$this->db->query("Select tanggal_transaksi,no_ticket,group_layanan.nama_group_layanan,waktu_panggil,id_layanan,transaksi.id_group_layanan from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi='2' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
	$_countmk3 = $ct_id_lay->row_array(); 

	$ct_id_skip=$this->db->query("Select id_transaksi from transaksi where status_transaksi='2' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc ");
	$id_skip = $ct_id_skip->row_array(); 
	$skip_id=$id_skip['id_transaksi'];
		
  $sql=$this->db->query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
		  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '1','1','0')");
  
  $sql=$this->db->query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi' ");
	}
	

	function fnforward2() {
		
	$tanggal_transaksi=date('Ymd');
	$waktu_panggil=date("H:i:s");
	
	$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
	$Loket= $this->session->userdata('sIdLoket');	

	$cal_next=$this->db->query("Select id_transaksi,no_ticket,nama_layanan,waktu_ambil from transaksi as a left join layanan as b ON a.id_layanan=b.id_layanan where status_transaksi='0' and a.id_group_layanan='$GroupLayanan' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc  ");
	$vRow_next = $cal_next->row_array(); 
	$id_transaksi=$vRow_next['id_transaksi'];
	$next_id=$vRow_next['no_ticket'];	
	$transaction=$vRow_next['nama_layanan'];
	$waktu_ambil=$vRow_next['waktu_ambil'];

	$ct_id_lay=$this->db->query("Select tanggal_transaksi,no_ticket,group_layanan.nama_group_layanan,waktu_panggil,id_layanan,transaksi.id_group_layanan from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi='2' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
	$_countmk3 = $ct_id_lay->row_array(); 

	$ct_id_skip=$this->db->query("Select id_transaksi from transaksi where status_transaksi='2' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc ");
	$id_skip = $ct_id_skip->row_array(); 
	$skip_id=$id_skip['id_transaksi'];

  $sql=$this->db->query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '2','2','0')");

  $sql=$this->db->query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi' ");
	}
	
	function fnforward3() {
		
	$tanggal_transaksi=date('Ymd');
	$waktu_panggil=date("H:i:s");
	
	$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
	$Loket= $this->session->userdata('sIdLoket');	

	$cal_next=$this->db->query("Select id_transaksi,no_ticket,nama_layanan,waktu_ambil from transaksi as a left join layanan as b ON a.id_layanan=b.id_layanan where status_transaksi='0' and a.id_group_layanan='$GroupLayanan' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc  ");
	$vRow_next = $cal_next->row_array(); 
	$id_transaksi=$vRow_next['id_transaksi'];
	$next_id=$vRow_next['no_ticket'];	
	$transaction=$vRow_next['nama_layanan'];
	$waktu_ambil=$vRow_next['waktu_ambil'];

	$ct_id_lay=$this->db->query("Select tanggal_transaksi,no_ticket,group_layanan.nama_group_layanan,waktu_panggil,id_layanan,transaksi.id_group_layanan from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi='2' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
	$_countmk3 = $ct_id_lay->row_array(); 

	$ct_id_skip=$this->db->query("Select id_transaksi from transaksi where status_transaksi='2' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc ");
	$id_skip = $ct_id_skip->row_array(); 
	$skip_id=$id_skip['id_transaksi'];

   $sql=$this->db->query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
   VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '3','2','0')");

   $sql=$this->db->query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi' ");


	}		

	function fnforward4() {
		
	$tanggal_transaksi=date('Ymd');
	$waktu_panggil=date("H:i:s");
	
	$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
	$Loket= $this->session->userdata('sIdLoket');	

	$cal_next=$this->db->query("Select id_transaksi,no_ticket,nama_layanan,waktu_ambil from transaksi as a left join layanan as b ON a.id_layanan=b.id_layanan where status_transaksi='0' and a.id_group_layanan='$GroupLayanan' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc  ");
	$vRow_next = $cal_next->row_array(); 
	$id_transaksi=$vRow_next['id_transaksi'];
	$next_id=$vRow_next['no_ticket'];	
	$transaction=$vRow_next['nama_layanan'];
	$waktu_ambil=$vRow_next['waktu_ambil'];

	$ct_id_lay=$this->db->query("Select tanggal_transaksi,no_ticket,group_layanan.nama_group_layanan,waktu_panggil,id_layanan,transaksi.id_group_layanan from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi='2' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
	$_countmk3 = $ct_id_lay->row_array(); 

	$ct_id_skip=$this->db->query("Select id_transaksi from transaksi where status_transaksi='2' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc ");
	$id_skip = $ct_id_skip->row_array(); 
	$skip_id=$id_skip['id_transaksi'];

  $sql=$this->db->query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '4','3','0')");
  $sql=$this->db->query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'");


	}		

	function fnforward5() {
		
	$tanggal_transaksi=date('Ymd');
	$waktu_panggil=date("H:i:s");
	
	$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
	$Loket= $this->session->userdata('sIdLoket');	

	$cal_next=$this->db->query("Select id_transaksi,no_ticket,nama_layanan,waktu_ambil from transaksi as a left join layanan as b ON a.id_layanan=b.id_layanan where status_transaksi='0' and a.id_group_layanan='$GroupLayanan' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc  ");
	$vRow_next = $cal_next->row_array(); 
	$id_transaksi=$vRow_next['id_transaksi'];
	$next_id=$vRow_next['no_ticket'];	
	$transaction=$vRow_next['nama_layanan'];
	$waktu_ambil=$vRow_next['waktu_ambil'];

	$ct_id_lay=$this->db->query("Select tanggal_transaksi,no_ticket,group_layanan.nama_group_layanan,waktu_panggil,id_layanan,transaksi.id_group_layanan from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi='2' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
	$_countmk3 = $ct_id_lay->row_array(); 

	$ct_id_skip=$this->db->query("Select id_transaksi from transaksi where status_transaksi='2' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc ");
	$id_skip = $ct_id_skip->row_array(); 
	$skip_id=$id_skip['id_transaksi'];

  $sql=$this->db->query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '5','4','0')");
  $sql=$this->db->query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'");

	}		

	function fnforward6() {
		
	$tanggal_transaksi=date('Ymd');
	$waktu_panggil=date("H:i:s");
	
	$GroupLayanan= $this->session->userdata('sIdGroupLayanan');		
	$Loket= $this->session->userdata('sIdLoket');	

	$cal_next=$this->db->query("Select id_transaksi,no_ticket,nama_layanan,waktu_ambil from transaksi as a left join layanan as b ON a.id_layanan=b.id_layanan where status_transaksi='0' and a.id_group_layanan='$GroupLayanan' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc  ");
	$vRow_next = $cal_next->row_array(); 
	$id_transaksi=$vRow_next['id_transaksi'];
	$next_id=$vRow_next['no_ticket'];	
	$transaction=$vRow_next['nama_layanan'];
	$waktu_ambil=$vRow_next['waktu_ambil'];

	$ct_id_lay=$this->db->query("Select tanggal_transaksi,no_ticket,group_layanan.nama_group_layanan,waktu_panggil,id_layanan,transaksi.id_group_layanan from transaksi inner join group_layanan ON transaksi.id_group_layanan=group_layanan.id_group_layanan where status_transaksi='2' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi desc ");
	$_countmk3 = $ct_id_lay->row_array(); 

	$ct_id_skip=$this->db->query("Select id_transaksi from transaksi where status_transaksi='2' and tanggal_transaksi='$tanggal_transaksi'order by id_transaksi asc ");
	$id_skip = $ct_id_skip->row_array(); 
	$skip_id=$id_skip['id_transaksi'];

 $sql=$this->db->query("INSERT INTO transaksi (tanggal_transaksi,waktu_ambil,no_ticket,id_layanan,id_group_layanan,status_transaksi) 
  VALUES ('$_countmk3[tanggal_transaksi]', '$waktu_panggil','$_countmk3[no_ticket]', '6','4','0')");
 $sql=$this->db->query("UPDATE transaksi set  status_transaksi='5' where no_ticket='$_countmk3[no_ticket]' and id_loket='$Loket' and tanggal_transaksi='$tanggal_transaksi'");

	}

	*/		
	
	function fnCreatecounter($pData) {
		$vData = array(
	
		   
			'id'=>$pData['vid'],					
           
		);
		$vResult = $this->db->insert('t_counter',$vData);
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncounterDelete($pDelcounterId) {
		
		$vResult = $this->db->where('id',$pDelcounterId)->delete('t_counter');
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function fncounterRow($pcounterId) {
	
		$this->db->where('id',$pcounterId);
		
		$vResult = $this->db->get(t_counter)->result();
		$vRow = $vResult[0];
           
			$vArrayTemp['id'] = $vRow->id;
           		
		
		echo json_encode($vArrayTemp);
		
	}	

	function fnUpdatecounter($pcounterId,$pData) {
		$vData = array(
		
		   
			'id'=>$pData['vid'],					
           			
		);
	
		$vResult = $this->db->where('id',$pcounterId)->update('t_counter',$vData);
	
		
		if($vResult) {
			echo json_encode(array('success'=>true));
		} else {
			echo json_encode(array('msg'=>'Some errors occured.'));
		}
	}
	
	function get_setting_direktri_transaksi() {
		$q = 'SELECT nilai FROM setting WHERE id_setting = 901';
		$row = $this->db->query($q)->row_array();
		$res = !empty($row['nilai']) ? $row['nilai'] : '';
		return $res;
	}
	
}
?>

