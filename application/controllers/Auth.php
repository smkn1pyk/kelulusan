<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function login()
	{
		$this->form_validation->set_rules('username', 'E-mail', 'trim|required');
		$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');
		$this->form_validation->set_rules('semester_id', 'Semester', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
		} else {
			$cekUser = $this->db->get_where('getpengguna', ['username'=>$this->input->post('username')])->result_array();
			if($cekUser){
				$merge = [];
				$salah_password = 0;
				foreach ($cekUser as $key => $value) {
					$pass = $value['password'];
					if(password_verify($this->input->post('password'), $pass)){
						$array = array(
							'semester_id' => $this->input->post('semester_id'),
							'tahun_ajaran_id' => substr($this->input->post('semester_id'), 0, 4),
						);
						$merge[] = array_merge($value, $array);
					}else{
						$salah_password = 1;
					}
				}

				if($merge){
					$array = [
						'akun' => $merge,
					];
					$this->session->set_userdata( $array );
					echo '<script>window.location.href = "app";</script>';
				}
				if($salah_password){
					?> <div class="alert alert-danger"> Kombinasi E-mail dan Kata Sandi tidak cocok ! </div> <?php
				}
			}else{
				?> <div class="alert alert-warning"> User dengan email: <?= $this->input->post('username') ?> tidak ditemukan </div> <?php
			}
		}
	}

	function pilih_akun()
	{
		if($this->input->post('akun')){
			$decrypt = json_decode($this->encryption->decrypt($this->input->post('akun')), true);
			if(is_array($decrypt)){
				if($decrypt['peran_id_str']=='Peserta Didik'){
					$this->db->order_by('semester_id', 'desc');
					$cekPd = $this->db->get_where('getpesertadidik', ['peserta_didik_id'=>$decrypt['peserta_didik_id'], 'semester_id'=>$decrypt['semester_id']])->row_array();
					if($cekPd){
						if($cekPd['tingkat_pendidikan_id']==12){
							$merge = array_merge($cekPd, $decrypt);
							$this->session->set_userdata( $merge );
							echo '<script>window.location.href = "app";</script>';
						}else{
							?> <div style="background-color: yellow;padding: 10px; color: #aaa;"> Mohon maaf, Anda belum dapat mengakses halaman ini<br>Aplikasi ini masih dalam masa pengembangan </div> <?php
						}
					}else{
						?> <div class="alert-danger"> User tidak ditemukan pada semester <?= $decrypt['semester_id'] ?> </div> <?php
					}
				}else{
					$cekPtk = $this->db->get_where('getgtk', ['ptk_id'=>$decrypt['ptk_id'], 'tahun_ajaran_id'=>$decrypt['tahun_ajaran_id']])->row_array();
					if($cekPtk){
						$merge = array_merge($decrypt, $cekPtk);
						$this->session->set_userdata( $merge );
						echo '<script>window.location.href = "app";</script>';
					}else{
						?> <div style="background-color: yellow;padding: 10px; color: #000;"> Mohon maaf, Anda belum dapat mengakses halaman ini<br>Biodata User dengan Email <?= $decrypt['username'] ?> tidak ditemukan </div> <?php
					}
				}
			}
		}else{
			?> <div style="background-color: yellow;padding: 10px; color: #aaa;"> Mohon maaf, terjadi kesalahan sitem, silahkan hubungi Administrator </div> <?php
		}
	}

	function keluar()
	{
		$this->session->sess_destroy();
		redirect('.','refresh');
		// echo '<script>window.location.href = "app";</script>';
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */