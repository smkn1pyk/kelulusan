<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$array = array(
			'semester_id' => '20222',
		);
		
		$this->session->set_userdata( $array );
	}

	public function index($aksi=null, $id=null)
	{
		$this->verval($aksi,$id);
	}

	function maintanance()
	{
		echo "<h1>Mohon maaf, aplikasi akan kami buka sebentar lagi pada Jam 20.00</h1>";
	}

	function verval($aksi=null,$id=null)
	{
		if($aksi&&$id){
			$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
			$this->form_validation->set_rules('kota_kabupaten', 'Kota/Kabupaten', 'trim|required');
			$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
			$this->form_validation->set_rules('desa_kelurahan', 'Desa/Kelurahan', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				echo "<div class='alert alert-danger'>".validation_errors()."</div>";
			} else {
				$aID = ['peserta_didik_id'=>$id,'tgl_update'=>date('Y-m-d H:i:s'),'status'=>0];
				$merge = array_merge($aID, $_POST);
				if($merge){
					$cekVervalAlamat = $this->db->get_where('verval_alamat', ['peserta_didik_id'=>$id])->row_array();
					if($cekVervalAlamat){
						$this->db->where('peserta_didik_id', $id);
						$this->db->update('verval_alamat', $merge);
						if($this->db->affected_rows()>>0){
							?> <div class="alert alert-success">Berhasil memperbaharui data</div> <?php
						}else{
							?> <div class="alert alert-danger">Gagal memperbaharui data</div> <?php
						}
					}else{
						$this->db->insert('verval_alamat', $merge);
						if($this->db->affected_rows()>>0){
							?> <div class="alert alert-success">Berhasil menyimpan data</div> <?php
						}else{
							?> <div class="alert alert-danger">Gagal menyimpan data</div> <?php
						}
					}
				}
			}
		}
		$rombel = $this->db->query("SELECT DISTINCT(nama), rombongan_belajar_id from getrombonganbelajar where semester_id='".$this->session->userdata('semester_id')."' and jenis_rombel='1' order by nama asc")->result();
		if($this->input->get('rombel')){
			$this->db->order_by('nama', 'asc');
			$pd = $this->db->get_where('getpesertadidik', ['rombongan_belajar_id'=>$this->input->get('rombel'),'semester_id'=>$this->session->userdata('semester_id')])->result();
		}else{
			$this->db->order_by('nama', 'asc');
			$pd = $this->db->get_where('getpesertadidik', ['rombongan_belajar_id'=>'d9fb6dca-7a50-401f-a3f3-f35e721c647b', 'semester_id'=>$this->session->userdata('semester_id')])->result();
		}
		$data = [
			'title' => 'Siswa',
			'page' => 'siswa',
			'rombel' => $rombel,
			'siswa' => $pd,
		];
		$this->load->view('template_siswa', $data, FALSE);
	}

	function rekap_data()
	{
		$this->db->order_by('nama', 'asc');
		$rombel = $this->db->get_where('getrombonganbelajar', ['semester_id'=>$this->session->userdata('semester_id'),'jenis_rombel'=>1])->result();
		$data = [
			'page' => 'rekap_data',
			'rombel' => $rombel,
		];
		$this->load->view('template_siswa', $data, FALSE);
	}

	function invalid()
	{
		$invalid = $this->db->get_where('verval_alamat', ['status'=>2])->result();
		$this->db->order_by('nama', 'asc');
		$rombel = $this->db->get_where('getrombonganbelajar', ['semester_id'=>$this->session->userdata('semester_id')])->result();
		$data = [
			'title' => "Invali Data",
			'page' => 'data_invalid',
			'rombel' => $rombel,
			'invalid' => $invalid,
		];
		$this->load->view('template_siswa', $data, FALSE);
	}

	function detail($id){
		if($id){
			$cekVervalAlamat = $this->db->get_where('verval_alamat', ['peserta_didik_id'=>$id])->row_array();
			$data = [
				'id' => $id,
				'siswa' => $cekVervalAlamat,
			];
			$this->load->view('detail_siswa', $data, FALSE);
		}else{
			?> <div class="alert-danger p-5">Terjadi kesalahan sistem, silahkan refresh halaman anda</div> <?php
		}
	}

	function pesan($id=null)
	{
		if($id){
			$cekPesan = $this->db->get_where('verval_alamat', ['peserta_didik_id'=>$id])->row_array();
			$data = [
				'pesan' => $cekPesan,
			];
			$this->load->view('pesan_verval', $data, FALSE);
		}
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */