<html>
<head>
<title>İnternet Programcılığı</title>
<link href="stil.css" rel="stylesheet">
</head>
<body>

<div class="tam">
	<div class="sol">
		<?php
		@session_start();
		if(isset($_SESSION["kuladi"]))
		{
			echo "Hoşgeldiniz " . $_SESSION["kuladi"] ;
			echo "<br/><a href='logout.php'>Çıkış Yap</a>";
			if($_SESSION["Yetki"]==0)//ADMİN
			{
				echo "<br/><br/><a href='birim.php'> Birim </a>";
				echo "<br/><a href='bolum.php'>Bolum </a>";
				echo "<br/><a href='program.php'> Program </a>";
				echo "<br/><a href='dersprogram.php'> Dersprogram </a>";
				echo "<br/><a href='sinif.php'> Sinif </a>";
				echo "<br/><a href='Yetki.php'> Yetki </a>";
				echo "<br/><a href='kullanici.php'> Kullanici </a>";

			}
			else if($_SESSION["Yetki"]==1)//ADMİN
			{
				echo "<br/><a href='program.php'> program </a>";
				echo "<br/><a href='dersprogram.php'> dersprogram </a>";
				echo "<br/><a href='sinif.php'> sinif </a>";

			}
			else 
			{
				echo "<br/><a href='dersprogram.php'> dersprogram </a>";
			}
		}
		else
		{
			echo '<form action="login.php" method="POST">
					<table>
						<tr>
							<td>Kullanıcı Adı :</td>
							<td><input type="text" name="kuladi"></td>
						</tr>
						<tr>
							<td>Şifre :</td>
							<td><input type="password" name="sifre"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="girisYap" value="Giriş Yap"></td>
						</tr>
					</table>						
				</form>';
		}
		?>
	</div>

	<div class="sag">