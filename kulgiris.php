<?php include("header.php"); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-3">
		
			<form action="" method="POST">
				<div class="form-group">				
					<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="kullanici@exampel.com ">
				</div>
				<div class="form-group">				
					<input type="password" class="form-control" name="Sifre" placeholder="şifre">
				</div>			  
				<input type="submit" class="btn btn-primary" name="btnGiris" value="Giriş Yap"/>
				<input type="submit" class="btn btn-primary" name="hesab" value="Hesap Oluşturma"/>
			</form>	
			<?php
				if(isset($_POST["btnGiris"])) {
					include("vt.php");
					@session_start();
					$email = $_POST["email"];
					$sifre = $_POST["Sifre"];
					$sql = mysql_query("select * from insanlar 
					where E_POSTA='$email' 
						and SIFRE='$sifre'");
						
					if(mysql_num_rows($sql))
						{
							$dizi = mysql_fetch_array($sql);
							
							$_SESSION["email"] = $dizi["E_POSTA"];
							
							
							echo '<meta http-equiv="refresh" content="0; URL=kul.php?email='.$email.'" />';
							
						}
					else {
						echo '<div class="alert alert-primary" role="alert">
							     Giriş Başarısız!
							  </div>';
						}
				}
				
			?>
			<?php 
if(isset($_POST["hesab"])){
	 echo '<meta http-equiv="refresh" content="0; URL=hesab.php"/>';
}

 ?>	
			
		</div>