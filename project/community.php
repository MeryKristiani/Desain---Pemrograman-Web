<?php
require 'functions.php';
$community = query("SELECT * FROM community");

//tombol cari ditekan 
//cari pada line 7 adalah name dari button
if(isset($_POST["cari"]))
{
    //cari line 10 adalah function cari dan keyword adalah name dari inputan text
    $community=cari($_POST["keyword"]);
}
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PROJECT DESAIN & PEMROGRAMAN WEB</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

		<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-2 col-md-push-5 text-center">
							<div id="colorlib-logo"><a href="index.php"><i class="icon-camera4"></i>MC_MOTRET</a></div>
						</div>
						<div class="col-md-5 col-md-pull-2 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li class="has-dropdown">
									<a href="gallery.php">Gallery</a>
									<ul class="dropdown">
										<li><a href="#">Prewedding</a></li>
										<li><a href="#">Photoshoot Indoor</a></li>
										<li><a href="#">Photoshoot Outdoor</a></li>
										<li><a href="#">Photography Community</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="community.php">Community</a>
									<ul class="dropdown">
										<li><a href="#">Daftar Community</a></li>
										<li><a href="#">Update Community</a></li>
									</ul>
								</li>
							</ul>
						</div>
						<div class="col-md-5 text-left menu-1">
							<ul>
								<li><a href="about.php">About</a></li>
                                <li><a href="register.php">Register</a></li>
                                <li class="has-dropdown"><a href="login.php"><i class="icon-menu"></i></a>
                                    <ul class="dropdown">
										<li><a href="community.php">Login</a></li>
										<li><a href="#">Logout</a></li>
									</ul>
                                </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<section id="home" class="video-hero" style="height: 800px; background-image: url(images/1.jpeg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
		<div class="overlay"></div>
			<div class="display-t text-center">
				<div class="display-tc">
					<div class="container">
						<div class="col-md-10 col-md-offset-1">
							<div class="animate-box">
								<h2>Community</h2>
								<p class="breadcrumbs"><span><a href="index.html">Home</a></span> <span>Community</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">

			<br><br><h1 align="center"> Daftar Community </h1>    
			<table border ="1" cellpadding="10" width="80%" align=center>

			<form action="" method="post">
				<center><input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
				<button type="submit" name="cari" class="btn btn-primary"> Cari </button></center></br>

			</form>
			<tr align="center">
				<th>No.</th>
				<th>Nama</th>
				<th>No. Hp</th>
				<th>Alamat</th>
				<th>Email</th>
				<th>Foto</th>
				<th>Proses</th>
		</tr>
		<?php $i=1 ?>
		<?php foreach ($community as $row):?>  
		<tr>
			<td><?= $i;?></td>
			<td><?= $row["Nama"];?></td>
			<td><?= $row["No. Hp"];?></td>
			<td><?= $row["Alamat"];?></td>
			<td><?= $row["Email"];?></td>
			<td>
			<img src="img/<?php echo $row["Foto"]; ?>" alt="" heigth="200" width="100" srcset=""></td>
			<td>
				<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
				<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Apakah data ini akan dihapus')">Hapus</a>
		</td>
		</tr>
		<?php $i++ ?>
		<?php endforeach;?>
	</table>
</div>

		<div id="colorlib-instagram">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 colorlib-heading text-center animate-box">
				</div>
			</div>
		</div>
		
        <!-- FOOTER -->
		<footer id="colorlib-footer">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About MC_MOTRET</h4>
						<p>Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
						<p>
							<ul class="colorlib-social-icons">
                            <li><a href="https://www.instagram.com/mc_motret"><i class="icon-instagram"></i></a></li>
							</ul>
						</p>
                    </div>
                    
                    <!-- INFORMASI -->
					<div class="col-md-3 colorlib-widget">
                    <h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#"><i class="icon-check"></i> Home</a></li>
								<li><a href="#"><i class="icon-check"></i> Gallery</a></li>
								<li><a href="#"><i class="icon-check"></i> Community</a></li>
								<li><a href="#"><i class="icon-check"></i> About</a></li>
								<li><a href="#"><i class="icon-check"></i> Contact</a></li>
								<li><a href="#"><i class="icon-check"></i> Login</a></li>
							</ul>
						</p>
					</div>

                    <!-- CONTACT INFO -->
					<div class="col-md-3 colorlib-widget">
						<h4>Contact Info</h4>
						<ul class="colorlib-footer-links">
							<li>Blitar - Malang</li>
							<li><a href="tel://1234567920"><i class="icon-whatsapp"></i> 085755587895</a></li>
							<li><a href="mailto:info@yoursite.com"><i class="icon-envelope"></i> merykristiani2@gmail.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
                            <small class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> | Mery Kristiani - 1741720104 - TI2B <i class="icon-heart" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank"></a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small><br>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- YTPlayer -->
	<script src="js/jquery.mb.YTPlayer.min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

