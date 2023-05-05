<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pbm extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$array = array(
			'semester_id' => '20222',
			'tahun_ajaran_id' => '2022',
		);
		
		$this->session->set_userdata( $array );
	}

	public function index()
	{
		$this->pembagian_tugas();
	}

	function pembelajaran()
	{
		if($this->input->get('rombel')){
			$rombel = $this->db->get_where('getrombonganbelajar', ['semester_id'=>$this->session->userdata('semester_id'),'rombongan_belajar_id'=>$this->input->get('rombel')])->result();
		}else{
			$this->db->order_by('nama', 'asc');
			$rombel = $this->db->get_where('getrombonganbelajar', ['semester_id'=>$this->session->userdata('semester_id')])->result();
		}
		$this->db->order_by('nama', 'asc');
		$srombel = $this->db->get_where('getrombonganbelajar', ['semester_id'=>$this->session->userdata('semester_id')])->result();
		$data = [
			'page' => 'pembelajaran',
			'rombel' => $rombel,
			'srombel' =>$srombel,
		];
		$this->load->view('template', $data, FALSE);
	}

	function pembagian_tugas()
	{
		$sgtk = $this->db->get_where('getgtk', ['tahun_ajaran_id'=>$this->session->userdata('tahun_ajaran_id'),'jenis_ptk_id<'=>11])->result();
		if($this->input->get('gtk')){
			$gtk = $this->db->get_where('getgtk', ['tahun_ajaran_id'=>$this->session->userdata('tahun_ajaran_id'),'ptk_id'=>$this->input->get('gtk')])->result();
		}else{
			$gtk = $this->db->get_where('getgtk', ['tahun_ajaran_id'=>$this->session->userdata('tahun_ajaran_id'), 'ptk_id'=>'beab105f-0887-46d4-b826-fdab58c1e0e6'])->result();
		}
		$data = [
			'sgtk' => $sgtk,
			'gtk' => $gtk,
			'page' => 'pembagian_tugas',
		];
		$this->load->view('template', $data, FALSE);
	}

}

/* End of file Pbm.php */
/* Location: ./application/controllers/Pbm.php */