<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$cekSurat = $this->db->get('lulusan', ['semester_id'=> '20222'])->result();
		if(!$cekSurat){
			$object = [
				'uniq' => uniqid(),
				'nomor_surat' => '421.3/352/SMKN.1/PYK-2023',
				'nomor_surat_keputusan' => '421.3/352/SMKN.1/PYK-2023',
				'tanggal_keputusan' => '2023-05-05',
				'tanggal_surat' => '2023-05-05',
				'semester_id' => '20222'
			];

			$data_siswa_tingkat_akhir = $this->db->get_where('getpesertadidik', ['tingkat_pendidikan_id'=>'12', 'semester_id'=>'20222'])->result();
			foreach ($data_siswa_tingkat_akhir as $key => $value) {
				$object1[] = [
					'uniq' => uniqid(),
					'peserta_didik_id' => $value->peserta_didik_id,
					'semester_id' => '20222',
					'status' => 1,
				];
			}
			$this->db->insert_batch('data_lulusan', $object1);
			$this->db->insert('lulusan', $object);
		}
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

	}

	private function _guru()
	{
		$data = [

		];
		$this->load->view('pages/guru/pengembangan', $data, FALSE);
	}

	private function _lulusan()
	{
		$data = [
			'title' => $this->session->userdata('nama'),
			'siswa' => $this->session->all_userdata(),
			'rombel' => $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$this->session->userdata('rombongan_belajar_id')])->row_array(),
			'lulusan' => $this->db->get_where('lulusan', ['semester_id'=>$this->session->userdata('semester_id')])->row_array(),
			'status' => $this->db->get_where('data_lulusan', ['peserta_didik_id'=>$this->session->userdata('peserta_didik_id'), 'semester_id'=>$this->session->userdata('semester_id')])->row_array(),
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
		$semester_id = $this->db->query("SELECT DISTINCT(semester_id) from getsekolah")->result();
		if($semester_id){
			$semester_id = $semester_id;
		}else{
			if(date('m')>6){
				$sm = date('Y').'1';
			}else
			if(date('m')<7){
				$sm = date('Y') - 1;
				$sm = $sm.'2';
			}
			$semester_id[] = json_decode(json_encode(['semester_id'=>$sm]));
		}
		$data = [
			'title' => "Log-In",
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
