<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reset_password extends CI_Controller {

	public function index()
	{
		if($this->input->get('username')&&$this->input->get('password')){
			$cekUser = $this->db->get_where('getpengguna', ['username'=>$this->input->get('username')])->row_array();
			if($cekUser){
				$pass = password_hash($this->input->get('password'), PASSWORD_DEFAULT);
				$this->db->where($cekUser);
				$this->db->update('getpengguna', ['password'=>$pass]);
				if($this->db->affected_rows()>>0){
					echo "Berhasil mereset password";
				}else{
					echo "Gagal mereset password";
				}
			}
		}
		?>
		<form>
			<input type="text" name="username" placeholder="Email">
			<input type="password" name="password" placeholder="Kata Sandi">
			<input type="submit">
		</form>
		<?php
	}

}

/* End of file Reset_password.php */
/* Location: ./application/controllers/Reset_password.php */