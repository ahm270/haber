	
<?php include("header.php"); ?>

<?php include("adminustMenu.php"); ?>

<?php include("slider.php"); ?>



<?php
	include("vt.php");
	$kuladi = $_GET["kullaniciadi"];
	$turad = $_GET["turad"];
	echo'<div class="row">';
	$sql = mysql_query("select 
				 HABER_ID,HABER_ADI,TURU_ID,RESIM_ID,unvan
			from haber where TURU_ID = $turad ");
			while($dizi = mysql_fetch_array($sql))
				{
		echo '
		<div class="card" style="width: 18rem;">
  <img src="resimler/'.$dizi["RESIM_ID"].'" class="card-img-top" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">'.$dizi["unvan"].'</h5>
	<input type="hidden"  name="haberid" value="'.$dizi["HABER_ID"].'">';
	$haberid = $dizi["HABER_ID"];
    echo '<p class="card-text"></p>
    <a href="adminanahaber.php?kullaniciadi='.$kuladi.'&haberid='.$haberid.'" class="btn btn-primary stretched-link">daha fazla</a>
  </div>
</div>';
		}
		
		echo'</div>';?>
			<?php	
		  if(isset($_POST["yorumyap"])){
		include("vt.php");
		$kuladi = $_GET["kullaniciadi"];
		
		$yorum = $_POST["yorum"];
		$haberid = $_POST["haberid"];
		$tc = $_POST["tc"];
		$sql = mysql_query("insert into yorum (YORUM, HABER_ID, TC_NO)
		  values ('$yorum' ,$haberid ,$tc )");
		  echo '<meta http-equiv="refresh" content="0; URL=aegitim.php?kullaniciadi='.$kuladi.'" />';}
							?>
							<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		$kuladi = $_GET["kullaniciadi"];
		
		mysql_query("delete from yorum where YORUM_ID=$sil");
		echo '<meta http-equiv="refresh" content="0; URL=aegitim.php?kullaniciadi='.$kuladi.'" />';;
	}
?>	

<?php include("footer.php"); ?>

		



