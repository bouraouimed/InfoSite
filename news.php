<?php
include'connect.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
	<!--<![endif]-->
<html class="no-js" lang="ar">
	<head>
		<meta charset="utf-8">
		<title>الجمعية التونسية للتعريف بالإسلام</title>
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
						<h1>أخبار الجمعية</h1>
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
									<?php


$messagesParPage=3; //Nous allons afficher 4 messages par page.
 
//Une connexion SQL doit être ouverte avant cette ligne...
$retour_total=mysql_query('SELECT COUNT(*) AS total FROM article where idcat= 1'); //Nous récupérons le contenu de la requête dans $retour_total
$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
 
//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$messagesParPage);
 
if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$nombreDePages;
     }
}
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 
$premiereEntree=($pageActuelle-1)*$messagesParPage;

// lancement de la requête. on sélectionne les news que l'on va ordonner suivant l'ordre "inverse" des dates (de la plus récente à la plus vieille : DESC) tout en ne sélectionnant que le nombre voulu de news à afficher (LIMIT)
$sql = 'SELECT  id,title, content, picture , date,comment_count  FROM article where idcat= 1 ORDER BY date DESC LIMIT '.$premiereEntree.', '.$messagesParPage.'';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on compte le nombre de news stockées dans la base de données
$nb_news = mysql_num_rows($req);

if ($nb_news == 0) {
	echo '<p>لا يوجد أي مقال في هذا القسم </p>';
}
else {
	// si on a au moins une news, on l'affiche
	while ($data = mysql_fetch_array($req)) {

	// on décompose la date
	sscanf($data['date'], "%4s-%2s-%2s %2s:%2s", $an, $mois, $jour, $heure, $min);

	// on affiche les résultats
	echo '<div class="post-thumbs">
			<img src="images/articles/'.$data['picture'].'" class="img-blog img-rounded" alt=""/>
		</div>';
	echo '<div class="post-title">
			<h1 dir="rtl">'.substr($data['title'], 0, 37).'...'.'</h1>
		</div>';
	echo '<div class="post-meta">
			<span>'.$jour.'/'.$mois.'/'.$an.'	'.$heure.':'.$min.'   '. '</spn><span class="post-datetime"></span>
			<span class="post-tag" dir="rtl"></span> <span >المهتدين الجدد</span>
			<span class="post-comment" dir="rtl"></span><span>'.'   '.$data['comment_count'].'  تعليق'.'</span>
		</div>';
	echo '<div class="post-content" dir="rtl">'.substr($data['content'], 0, 440).'...'.
		
		'<div class="read-more" >
			<a href="article.php?p='.$data['id'].'" class="green-btn btn-style-1">اقرأ المزيد  ←</a>
			</div>
		</div>';
	}
	 
echo '
		<div class="pagination pagination-left">
			
			<ul class="pagenavi"> '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
         echo ' <li>
				<span class="current">'.$i.' </span></li> '; 
     }	
     else //Sinon...
     {
          echo '<li> <a href="musulman.php?page='.$i.'">'.$i.'</a> <li>';
     }
}
	$s=$i-1;
echo '</ul>
		<span class="current-post-info" dir="rtl">'.$pageActuelle.'من'.$s.'</span>
	</div>';
}

?>
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