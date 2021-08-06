<?php include("ust.php") ?>

Bolum Ekle

<?php
	@session_start();
	
		echo '<form action="" method="POST">
		
		Bolum ID : <input type="text" name="Bolum_ID">
		<br/>
		Bolum Adi :<input name="Bolum_Adi" type="text">
		<br/>
		Birim ID : <select name="Birim_ID">
		<option value="-1">Seçiniz...</option>';
		include("vt.php");
		$sql = mysql_query("select * from birim" );
		while($dizi = mysql_fetch_array($sql)) {
	    echo '<option value="'.$dizi["Birim_ID"]. '">'.$dizi["Birim_Adi"].'</option>';
		}
		echo '</select>
		<br/>
		<input name="BolumEkle" type="submit" value="Ekle">
		<input name="don" type="submit" value="don">
		
		</form>';
		include("vt.php");
		$sql = mysql_query("select 
				o.Bolum_ID, o.Bolum_Adi, i.Birim_Adi
			from bolum o inner join birim i
			on o.Birim_ID=i.Birim_ID");
	
		echo "<table border='1'>
			<tr>
				<td>Bolum ID</td>
				<td>Bolum Adi</td>
				<td>Birim Adi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
			echo '<tr>
				<td>'.$dizi["Bolum_ID"].'</td>
				<td>'.$dizi["Bolum_Adi"].'</td>
				<td>'.$dizi["Birim_Adi"].'</td>
			</tr>';
		}
		echo "</table>";
		
		
?>

<?php include("alt.php") ?>

<?php
	
	if(isset($_POST["BolumEkle"])){
		include("vt.php");
		$Bolum_ID = $_POST["Bolum_ID"];
		$Bolum_Adi = $_POST["Bolum_Adi"];
		$Birim_ID = $_POST["Birim_ID"];
		$sql = mysql_query("insert into bolum (Bolum_ID, Bolum_Adi,Birim_ID)
							values ($Bolum_ID , '$Bolum_Adi',$Birim_ID)");

		echo "Kayıt Başarılı!";
		header("location: bolumekle.php");
	}
?>
<?php
	
	if(isset($_POST["don"])){
		header("Location: bolum.php");
		
	}
?>
