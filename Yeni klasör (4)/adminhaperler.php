<?php include("header.php"); ?>

<?php include("adminustMenu.php"); ?>

<?php include("slider.php"); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<form enctype="multipart/form-data" action="" method="POST">
				<div class="form-row">
					<div class="col-12">
						<label for="validationDefault01">Haper</label>
						<input type="text" class="form-control" name="haper" placeholder="haper" value="" required>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="exampleInputEmail1">Turu</label>
						<select class="custom-select mr-sm-2" name="Turu" required>
							<?php 
							include("vt.php");
							$sql = mysql_query("select * from  turu " );
							while($dizi = mysql_fetch_array($sql)) {
								if($dizi["TURU_ID"]==isset($_POST["TURU_ID"]))
									echo '<option selected value="'.$dizi["TURU_ID"]. '">'.$dizi["TURU_ADI"].'</option>';
								else if($dizi["TURU_ID"]==$_GET["TURU_ID"])
									echo '<option selected value="'.$dizi["TURU_ID"]. '">'.$dizi["TURU_ADI"].'</option>';
								else
									echo '<option value="'.$dizi["TURU_ID"]. '">'.$dizi["TURU_ADI"].'</option>';
			
		}	?>
						</select>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6 mb-3">
						<label for="exampleInputEmail1">KULLANICI_ID</label>
						<select class="custom-select mr-sm-2" name="KULLANICI"  required>
							<?php 
							$kuladi = $_GET["kullaniciadi"];
							include("vt.php");
							$sql = mysql_query("select * from  kullanici where KULLANICI_ADI = '$kuladi' " );
							while($dizi = mysql_fetch_array($sql)) {
								if($dizi["TC_NO"]==isset($_POST["TC_NO"]))
									echo '<option selected value="'.$dizi["TC_NO"]. '">'.$dizi["KULLANICI_ADI"].'</option>';
								else if($dizi["TC_NO"]==$_GET["TC_NO"])
									echo '<option selected value="'.$dizi["TC_NO"]. '">'.$dizi["KULLANICI_ADI"].'</option>';
								else
									echo '<option value="'.$dizi["TC_NO"]. '">'.$dizi["KULLANICI_ADI"].'</option>';
						
		}	?>
						</select>
						<div class="form-row">
						<div class="col-12">
						
						<input type="file" name="resim" required>
					</div>
					</div>
					</div>
				</div>
				
				<input type="submit" class="btn btn-primary" name="haberekle" value="haber ekle"/>
			</form>
			<?php 
			include("vt.php");
			$sql = mysql_query("select 
				h.HABER_ID, h.HABER_ADI,h.RESIM_ID, k.KULLANICI_ADI ,t.TURU_ADI
			from haber h inner join kullanici k 
			on k.TC_NO=h.TC_NO inner join turu t on t.TURU_ID=h.TURU_ID ");
			
				echo '<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col"></th>
							<th scope="col">Haber</th>
							<th scope="col">Yazan</th>
							<th scope="col">Turu</th>
							<th scope="col">resim</th>
						</tr>
					</thead>';
				while($dizi = mysql_fetch_array($sql))
				{
					echo '<tbody>
						<tr>
						
							<td><a href="?kullaniciadi='.$kuladi.'&sil='.$dizi["HABER_ID"].'">sil</a></td>
							<td>'.$dizi["HABER_ADI"].'</td>
							<td>'.$dizi["KULLANICI_ADI"].'</td>
							<td>'.$dizi["TURU_ADI"].'</td>';
							if ($dizi["RESIM_ID"] == "")
								{
									echo'<td><img src="urun/2.jpg" width=90 height=90></td>';
								}
								else
								{
									echo'<td><img src="resimler/'.$dizi["RESIM_ID"].'" width=90 height=90></td>';
								}
						echo'</tr>
					</tbody>
				';
				}
				?></table>
		</div>
	</div>	
</div>		
	
<?php
if(isset($_POST["haberekle"])){
		include("vt.php");
		$kuladi = $_GET["kullaniciadi"];
		
		$kulid = $_POST["KULLANICI"];
		$haper = $_POST["haper"];
		$Turu = $_POST["Turu"];
		$uzanti = array('image/jpeg','image/jpg','image/png','image/x-png','image/gif');
		$dizin = "resimler";
		if(in_array(strtolower($_FILES['resim']['type']),$uzanti)){ 
			move_uploaded_file($_FILES['resim']['tmp_name'],"./$dizin/{$_FILES['resim']['name']}");
			mysql_query("SET NAMES utf8");
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
			$db=$_FILES['resim']['name'];    
		    $sql = mysql_query("insert into haber (HABER_ADI,TC_NO, TURU_ID,RESIM_ID)
			values ( '$haper',$kulid,$Turu,'$db')");}
		
		header("Location: adminhaperler.php?kullaniciadi=$kuladi");
		echo '<meta http-equiv="refresh" content="0; URL=adminhaperler.php?kullaniciadi='.$kuladi.'" />';

}
?>
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		$kuladi = $_GET["kullaniciadi"];
		
		mysql_query("delete from haber where HABER_ID=$sil");
		mysql_query("delete from haber where HABER_ADI=$sil");
		mysql_query("delete from haber where KULLANICI_ADI=$sil");
		mysql_query("delete from haber where TURU_ADI=$sil");
		echo '<meta http-equiv="refresh" content="0; URL=adminhaperler.php?kullaniciadi='.$kuladi.'" />';
	}
?>	


<?php include("footer.php"); ?>
