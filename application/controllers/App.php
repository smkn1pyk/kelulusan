<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('akun')){
			if($this->session->userdata('username')&&$this->session->userdata('password')){
				if($this->session->userdata('peserta_didik_id')){
					$this->_lulusan();
				}else{
					$this->session->sess_destroy();
					redirect('.','refresh');
				}
			}else{
				$this->pilih_akun();
			}
		}else{
			$this->login();
		}
	}

	private function _lulusan()
	{
		$data = [
			'title' => $this->session->userdata('nama'),
			'siswa' => $this->session->all_userdata(),
			'rombel' => $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$this->session->userdata('rombongan_belajar_id')])->row_array(),
			'lulusan' => $this->db->get_where('lulusan_pengaturan', ['semester_id'=>$this->session->userdata('semester_id')])->row_array(),
			'status' => $this->db->get_where('lulusan_data', ['peserta_didik_id'=>$this->session->userdata('peserta_didik_id'), 'semester_id'=>$this->session->userdata('semester_id')])->row_array(),
		];
		$this->load->view('lulusan', $data, FALSE);
	}

	function login()
	{
		$data = [
			'title' => "Log-In",
			'page' => 'app/halaman_login',
		];
		$this->load->view('auth/template', $data, FALSE);
	}

	function halaman_login()
	{
		$semester_id = $this->db->query("SELECT DISTINCT(semester_id) from getsekolah order by semester_id desc")->result();
		if(date('m')>6){
			$sm = date('Y').'1';
		}else
		if(date('m')<7){
			$sm = date('Y') - 1;
			$sm = $sm.'2';
		}
		if($semester_id){
			$semester_id = $semester_id;
		}else{
			$semester_id[] = json_decode(json_encode(['semester_id'=>$sm]));
		}
		$this->db->order_by('id', 'desc');
		$informasi = $this->db->get_where('lulusan_informasi', ['semester_id'=>$sm])->result();
		$data = [
			'title' => "Log-In",
			'informasi' => $informasi,
			'semester_id' => $semester_id,
		];
		$this->load->view('auth/login', $data, FALSE);
	}	

	function pilih_akun()
	{
		$data = [
			'title' => 'Pilih Hak Akses',
			'page' => 'app/halaman_pilih_akun',
		];
		$this->load->view('auth/template', $data, FALSE);
	}

	function halaman_pilih_akun()
	{
		$data = [

			'akun' => $this->session->userdata('akun'),
		];
		$this->load->view('auth/pilih_akun', $data, FALSE);
	}

}
