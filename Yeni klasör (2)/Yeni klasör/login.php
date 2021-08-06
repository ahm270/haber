<?php
include("vt.php");
@session_start();
$kuladi = $_POST["kuladi"];
$sifre = $_POST["sifre"];
$sql = mysql_query("select * from kullanici 
					where Kullanici_Adı='$kuladi' 
						and Sifre='$sifre'");
if(mysql_num_rows($sql))
{
	$dizi = mysql_fetch_array($sql);
	$_SESSION["Yetki"] = $dizi["Yetki_ID"];
	$_SESSION["kuladi"] = $dizi["Kullanici_Adı"];
	
	header("Location: index.php");
}
else
{
	echo "hatalı giriş";
}
?>