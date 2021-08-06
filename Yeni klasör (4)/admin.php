	
<?php include("header.php"); ?>

<?php include("adminustMenu.php"); ?>

<?php include("slider.php"); ?>



<?php
	include("vt.php");
	echo'<div class="row">';
	$sql = mysql_query("select 
				 h.HABER_ID,h.HABER_ADI,h.TURU_ID,h.RESIM_ID,k.KULLANICI_ADI,k.TC_NO
			from haber h inner join kullanici k
			on h.TC_NO = k.TC_NO ");
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
				<input type="hidden"  name="tc" value="'.$dizi["TC_NO"].'">
				<input type="submit" class="btn btn-primary" name="yorumyap" value="yorum yap"/>
				</form>';
				$haberid = $dizi["HABER_ID"];
				$kuladi = $_GET["kullaniciadi"];
					include("vt.php");
				$sql1 = mysql_query("select 
				y.YORUM_ID,y.YORUM,y.HABER_ID,k.KULLANICI_ADI
				from yorum y inner join kullanici k
				on y.TC_NO=k.TC_NO where y.HABER_ID = $haberid ");
			while($diz = mysql_fetch_array($sql1))
				{
					echo'<a href="?kullaniciadi='.$kuladi.'&sil='.$diz["YORUM_ID"].'">x</a>';echo" Admin : ", $diz["YORUM"];
					echo'<br>';
				}
				$kuladi = $_GET["kullaniciadi"];
				$sql2 = mysql_query("select 
				y.YORUM_ID,y.YORUM,y.HABER_ID,o.OGRENCI_ADI,o.OGRENCI_SOYADI
				from yorum y inner join ogrenci o
				on y.OGRENCI_NO=o.OGRENCI_NO where y.HABER_ID = $haberid ");
				while($diza = mysql_fetch_array($sql2))
				{
				echo'<a href="?kullaniciadi='.$kuladi.'&sil='.$diza["YORUM_ID"].'">x</a>';echo" ",$diza["OGRENCI_ADI"]," ",$diza["OGRENCI_SOYADI"]," : ", $diza["YORUM"];
				echo'<br>';
				}
				echo'</div>
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
		  echo '<meta http-equiv="refresh" content="0; URL=adminindex.php?kullaniciadi='.$kuladi.'" />';}
							?>
							<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		$kuladi = $_GET["kullaniciadi"];
		
		mysql_query("delete from yorum where YORUM_ID=$sil");
		echo '<meta http-equiv="refresh" content="0; URL=adminindex.php?kullaniciadi='.$kuladi.'" />';;
	}
?>	

<?php include("footer.php"); ?>

		



