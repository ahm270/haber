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
				<td></td>
				<td></td>
				<td>Program ID</td>
				<td>Program Adi</td>
				<td>Bolum Adi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
		echo '<tr>
			<td><a href="?id='.$dizi["Program_ID"].'&adi='.$dizi["Program_Adi"].'&Bolum_Adi='.$dizi["Bolum_Adi"].'">gitir</a></td>
			<td><a href="?sil='.$dizi["Program_ID"].'">sil</a></td>
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
		header("location: program.php");
	}
?>
<?php
	
	if(isset($_POST["UPDATE"])){
		include("vt.php");
		$Program_ID = $_POST["Program_ID"];
		$Program_Adi = $_POST["Program_Adi"];
		$Bolum_ID = $_POST["Bolum_ID"];
		$sql = mysql_query("UPDATE  program SET Program_Adi='$Program_Adi',Bolum_ID=$Bolum_ID where Program_ID=$Program_ID");

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
<?php
	
	if(isset($_POST["don"])){
		header("Location: program.php");
		
	}
?>

<?php include("alt.php") ?>

