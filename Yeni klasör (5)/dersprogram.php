<?php include("ust.php") ?>

Ders Program

<?php

	echo '<form action="" method="POST">
		Program ID : <input type="text" name="Program_ID" value="';
		
		if (isset($_GET["id"])) echo $_GET["id"];
		
		echo '"><br/>
		Program Adi :<input name="Program_Adi" type="text" value="';
		if (isset($_GET["adi"])) echo $_GET["adi"];
		
		echo '"><br/>
?>

<?php include("alt.php") ?>

