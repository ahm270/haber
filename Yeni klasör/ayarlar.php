<?php include("girisustMenu.php"); ?>

<?php include("slider.php"); ?>

<?php include("header.php"); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
		<?php 
		$ogn = $_GET["ogrencino"];
			echo '<form action="" method="POST">
				<div class="form-row">
					<input type="hidden" class="form-control" name="ogno" placeholder="Oğrenci Numarası" value="'.$ogn.'" required>
					<div class="col-md-4 mb-3">
						<label for="inputPassword6">Şifre</label>
						<input type="password" name="sifre" class="form-control" aria-describedby="passwordHelpInline" required>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="exampleInputEmail1">E_posta</label>
						<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="kullanici@exampel.com " required>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Oğrenci Adı</label>
						<input type="text" class="form-control" name="adi" placeholder="Adı" value="" required>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Oğrenci Soyadı</label>
						<input type="text" class="form-control" name="soyadi" placeholder="Soyadı" value="" required>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Telefon</label>
						<input type="text" class="form-control" name="telefon" placeholder="05*********" value="" required>
					</div>	
					<select class="custom-select mr-sm-2" name="bolum" required>
					
							<option selected>Bolum</option>';

							include("vt.php");
							$sql = mysql_query("select * from  bolum " );
							while($dizi = mysql_fetch_array($sql)) {
								if($dizi["BOLUM_ID"]==isset($_POST["BOLUM_ID"]))
									echo '<option selected value="'.$dizi["BOLUM_ID"]. '">'.$dizi["BOLUM_ADI"].'</option>';
								else if($dizi["BOLUM_ID"]==$_GET["BOLUM_ID"])
									echo '<option selected value="'.$dizi["BOLUM_ID"]. '">'.$dizi["BOLUM_ADI"].'</option>';
								else
									echo '<option value="'.$dizi["BOLUM_ID"]. '">'.$dizi["BOLUM_ADI"].'</option>';
							}
					echo'</select>
				</div>
				<input type="submit" class="btn btn-primary" name="btng" value="Güncelle"/>
			</form>';
			?>
			
		</div>
	</div>	
</div>
	
			<?php
			if(isset($_POST["btng"])){
		include("vt.php");
		$ogno = $_POST["ogno"];
					$sifre = $_POST["sifre"];
					$email = $_POST["email"];
					$adi = $_POST["adi"];
					$soyadi = $_POST["soyadi"];
					$telefon = $_POST["telefon"];
					$bolum = $_POST["bolum"];
		$sql = mysql_query("UPDATE  ogrenci SET SIFRE='$sifre',E_POSTA='$email',OGRENCI_ADI='$adi',OGRENCI_SOYADI='$soyadi',TELEFON=$telefon,BOLUM_ID=$bolum where OGRENCI_NO=$ogno");

		echo'<ul class="nav justify-content-center">
						<div class="alert alert-success" role="alert">
							Başarılı
						</div>
					</ul>';
					echo '<meta http-equiv="refresh" content="4; URL=ogrencigiris.php />';
			}
		?>