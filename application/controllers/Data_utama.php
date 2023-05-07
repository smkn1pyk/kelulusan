<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_utama extends CI_Controller {

	public function peserta_didik()
	{
		$data = [
			'titile' => "Peserta Didik",
			'page' => base_url('data_utama/data_peserta_didik'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_peserta_didik()
	{
		$rombel = $this->db->query('SELECT DISTINCT(rombongan_belajar_id), nama_rombel from getpesertadidik where semester_id="'.$this->session->userdata('semester_id').'" and tingkat_pendidikan_id="12" order by nama_rombel asc')->result();
		if($this->input->get('rombel')){
			$this->db->order_by('nama', 'asc');
			$pd = $this->db->get_where('getpesertadidik', ['tingkat_pendidikan_id'=>'12', 'semester_id'=>$this->session->userdata('semester_id'), 'rombongan_belajar_id'=>$this->input->get('rombel'), 'status'=>1])->result();
		}else{
			$this->db->order_by('nama_rombel', 'asc');
			$pd = $this->db->get_where('getpesertadidik', ['tingkat_pendidikan_id'=>'12', 'semester_id'=>$this->session->userdata('semester_id'), 'status'=>1])->result();
		}
		$data = [
			'rombel' => $rombel,
			'pd' => $pd,
		];
		$this->load->view('pages/tendik/pd', $data, FALSE);
	}

}

/* End of file Data_utama.php */
/* Location: ./application/controllers/Data_utama.php */