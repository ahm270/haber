<?php include("ust.php") ?>

Program

<?php   
		echo '<form action="" method="POST">
		
		Birim ID : <select name="Birim_ID" onchange="this.form.submit()">
		<option value="-1">Seçiniz...</option>';
		
		include("vt.php");
		$sql = mysql_query("select * from birim" );
		while($dizi = mysql_fetch_array($sql)) {
			
			if($dizi["Birim_ID"]==$_POST["Birim_ID"])
				echo '<option selected value="'.$dizi["Birim_ID"]. '">'.$dizi["Birim_Adi"].'</option>';
			else if($dizi["Birim_ID"]==$_GET["Birim_ID"])
				echo '<option selected value="'.$dizi["Birim_ID"]. '">'.$dizi["Birim_Adi"].'</option>';
			else
				echo '<option value="'.$dizi["Birim_ID"]. '">'.$dizi["Birim_Adi"].'</option>';
			
		}			
		echo '</select>
		
		Bolum ID : <select name="Bolum_ID" onchange="this.form.submit()">
		<option value="-1">Seçiniz...</option>';
		include("vt.php");
		$Birim_ID = $_POST["Birim_ID"];
		$sql = mysql_query("select * from bolum where Birim_ID = $Birim_ID " );
		while($dizi = mysql_fetch_array($sql)) {
			
			if($dizi["Bolum_ID"]==$_POST["Bolum_ID"])
				echo '<option selected value="'.$dizi["Bolum_ID"]. '">'.$dizi["Bolum_Adi"].'</option>';
			else if($dizi["Bolum_ID"]==$_GET["Bolum_ID"])
				echo '<option selected value="'.$dizi["Bolum_ID"]. '">'.$dizi["Bolum_Adi"].'</option>';
			else
				echo '<option value="'.$dizi["Bolum_ID"]. '">'.$dizi["Bolum_Adi"].'</option>';
			
		}			
		echo '</select>
		
		
		Program ID : <select name="Program_ID">
		<option value="-1">Seçiniz...</option>';
		include("vt.php");
		$Birim_ID = $_POST["Birim_ID"];
		$Bolum_ID = $_POST["Bolum_ID"];
		$sql = mysql_query("select * from program where Birim_ID = $Birim_ID and Bolum_ID = $Bolum_ID " );
		while($dizi = mysql_fetch_array($sql)) {
			
			if($dizi["Program_ID"]==$_POST["Program_ID"])
				echo '<option selected value="'.$dizi["Program_ID"]. '">'.$dizi["Program_Adi"].'</option>';
			else if($dizi["Program_ID"]==$_GET["Bolum_ID"])
				echo '<option selected value="'.$dizi["Program_ID"]. '">'.$dizi["Program_Adi"].'</option>';
			else
				echo '<option value="'.$dizi["Program_ID"]. '">'.$dizi["Program_Adi"].'</option>';
			
		}			
		echo '</select>
		<br/>
		
		Ders ID : <input type="text" name="Ders_ID" value="';
		
		if (isset($_GET["id"])) echo $_GET["id"];
		
		echo '"><br/>
		Ders Adi :<input name="Ders_Adi" type="text" value="';
		if (isset($_GET["adi"])) echo $_GET["adi"];
		
		echo '"><br/>
		
		Ders Saatı Başı :<input name="DersSaatiBas" type="text" value="';
		if (isset($_GET["DersSaatiBas"])) echo $_GET["DersSaatiBas"];
		
		echo '"><br/>
		
		Ders Saatı Bitis :<input name="DersSaatiBitis" type="text" value="';
		if (isset($_GET["DersSaatiBitis"])) echo $_GET["DersSaatiBitis"];
		
		echo '"><br/>
		
		Gün :<input name="Gun" type="text" value="';
		if (isset($_GET["Gun"])) echo $_GET["Gun"];
		
		echo '"><br/>
		
		Ders Hocası :<input name="DersHocasi" type="text" value="';
		if (isset($_GET["DersHocasi"])) echo $_GET["DersHocasi"];
		
		echo '"><br/>
		
		Dönem ID : <select name="Donem_ID">
		<option value="-1">Seçiniz...</option>';
		include("vt.php");
		$sql = mysql_query("select * from donem" );
		while($dizi = mysql_fetch_array($sql)) {
			
			if($dizi["Donem_ID"]==$_POST["Donem_ID"])
				echo '<option selected value="'.$dizi["Donem_ID"]. '">'.$dizi["Donem_Adi"].'</option>';
			else if($dizi["Donem_ID"]==$_GET["Donem_ID"])
				echo '<option selected value="'.$dizi["Donem_ID"]. '">'.$dizi["Donem_Adi"].'</option>';
			else
				echo '<option value="'.$dizi["Donem_ID"]. '">'.$dizi["Donem_Adi"].'</option>';
			
		}			
		echo '</select>
		<br/>
		
		Sinif ID : <select name="Sinif_ID">
		<option value="-1">Seçiniz...</option>';
		include("vt.php");
		$sql = mysql_query("select * from sinif" );
		while($dizi = mysql_fetch_array($sql)) {
			
			if($dizi["Sinif_ID"]==$_POST["Sinif_ID"])
				echo '<option selected value="'.$dizi["Sinif_ID"]. '">'.$dizi["Sinif_Adi"].'</option>';
			else if($dizi["Sinif_ID"]==$_GET["Sinif_ID"])
				echo '<option selected value="'.$dizi["Sinif_ID"]. '">'.$dizi["Sinif_Adi"].'</option>';
			else
				echo '<option value="'.$dizi["Sinif_ID"]. '">'.$dizi["Sinif_Adi"].'</option>';
			
		}			
		echo '</select>
		<br/>
		<input name="Ekle" type="submit" value="Ekle">
		<input type="submit" name="UPDATE" value="Güncelle">
		
		
		</form>';
		include("vt.php");
		$sql = mysql_query("select 
				d.Ders_ID,d.Ders_Adi,d.DersSaatiBas,d.DersSaatiBitis,d.Gun,d.DersHocasi,p.Program_ID, p.Program_Adi, o.Bolum_Adi,o.Bolum_ID,b.Birim_Adi,b.Birim_ID,m.Donem_ID,m.Donem_Adi,s.Sinif_ID,s.Sinif_Adi
			from dersprogram d inner join bolum o
			on d.Bolum_ID=o.Bolum_ID inner join Birim b on b.Birim_ID = d.Birim_ID inner join program p on d.Program_ID = p.Program_ID inner join donem m on d.Donem_ID = m.Donem_ID inner join sinif s on d.Sinif_ID = s.Sinif_ID ");
	
		echo "<table border='1'>
			<tr>
				<td></td>
				<td></td>
				<td>Ders ID</td>
				<td>Ders Adi</td>
				<td>Ders Saatı Başı</td>
				<td>Ders Saatı Bitis</td>
				<td>Gün</td>
				<td>Ders Hocası</td>
				<td>Birim</td>
				<td>Bolum</td>
				<td>Program</td>
				<td>Dönem</td>
				<td>Sinif</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
		echo '<tr>
			<td><a href="?id='.$dizi["Ders_ID"].'&adi='.$dizi["Ders_Adi"].'&DersSaatiBas='.$dizi["DersSaatiBas"].'&DersSaatiBitis='.$dizi["DersSaatiBitis"].'&Gun='.$dizi["Gun"].'&DersHocasi='.$dizi["DersHocasi"].'&Birim_ID='.$dizi["Birim_ID"].'&Bolum_ID='.$dizi["Bolum_ID"].'&Program_ID='.$dizi["Program_ID"].'&Donem_ID='.$dizi["Donem_ID"].'&Sinif_ID='.$dizi["Sinif_ID"].'">gitir</a></td>
			<td><a href="?sil='.$dizi["Ders_ID"].'">sil</a></td>
			<td>'.$dizi["Ders_ID"].'</td>
			<td>'.$dizi["Ders_Adi"].'</td>
			<td>'.$dizi["DersSaatiBas"].'</td>
			<td>'.$dizi["DersSaatiBitis"].'</td>
			<td>'.$dizi["Gun"].'</td>
			<td>'.$dizi["DersHocasi"].'</td>
			<td>'.$dizi["Birim_Adi"].'</td>
			<td>'.$dizi["Bolum_Adi"].'</td>
			<td>'.$dizi["Program_Adi"].'</td>
			<td>'.$dizi["Donem_Adi"].'</td>
			<td>'.$dizi["Sinif_Adi"].'</td>
		</tr>';
		}
		echo "</table>";
		
		
?>

<?php include("alt.php") ?>

<?php
	
	if(isset($_POST["Ekle"])){
		include("vt.php");
		$Ders_ID = $_POST["Ders_ID"];
		$Ders_Adi = $_POST["Ders_Adi"];
		$DersSaatiBas = $_POST["DersSaatiBas"];
		$DersSaatiBitis = $_POST["DersSaatiBitis"];
		$Gun = $_POST["Gun"];
		$DersHocasi = $_POST["DersHocasi"];
		$Birim_ID = $_POST["Birim_ID"];
		$Bolum_ID = $_POST["Bolum_ID"];
		$Program_ID = $_POST["Program_ID"];
		$Donem_ID = $_POST["Donem_ID"];
		$Sinif_ID = $_POST["Sinif_ID"];
		if(empty($Ders_ID))
		{
		$sql = mysql_query("insert into dersprogram (Ders_ID, Ders_Adi,DersSaatiBas,DersSaatiBitis,Gun,DersHocasi,Birim_ID,Bolum_ID,Program_ID,Donem_ID,Sinif_ID)
							values (0 , '$Ders_Adi','$DersSaatiBas','$DersSaatiBitis','$Gun','$DersHocasi',$Birim_ID,$Bolum_ID,$Program_ID,$Donem_ID,$Sinif_ID)");

		}
		else
		{
		$sql = mysql_query("insert into dersprogram (Ders_ID, Ders_Adi,DersSaatiBas,DersSaatiBitis,Gun,DersHocasi,Birim_ID,Bolum_ID,Program_ID,Donem_ID,Sinif_ID)
							values ($Ders_ID , '$Ders_Adi','$DersSaatiBas','$DersSaatiBitis','$Gun','$DersHocasi',$Birim_ID,$Bolum_ID,$Program_ID,$Donem_ID,$Sinif_ID)");

		}
		echo "Kayıt Başarılı!";
		header("location: dersprogram.php");
	}
?>
<?php
	
	if(isset($_POST["UPDATE"])){
		include("vt.php");
		$Ders_ID = $_POST["Ders_ID"];
		$Ders_Adi = $_POST["Ders_Adi"];
		$DersSaatiBas = $_POST["DersSaatiBas"];
		$DersSaatiBitis = $_POST["DersSaatiBitis"];
		$Gun = $_POST["Gun"];
		$DersHocasi = $_POST["DersHocasi"];
		$Birim_ID = $_POST["Birim_ID"];
		$Bolum_ID = $_POST["Bolum_ID"];
		$Program_ID = $_POST["Program_ID"];
		$Donem_ID = $_POST["Donem_ID"];
		$Sinif_ID = $_POST["Sinif_ID"];
		$sql = mysql_query("UPDATE  dersprogram SET Ders_Adi='$Ders_Adi',DersSaatiBas='$DersSaatiBas',DersSaatiBitis='$DersSaatiBitis',Gun='$Gun',DersHocasi='$DersHocasi',Birim_ID=$Birim_ID,Bolum_ID=$Bolum_ID,Program_ID=$Program_ID,Donem_ID=$Donem_ID,Sinif_ID=$Sinif_ID where Ders_ID=$Ders_ID");

		echo "guncelledi!";
		
		header("location: dersprogram.php");
		
	}
?>
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from dersprogram where Ders_ID=$sil");
		
		echo '<meta http-equiv="refresh" content="0; URL=dersprogram.php" />';
	}
?>	


<?php include("alt.php") ?>

