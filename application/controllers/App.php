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
				$this->_lulusan();
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
			'lulusan' => $this->db->get_where('lulusan', ['semester_id'=>$this->session->userdata('semester_id')])->row_array(),
			'status' => $this->db->get_where('data_lulusan', ['peserta_didik_id'=>$this->session->userdata('peserta_didik_id'), 'semester_id'=>$this->session->userdata('semester_id')])->row_array(),
		];
		$this->load->view('lulusan', $data, FALSE);
	}

	function tanggal_buka()
	{
		
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
		];
		$this->load->view('auth/login', $data, FALSE);
	}

	function proses_login()
	{
		$this->form_validation->set_rules('username', 'E-mail', 'trim|required');
		$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			?> <div style="background-color: red;padding: 10px; color: #eee;"> <?= validation_errors() ?> </div> <?php
		} else {
			$cekUser = $this->db->get_where('getpengguna', ['username'=>$this->input->post('username')])->result();
			if($cekUser){
				foreach ($cekUser as $key => $value) {
					$pass = $value->password;
					if(password_verify($this->input->post('password'), $pass)){
						$array = array(
							'akun' => $cekUser,
						);
						$this->session->set_userdata( $array );
						echo '<script>window.location.href = "app";</script>';
					}else{
						?> <div style="background-color: yellow;padding: 10px; color: #aaa;"> Kombinasi E-mail dan Kata Sandi tidak cocok ! </div> <?php
					}
				}
			}else{
				?> <div style="background-color: yellow;padding: 10px; color: #aaa;"> User dengan email: <?= $this->input->post('username') ?> tidak ditemukan </div> <?php
			}
		}
	}

	function pilih_akun()
	{
		$data = [
			'title' => 'Pilih Hak Akses',
			'akun' => $this->session->userdata('akun'),
		];
		$this->load->view('auth/pilih_akun', $data, FALSE);
	}

	function proses_pilih_akun()
	{
		if($this->input->post('akun')){
			$decrypt = json_decode($this->encryption->decrypt($this->input->post('akun')), true);
			if(is_array($decrypt)){
				if($decrypt['peran_id_str']=='Peserta Didik'){
					$this->db->order_by('semester_id', 'desc');
					$cekPd = $this->db->get_where('getpesertadidik', ['peserta_didik_id'=>$decrypt['peserta_didik_id']])->row_array();
					if($cekPd){
						if($cekPd['tingkat_pendidikan_id']==12){
							$merge = array_merge($cekPd, $decrypt);
							$this->session->set_userdata( $merge );
							echo '<script>window.location.href = "app";</script>';
						}else{
							?> <div style="background-color: yellow;padding: 10px; color: #aaa;"> Mohon maaf, Anda belum dapat mengakses halaman ini<br>Aplikasi ini masih dalam masa pengembangan </div> <?php
						}
					}
				}else{
					?> <div style="background-color: yellow;padding: 10px; color: #aaa;"> Mohon maaf, Anda belum dapat mengakses halaman ini<br>Aplikasi ini masih dalam masa pengembangan </div> <?php
				}
			}
		}else{
			?> <div style="background-color: yellow;padding: 10px; color: #aaa;"> Mohon maaf, terjadi kesalahan sitem, silahkan hubungi Administrator </div> <?php
		}
	}

	function keluar()
	{
		$this->session->sess_destroy();
		echo '<script>window.location.href = "app";</script>';
	}
}
