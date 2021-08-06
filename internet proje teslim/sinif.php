<?php include("ust.php") ?>

Birim

<?php

	@session_start();
	
		echo '<form action="" method="POST">
		
		Sinif ID : <input type="text" name="Sinif_ID" value="';
		
		if (isset($_GET["id"])) echo $_GET["id"];
		
		echo '" ><br/>
		Sinif Adi :<input name="Sinif_Adi" type="text" value="';
		
		if (isset($_GET["adi"])) echo $_GET["adi"];
		
		echo '"><br/>
		
		Sinif Türü: <input type="text" name="Sinif_Turu" value="';
		
		if (isset($_GET["st"])) echo $_GET["st"];
		
		echo '" ><br/>
		
		Sinif Kapasitesi : <input type="text" name="Sinif_Kapasitesi" value="';
		
		if (isset($_GET["fk"])) echo $_GET["fk"];
		
		echo '" ><br/>
		
		Sinav Kapasitesi: <input type="text" name="Sinav_Kapasitesi" value="';
		
		if (isset($_GET["vk"])) echo $_GET["vk"];
		
		echo '" ><br/>
		
		
		<input name="Ekle" type="submit" value="Ekle">
		<input type="submit" name="UPDATE" value="Güncelle">
		
		</form>';
		include("vt.php");
		$sql = mysql_query("select * from sinif");
	
		echo "<table border='1'>
			<tr>
				<td></td>
				<td></td>
				<td>Sinif ID</td>
				<td>Sinif Adi</td>
				<td>Sinif Türü</td>
				<td>Sinif Kapasitesi</td>
				<td>Sinav Kapasitesi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
			echo '<tr>
				<td><a href="?id='.$dizi["Sinif_ID"].'&adi='.$dizi["Sinif_Adi"].'&st='.$dizi["Sinif_Turu"].'&fk='.$dizi["Sinif_Kapasitesi"].'&vk='.$dizi["Sinav_Kapasitesi"].'">Getir</a></td>
				<td><a href="?sil='.$dizi["Sinif_ID"].'">sil</a></td>
				<td>'.$dizi["Sinif_ID"].'</td>
				<td>'.$dizi["Sinif_Adi"].'</td>
				<td>'.$dizi["Sinif_Turu"].'</td>
				<td>'.$dizi["Sinif_Kapasitesi"].'</td>
				<td>'.$dizi["Sinav_Kapasitesi"].'</td>
			</tr>';
		}
		echo "</table>";
		
?>
<?php
if(isset($_POST["Ekle"])){
		include("vt.php");
		$Sinif_ID = $_POST["Sinif_ID"];
		$Sinif_Adi = $_POST["Sinif_Adi"];
		$Sinif_Turu = $_POST["Sinif_Turu"];
		$Sinif_Kapasitesi = $_POST["Sinif_Kapasitesi"];
		$Sinav_Kapasitesi = $_POST["Sinav_Kapasitesi"];
		if(empty($Sinif_ID))
		{
		$sql = mysql_query("insert into sinif (Sinif_ID, Sinif_Adi,Sinif_Turu,Sinif_Kapasitesi,Sinav_Kapasitesi)
							values (0 , '$Sinif_Adi','$Sinif_Turu',$Sinif_Kapasitesi,$Sinav_Kapasitesi)");
		}
		else
		{
		$sql = mysql_query("insert into sinif (Sinif_ID, Sinif_Adi,Sinif_Turu,Sinif_Kapasitesi,Sinav_Kapasitesi)
							values ($Sinif_ID , '$Sinif_Adi', '$Sinif_Turu',$Sinif_Kapasitesi,$Sinav_Kapasitesi)");
		}

		echo "Kayıt Başarılı!";
		header("location: sinif.php");
}
?>
<?php
if(isset($_POST["UPDATE"])){
		include("vt.php");
		$Sinif_ID = $_POST["Sinif_ID"];
		$Sinif_Adi = $_POST["Sinif_Adi"];
		$Sinif_Turu = $_POST["Sinif_Turu"];
		$Sinif_Kapasitesi = $_POST["Sinif_Kapasitesi"];
		$Sinav_Kapasitesi = $_POST["Sinav_Kapasitesi"];
		$sql = mysql_query("update sinif set Sinif_Adi='$Sinif_Adi',Sinif_Turu='$Sinif_Turu',Sinif_Kapasitesi=$Sinif_Kapasitesi,Sinav_Kapasitesi=$Sinav_Kapasitesi where Sinif_ID=$Sinif_ID");

		echo "Güncelleme Başarılı!";
		header("location: sinif.php");
}
?>
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from sinif where Sinif_ID=$sil");
		
		header("location: sinif.php");
	}
?>	

<?php include("alt.php") ?>

