<?php include("ust.php") ?>

Birim

<?php

	@session_start();
	
		echo '<form action="" method="POST">
		
		Birim ID : <input type="text" name="Birim_ID" value="';
		
		if (isset($_GET["id"])) echo $_GET["id"];
		
		echo '"><br/>
		Birim Adi :<input name="Birim_Adi" type="text" value="';
		
		if (isset($_GET["adi"])) echo $_GET["adi"];
		
		echo '"><br/>
		
		
		<input name="BirimEkle" type="submit" value="Birim Ekle">
		<input type="submit" name="UPDATE" value="UPDATE">
		
		</form>';
		include("vt.php");
		$sql = mysql_query("select * from birim");
	
		echo "<table border='1'>
			<tr>
				<td></td>
				<td></td>
				<td>Birim ID</td>
				<td>Birim Adi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
			echo '<tr>
				<td><a href="?id='.$dizi["Birim_ID"].'&adi='.$dizi["Birim_Adi"].'">gitir</a></td>
				<td><a href="?sil='.$dizi["Birim_ID"].'">sil</a></td>
				<td>'.$dizi["Birim_ID"].'</td>
				<td>'.$dizi["Birim_Adi"].'</td>
			</tr>';
		}
		echo "</table>";
		
?>
<?php
if(isset($_POST["BirimEkle"])){
		include("vt.php");
		$Birim_ID = $_POST["Birim_ID"];
		$Birim_Adi = $_POST["Birim_Adi"];
		
		$sql = mysql_query("insert into Birim (Birim_ID, Birim_Adi)
							values ($Birim_ID , '$Birim_Adi')");

		echo "Kayıt Başarılı!";
		header("location: birim.php");
}
?>
<?php
if(isset($_POST["UPDATE"])){
		include("vt.php");
		$Birim_ID = $_POST["Birim_ID"];
		$Birim_Adi = $_POST["Birim_Adi"];
		
		$sql = mysql_query("update Birim set Birim_Adi='$Birim_Adi' where Birim_ID=$Birim_ID");

		echo "Güncelleme Başarılı!";
		header("location: birim.php");
}
?>
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from birim where Birim_ID=$sil");
		mysql_query("delete from birim where Birim_Adi=$sil");
		
		header("location: birim.php");
	}
?>	

<?php include("alt.php") ?>

