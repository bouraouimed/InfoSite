<?php
include('../connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicon.png" type="image/png">

  <title>الجمعية التونسية للتعريف بالإسلام</title>

  <link href="css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="signin">

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-3">
            
            </div><!-- col-sm-3 -->
			<?php
//Si lutilisateur est connecte, on le deconecte
if(isset($_SESSION['username']))
{
	//On le deconecte en supprimant simplement les sessions username et userid
	unset($_SESSION['username'], $_SESSION['userid']);
	
			header("Location: "."login.php"); 
?>

<?php
}
else
{
	$ousername = '';
	//On verifie si le formulaire a ete envoye
	if(isset($_POST['username'], $_POST['password']))
	{
		//On echappe les variables pour pouvoir les mettre dans des requetes SQL
		if(get_magic_quotes_gpc())
		{
			$ousername = stripslashes($_POST['username']);
			$username = mysql_real_escape_string(stripslashes($_POST['username']));
			$password = stripslashes($_POST['password']);
		}
		else
		{
			$username = mysql_real_escape_string($_POST['username']);
			$password = $_POST['password'];
		}
		//On recupere le mot de passe de lutilisateur
		$req = mysql_query('select password,id from admin where username="'.$username.'"');
		$dn = mysql_fetch_array($req);
		//On le compare a celui quil a entre et on verifie si le membre existe
		if($dn['password']==md5($password) and mysql_num_rows($req)>0)
		{
			//Si le mot de passe es bon, on ne vas pas afficher le formulaire
			$form = false;
			//On enregistre son pseudo dans la session username et son identifiant dans la session userid
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['userid'] = $dn['id'];
			header("Location: "."index.php"); 
?>
<?php
		}
		else
		{
			//Sinon, on indique que la combinaison nest pas bonne
			$form = true;
			$message = 'La combinaison que vous avez entré n\'est pas bonne.';
		}
	}
	else
	{
		$form = true;
	}
	if($form)
	{
		//On affiche un message sil y a lieu


	//On affiche le formulaire
?>
            
            <div class="col-md-6">
                
                <form action="login.php" method="post" name="login" onSubmit="return checkFields();">
                    <h4 class="nomargin">Se connecter</h4>
                    <p class="mt5 mb20">connectez-vous pour accéder à info-islam.</p>
                <?php
					if(isset($message))
	{
							echo '<div class="alert alert-danger">'.$message.'</div>';
	}
				?>
                    <input type="text" class="form-control uname"  name="username"  placeholder="Nom d'utilisateur" />
                    <input type="password" class="form-control pword" name="password" id="password" placeholder="Mot de passe" />
                    
                    <button name="Login" value="Login" class="btn btn-success btn-block">Se connecter</button>
                    
                </form>
            </div><!-- col-sm-6 -->
			
			<?php
	}
}
?>
            
			<div class="col-md-3">
            
            </div><!-- col-sm-3 -->
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; Info Islam 2014. All Rights Reserved.
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>


<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/retina.min.js"></script>

<script src="js/custom.js"></script>

</body>
</html>
