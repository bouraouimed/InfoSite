<?php
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="ar">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="images/favicon.png" type="image/png">

		<title>info-islam Admin</title>
		<link rel="stylesheet" href="../css/font.css" type="text/css" />
		<link href="css/style.default.css" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
		
  <link href="css/style.default.css" rel="stylesheet">
  <link href="css/jquery.datatables.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		<!-- Preloader -->
		<div id="preloader">
			<div id="status">
				<i class="fa fa-spinner fa-spin"></i>
			</div>
		</div>

		<section>

			<!-- Header -->
			<?php
			include 'header.php';
			?>
			<!-- End Header -->
			<div class="pageheader">
				<h2><i class="fa fa-table"></i>Liste des articles</h2>
			</div>
			
			<div class="contentpanel">
			<div class="table-responsive">
          <table class="table mb30">
            <thead>
              <tr>
                <th>Id Article</th>
                <th>Titre</th>
                <th>Text</th>
                <th>Catégorie</th>
                <th></th>
              </tr>
            </thead>
            <tbody >
			<?php
			
// lancement de la requête. on sélectionne les news que l'on va ordonner suivant l'ordre "inverse" des dates (de la plus récente à la plus vieille : DESC) tout en ne sélectionnant que le nombre voulu de news à afficher (LIMIT)
$sql = 'SELECT  a.id, a.title, a.content, c.name FROM article a , categorie c where a.idcat= c.id ORDER BY a.id;';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on compte le nombre de news stockées dans la base de données
$nb_news = mysql_num_rows($req);

if ($nb_news == 0) {
	echo '<td colspan="6"><center><p style="font-family: DroidKufi;">aucun article trouvé</p><center></td>';
}
else {
	// si on a au moins une news, on l'affiche
	while ($data = mysql_fetch_array($req)) {


	// on affiche les résultats
	echo '<tr style="font-family: DroidKufi;">';
	echo '<td>'.$data['id'].'</td>';
	echo '<td>'.substr($data['title'], 0, 28).'...'.'</td>';
	echo '<td>'.substr($data['content'], 0, 120).'...</td>';
	echo'<td>'.$data['name'].'</td>';
	echo'<td class="table-action">
                  <a href="#"><i class="fa fa-pencil"></i></a>
                  <a id="'.$data['id'].'" class="delete-row" href="#"><i class="fa fa-trash-o"></i></a>
                </td>
              </tr>';
	}
}
			  ?>
            </tbody>
          </table>
          </div>
	  </div>

		</section>


<script src="js/init.menu.js"></script>		
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/toggles.min.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/jquery.cookies.js"></script>

<script src="js/jquery.datatables.min.js"></script>
<script src="js/chosen.jquery.min.js"></script>

<script src="js/custom.js"></script>
<script>
  jQuery(document).ready(function() {
    
    jQuery('#table1').dataTable();
    
    jQuery('#table2').dataTable({
      "sPaginationType": "full_numbers"
    });
    
    // Chosen Select
    jQuery("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });
    
    // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue La Suppresion?");
      if(c)
        jQuery(this).closest('tr').fadeOut(function(){
          jQuery(this).remove();
        });
        
        return false;
    });
    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });
  
  
  });
</script>
  <script type="text/javascript">
$(function() {


$(".delete-row").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;


 $.ajax({
   type: "GET",
   url: "DeletePost.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 

return false;

});

});
</script>
	</body>

</html>