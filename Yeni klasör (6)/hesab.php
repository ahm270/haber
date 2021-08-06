<?php include("header.php"); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<form action="" method="POST">
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="exampleInputEmail1">E_posta</label>
						<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="kullanici@exampel.com " required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="inputPassword6">Şifre</label>
						<input type="password" name="sifre" class="form-control" aria-describedby="passwordHelpInline" required>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Adı</label>
						<input type="text" class="form-control" name="adi" placeholder="Adı" value="" required>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Soyadı</label>
						<input type="text" class="form-control" name="soyadi" placeholder="Soyadı" value="" required>
					</div>
				</div>
				<input type="submit" class="btn btn-primary" name="btnkayd" value="Kaydol"/>
			</form>
			
		</div>
	</div>	
</div>
	
		<?php
				if(isset($_POST["btnkayd"])) {
					include("vt.php");
					$sifre = $_POST["sifre"];
					$email = $_POST["email"];
					$adi = $_POST["adi"];
					$soyadi = $_POST["soyadi"];
					$sql = mysql_query("insert into insanlar (E_POSTA,SIFRE,ADI,SOYADI)
							values ( '$email', '$sifre', '$adi', '$soyadi')");
					echo'<ul class="nav justify-content-center">
						<div class="alert alert-success" role="alert">
							Başarılı
						</div>
					</ul>';
					echo '<meta http-equiv="refresh" content="4; URL=kulgiris.php" />';
				}
				
			?>
			