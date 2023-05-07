<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function get($folder=null, $file=null, $id=null)
	{
		if($folder&&$file){
			$data = [
				'id' => $id,
			];
			$this->load->view('forms/'.$folder.'/'.$file, $data, FALSE);
		}
	}

	function reset_password_pd($id=null)
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			?> <div class="alert alert-danger"><?= validation_errors() ?> </div> <?php
		} else {
			$pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$object = [
				'password' => $pass,
			];
			$this->db->where('peserta_didik_id', $id);
			$this->db->update('getpengguna', $object);
			if($this->db->affected_rows()>>0){
				?> <div class="alert alert-success">Berhasil menyimpan data</div> <?php
			}else{
				?> <div class="alert alert-danger">Gagal menyimpan data</div> <?php
			}
		}
	}

}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */