<?php include("ust.php") ?>

Bolum

<?php

	@session_start();
	
		echo '<form action="" method="POST">
		
		Bolum ID : <input type="text" name="Bolum_ID" value="';
		
		if (isset($_GET["id"])) echo $_GET["id"];
		
		echo '"><br/>
		
		Bolum Adi :<input name="Bolum_Adi" type="text" value="';
		
		if (isset($_GET["adi"])) echo $_GET["adi"];
		
		echo '"><br/>
		
		Birim ID : <select name="Birim_ID" onchange="this.form.submit()">
		<option value="-1">Seçiniz...</option>';
		
		include("vt.php");
		$sql = mysql_query("select * from birim" );
		while($dizi = mysql_fetch_array($sql)) {
			
			if($dizi["Birim_ID"]==isset($_POST["Birim_ID"]))
				echo '<option selected value="'.$dizi["Birim_ID"]. '">'.$dizi["Birim_Adi"].'</option>';
			else if($dizi["Birim_ID"]==isset($_POST["Birim_ID"]))
				echo '<option selected value="'.$dizi["Birim_ID"]. '">'.$dizi["Birim_Adi"].'</option>';
			else
				echo '<option value="'.$dizi["Birim_ID"]. '">'.$dizi["Birim_Adi"].'</option>';
			
		}			
		echo '</select>
		<br/>
		<input name="BolumEkle" type="submit" value="Ekle">
		<input type="submit" name="UPDATE" value="Güncelle">
		</form>';
		include("vt.php");
		$sql = mysql_query("select 
				o.Bolum_ID, o.Bolum_Adi, i.Birim_Adi, i.Birim_ID
			from bolum o inner join birim i
			on o.Birim_ID=i.Birim_ID");
	
		echo "<table border='1'>
			<tr>
				<td></td>
				<td></td>
				<td>Bolum ID</td>
				<td>Bolum Adi</td>
				<td>Birim Adi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
			echo '<tr>
				<td><a href="?id='.$dizi["Bolum_ID"].'&adi='.$dizi["Bolum_Adi"].'&Birim_ID='.$dizi["Birim_ID"].'">getir</a></td>
				<td><a href="?sil='.$dizi["Bolum_ID"].'">sil</a></td>
				<td>'.$dizi["Bolum_ID"].'</td>
				<td>'.$dizi["Bolum_Adi"].'</td>
				<td>'.$dizi["Birim_Adi"].'</td>
			</tr>';
		}
		echo "</table>";
		
?>
<?php
if(isset($_POST["BolumEkle"])){
		include("vt.php");
		$Bolum_ID = $_POST["Bolum_ID"];
		$Bolum_Adi = $_POST["Bolum_Adi"];
		$Birim_ID = $_POST["Birim_ID"];
		$sql = mysql_query("insert into bolum (Bolum_ID, Bolum_Adi,Birim_ID)
							values ($Bolum_ID , '$Bolum_Adi',$Birim_ID)");

		echo "Kayıt Başarılı!";
		header("location: bolum.php");
}
?>
<?php
if(isset($_POST["UPDATE"])){
		include("vt.php");
		$Bolum_ID = $_POST["Bolum_ID"];
		$Bolum_Adi = $_POST["Bolum_Adi"];
		$Birim_ID = $_POST["Birim_ID"];
		$sql = mysql_query("UPDATE  bolum SET Bolum_Adi='$Bolum_Adi',Birim_ID=$Birim_ID where Bolum_ID=$Bolum_ID");

		echo "guncelledi!";
		
		header("location: bolum.php");
}
?>
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from bolum where Bolum_ID=$sil");
		mysql_query("delete from bolum where Bolum_Adi=$sil");
		mysql_query("delete from bolum where Birim_Adi=$sil");
		header("location: bolum.php");
	}
?>	



<?php include("alt.php") ?>

