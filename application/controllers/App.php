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
		$data = [
			'title' => $this->session->userdata('nama'),
			'siswa' => $this->session->all_userdata(),
			'rombel' => $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$this->session->userdata('rombongan_belajar_id')])->row_array(),
			'lulusan' => $this->db->get_where('lulusan_pengaturan', ['semester_id'=>$this->session->userdata('semester_id')])->row_array(),
			'status' => $this->db->get_where('lulusan_data', ['peserta_didik_id'=>$this->session->userdata('peserta_didik_id'), 'semester_id'=>$this->session->userdata('semester_id')])->row_array(),
		];
		$this->load->view('lulusan', $data, FALSE);
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
