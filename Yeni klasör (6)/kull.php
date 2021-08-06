<?php include("header.php"); ?>

<?php include("adminustMenu.php"); ?>


<?php include("slider.php"); ?>

<?php 
			include("vt.php");
			$sql = mysql_query("select 
				* from insanlar");
			
				echo '<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col"></th>
							<th scope="col">E_POSTA</th>
							<th scope="col">Sifre</th>
							<th scope="col">Adı</th>
							<th scope="col">Soydı</th>
						</tr>
					</thead>';
				while($dizi = mysql_fetch_array($sql))
				{
					echo '<tbody>
						<tr>
							<td><a href="?kullaniciadi='.$kuladi.'&sil='.$dizi["E_POSTA"].'">sil</a></td>
							<td>'.$dizi["E_POSTA"].'</td>
							<td>'.$dizi["SIFRE"].'</td>
							<td>'.$dizi["ADI"].'</td>
							<td>'.$dizi["SOYADI"].'</td>
						</tr>
					</tbody>
					
				';
				}
				
				?></table>
				
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		$kuladi = $_GET["kullaniciadi"];
		
		mysql_query("delete from turu where TURU_ID=$sil");
		echo '<meta http-equiv="refresh" content="0; URL=turu.php?kullaniciadi='.$kuladi.'"/>';
		
	}
?>	

<?php include("footer.php"); ?>