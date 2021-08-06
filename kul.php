	
<?php include("header.php"); ?>

<?php include("kulustMenu.php"); ?>

<?php include("slider.php"); ?>
<div align="center">
		
		<?php
	include("vt.php");
	echo'<div class="row">';
	$sql = mysql_query("select 
				 *
			from haber  ");
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
		}echo '</div>';?>
		</div>


<?php include("footer.php"); ?>

