<?php include("header.php"); ?>
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
					include("vt.php");
					@session_start();
					$kuladi = $_POST["kullaniciadi"];
					$sifre = $_POST["Sifre"];
					$sql = mysql_query("select * from kullanici 
					where KULLANICI_ADI='$kuladi' 
						and SIFRE='$sifre'");
						
					if(mysql_num_rows($sql))
						{
							$dizi = mysql_fetch_array($sql);
							
							$_SESSION["kuladi"] = $dizi["KULLANICI_ADI"];
							$_SESSION["kulid"] = $dizi["TC_NO"];
							header("Location: admin.php?kullaniciadi=$kuladi");
							echo '<meta http-equiv="refresh" content="0; URL=admin.php?kullaniciadi='.$kuladi.'" />';
							
						}
					else {
						echo '<div class="alert alert-primary" role="alert">
							     Giriş Başarısız!
							  </div>';
						}
				}
				
			?>
			
		</div>