<?php
include'connect.php';

$p= $_GET["p"];

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<html class="no-js" lang="ar">
    <head>
        <meta charset="utf-8">
        <title><?php
			$sql = "SELECT  title FROM article where id= '$p';";

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on compte le nombre de news stockées dans la base de données
$nb_news = mysql_num_rows($req);
$data = mysql_fetch_array($req);
		echo $data['title']; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
    
        <!-- Favicons -->
		<link rel="shortcut icon" href="images/favicon.png">
		<!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<!-- <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'> -->        
        <!-- Base Stylesheet -->
        <link rel="stylesheet" href="css/base.css">
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body class="default-page page-right-sidebar">
		<!-- Header -->
			<?php include'header.php' ?>
		<!-- End Header -->
		<div class="breadcrumb">
			<div class="container">
                <div class="row">
					<div class="span12">
											<?php
// lancement de la requête. on sélectionne les news que l'on va ordonner suivant l'ordre "inverse" des dates (de la plus récente à la plus vieille : DESC) tout en ne sélectionnant que le nombre voulu de news à afficher (LIMIT)
$sql = 'SELECT  id,title, description, picture ,name,date ,comment_count FROM livre ';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on compte le nombre de news stockées dans la base de données
$nb_news = mysql_num_rows($req);

if ($nb_news == 0) {
	 header("Location: "."404.php");
}
else {
	// si on a au moins une news, on l'affiche
	while ($data = mysql_fetch_array($req)) {

	// on décompose la date
	sscanf($data['date'], "%4s-%2s-%2s %2s:%2s", $an, $mois, $jour, $heure, $min);
	


	// on affiche les résultats
	echo '
						<h1>'.$data['title'].'</h1>
					</div>
				</div>
			</div>
		</div>
		<div id="content">
			<div class="container">
				
				<div class="row">
					<div class="page-main-content">
						<div class="row-fluid">
							<div class="span12">
								<div class="blog-lists posts">
									<div class="blog-item post post-single">';
	echo '<div class="post-thumbs">
			<img src="images/articles/'.$data['picture'].'"  alt=""/>
		</div>';
	echo '<div class="post-title">
			<h2 style="text-align: right;">'.$data['title'].'</h2> 
			</div>';
	echo '<div class="post-meta">
			<span>'.$jour.'/'.$mois.'/'.$an.'	'.$heure.':'.$min.'   '. '</spn><span class="post-datetime"></span>
			<span class="post-tag" dir="rtl"></span> <span >المهتدين الجدد</span>
			<span class="post-comment" dir="rtl"></span><span>'.'   '.$data['comment_count'].'  تعليق'.'</span>
		</div>';
	echo '<div class="post-content" dir="rtl">'.$data['description'].'</div>';
	
} }
 ?>
										
										
									</div>
								</div>	
							</div>
						</div>
					</div>
					<div class="page-content-right">
						
					<?php include'content-right.php' ?>
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
		<?php include'footer.php' ?>
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
		
		<!-- JQuery Revolution Slider Plugin -->
		<script type='text/javascript' src="js/custom.js"></script>
		<!-- End Jquery Plugin-->
	</body>
</html>