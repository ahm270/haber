<?php include("header.php"); ?>

<?php include("ustMenu.php"); ?>

<?php include("slider.php"); ?>

		
		<?php
	include("vt.php");
	$haberid = $_GET["haberid"];
	echo'<div class="row">';
	$sql = mysql_query("select 
				 *
			from haber where HABER_ID = $haberid ");
			while($dizi = mysql_fetch_array($sql))
				{
		echo '
		<div class="col-12">
		
		 <div align="center">
		 <div class="alert alert-primary" role="alert">
			'.$dizi["unvan"].'
			</div>
			<img src="resimler/'.$dizi["RESIM_ID"].'" width="1350" height="50" class="img-fluid" alt="Responsive image">
			<div class="alert alert-info" role="alert">
			'.$dizi["HABER_ADI"].'
			</div>';
			
			
				$haberid = $dizi["HABER_ID"];
				
					include("vt.php");
				$sql1 = mysql_query("select 
				y.YORUM_ID,y.YORUM,y.HABER_ID,o.OGRENCI_ADI,o.OGRENCI_SOYADI
				from yorum y inner join ogrenci o
				on y.OGRENCI_NO=o.OGRENCI_NO where y.HABER_ID = $haberid  ");
				echo'<ul class="nav justify-content-center">
	<div class="alert alert-dark" role="alert">
		yorumlar';
	
				echo'<br>';
				echo '__________________________________________________________________________';
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
				
	}echo '
	<form action="" method="POST">
				<div class="form-group">				
					<input type="text" class="form-control" name="yorum" placeholder="yorum yapmak için giriş yap" disabled>
					<input type="submit" class="btn btn-primary" name="giris" value="Giriş yap"/>				
				</div>
				
				</form>
	</div>
</ul>
			</div>	
		</div>
	</div>';?>
	
<?php 
if(isset($_POST["giris"])){
	 echo '<meta http-equiv="refresh" content="0; URL=kulgiris.php"/>';
}

 ?>	


<?php include("footer.php"); ?>
