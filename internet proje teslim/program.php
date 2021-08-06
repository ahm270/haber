<?php include("ust.php") ?>

Program

<?php   
		echo '<form action="" method="POST">
		Program ID : <input type="text" name="Program_ID" value="';
		
		if (isset($_GET["id"])) echo $_GET["id"];
		
		echo '"><br/>
		Program Adi :<input name="Program_Adi" type="text" value="';
		if (isset($_GET["adi"])) echo $_GET["adi"];
		
		echo '"><br/>
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
		<br/>
		Bolum ID : <select name="Bolum_ID" >
		<option value="-1">Seçiniz...</option>';
		include("vt.php");
		$Birim_ID = $_POST["Birim_ID"];
		$sql1 = mysql_query("select * from bolum where Birim_ID = $Birim_ID " );
		while($dizi1 = mysql_fetch_array($sql1)) {
			
			if($dizi1["Bolum_ID"]==$_POST["Bolum_ID"])
				echo '<option selected value="'.$dizi1["Bolum_ID"]. '">'.$dizi1["Bolum_Adi"].'</option>';
			else if($dizi1["Bolum_ID"]==$_GET["Bolum_ID"])
				echo '<option selected value="'.$dizi1["Bolum_ID"]. '">'.$dizi1["Bolum_Adi"].'</option>';
			else
				echo '<option value="'.$dizi1["Bolum_ID"]. '">'.$dizi1["Bolum_Adi"].'</option>';
			
		}			
		echo '</select>
		<br/>
		<input name="programEkle" type="submit" value="Ekle">
		<input type="submit" name="UPDATE" value="Güncelle">
		
		
		</form>';
		include("vt.php");
		$sql = mysql_query("select 
				p.Program_ID, p.Program_Adi,o.Bolum_ID, o.Bolum_Adi,b.Birim_Adi,b.Birim_ID 
			from program p inner join bolum o
			on p.Bolum_ID=o.Bolum_ID inner join Birim b on b.Birim_ID = p.Birim_ID ");
	
		echo "<table border='1'>
			<tr>
				<td></td>
				<td></td>
				<td>Program ID</td>
				<td>Program Adi</td>
				<td>Birim Adi</td>
				<td>Bolum Adi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
		echo '<tr>
			<td><a href="?id='.$dizi["Program_ID"].'&adi='.$dizi["Program_Adi"].'&Birim_ID='.$dizi["Birim_ID"].'&Bolum_ID='.$dizi["Bolum_ID"].'">gitir</a></td>
			<td><a href="?sil='.$dizi["Program_ID"].'">sil</a></td>
			<td>'.$dizi["Program_ID"].'</td>
			<td>'.$dizi["Program_Adi"].'</td>
			<td>'.$dizi["Birim_Adi"].'</td>
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
		$Birim_ID = $_POST["Birim_ID"];
		if(empty($Program_ID))
		{
		$sql = mysql_query("insert into program (Program_ID, Program_Adi,Bolum_ID,Birim_ID)
							values (0 , '$Program_Adi',$Bolum_ID,$Birim_ID)");
		}
		else
		{
		$sql = mysql_query("insert into program (Program_ID, Program_Adi,Bolum_ID,Birim_ID)
							values ($Program_ID , '$Program_Adi',$Bolum_ID,$Birim_ID)");
		}
		echo "Kayıt Başarılı!";
		header("location: program.php");
	}
?>
<?php
	
	if(isset($_POST["UPDATE"])){
		include("vt.php");
		$Program_ID = $_POST["Program_ID"];
		$Program_Adi = $_POST["Program_Adi"];
		$Bolum_ID = $_POST["Bolum_ID"];
		$sql = mysql_query("UPDATE  program SET Program_Adi='$Program_Adi',Bolum_ID=$Bolum_ID,Birim_ID=$Birim_ID where Program_ID=$Program_ID");

		echo "guncelledi!";
		
		header("location: program.php");
		
	}
?>
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from program where Program_ID=$sil");
		mysql_query("delete from program where Program_Adi=$sil");
		mysql_query("delete from program where Bolum_Adi=$sil");
		
		header("location: program.php");
	}
?>	


<?php include("alt.php") ?>

