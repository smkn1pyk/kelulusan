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
				if($this->session->userdata('ptk_id')){
					if($this->session->userdata('jenis_ptk_id')==11){
						$this->_tendik();
					}else{
						$this->_guru();
					}
				}else{
					$this->_lulusan();
				}
			}else{
				$this->pilih_akun();
			}
		}else{
			$this->login();
		}
	}

	private function _tendik()
	{
		$data = [
			'title' => "Tendik",
			'page' => 'app/data_peserta_didik',
		];
		$this->load->view('template', $data, FALSE);
	}

	private function _guru()
	{
		$data = [

		];
		$this->load->view('pages/guru/pengembangan', $data, FALSE);
	}

	function data_peserta_didik()
	{
		$rombel = $this->db->query('SELECT DISTINCT(rombongan_belajar_id), nama_rombel from getpesertadidik where semester_id="'.$this->session->userdata('semester_id').'" and tingkat_pendidikan_id="12" order by nama_rombel asc')->result();

		if($this->input->get('pencarian')){
			$pencarian = $this->input->get('pencarian');
			$this->db->like('nama', $pencarian, 'BOTH');
			$this->db->where(['tingkat_pendidikan_id'=>'12', 'semester_id'=>$this->session->userdata('semester_id'), 'status'=>1]);
			$this->db->or_like('nisn', $pencarian, 'BOTH');
			$this->db->where(['tingkat_pendidikan_id'=>'12', 'semester_id'=>$this->session->userdata('semester_id'), 'status'=>1]);
			$pd = $this->db->get('getpesertadidik')->result();
		}else{
			if($this->input->get('rombel')){
				$this->db->order_by('nama', 'asc');
				$pd = $this->db->get_where('getpesertadidik', ['tingkat_pendidikan_id'=>'12', 'semester_id'=>$this->session->userdata('semester_id'), 'rombongan_belajar_id'=>$this->input->get('rombel'), 'status'=>1])->result();
			}else{
				$this->db->order_by('nama_rombel', 'asc');
				$pd = $this->db->get_where('getpesertadidik', ['tingkat_pendidikan_id'=>'12', 'semester_id'=>$this->session->userdata('semester_id'), 'status'=>1], 50)->result();
			}
		}

		$data = [
			'rombel' => $rombel,
			'pd' => $pd,
		];
		$this->load->view('pages/tendik/pd', $data, FALSE);
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

	function jumlah_siswa()
	{
		$rombel = $this->db->query("SELECT DISTINCT(nama_rombel), rombongan_belajar_id, tingkat_pendidikan_id from getpesertadidik where semester_id='20222' order by nama_rombel asc")->result();
		$data = [
			'rombel' => $rombel,
		];
		$this->load->view('jumlah_siswa', $data, FALSE);
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
