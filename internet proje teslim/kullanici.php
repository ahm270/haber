<?php include("ust.php") ?>

Program

<?php   
		echo '<form action="" method="POST">
		
		Kullanıcı ID : <input type="text" name="Kullanici_ID" value="';
		
		if (isset($_GET["id"])) echo $_GET["id"];
		
		echo '"><br/>
		Kullanıcı Adi :<input name="Kullanici_Adı" type="text" value="';
		if (isset($_GET["adi"])) echo $_GET["adi"];
		
		echo '"><br/>
		
		Şifre :<input name="Sifre" type="password" value="">
		<br/>
		
		Yetki : <select name="Yetki_ID">
		<option value="-1">Seçiniz...</option>';
		
		include("vt.php");
		$sql = mysql_query("select * from yetki" );
		while($dizi = mysql_fetch_array($sql)) {
			
			if($dizi["Yetki_ID"]==$_POST["Yetki_ID"])
				echo '<option selected value="'.$dizi["Yetki_ID"]. '">'.$dizi["Yetki_Adı"].'</option>';
			else if($dizi["Yetki_ID"]==$_GET["Yetki_ID"])
				echo '<option selected value="'.$dizi["Yetki_ID"]. '">'.$dizi["Yetki_Adı"].'</option>';
			else
				echo '<option value="'.$dizi["Yetki_ID"]. '">'.$dizi["Yetki_Adı"].'</option>';
			
		}			
		echo '</select>
		<br/>
		
		Adı :<input name="Adi" type="text" value="';
		if (isset($_GET["Adi"])) echo $_GET["Adi"];
		
		echo '"><br/>
		
		Soyadı :<input name="Soyadi" type="text" value="';
		if (isset($_GET["Soyadi"])) echo $_GET["Soyadi"];
		
		echo '"><br/>
		
		<input name="Ekle" type="submit" value="Ekle">
		<input type="submit" name="UPDATE" value="Güncelle">
		
		
		</form>';
		include("vt.php");
		$sql = mysql_query("select 
				k.Kullanici_ID,k.Kullanici_Adı,k.Sifre,k.Adi,k.Soyadi,y.Yetki_Adı,y.Yetki_ID
			from kullanici k inner join yetki y
			on k.Yetki_ID=y.Yetki_ID");
	
		echo "<table border='1'>
			<tr>
				<td></td>
				<td></td>
				<td>Kullanıcı ID</td>
				<td>Kullanıcı Adi</td>
				<td>Şifre</td>
				<td>Yetki</td>
				<td>Adı</td>
				<td>Soyadı</td>
			</tr>";
		while($dizi = mysql_fetch_array($sql))
		{
		echo '<tr>
			<td><a href="?id='.$dizi["Kullanici_ID"].'&adi='.$dizi["Kullanici_Adı"].'&Adi='.$dizi["Adi"].'&Soyadi='.$dizi["Soyadi"].'&Yetki_ID='.$dizi["Yetki_ID"].'">gitir</a></td>
			<td><a href="?sil='.$dizi["Kullanici_ID"].'">sil</a></td>
			<td>'.$dizi["Kullanici_ID"].'</td>
			<td>'.$dizi["Kullanici_Adı"].'</td>
			<td>'.$dizi["Sifre"].'</td>
			<td>'.$dizi["Adi"].'</td>
			<td>'.$dizi["Soyadi"].'</td>
			<td>'.$dizi["Yetki_Adı"].'</td>
		</tr>';
		}
		echo "</table>";
		
		
?>

<?php include("alt.php") ?>

<?php
	
	if(isset($_POST["Ekle"])){
		include("vt.php");
		$Kullanici_ID = $_POST["Kullanici_ID"];
		$Kullanici_Adı = $_POST["Kullanici_Adı"];
		$Sifre = $_POST["Sifre"];
		$Adi = $_POST["Adi"];
		$Soyadi = $_POST["Soyadi"];
		$Yetki_ID = $_POST["Yetki_ID"];
		if(empty($Kullanici_ID))
		{
		$sql = mysql_query("insert into kullanici (Kullanici_ID, Kullanici_Adı,Sifre,Adi,Soyadi,Yetki_ID)
							values (0 , '$Kullanici_Adı','$Sifre','$Adi','$Soyadi',$Yetki_ID)");

		}
		else
		{
		$sql = mysql_query("insert into kullanici (Kullanici_ID, Kullanici_Adı,Sifre,Adi,Soyadi,Yetki_ID)
							values (Kullanici_ID , '$Kullanici_Adı','$Sifre','$Adi','$Soyadi',$Yetki_ID)");

		}
		echo "Kayıt Başarılı!";
		header("location: kullanici.php");
	}
?>
<?php
	
	if(isset($_POST["UPDATE"])){
		include("vt.php");
		$Kullanici_ID = $_POST["Kullanici_ID"];
		$Kullanici_Adı = $_POST["Kullanici_Adı"];
		$Sifre = $_POST["Sifre"];
		$Adi = $_POST["Adi"];
		$Soyadi = $_POST["Soyadi"];
		$Yetki_ID = $_POST["Yetki_ID"];
		$sql = mysql_query("UPDATE  kullanici SET Kullanici_Adı='$Kullanici_Adı',Sifre='$Sifre',Adi='$Adi',Soyadi='$Soyadi',Yetki_ID=$Yetki_ID where Kullanici_ID=$Kullanici_ID");

		echo "guncelledi!";
		header("location: kullanici.php");
		
	}
?>
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from kullanici where Kullanici_ID=$sil");
		
		echo '<meta http-equiv="refresh" content="0; URL=kullanici.php" />';
	}
?>	


<?php include("alt.php") ?>

