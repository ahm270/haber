<?php include("header.php"); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-3">
		
			<form action="" method="POST">
				<div class="form-group">				
					<input type="text" class="form-control" name="ogrencino" placeholder="Oğrenci Numarası">				
				</div>
				<div class="form-group">				
					<input type="password" class="form-control" name="Sifre" placeholder="Şifre">
				</div>			  
				<input type="submit" class="btn btn-primary" name="btnGiris" value="Giriş Yap"/>
				<input type="submit" class="btn btn-secondary" name="hesapoluş" value="Hesap Oluşturma"/>
			</form>	
			<?php
				if(isset($_POST["btnGiris"])) {
					include("vt.php");
					@session_start();
					$ogrencino = $_POST["ogrencino"];
					$sifre = $_POST["Sifre"];
					$sql = mysql_query("select * from ogrenci 
					where OGRENCI_NO='$ogrencino' 
						and SIFRE='$sifre'");
						
					if(mysql_num_rows($sql))
						{
							$dizi = mysql_fetch_array($sql);
							$_SESSION["ogrencino"] = $dizi["OGRENCI_NO"];
							echo '<meta http-equiv="refresh" content="0; URL=girisindex.php?ogrencino='.$ogrencino.'" />';
						}
					else {
						echo '<div class="alert alert-primary" role="alert">
							     Giriş Başarısız!
							  </div>';
						}
				}
				if(isset($_POST["hesapoluş"])) {
					echo '<meta http-equiv="refresh" content="0; URL=oghesapolus.php?ogrencino='.$ogrencino.'" />';
				}
				
			?>
			
		</div>