<div class="container-fluid">
	<div class="row">
		<div class="col-3">
		
			<form action="" method="POST">
				<div class="form-group">				
					<input type="text" class="form-control" name="kullaniciadi" placeholder="Kullanıcı Adı">				
				</div>
				<div class="form-group">				
					<input type="password" class="form-control" name="Sifre" placeholder="şifre">
				</div>			  
				<input type="submit" class="btn btn-primary" name="btnGiris" value="Giriş Yap"/>
			</form>	
			<?php
				if(isset($_POST["btnGiris"])) {
					$kuladi = $_POST["kullaniciadi"];
					$sifre = $_POST["Sifre"];
					/* okan = 12345*/
					if($kuladi=="okan" && $sifre== "12345"){
						echo '<div class="alert alert-primary" role="alert">
							     Giriş Başarılı!
							  </div>';
					}
					else {
						echo '<div class="alert alert-primary" role="alert">
							     Giriş Başarısız!
							  </div>';
					}
				}
			?>
			
		</div>