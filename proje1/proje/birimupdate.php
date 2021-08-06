<?php include("ust.php") ?>
<?php
	@session_start();
	
		echo '<form action="" method="POST">
		Birim ID : <select name="Birim_ID">
		<option value="-1">Seçiniz...</option>';
		include("vt.php");
		$sql = mysql_query("select Birim_ID from birim" );
		while($dizi = mysql_fetch_array($sql)) {
	    echo '<option value="'.$dizi["Birim_ID"]. '">'.$dizi["Birim_ID"].'</option>';
		}
		echo '</select>
		<br/>
		Birim Adi : <input name="Birim_Adi" type="text">
		<br/>
		<input type="submit" name="UPDATE" value="UPDATE">
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
<?php
	
	if(isset($_POST["UPDATE"])){
		include("vt.php");
		$Birim_ID = $_POST["Birim_ID"];
		$Birim_Adi = $_POST["Birim_Adi"];
		$sql = mysql_query("UPDATE  birim SET Birim_Adi='$Birim_Adi' where Birim_ID=$Birim_ID");

		echo "guncelledi!";
		
		header("location: birimupdate.php");
		
	}
?>
<?php
	
	if(isset($_POST["don"])){
		header("Location: birim.php");
		
	}
?>
<?php include("alt.php") ?>