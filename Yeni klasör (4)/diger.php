<?php include("header.php"); ?>

<?php include("girisustMenu.php"); ?>

<?php include("slider.php"); ?>

	<?php
	include("vt.php");
	echo'<div class="row">';
	$sql = mysql_query("select 
				 *
			from haber where TURU_ID = 4 ");
			while($dizi = mysql_fetch_array($sql))
				{
		echo '
		<div class="col-sm-4">
			<div class="card text-white bg-secondary mb-3" style="width: 18rem;">
			<img class="card-img-top" src="resimler/'.$dizi["RESIM_ID"].'" alt="Card image cap">
		  <div class="card-body">
			<p class="card-text">'.$dizi["HABER_ADI"].'</p>
			<form action="" method="POST">
				<div class="form-group">				
					<input type="text" class="form-control" name="yorum" placeholder="yorum yaz...">				
				</div>
				<input type="hidden"  name="haberid" value="'.$dizi["HABER_ID"].'">
				<input type="submit" class="btn btn-primary" name="yorumyap" value="yorum yap"/>
				</form>';
				$haberid = $dizi["HABER_ID"];
				$ogn = $_GET["ogrencino"];
					include("vt.php");
				$sql1 = mysql_query("select 
				y.YORUM_ID,y.YORUM,y.HABER_ID,o.OGRENCI_ADI,o.OGRENCI_SOYADI
				from yorum y inner join ogrenci o
				on y.OGRENCI_NO=o.OGRENCI_NO where y.HABER_ID = $haberid and o.OGRENCI_NO = $ogn  ");
			while($diz = mysql_fetch_array($sql1))
				{
					echo'<a href="?ogrencino='.$ogn.'&sil='.$diz["YORUM_ID"].'">x</a>';echo" ",$diz["OGRENCI_ADI"]," ",$diz["OGRENCI_SOYADI"]," : ", $diz["YORUM"];
					echo'<br>';
				}
				
				$ogn = $_GET["ogrencino"];
				include("vt.php");
				$sql2 = mysql_query("select 
				y.YORUM_ID,y.YORUM,y.HABER_ID,o.OGRENCI_ADI,o.OGRENCI_SOYADI
				from yorum y inner join ogrenci o
				on y.OGRENCI_NO=o.OGRENCI_NO where y.HABER_ID = $haberid and o.OGRENCI_NO <> $ogn");
				while($diza = mysql_fetch_array($sql2))
				{
				echo" ",$diza["OGRENCI_ADI"]," ",$diza["OGRENCI_SOYADI"]," : ", $diza["YORUM"];
				echo'<br>';
				}
				echo'</div>
		</div>
	</div>';
	}echo '</div>';?>
			<?php	
		  if(isset($_POST["yorumyap"])){
		include("vt.php");
		
		$yorum = $_POST["yorum"];
		$haberid = $_POST["haberid"];
		$ogn = $_GET["ogrencino"];
		$sql = mysql_query("insert into yorum (YORUM, HABER_ID, OGRENCI_NO)
		  values ('$yorum' ,$haberid ,$ogn )");
		  echo '<meta http-equiv="refresh" content="0; URL=diger.php?ogrencino='.$ogn.'" />';}
							?>
							<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from yorum where YORUM_ID=$sil");
		echo '<meta http-equiv="refresh" content="0; URL=diger.php?ogrencino='.$ogn.'" />';
	}
?>	


<?php include("footer.php"); ?>