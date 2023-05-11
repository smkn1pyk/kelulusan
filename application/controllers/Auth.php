<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function login()
	{
		$this->form_validation->set_rules('username', 'E-mail', 'trim|required');
		$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required');
		// $this->form_validation->set_rules('semester_id', 'Semester', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			?> <div class="alert alert-danger"> <?= validation_errors() ?> </div> <?php
		} else {
			$cekUser = $this->db->get_where('getpengguna', ['username'=>$this->input->post('username'), 'status'=>1])->row_array();
			if($cekUser){
				$salah_password = 0;
				$pass = $cekUser['password'];
				if(password_verify($this->input->post('password'), $pass)){
					if($cekUser['peserta_didik_id']){
						$this->db->order_by('semester_id', 'desc');
						$getpesertadidik = $this->db->get_where('getpesertadidik', ['peserta_didik_id'=>$cekUser['peserta_didik_id']])->row_array();
						if($getpesertadidik){
							$tingkat_akhir = $this->db->query("SELECT max(tingkat_pendidikan_id) as tingkat_pendidikan_id from getpesertadidik")->row_array();
							if($getpesertadidik['tingkat_pendidikan_id']==$tingkat_akhir['tingkat_pendidikan_id']){
								$merge = array_merge($cekUser, $getpesertadidik);
								$this->session->set_userdata( $merge );
								echo '<script>window.location.href = ".";</script>';
							}else{
								?> <div class="alert alert-warning"> Mohon maaf, anda tidak dapat mengakse aplikasi ini,<br>Aplikasi ini hanya ditujukan untuk Peserta Didik tingkat akhir </div> <?php
							}
						}else{
							?> <div class="alert alert-warning">Mohon maaf, sistem tidak menemukan biodata anda, silahkan menghubungi Operator Sekolah</div> <?php
						}
					}else{
						?> <div class="alert alert-warning"> Mohon maaf, Anda tidak dapat mengakses aplikasi ini<br>Aplikasi ini ditujukan hanya untuk peserta didik</div> <?php
					}
				}else{
					?> <div class="alert alert-danger"> Kombinasi E-mail dan Kata Sandi tidak cocok!</div> <?php
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
				if($decrypt['peserta_didik_id']){
					$this->db->order_by('semester_id', 'desc');
					$cekPd = $this->db->get_where('getpesertadidik', ['peserta_didik_id'=>$decrypt['peserta_didik_id']])->row_array();
					if($cekPd){
						if($cekPd['tingkat_pendidikan_id']==12){
							$merge = array_merge($cekPd, $decrypt);
							$this->session->set_userdata( $merge );
							echo '<script>window.location.href = "app";</script>';
						}else{
							?> <div class="alert alert-warning"> Mohon maaf, Anda tidak dapat mengakses halaman ini<br>Aplikasi ini hanya untuk peserta didik tingkat akhir </div> <?php
						}
					}else{
						?> <div class="alert alert-danger">Biodata User: <b><?= $decrypt['username'] ?></b> tidak ditemukan pada tahun ajar <?= $decrypt['semester_id'] ?> </div> <?php
					}
				}else{
					?> <div class="alert alert-warning"> Mohon maaf, Anda tidak dapat mengakses halaman ini<br>Aplikasi ini hanya ditujukan untuk Peserta Didik</div> <?php
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