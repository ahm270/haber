<?php include("ust.php") ?>

Program Listele

<?php
	include("vt.php");
		$sql = mysql_query("select 
				p.Program_ID, p.Program_Adi, o.Bolum_Adi
			from program p inner join bolum o
			on p.Bolum_ID=o.Bolum_ID");
	
		echo "<table border='1'>
			<tr>
				<td></td>
				<td>Program ID</td>
				<td>Program Adi</td>
				<td>Bolum Adi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
		echo '<tr>
			<td><a href="?sil='.$dizi["Program_ID"].'">sil</a></td>
			<td>'.$dizi["Program_ID"].'</td>
			<td>'.$dizi["Program_Adi"].'</td>
			<td>'.$dizi["Bolum_Adi"].'</td>
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
		
		mysql_query("delete from program where Program_ID=$sil");
		mysql_query("delete from program where Program_Adi=$sil");
		mysql_query("delete from program where Bolum_Adi=$sil");
		header("location: programsilme.php");
	}
?>	
<?php
	
	if(isset($_POST["don"])){
		header("Location: program.php");
		
	}
?>