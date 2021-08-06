<?php include("header.php"); ?>

<?php include("adminustMenu.php"); ?>


<?php include("slider.php"); ?>

<?php 
echo '<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<form action="" method="POST">
				<div class="form-row">
					<div class="col-12">
						<label for="validationDefault01">Bölüm Adı</label>
						<input type="text" class="form-control" name="Adı" placeholder="Bölüm Adı" value="" required>
					</div>
					<input type="submit" class="btn btn-primary" name="kyd" value="Kaydet"/>
				</div>	
			</form>
		</div>
	</div>
</div>';
			include("vt.php");
			$sql = mysql_query("select 
				* from bolum");
			
				echo '<table class="table table-dark">
					<thead>
						<tr>
							<th scope="col"></th>
							<th scope="col">Bölüm Adı</th>
							<th scope="col">Bölüm Adı</th>
						</tr>
					</thead>';
				while($dizi = mysql_fetch_array($sql))
				{
					echo '<tbody>
						<tr>
							<td><a href="?kullaniciadi='.$kuladi.'&sil='.$dizi["BOLUM_ID"].'">sil</a></td>
							<td>'.$dizi["BOLUM_ID"].'</td>
							<td>'.$dizi["BOLUM_ADI"].'</td>
						</tr>
					</tbody>
					
				';
				}
				
				?></table>
				<?php
if(isset($_POST["kyd"])){
		include("vt.php");
		$kuladi = $_GET["kullaniciadi"];
		$Adı = $_POST["Adı"];
		$sql = mysql_query("insert into bolum (BOLUM_ADI)
							values ('$Adı')");

		echo "Kayıt Başarılı!";
		echo '<meta http-equiv="refresh" content="0; URL=bolum.php?kullaniciadi='.$kuladi.'"/>';
}
?>
<?php
	if (isset($_GET["sil"])){
		$sil = $_GET["sil"];
		$kuladi = $_GET["kullaniciadi"];
		
		mysql_query("delete from bolum where BOLUM_ID=$sil");
		echo '<meta http-equiv="refresh" content="0; URL=bolum.php?kullaniciadi='.$kuladi.'"/>';
		
	}
?>	

<?php include("footer.php"); ?>