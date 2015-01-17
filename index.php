<?php
include 'connect.php';
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="ar">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title>الجمعية التونسية للتعريف بالإسلام</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">

<!-- Favicons -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Google Fonts -->
<link
	href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic'
	rel='stylesheet' type='text/css'>
<!-- Base Stylesheet -->
<link rel="stylesheet" href="css/base.css">
<script src="js/modernizr.custom.js"></script>
</head>
<body>
	<!-- Header -->
		<?php include 'header.php'?>
		<!-- End Header -->
<div id="home-baner-1">
			<!-- Slider Wrapper -->
			<div class="slider-wrap slider-wrap-no-margin">

				<!-- Revolution Slider Container -->
				<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<ul class="unstyled">
							<li data-transition="fade" data-slotamount="5" data-masterspeed="300" class="rev-slide-devices">
								<img src="images/home/2.jpg" alt="">
							</li>
							<li data-transition="fade" data-slotamount="5" data-masterspeed="500" class="rev-slide-devices">
								<img src="images/home/bg1.png" alt="">
								<div class="caption lfl start randomrotateout" data-x="-40" data-y="123" data-start="500" data-speed="1300" data-easing="easeOutExpo">
									<img src="images/home/img/laptop.png" alt="">
								</div>
								<div class="caption lfl start randomrotateout" data-x="212" data-y="294" data-start="300" data-speed="500" data-easing="easeOutExpo">
									<img src="images/home/img/iphone.png" alt="">
								</div>
								<div class="caption lfr start randomrotateout" data-x="283" data-y="188" data-start="300" data-speed="900" data-easing="easeOutExpo">
									<img src="images/home/img/ipad.png" alt="">
								</div>
								
								<div class="caption randomrotate randomrotateout big_orange"
								   data-x="524" 
								   data-y="105"
								   data-speed="600" 
								   data-start="1400" 
								   data-easing="easeOutBack"><p class="text-white big">النسخة الجديدة لموقع</p>
								</div>
								<div class="caption randomrotate randomrotateout big_orange"
								   data-x="524" 
								   data-y="150"
								   data-speed="600" 
								   data-start="1400" 
								   data-easing="easeOutBack"><h1 class="text-white">الجمعية التونسية</br> للتعريف بالإسلام</h1>
								</div>
								<div class="caption randomrotate randomrotateout big_orange"
								   data-x="524" 
								   data-y="290"
								   data-speed="600" 
								   data-start="1400" 
								   data-easing="easeOutBack"><p class="text-white big">متجاوب مع الحواسيب اللوحية</br> و الهواتف الذكية </p>
								</div>
							</li>
						</ul>
						<div class="tp-bannertimer"></div> 
				   </div>
				</div>
				<!-- END Revolution Slider Container -->
			</div>
			<!-- END Slider Wrapper -->
			<!-- / container -->
		</div>	
		
		<!-- END Slider Wrapper -->
	</div>
	<div id="content">
		<!-- / ignore -->
		<div id="gallery">

			<div class="container">
				<a href="#" class="arrow-prev"></a> <a href="#" class="arrow-next"></a>
				<div class="slider">
					<ul class="slides" dir="rtl" lang="ar">
					<?php

// lancement de la requête. on sélectionne les news que l'on va ordonner suivant l'ordre "inverse" des dates (de la plus récente à la plus vieille : DESC) tout en ne sélectionnant que le nombre voulu de news à afficher (LIMIT)
$sql = 'SELECT  id, title, picture , date  FROM article ORDER BY date DESC limit 5 ';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on compte le nombre de news stockées dans la base de données


	// si on a au moins une news, on l'affiche
	while ($data = mysql_fetch_array($req)) {

	
	// on décompose la date
	sscanf($data['date'], "%4s-%2s-%2s %2s:%2s", $an, $mois, $jour, $heure, $min);
	// on affiche les résultats
	echo '
		<li class="">
			<div class="image">
				<a href="article.php?p='.$data['id'].'">
					<img style="width: 268px ; height:180px" title="'.$data['title'].'" src="images/articles/'.$data['picture'].'" alt="">
				</a>
			</div>
			<div class="author">
				<a href="article.php?p='.$data['id'].'"><h3>'.substr($data['title'], 0, 37).'</h3></a>
				<p>'.$jour.'/'.$mois.'/'.$an.'</p>
			</div>
		</li>';
	}

?>
					</ul>
				</div>
			</div>
			<!-- / container -->
		</div>
		<!-- / gallery -->
		<div class="fullwidthbg bgimage" id="bg-section-1"
			rel="images/img/2.JPG">

			<div class="container">
				<div class="row">
					<div class="span12">
						<a href="projet.php"><h1 class="text-regular text-center mg-bottom-60" style="color:#ffffff">مشاريعنا</h1></a>
					</div>
					<div class="clearfix"></div>
					<div class="span4" dir="rtl" lang="ar">
						<div class="service-style-5">
                        <a href="projet.php"><img src="images/project/Affiche1.jpg"  class="img-rounded"></a>
							<div class="service-content">
							<a href="projet.php">  <h2>مشروع المعرض التعريفي بالإسلام</h2></a>
								
							</div>
						</div>
					</div>
					<div class="span4" dir="rtl" lang="ar">
						<div class="service-style-5">
                        <a href="projet.php"><img src="images/project/Affiche2.jpg" class="img-rounded"></a>
							<div class="service-content">
							<a href="projet.php">  <h2>مشروع المكتبة الدعويّة</h2></a>
								
							</div>
						</div>
					</div>
					<div class="span4" dir="rtl" lang="ar">
						<div class="service-style-5">
                       <a href="projet.php"> <img src="images/project/Affiche3.jpg"  class="img-rounded"></a>
							<div class="service-content">
							<a href="projet.php">  <h2>مشروع الحقائب الدعوية </h2></a>
								
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="fullwidthbg white">
			<div class="container">
				<div class="row">
					<div class="span12">
						<h2 class="text-center text-regular">الكتب الاكثر زيارة</h2>

					</div>
					<div class="clearfix"></div>
					<div class="latest-work-style-2 mg-top-30">
<?php
// lancement de la requête. on sélectionne les news que l'on va ordonner suivant l'ordre "inverse" des dates (de la plus récente à la plus vieille : DESC) tout en ne sélectionnant que le nombre voulu de news à afficher (LIMIT)
$sql = 'SELECT  id,title, description, picture ,name  FROM livre ORDER BY date DESC LIMIT 6';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on compte le nombre de news stockées dans la base de données
$nb_news = mysql_num_rows($req);

if ($nb_news == 0) {
	echo '<p>لا يوجد أي كتاب في هذا القسم</p>';
}
else {
	// si on a au moins une news, on l'affiche
	while ($data = mysql_fetch_array($req)) {


	// on affiche les résultats
	echo '<div class="span4 relasted-item">
							<img src="livres/img/'.$data['picture'].'" alt="" />
							<div class="hover-item">
								<div class="links-container">
									<a href="portfolio-single.html"
										class="project-details hi-icon-effect-3" rel="nofollow">
										تفاصيل <i class="hi-icon"></i>
									</a> <a href="http://localhost/info-islam/livres/'.$data['name'].'" class="project-link  hi-icon-effect-3"
										target="_blank"> تحميل<i class="hi-icon"></i>
									</a> <a src="livres/img/'.$data['picture'].'"
										class="project-zoom  hi-icon-effect-3"
										title="Optional image title goes here"
										data-dt-img-description=""> تكبير<i class="hi-icon"></i>
									</a>
								</div>
								<div class="hover-item-content">
									<h3 class="text-light">'.$data['title'].'</h3>
								</div>
							</div>
						</div>';
	}
	 


}

?>
						
						<div class="clear-fix"></div>
					</div>
					<div class="clearfix"></div>
					<div class="text-center mg-top-50 mg-top-40">
						<a href="bibliotheque.php" class="green-btn btn-style-1">المزيد</a>
					</div>
				</div>
			</div>
		</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Text Content Footer Top -->
	<div id="top-footer">

		<div class="text-content">
			<div class="container">
				<div class="row">
					<div class="span12">
						<h3 class="text-light text-center">
							<a href="donation.php"><strong class="text-semibold" style="color: #ffffff">ساهم بمالك في أنشطة التعريف
								بالإسلام</strong> <img src="images/arrow_footer.png" alt=""
								style="margin-left: 20px" />
						</h3></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Text Content Footer Top -->
	<!-- Footer -->
		<?php include 'footer.php'?>
		<!-- End Footer -->
	<p id="back-top">
		<a href="#top"><i class="icon-angle-up"></i></a>
	</p>
	<!-- JQuery Plugin -->
	<script type='text/javascript' src="js/jquery-1.11.0.min.js"></script>
	<script type='text/javascript' src="js/jquery-migrate-1.2.1.js"></script>
	<script type='text/javascript' src="js/superfish.js"></script>
	<script type='text/javascript' src="js/bootstrap.min.js"></script>
	<script type='text/javascript' src='js/jquery.easing.1.3.js'></script>
	<script type='text/javascript' src='js/jquery.flexslider.js'></script>
	<script type='text/javascript' src="js/jquery.plugins.min.js"></script>
	<script type='text/javascript' src="js/jquery.fitvids.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type='text/javascript' src="js/jquery.fancybox-1.3.4.js"></script>
	<script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
	<script type="text/javascript" src="js/jcarousellite.js"></script>
	<script
		src="assets/plugins/revolutionslider/js/jquery.themepunch.revolution.min.js"></script>

	<!-- JQuery Revolution Slider Plugin -->
	<script type='text/javascript' src="js/custom.js"></script>
	<!-- End Jquery Plugin-->
</body>
</html>