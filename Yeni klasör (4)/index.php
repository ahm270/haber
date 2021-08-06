	
<?php include("header.php"); ?>

<?php include("ustMenu.php"); ?>

<?php include("slider.php"); ?>

		
		<?php
	include("vt.php");
	echo'<div class="row">';
	$sql = mysql_query("select 
				 *
			from haber  ");
			while($dizi = mysql_fetch_array($sql))
				{
		echo '
		<div class="col-sm-4">
			<div class="card text-white bg-secondary mb-3" style="width: 18rem;">
			<img class="card-img-top" src="resimler/'.$dizi["RESIM_ID"].'" alt="Card image cap">
		  <div class="card-body">
			<p class="card-text">'.$dizi["HABER_ADI"].'</p>';
				$haberid = $dizi["HABER_ID"];
					include("vt.php");
				$sql1 = mysql_query("select 
				y.YORUM_ID,y.YORUM,y.HABER_ID,o.OGRENCI_ADI,o.OGRENCI_SOYADI
				from yorum y inner join ogrenci o
				on y.OGRENCI_NO=o.OGRENCI_NO where y.HABER_ID = $haberid  ");
				echo '_____________________________________';
				echo'<br>';
			while($diz = mysql_fetch_array($sql1))
				{
					echo" ",$diz["OGRENCI_ADI"]," ",$diz["OGRENCI_SOYADI"]," : ", $diz["YORUM"];
					echo'<br>';
				}
				include("vt.php");
				$sql3 = mysql_query("select 
				y.YORUM_ID,y.YORUM,y.HABER_ID,k.KULLANICI_ADI
				from yorum y inner join kullanici k
				on y.TC_NO=k.TC_NO where y.HABER_ID = $haberid ");
			while($diz = mysql_fetch_array($sql3))
				{
					echo" Admin : ", $diz["YORUM"];
					echo'<br>';
				}
				echo'</div>
		</div>
	</div>';
	}echo '</div>';?>


<?php include("footer.php"); ?>

