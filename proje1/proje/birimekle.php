<?php include("ust.php") ?>

Birim

<?php
	@session_start();
	
		echo '<form action="" method="POST">
		
		Birim ID : <input type="text" name="Birim_ID">
		<br/>
		Birim Adi :<input name="Birim_Adi" type="text">
		<br/>
		<input name="BirimEkle" type="submit" value="Birim Ekle">
		
		<input name="don" type="submit" value="don">
		
		</form>';
		include("vt.php");
		$sql = mysql_query("select * from birim");
	
		echo "<table border='1'>
			<tr>
				<td>Birim ID</td>
				<td>Birim Adi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
			echo '<tr>
				<td>'.$dizi["Birim_ID"].'</td>
				<td>'.$dizi["Birim_Adi"].'</td>
			</tr>';
		}
		echo "</table>";
		
		
?>

<?php include("alt.php") ?>

<?php
	
	if(isset($_POST["BirimEkle"])){
		include("vt.php");
		$Birim_ID = $_POST["Birim_ID"];
		$Birim_Adi = $_POST["Birim_Adi"];
		
		$sql = mysql_query("insert into Birim (Birim_ID, Birim_Adi)
							values ($Birim_ID , '$Birim_Adi')");

		echo "Kayıt Başarılı!";
		header("location: birimekle.php");
	}
?>
<?php
	
	if(isset($_POST["don"])){
		header("Location: birim.php");
		
	}
?>
