<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
class Api extends RestController {

	function getsekolah_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getsekolah']), true);
		if(is_array($decrypt)){
			// echo "<pre>";
			// print_r ($decrypt);
			// echo "</pre>";
			// exit();
			$cekData = $this->db->get_where('getsekolah', ['sekolah_id'=>$decrypt['sekolah_id'], 'semester_id'=>$decrypt['semester_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key1 => $value1) {
					$this->db->where($value1);
					$this->db->update('getsekolah', $decrypt);
					if($this->db->affected_rows()>>0){
						$berhasil_tambah[] = 1;
					}else{
						$gagal_tambah[] = 0;
					}
				}
			}else{
				$this->db->insert('getsekolah', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$gagal_tambah[] = 0;
				}
			}
			$response = [
				'status' => true,
				'message' => 'Success',
				'data' => $this->db->last_query(),
			];
			$this->response($response);
		}else{
			$response = [
				'status' => false,
				'message' => 'Bukan Array',
			];
			$this->response($response);
		}
	}

	function getsekolah_get()
	{
		if($this->input->get('semester_id')){
			$cekData = $this->db->get_where('getsekolah', ['semester_id'=>$this->input->get('semester_id')])->result();
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $cekData,
			];

			$this->response($response, 200);
		}
	}

	function getgtk_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getgtk']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('getgtk', ['ptk_id'=>$decrypt['ptk_id'], 'tahun_ajaran_id'=>$decrypt['tahun_ajaran_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->update('getgtk', $decrypt);
					if($this->db->affected_rows()>>0){
						$berhasil_tambah[] = 1;
					}else{
						$gagal_tambah[] = 1;
					}
				}
			}else{
				$this->db->insert('getgtk', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$gagal_tambah[] = 1;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function rwy_pend_formal_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['rwy_pend_formal']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('rwy_pend_formal', ['riwayat_pendidikan_formal_id'=>$decrypt['riwayat_pendidikan_formal_id'], 'semester_id'=>$decrypt['semester_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->update('rwy_pend_formal', $decrypt);
					if($this->db->affected_rows()>>0){
						$berhasil_tambah[] = 1;
					}else{
						$gagal_tambah[] = 1;
					}
				}
			}else{
				$this->db->insert('rwy_pend_formal', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$gagal_tambah[] = 1;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function rwy_kepangkatan_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['rwy_kepangkatan']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('rwy_kepangkatan', ['riwayat_kepangkatan_id'=>$decrypt['riwayat_kepangkatan_id'], 'semester_id'=>$decrypt['semester_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->update('rwy_kepangkatan', $decrypt);
					if($this->db->affected_rows()>>0){
						$berhasil_tambah[] = 1;
					}else{
						$gagal_tambah[] = 1;
					}
				}
			}else{
				$this->db->insert('rwy_kepangkatan', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$gagal_tambah[] = 1;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function getpesertadidik_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getpesertadidik']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('getpesertadidik', ['peserta_didik_id'=>$decrypt['peserta_didik_id'], 'semester_id'=>$decrypt['semester_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->update('getpesertadidik', $decrypt);
					if($this->db->affected_rows()>>0){
						$berhasil_tambah[] = 1;
					}else{
						$gagal_tambah[] = 1;
					}
				}
			}else{
				$this->db->insert('getpesertadidik', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$gagal_tambah[] = 1;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function getrombonganbelajar_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getrombonganbelajar']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$decrypt['rombongan_belajar_id'], 'semester_id'=>$decrypt['semester_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->update('getrombonganbelajar', $decrypt);
					if($this->db->affected_rows()>>0){
						$berhasil_tambah[] = 1;
					}else{
						$gagal_tambah[] = 1;
					}
				}
			}else{
				$this->db->insert('getrombonganbelajar', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$gagal_tambah[] = 1;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function anggota_rombel_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['anggota_rombel']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('anggota_rombel', ['anggota_rombel_id'=>$decrypt['anggota_rombel_id'],'peserta_didik_id'=>$decrypt['peserta_didik_id'], 'semester_id'=>$decrypt['semester_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->update('anggota_rombel', $decrypt);
					if($this->db->affected_rows()>>0){
						$berhasil_tambah[] = 1;
					}else{
						$gagal_tambah[] = 1;
					}
				}
			}else{
				$this->db->insert('anggota_rombel', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$gagal_tambah[] = 1;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function pembelajaran_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['pembelajaran']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('pembelajaran', ['pembelajaran_id'=>$decrypt['pembelajaran_id'],'ptk_terdaftar_id'=>$decrypt['ptk_terdaftar_id'], 'semester_id'=>$decrypt['semester_id']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->update('pembelajaran', $decrypt);
					if($this->db->affected_rows()>>0){
						$berhasil_tambah[] = 1;
					}else{
						$gagal_tambah[] = 1;
					}
				}
			}else{
				$this->db->insert('pembelajaran', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$gagal_tambah[] = 1;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}

	function getpengguna_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getpengguna']), true);
		if(is_array($decrypt)){
			$cekData = $this->db->get_where('getpengguna', ['pengguna_id'=>$decrypt['pengguna_id'],'status'=>$decrypt['status']])->result_array();
			if($cekData){
				foreach ($cekData as $key => $value) {
					$this->db->where($value);
					$this->db->update('getpengguna', $decrypt);
					if($this->db->affected_rows()>>0){
						$berhasil_tambah[] = 1;
					}else{
						$gagal_tambah[] = 1;
					}
				}
			}else{
				$this->db->insert('getpengguna', $decrypt);
				if($this->db->affected_rows()>>0){
					$berhasil_tambah[] = 1;
				}else{
					$gagal_tambah[] = 1;
				}
			}
			$response = [
				'status' => true,
				'message' => "Success",
				'data' => $this->db->last_query(),
			];

			$this->response($response, 200);
		}else{
			$response = [
				'status' => false,
				'message' => "Bukan Array",
			];

			$this->response($response, 200);
		}
	}
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */