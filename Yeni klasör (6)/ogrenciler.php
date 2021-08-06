<?php include("header.php"); ?>

<?php include("adminustMenu.php"); ?>


<?php include("slider.php"); ?>


			<?php 
			include("vt.php");
			$sql = mysql_query("select 
				o.OGRENCI_NO, o.SIFRE, o.E_POSTA ,o.OGRENCI_ADI,o.OGRENCI_SOYADI,o.TELEFON,b.BOLUM_ADI
			from bolum b inner join ogrenci o 
			on o.BOLUM_ID=b.BOLUM_ID ");
			
				echo '<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col"></th>
							<th scope="col">Oğrenci Numarası</th>
							<th scope="col">Şifre</th>
							<th scope="col">E_posta</th>
							<th scope="col">Adı</th>
							<th scope="col">Soyadı</th>
							<th scope="col">Telefon</th>
							<th scope="col">Bolum</th>
						</tr>
					</thead>';
				while($dizi = mysql_fetch_array($sql))
				{
					echo '<tbody>
						<tr>
							<td><a href="?kullaniciadi='.$kuladi.'&sil='.$dizi["OGRENCI_NO"].'">sil</a></td>
							<td>'.$dizi["OGRENCI_NO"].'</td>
							<td>'.$dizi["SIFRE"].'</td>
							<td>'.$dizi["E_POSTA"].'</td>
							<td>'.$dizi["OGRENCI_ADI"].'</td>
							<td>'.$dizi["OGRENCI_SOYADI"].'</td>
							<td>'.$dizi["TELEFON"].'</td>
							<td>'.$dizi["BOLUM_ADI"].'</td>
						</tr>
					</tbody>
				';
				}
				?></table>
		</div>
	</div>	
</div>		
	

<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		$kuladi = $_GET["kullaniciadi"];
		mysql_query("delete from haber where OGRENCI_NO=$sil");
		mysql_query("delete from haber where SIFRE=$sil");
		mysql_query("delete from haber where E_POSTA=$sil");
		mysql_query("delete from haber where OGRENCI_ADI=$sil");
		mysql_query("delete from haber where OGRENCI_SOYADI=$sil");
		mysql_query("delete from haber where TELEFON=$sil");
		mysql_query("delete from haber where BOLUM_ADI=$sil");
		echo '<meta http-equiv="refresh" content="0; URL=kullaniciler.php?kullaniciadi='.$kuladi.'" />';
	}
?>	


<?php include("footer.php"); ?>
