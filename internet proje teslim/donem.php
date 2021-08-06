<?php include("ust.php") ?>

Birim

<?php

	@session_start();
	
		echo '<form action="" method="POST">
		
		Dönem ID : <input type="text" name="Donem_ID" value="';
		
		if (isset($_GET["id"])) echo $_GET["id"];
		
		echo '" ><br/>
		Dönem Adi :<input name="Donem_Adi" type="text" value="';
		
		if (isset($_GET["adi"])) echo $_GET["adi"];
		
		echo '"><br/>
		
		
		<input name="Ekle" type="submit" value="Ekle">
		<input type="submit" name="UPDATE" value="Güncelle">
		
		</form>';
		include("vt.php");
		$sql = mysql_query("select * from donem");
	
		echo "<table border='1'>
			<tr>
				<td></td>
				<td></td>
				<td>Dönem ID</td>
				<td>Dönem Adi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
			echo '<tr>
				<td><a href="?id='.$dizi["Donem_ID"].'&adi='.$dizi["Donem_Adi"].'">Getir</a></td>
				<td><a href="?sil='.$dizi["Donem_ID"].'">sil</a></td>
				<td>'.$dizi["Donem_ID"].'</td>
				<td>'.$dizi["Donem_Adi"].'</td>
			</tr>';
		}
		echo "</table>";
		
?>
<?php
if(isset($_POST["Ekle"])){
		include("vt.php");
		$Donem_ID = $_POST["Donem_ID"];
		$Donem_Adi = $_POST["Donem_Adi"];
		if(empty($Donem_ID))
		{
		$sql = mysql_query("insert into donem (Donem_ID, Donem_Adi)
							values (0 , '$Donem_Adi')");
		}
		else
		{
		$sql = mysql_query("insert into Birim (Donem_ID, Donem_Adi)
							values ($Donem_ID , '$Donem_Adi')");
		}

		echo "Kayıt Başarılı!";
		header("location: donem.php");
}
?>
<?php
if(isset($_POST["UPDATE"])){
		include("vt.php");
		$Donem_ID = $_POST["Donem_ID"];
		$Donem_Adi = $_POST["Donem_Adi"];
		
		$sql = mysql_query("update donem set Donem_Adi='$Donem_Adi' where Donem_ID=$Donem_ID");

		echo "Güncelleme Başarılı!";
		header("location: donem.php");
}
?>
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from donem where Donem_ID=$sil");
		mysql_query("delete from donem where Donem_Adi=$sil");
		
		header("location: donem.php");
	}
?>	

<?php include("alt.php") ?>

