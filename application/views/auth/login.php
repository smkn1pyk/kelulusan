
<div class="container">
	<div class="login">
		<?php
		$tanggal_buka = date('Y-m-d H:i' , strtotime('2023-05-05 22:00'));
		$tgl = date('d-m-Y', strtotime($tanggal_buka));
		$jam = date('H:i a', strtotime($tanggal_buka));
		?>
		<div class="bg-light p-3 border rounded">
			<h3>Form Login</h3>
			<form hx-post="auth/login" hx-target="#result">
				<div class="form-group mb-3">
					<input type="email" name="username" class="form-control" placeholder="E-mail">
				</div>

				<div class="form-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="Kata Sandi">
				</div>
				<div class="d-block mb-3">
					<button class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Log-In</button>
				</div>
				<div id="result"></div>
			</form>
		</div>
		<div class="footer">
			&copy; SMK NEGERI 1 PAYAKUMBUH
		</div>
	</div>
</div>