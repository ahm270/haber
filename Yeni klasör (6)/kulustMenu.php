<div class="container-fluid" >
	<div class="row">		
		<div class="col-12">
		<?php
		$email = $_GET["email"];
					include("vt.php");
				$sql1 = mysql_query("select 
				*
			from insanlar where E_POSTA='$email'");
			while($diz = mysql_fetch_array($sql1))
				{
				
			echo '<nav class="navbar navbar-expand-lg navbar-light" style="background-color:aqua;">
				<a class="navbar-brand" href="kul.php?email='.$email.'">anasayfa</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							haberler
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
								$sql2 = mysql_query("select 
					*
				from turu ");	
					while($dizi= mysql_fetch_array($sql2))
						{
								echo '<a class="dropdown-item" href="ktur.php?email='.$email.'&turad='.$dizi["TURU_ID"].'">'.$dizi["TURU_ADI"].'</a>';
								}
							echo'
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="kiletisim.php?email='.$email.'">İletişim</a>
						</li>
					</ul>
				</div>
				<ul class="nav justify-content-end">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							'.$diz["ADI"]," ",$diz["SOYADI"].'
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="cikis.php">Çıkış</a>
						</div>
					</li>
				</ul>
			</nav>';}
			?>
		</div>
	</div>
</div>