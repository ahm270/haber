<?php include("header.php"); ?>

<?php include("adminustMenu.php"); ?>


<?php include("slider.php"); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
		
			
			<?php 
			include("vt.php");
			$kuladi = $_GET["kullaniciadi"];
			$sql = mysql_query("select 
				TC_NO, KULLANICI_ADI, SIFRE ,E_POSTA,ADI,SOYADI,TELEFON
			from kullanici ");
			
				echo '<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col"></th>
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
							<td><a href="?kullaniciadi='.$kuladi.'&sil='.$dizi["TC_NO"].'">sil</a></td>
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
				<form action="" method="POST">
					<input type="submit" class="btn btn-secondary" name="hesapoluş" value="Yeni Kullanıcı"/>
					<form>
		</div>
	</div>	
</div>		
	

<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		$kuladi = $_GET["kullaniciadi"];
		mysql_query("delete from kullanici where TC_NO=$sil");
		
		echo '<meta http-equiv="refresh" content="0; URL=kullaniciler.php?kullaniciadi='.$kuladi.'" />';
	}
	
				if(isset($_POST["hesapoluş"])) {
					
					echo '<meta http-equiv="refresh" content="0; URL=hesapolus.php?kullaniciadi='.$kuladi.'" />';
				}
?>	


<?php include("footer.php"); ?>
