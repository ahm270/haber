	
<?php include("header.php"); ?>

<?php include("kulustMenu.php"); ?>

<?php include("slider.php"); ?>



<?php
	include("vt.php");
	$email = $_GET["email"];
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
    <a href="kanahaber.php?email='.$email.'&haberid='.$haberid.'" class="btn btn-primary stretched-link">daha fazla</a>
  </div>
</div>';
		}
		
		echo'</div>';?>
			<?php	
		  if(isset($_POST["yorumyap"])){
		include("vt.php");
		
		$yorum = $_POST["yorum"];
		$haberid = $_POST["haberid"];
		$email = $_GET["email"];
		$sql = mysql_query("insert into yorum (YORUM, HABER_ID, E_POSTA)
		  values ('$yorum' ,$haberid ,'$email' )");
		  echo '<meta http-equiv="refresh" content="0; URL=kanahaber.php?email='.$email.'&haberid='.$haberid2.'" />';}
							?>
							<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from yorum where YORUM_ID=$sil");
		echo '<meta http-equiv="refresh" content="0; URL=kanahaber.php?email='.$email.'&haberid='.$haberid2.'" />';;
	}
?>	

<?php include("footer.php"); ?>

		



