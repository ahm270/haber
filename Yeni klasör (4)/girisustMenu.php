<div class="container-fluid" >
	<div class="row">		
		<div class="col-12">
		<?php
		$ogn = $_GET["ogrencino"];
					include("vt.php");
				$sql1 = mysql_query("select 
				OGRENCI_ADI,OGRENCI_SOYADI
			from ogrenci where OGRENCI_NO=$ogn");
			while($diz = mysql_fetch_array($sql1))
				{
				
			echo '<nav class="navbar navbar-expand-lg navbar-light" style="background-color:aqua;">
				<a class="navbar-brand" href="girisindex.php?ogrencino='.$ogn.'">anasayfa</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							haberler
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="spor.php?ogrencino='.$ogn.'">spor</a>
								<a class="dropdown-item" href="egitim.php?ogrencino='.$ogn.'">eğitim</a>
								<a class="dropdown-item" href="siyaset.php?ogrencino='.$ogn.'">siyaset</a>
								<a class="dropdown-item" href="diger.php?ogrencino='.$ogn.'">diğer</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="iletisim.php?ogrencino='.$ogn.'">İletişim</a>
						</li>
					</ul>
				</div>
				<ul class="nav justify-content-end">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							'.$diz["OGRENCI_ADI"]," ",$diz["OGRENCI_SOYADI"].'
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="ayarlar.php?ogrencino='.$ogn.'">Ayarlar</a>
								<a class="dropdown-item" href="cikis.php">Çıkış</a>
						</div>
					</li>
				</ul>
			</nav>';}
			?>
		</div>
	</div>
</div>