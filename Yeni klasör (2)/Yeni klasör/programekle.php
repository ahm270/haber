<?php include("ust.php") ?>

Program Ekle

<?php
	@session_start();
	
		echo '<form action="" method="POST">
		
		Program ID : <input type="text" name="Program_ID">
		<br/>
		Program Adi :<input name="Program_Adi" type="text">
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
		<input name="programEkle" type="submit" value="Ekle">
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

<?php include("alt.php") ?>

<?php
	
	if(isset($_POST["programEkle"])){
		include("vt.php");
		$Program_ID = $_POST["Program_ID"];
		$Program_Adi = $_POST["Program_Adi"];
		$Bolum_ID = $_POST["Bolum_ID"];
		$sql = mysql_query("insert into program (Program_ID, Program_Adi,Bolum_ID)
							values ($Program_ID , '$Program_Adi',$Bolum_ID)");

		echo "Kayıt Başarılı!";
		header("location: programekle.php");
	}
?>
<?php
	
	if(isset($_POST["don"])){
		header("Location: program.php");
		
	}
?>
