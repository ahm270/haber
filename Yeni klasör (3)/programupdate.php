<?php include("ust.php") ?>
<?php
	@session_start();
	
		
		echo '<form action="" method="POST">
		Program ID : <select name="Program_ID">
		<option value="-1">Seçiniz...</option>';
		include("vt.php");
		$sql = mysql_query("select Program_ID from program" );
		while($dizi = mysql_fetch_array($sql)) {
	    echo '<option value="'.$dizi["Program_ID"]. '">'.$dizi["Program_ID"].'</option>';
		}
		echo '</select>
		<br/>
		Program Adi : <input name="Program_Adi" type="text">
		<br/>
		Bolum ID : <select name="Bolum_ID">
		<option value="-1">Seçiniz...</option>';
		include("vt.php");
		$sql = mysql_query("select * from bolum" );
		while($dizi = mysql_fetch_array($sql)) {
	    echo '<option value="'.$dizi["Bolum_ID"]. '">'.$dizi["Bolum_Adi"].'</option>';
		}
		echo '</select>
		<br/>
		
		<input type="submit" name="UPDATE" value="UPDATE">
		<input name="don" type="submit" value="don">
		</form>';
		include("vt.php");
		$sql = mysql_query("select 
				p.Program_ID, p.Program_Adi, o.Bolum_Adi
			from program p inner join bolum o
			on p.Bolum_ID=o.Bolum_ID");
	
		echo "<table border='1'>
			<tr>
				<td>Program ID</td>
				<td>Program Adi</td>
				<td>Bolum Adi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
			echo '<tr>
				<td>'.$dizi["Program_ID"].'</td>
				<td>'.$dizi["Program_Adi"].'</td>
				<td>'.$dizi["Bolum_Adi"].'</td>
			</tr>';
		}
		echo "</table>";
		
?>
<?php
	
	if(isset($_POST["UPDATE"])){
		include("vt.php");
		$Program_ID = $_POST["Program_ID"];
		$Program_Adi = $_POST["Program_Adi"];
		$Bolum_ID = $_POST["Bolum_ID"];
		$sql = mysql_query("UPDATE  program SET Program_Adi='$Program_Adi',Bolum_ID=$Bolum_ID where Program_ID=$Program_ID");

		echo "guncelledi!";
		
		header("location: programupdate.php");
		
	}
?>
<?php
	
	if(isset($_POST["don"])){
		header("Location: program.php");
		
	}
?>
<?php include("alt.php") ?>