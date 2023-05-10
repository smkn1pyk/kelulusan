<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
class Api extends RestController {

	function getsekolah_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getsekolah']), true);
		if(is_array($decrypt)){
			foreach ($decrypt as $key => $value) {
				$cekData = $this->db->get_where('getsekolah', ['sekolah_id'=>$value['sekolah_id'], 'semester_id'=>$value['semester_id']])->result_array();
				if($cekData){
					foreach ($cekData as $key1 => $value1) {
						$this->db->where($value1);
						$this->db->update('getsekolah', $value);
						if($this->db->affected_rows()>>0){
							$berhasil_tambah[] = 1;
						}else{
							$gagal_tambah[] = 0;
						}
					}
				}else{
					$this->db->insert('getsekolah', $value);
					if($this->db->affected_rows()>>0){
						$berhasil_tambah[] = 1;
					}else{
						$gagal_tambah[] = 0;
					}
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


	function pembelajaran_post()
	{
		$pembelajaran = json_decode(base64_decode($this->input->post('pembelajaran')),true);
		if($pembelajaran){
			foreach ($pembelajaran as $key => $value) {
				// $this->db->where();
				$this->db->delete('pembelajaran', ['pembelajaran_id'=>$value['pembelajaran_id']]);
			}
			$this->db->insert_batch('pembelajaran', $pembelajaran);
			if($this->db->affected_rows()>>0){
				$status = 1;
			}else{
				$status = 0;
			}
			$this->response(
				[
					'status' => true,
					'message' => "Success",
					'data' => $status,
				], 200
			);
		}
	}

	function gtk_post()
	{
		$getgtk = json_decode(base64_decode($this->input->post('getgtk')),true);
		if($getgtk){

			foreach ($getgtk as $key => $value) {
				$where = $value;
				$this->db->where(['ptk_id'=>$value->ptk_id]);
				$this->db->delete('getgtk');
			}
			$this->db->insert_batch('getgtk', $getgtk);
			if($this->db->affected_rows()>>0){
				$status = 1;
			}else{
				$status = 0;
			}
			$this->response(
				[
					'status' => true,
					'message' => "Success",
					'data' => $status,
				], 200
			);
		}
	}

	function rombel_post()
	{
		$rombel = json_decode(base64_decode($this->input->post('rombel')),true);
		if($rombel){
			foreach ($rombel as $key => $value) {
				$this->db->delete('getrombonganbelajar', ['rombongan_belajar_id'=>$value['rombongan_belajar_id']]);
			}
			$this->db->insert_batch('getrombonganbelajar', $rombel);
			if($this->db->affected_rows()>>0){
				$status = 1;
			}else{
				$status = 0;
			}
			$this->response(
				[
					'status' => true,
					'message' => "Success",
					'data' => $status,
				], 200
			);
		}
	}

	function siswa_post()
	{
		if($this->input->post('siswa')){
			$siswa = json_decode(base64_decode($this->input->post('siswa')),true);
			foreach ($siswa as $key => $value) {
				$this->db->delete('getpesertadidik',['peserta_didik_id'=>$value['peserta_didik_id']]);
				$simpanData[] = $value;
			}
			$this->db->insert_batch('getpesertadidik', $simpanData);
			if($this->db->affected_rows()>>0){
				$status = 1;
			}else{
				$status = 0;
			}
			$this->response(
				[
					'status' => true,
					'message' => "Success",
					'data' => $status,
				], 200
			);
		}else{
			$this->response(
				[
					'status' => false,
					'message' => "Error",
					'data' => $_POST,
				], 200
			);
		}
		
	}

	function getpesertadidik_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getpesertadidik']), true);
		if(is_array($decrypt)){
			foreach ($decrypt as $key => $value) {
				foreach ($value as $key1 => $value1) {
					foreach ($value1 as $key2 => $value2) {
						// foreach ($value2 as $key3 => $value3) {
						$trimmed_array = array_map('trim', $value2);
						$insert = [$key2=>$trimmed_array];
						// }
						$this->db->insert_batch('getpesertadidik', $insert);
					}
				}
			}
		}else{
			echo "Bukan Array";
		}

		$this->response(
			[
				'status' => false,
				'message' => "Error",
				'data' => $this->db->last_query(),
			], 200
		);
	}

	function getpengguna_post()
	{
		$slice = array_slice($_POST, 1);
		$decrypt = json_decode(base64_decode($slice['getpengguna']), true);
		if(is_array($decrypt)){
			foreach ($decrypt as $key => $value) {
				foreach ($value as $key1 => $value1) {
					foreach ($value1 as $key2 => $value2) {
						$cekData = $this->db->get_where('getpengguna', $value2)->row_array();
						if($cekData){
							$this->db->where($cekData);
							$this->db->update('getpengguna', $value2);
						}else{
							$this->db->insert('getpengguna', $value2);
						}
					}
				}
			}
		}else{
			echo "Bukan Array";
		}

		$this->response(
			[
				'status' => false,
				'message' => "Error",
				'data' => $this->db->last_query(),
			], 200
		);
	}

	function verval_alamat1_get()
	{
		$this->db->order_by('id', 'asc');
		$verval_alamat = $this->db->get_where('verval_alamat', ['status'=>0])->result();
		$this->response(
			[
				'status' => true,
				'message' => "Success",
				'data' => $verval_alamat,
			], 200
		);
	}

	function verval_alamat_get()
	{
		$this->db->order_by('id', 'asc');
		$verval_alamat = $this->db->get_where('verval_alamat', ['status'=>0])->result();
		$this->response(
			[
				'status' => true,
				'message' => "Success",
				'data' => $verval_alamat,
				'jml' => count($verval_alamat),
			], 200
		);
	}

	function verval_alamat_update_post()
	{
		if($this->input->post('peserta_didik_id')){
			$jml_verval_alamat = $this->db->get_where('verval_alamat', ['status'=>0])->result();
			$this->db->where('peserta_didik_id', $this->input->post('peserta_didik_id'));
			$this->db->update('verval_alamat', ['status'=>1]);
			if($this->db->affected_rows()>>0){
				$status = 1;
			}else{
				$status = 0;
			}
			$this->response(
				[
					'status' => true,
					'message' => "Success",
					'data' => $status,
					'jml' => count($jml_verval_alamat),
				], 200
			);
		}
	}

	function verval_alamat_update_pesan_post()
	{
		if($_POST['peserta_didik_id']&&$_POST['pesan']&&$_POST['status']){
			$this->db->where('peserta_didik_id', $this->input->post('peserta_didik_id'));
			$this->db->update('verval_alamat', ['status'=>$this->input->post('status'),'pesan'=>$this->input->post('pesan')]);
			if($this->db->affected_rows()>>0){
				$status = 1;
			}else{
				$status = 0;
			}
			$this->response(
				[
					'status' => true,
					'message' => "Success",
					'data' => $status,
				], 200
			);
		}
	}

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */