<?php

class Modelcentury extends CI_model{
	

		function showBellBoy(){

			return $this->db->get("bellboy_master")->result();
		}


		function showKamar(){

			return $this->db->get("master_kamar")->result();

		}

		function insertKamar($kodeKamar="", $typeKamar="" ){

			$data = array(
				"kode_kamar" => $kodeKamar,
				"type_kamar" => $typeKamar
			);

			$this->db->insert("master_kamar",$data);

		}




	function insertKomentar($customer="", $komentar="" ){

			$data = array(
				"id_customer" => $customer,
				"komentar" => $komentar
			);

			if($customer!="" && $komentar!=""){

					$this->db->insert("penilaian",$data);

			}
	
	}


	function insertGuest($data=array()){

		 

		if(sizeof($data)>0){			
			$this->db->insert("customer",$data);
		}
	 
	}

	function insertCameraTrance($data=array()){

			if(sizeof($data)>0){
				$this->db->insert("trace_camera",$data);
			}

	}
	
	
	function insertPegawai($data=array()){

		 

		if(sizeof($data)>0){			
			$this->db->insert("master_pegawai",$data);
		}
	 
	}
	
	function insertBellboyRecord($data=array()){

		 

		if(sizeof($data)>0){			
			$this->db->insert("trx_bellboy",$data);
		}
	 
	}


	
	function modelLogin($email="" , $password=""){ 
		$this->db->where("email_pegawai",$email);
		$this->db->where("password_pegawai", $password);
		return $this->db->get("master_pegawai")->num_rows();
	}
	function dataLogin($email="" , $password=""){ 
		$this->db->where("email_pegawai",$email);
		$this->db->where("password_pegawai", $password);
		return $this->db->get("master_pegawai")->row();
	}

	function modelMasterPegawai(){

		$this->db->select('*');
		$this->db->from('master_pegawai');
		$this->db->join('master_jabatan', 'master_pegawai.id_jabatan = master_jabatan.id_jabatan', 'inner');
		return $this->db->get()->result();
	}
	
	function modelListTamu(){

		return $this->db->get("trx_tamu")->result();
	}


	function modelMasterJabatan(){

		$this->db->where("status_jabatan",1);
		
		return $this->db->get("master_jabatan")->result();
	}

	function modelMasterKamar(){

		return $this->db->get("master_kamar")->result();
	}

	function modelBellboyCommander(){

		$this->db->select('*');
		$this->db->from('trx_bellboy');
		$this->db->join('master_pegawai', 'master_pegawai.nip_pegawai = trx_bellboy.id_commander', 'inner');
		$this->db->join('trx_tamu', 'trx_tamu.kode_pesan = trx_bellboy.kode_pesan', 'inner');
		
		$query = $this->db->get();

		return $query->result();

	}

	function modelBellboyAcceptor(){

		$this->db->select('*');
		$this->db->from('trx_bellboy');
		$this->db->join('master_pegawai', 'master_pegawai.nip_pegawai = trx_bellboy.id_accepter', 'inner');
		$this->db->join('trx_tamu', 'trx_tamu.kode_pesan = trx_bellboy.kode_pesan', 'inner');
		
		$query = $this->db->get();

		return $query->result();

	}





}
