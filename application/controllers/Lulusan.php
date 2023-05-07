<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lulusan extends CI_Controller {

	public function informasi()
	{
		$data = [
			'title' => 'Informasi',
			'page' => base_url('lulusan/data_informasi'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_informasi($aksi=null, $id=null)
	{
		if($aksi){
			$aksi1 = '_'.$aksi;
			$this->$aksi1($id);
		}
		$data = [
			'informasi' => $this->db->get_where('lulusan_informasi', ['semester_id'=>$this->session->userdata('semester_id')])->result(),
		];
		$this->load->view('pages/tendik/informasi', $data, FALSE);
	}

	private function _tambah_informasi($id)
	{
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('isi', 'Isi Informasi', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
		} else {
			$object = [
				'uniq' => uniqid(),
				'judul' => $this->input->post('judul'),
				'isi' => htmlspecialchars($this->input->post('isi')),
				'semester_id' => $this->session->userdata('semester_id'),
			];
			$this->db->insert('lulusan_informasi', $object);
			if($this->db->affected_rows()>>0){
				?> <div class="alert alert-success"> Berhasil menambahkan data </div> <?php
			}else{
				?> <div class="alert alert-danger"> Gagal menambhakan data</div> <?php
			}
		}
	}

	private function _hapus_informasi($id)
	{
		if($id){
			$this->db->where('uniq', $id);
			$this->db->delete('lulusan_informasi');
			if($this->db->affected_rows()>0){
				?> <div class="alert alert-success"> Berhasil menghapus data </div> <?php
			}else{
				?> <div class="alert alert-danger"> Gagal menghapus data </div> <?php
			}
		}else{
			?> <div class="alert alert-danger"> Terjadi kesalahan sistem </div> <?php
		}
	}

}

/* End of file Lulusan.php */
/* Location: ./application/controllers/Lulusan.php */