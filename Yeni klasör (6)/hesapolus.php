<?php include("header.php"); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<form action="" method="POST">
				<div class="form-row">
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Tc Numarası</label>
						<input type="text" class="form-control" name="tc" placeholder="Tc Numarası" value="" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">Kullanıcı Adı</label>
						<input type="text" class="form-control" name="kuladi" placeholder="Kullanıcı Adı" value="" required>
					</div>
					<div class="col-md-4 mb-3">
						<label for="inputPassword6">Password</label>
						<input type="password" name="sifre" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" required>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="exampleInputEmail1">E_posta</label>
						<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="kullanici@exampel.com " required>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Adı</label>
						<input type="text" class="form-control" name="adi" placeholder="Adı" value="" required>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Soyadı</label>
						<input type="text" class="form-control" name="soyadi" placeholder="Soyadı" value="" required>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault01">Telefon</label>
						<input type="text" class="form-control" name="telefon" placeholder="05*********" value="" required>
					</div>
				</div>
				<input type="submit" class="btn btn-primary" name="btnkayd" value="Kaydol"/>
			</form>
			<?php 
			include("vt.php");
			$sql = mysql_query("select 
				TC_NO, KULLANICI_ADI, SIFRE ,E_POSTA,ADI,SOYADI,TELEFON
			from kullanici ");
			
				echo '<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col">TC Numarası</th>
							<th scope="col">kullanıcı</th>
							<th scope="col">Şifre</th>
							<th scope="col">E_posta</th>
							<th scope="col">Adı</th>
							<th scope="col">Soyadı</th>
							<th scope="col">Telefon</th>
						</tr>
					</thead>';
				while($dizi = mysql_fetch_array($sql))
				{
					echo '<tbody>
						<tr>
							<td>'.$dizi["TC_NO"].'</td>
							<td>'.$dizi["KULLANICI_ADI"].'</td>
							<td>'.$dizi["SIFRE"].'</td>
							<td>'.$dizi["E_POSTA"].'</td>
							<td>'.$dizi["ADI"].'</td>
							<td>'.$dizi["SOYADI"].'</td>
							<td>'.$dizi["TELEFON"].'</td>
						</tr>
					</tbody>
					
				';
				}
				?></table>
			
		</div>
	</div>	
</div>
	
		<?php
				if(isset($_POST["btnkayd"])) {
					include("vt.php");
					$tc = $_POST["tc"];
					$kuladi=$_POST["kuladi"];
					$sifre = $_POST["sifre"];
					$email = $_POST["email"];
					$adi = $_POST["adi"];
					$soyadi = $_POST["soyadi"];
					$telefon = $_POST["telefon"];
					$sql = mysql_query("insert into kullanici (TC_NO,KULLANICI_ADI,SIFRE,E_POSTA,ADI,SOYADI,TELEFON)
							values ( $tc, '$kuladi' , '$sifre', '$email', '$adi', '$soyadi', $telefon)");
					echo'<ul class="nav justify-content-center">
						<div class="alert alert-success" role="alert">
							Başarılı
						</div>
					</ul>';
					echo '<meta http-equiv="refresh" content="4; URL=giris.php" />';
				}
				
			?>
		