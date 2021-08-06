<?php include("ust.php") ?>

Program

<?php   
include("vt.php");
		$sql = mysql_query("select * from yetki");
	
		echo "<table border='1'>
			<tr>
				<td>Yetki ID</td>
				<td>Yetki Adi</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
			echo '<tr>
				<td>'.$dizi["Yetki_ID"].'</td>
				<td>'.$dizi["Yetki_Adı"].'</td>
			</tr>';
		}
		echo "</table>";
		
?>