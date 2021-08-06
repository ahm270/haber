	
<?php include("header.php"); ?>

<?php include("girisustMenu.php"); ?>

<?php include("slider.php"); ?>

	<?php
	include("vt.php");
	$haberid2 = $_GET["haberid"];
	echo'<div class="row">';
	$sql = mysql_query("select 
				 *
			from haber where HABER_ID = $haberid2 ");
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
				$ogn = $_GET["ogrencino"];
					include("vt.php");
				$sql1 = mysql_query("select 
				y.YORUM_ID,y.YORUM,y.HABER_ID,o.OGRENCI_ADI,o.OGRENCI_SOYADI
				from yorum y inner join ogrenci o
				on y.OGRENCI_NO=o.OGRENCI_NO where y.HABER_ID = $haberid and o.OGRENCI_NO = $ogn  ");
				echo'<ul class="nav justify-content-center">
	<div class="alert alert-dark" role="alert">
		yorumlar';
		echo'<br>';
			while($diz = mysql_fetch_array($sql1))
				{
					echo'<a href="?ogrencino='.$ogn.'&sil='.$diz["YORUM_ID"].'&haberid='.$haberid2.'">x</a>';echo" ",$diz["OGRENCI_ADI"]," ",$diz["OGRENCI_SOYADI"]," : ", $diz["YORUM"];
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
				$sql4 = mysql_query("select 
				y.YORUM_ID,y.YORUM,y.HABER_ID,i.ADI,i.SOYADI
				from yorum y inner join insanlar i
				on y.E_POSTA=i.E_POSTA where y.HABER_ID = $haberid ");
				
			while($diz3 = mysql_fetch_array($sql4))
				{
					echo" ",$diz3["ADI"]," ",$diz3["SOYADI"]," : ", $diz3["YORUM"];
					echo'<br>';
				}
				echo'
				<form action="" method="POST">
				<div class="form-group">				
					<input type="text" class="form-control" name="yorum" placeholder="yorum yaz...">				
				</div>
				<input type="hidden"  name="haberid" value="'.$dizi["HABER_ID"].'">
				<input type="submit" class="btn btn-primary" name="yorumyap" value="yorum yap"/>
				</form>';
				echo'</div>
				</ul>
			</div>
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
		  echo '<meta http-equiv="refresh" content="0; URL=oganahaber.php?ogrencino='.$ogn.'&haberid='.$haberid2.'" />';}
							?>
							<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		
		mysql_query("delete from yorum where YORUM_ID=$sil");
		echo '<meta http-equiv="refresh" content="0; URL=oganahaber.php?ogrencino='.$ogn.'&haberid='.$haberid2.'" />';;
	}
?>	


<?php include("footer.php"); ?>

