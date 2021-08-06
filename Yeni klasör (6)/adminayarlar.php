<?php include("adminustMenu.php"); ?>

<?php include("slider.php"); ?>

<?php include("header.php"); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
		<?php 
		$kuladi = $_GET["kullaniciadi"];
		include("vt.php");
				$sql1 = mysql_query("select 
				*
			from kullanici where KULLANICI_ADI='$kuladi'");
			while($diz = mysql_fetch_array($sql1))
				{
		
			echo '<form action="" method="POST">
				<div class="form-row">
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Tc Numarası</label>
						<input type="text" class="form-control" name="tc" placeholder="Tc Numarası" value="'.$diz["TC_NO"].'" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">Kullanıcı Adı</label>
						<input type="text" class="form-control" name="kuladi" placeholder="Kullanıcı Adı" value="'.$diz["KULLANICI_ADI"].'" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="inputPassword6">Password</label>
						<input type="password" name="sifre" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" required>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="exampleInputEmail1">E_posta</label>
						<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="kullanici@exampel.com" value="'.$diz["E_POSTA"].'" required>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Adı</label>
						<input type="text" class="form-control" name="adi" placeholder="Adı" value="'.$diz["ADI"].'" required>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Soyadı</label>
						<input type="text" class="form-control" name="soyadi" placeholder="Soyadı" value="'.$diz["SOYADI"].'" required>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Telefon</label>
						<input type="text" class="form-control" name="telefon" placeholder="05*********" value="'.$diz["TELEFON"].'" required>
					</div>
				</div>
				<input type="submit" class="btn btn-primary" name="btng" value="Güncelle"/>
				</form>';}
			?>
			
		</div>
	</div>	
</div>
	
			<?php
			if(isset($_POST["btng"])){
					include("vt.php");
					$tc = $_POST["tc"];
					$kuladi=$_POST["kuladi"];
					$sifre = $_POST["sifre"];
					$email = $_POST["email"];
					$adi = $_POST["adi"];
					$soyadi = $_POST["soyadi"];
					$telefon = $_POST["telefon"];
					$sql = mysql_query("UPDATE  kullanici SET KULLANICI_ADI='$kuladi',SIFRE='$sifre',E_POSTA='$email',ADI='$adi',SOYADI='$soyadi',TELEFON=$telefon where TC_NO=$tc");

		echo'<ul class="nav justify-content-center">
						<div class="alert alert-success" role="alert">
							Başarılı
						</div>
					</ul>';
					echo '<meta http-equiv="refresh" content="4; URL=giris.php" />';
			}
			
		?>