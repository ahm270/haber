<?php include("ust.php") ?>

Bolum Listele

<?php
	include("vt.php");
		$sql = mysql_query("select 
				o.Bolum_ID, o.Bolum_Adi, i.Birim_Adi
			from bolum o inner join birim i
			on o.Birim_ID=i.Birim_ID");
	
		echo "<table border='1'>
			<tr>
				<td></td>
				<td>Bolum ID</td>
				<td>Bolum Adi</td>
				<td>Birim Adi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
		echo '<tr>
			<td><a href="?sil='.$dizi["Bolum_ID"].'">sil</a></td>
			<td>'.$dizi["Bolum_ID"].'</td>
			<td>'.$dizi["Bolum_Adi"].'</td>
			<td>'.$dizi["Birim_Adi"].'</td>
		</tr>';
		}
		echo "</table>";
		echo '<form action="" method="POST">
			<br/>
			<input name="don" type="submit" value="don">
		
			</form>';
?>

<?php include("alt.php") ?>
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from bolum where Bolum_ID=$sil");
		mysql_query("delete from bolum where Bolum_Adi=$sil");
		mysql_query("delete from bolum where Birim_Adi=$sil");
		header("location: bolumsilme.php");
	}
?>	
<?php
	
	if(isset($_POST["don"])){
		header("Location: birim.php");
		
	}
?>