<?php include("ust.php") ?>

Birim Silme

<?php
	
	include("vt.php");
	$sql = mysql_query("select * from birim");
	
	echo "<table border='1'>
		<tr>
			<td></td>
			<td>Birim ID</td>
			<td>Birim Adi</td>
		</tr>";
		echo '<form action="" method="POST">
			<br/>
			<input name="don" type="submit" value="don">
		
			</form>';
	while($dizi = mysql_fetch_array($sql))
	{
		echo '<tr>
				<td><a href="?sil='.$dizi["Birim_ID"].'">sil</a></td>
				<td>'.$dizi["Birim_ID"].'</td>
				<td>'.$dizi["Birim_Adi"].'</td>
			</tr>';
	}
	echo "</table>";
	
	
?>

<?php include("alt.php") ?>
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from birim where Birim_ID=$sil");
		mysql_query("delete from birim where Birim_Adi=$sil");
		
		header("location: birimlistele.php");
	}
?>	
<?php
	
	if(isset($_POST["don"])){
		header("Location: birim.php");
		
	}
?>