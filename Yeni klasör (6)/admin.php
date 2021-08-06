	
<?php include("header.php"); ?>

<?php include("adminustMenu.php"); ?>

<?php include("slider.php"); ?>



<?php
	include("vt.php");
	echo'<div class="row">';
	$sql = mysql_query("select 
				 HABER_ID,HABER_ADI,TURU_ID,RESIM_ID,unvan
			from haber");
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
			

<?php include("footer.php"); ?>

		



