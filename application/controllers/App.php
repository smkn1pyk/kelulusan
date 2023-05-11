<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('username')&&$this->session->userdata('password')){
			if($this->session->userdata('peserta_didik_id')){
				$this->_lulusan();
			}else{
				$this->session->sess_destroy();
				redirect('.','refresh');
			}
		}else{
			$this->_login();
		}
	}

	private function _lulusan()
	{
		$lulusan_pengaturan = $this->db->get_where('lulusan_pengaturan', ['semester_id'=>$this->session->userdata('semester_id')])->row_array();
		if($lulusan_pengaturan){
			if($lulusan_pengaturan['waktu_tampil']<=date('Y-m-d H:i:s')){
				$status = $this->db->get_where('lulusan_data', ['peserta_didik_id'=>$this->session->userdata('peserta_didik_id'), 'semester_id'=>$this->session->userdata('semester_id')])->row_array();
				if($status){
					$data = [
						'title' => $this->session->userdata('nama'),
						'siswa' => $this->session->all_userdata(),
						'rombel' => $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$this->session->userdata('rombongan_belajar_id')])->row_array(),
						'lulusan' => $lulusan_pengaturan,
						'status' => $status,
					];
					$this->load->view('lulusan', $data, FALSE);
				}else{
					$data = [
						'title' => "Belum terdaftar",
						'page' => base_url('app/belum_terdaftar'),
					];
					$this->load->view('auth/template', $data, FALSE);
				}
			}else{
				$data = [
					'title' => "Menunggu Waktu Tampil",
					'page' => base_url('app/waktu_tampil'),
				];
				$this->load->view('auth/template', $data, FALSE);
			}
		}else{
			$data = [
				'title' => 'Belum bisa tampil',
				'page' => base_url('app/izin_akses'),
			];
			$this->load->view('auth/template', $data, FALSE);
		}
	}

	function izin_akses()
	{
		$data = [];
		$this->load->view('izin_akses', $data, FALSE);
	}

	function belum_terdaftar()
	{
		$data = [];
		$this->load->view('belum_terdaftar', $data, FALSE);
	}

	function waktu_tampil()
	{
		$lulusan_pengaturan = $this->db->get_where('lulusan_pengaturan', ['semester_id'=>$this->session->userdata('semester_id')])->row_array();
		$data = [
			'pengaturan' => $lulusan_pengaturan,
		];
		$this->load->view('waktu_tampil', $data, FALSE);
	}

	private function _login()
	{
		$data = [
			'title' => "Log-In",
			'page' => 'app/halaman_login',
		];
		$this->load->view('auth/template', $data, FALSE);
	}

	function halaman_login()
	{
		$data = [
			'title' => "Log-In",
		];
		$this->load->view('auth/login', $data, FALSE);
	}

}
