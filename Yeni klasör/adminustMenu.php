<div class="container-fluid" >
	<div class="row">		
		<div class="col-12">
		<?php
		$kuladi = $_GET["kullaniciadi"];
		include("vt.php");
				$sql1 = mysql_query("select 
				*
			from kullanici where KULLANICI_ADI='$kuladi'");
			while($diz = mysql_fetch_array($sql1))
				{
					if ($diz["YETKI_ID"] == 1){
			echo '<nav class="navbar navbar-expand-lg navbar-light" style="background-color:aqua;">
				<a class="navbar-brand" href="adminindex.php?kullaniciadi='.$kuladi.'">anasayfa</a>
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
								<a class="dropdown-item" href="aspor.php?kullaniciadi='.$kuladi.'">spor</a>
								<a class="dropdown-item" href="aegitim.php?kullaniciadi='.$kuladi.'">eğitim</a>
								<a class="dropdown-item" href="asiyaset.php?kullaniciadi='.$kuladi.'">siyaset</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="ogrenciler.php?kullaniciadi='.$kuladi.'">Oğrenciler</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="adminhaperler.php?kullaniciadi='.$kuladi.'">haperler düzeltme</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="bolum.php?kullaniciadi='.$kuladi.'">bolum </a>
						</li>
					</ul>
				</div>
				<ul class="nav justify-content-end">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							'.$diz["KULLANICI_ADI"].'
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="adminayarlar.php?kullaniciadi='.$kuladi.'">Ayarlar</a>
								<a class="dropdown-item" href="cikis.php">Çıkış</a>
						</div>
					</li>
				</ul>
					</nav>';}
					else {echo '<nav class="navbar navbar-expand-lg navbar-light" style="background-color:aqua;">
				<a class="navbar-brand" href="adminindex.php?kullaniciadi='.$kuladi.'">anasayfa</a>
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
								<a class="dropdown-item" href="aspor.php?kullaniciadi='.$kuladi.'">spor</a>
								<a class="dropdown-item" href="aegitim.php?kullaniciadi='.$kuladi.'">eğitim</a>
								<a class="dropdown-item" href="asiyaset.php?kullaniciadi='.$kuladi.'">siyaset</a>
								<a class="dropdown-item" href="adiger.php?kullaniciadi='.$kuladi.'">diğer</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="ogrenciler.php?kullaniciadi='.$kuladi.'">Oğrenciler</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="kullaniciler.php?kullaniciadi='.$kuladi.'">Kullanıcıler</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="adminhaperler.php?kullaniciadi='.$kuladi.'">haperler düzeltme</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="bolum.php?kullaniciadi='.$kuladi.'">bolum </a>
						</li>
					</ul>
				</div>
				<ul class="nav justify-content-end">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							'.$diz["KULLANICI_ADI"].'
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="adminayarlar.php?kullaniciadi='.$kuladi.'">Ayarlar</a>
								<a class="dropdown-item" href="cikis.php">Çıkış</a>
						</div>
						
					</li>
				</ul>
					</nav>';
				}}
			?>
		</div>
	</div>
</div>