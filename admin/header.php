<?php
include '../connect.php';
session_start();
if(empty($_SESSION['username'])) 
{
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header("Location: "."login.php");
  exit();
}


?>
  <div class="leftpanel">
    
    <div class="logopanel">
        <h1><span>[</span> info-islam <span>]</span></h1>
    </div><!-- logopanel -->
        
    <div class="leftpanelinner">    
        
        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                <img alt="" src="images/default.gif" class="media-object">
                <div class="media-body">
                    <h4>Admin</h4>
                </div>
            </div>
          
            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
              <li><a href="#"><i class="fa fa-cog"></i> <span>Compte</span></a></li>
              <li><a href="#"><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
              <li><a href="signout.html"><i class="fa fa-sign-out"></i> <span>Déconnexion</span></a></li>
            </ul>
        </div>
      
      <h5 class="sidebartitle">Navigation</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li id="dashboard" class="justForTest"><a href="index.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li class="justForTest"><a href="email.php"><i class="fa fa-envelope-o"></i> <span>Email</span></a></li>
         <li class="nav-parent" id="posts" class="justForTest"><a href="#"><i class="fa fa-file-text"></i> <span>Articles</span></a>
          <ul class="children">
            <li id="addNewPost" class="justForTest"><a href="add_article.php"><i class="fa fa-caret-right"></i> Nouveau Article</a></li>
			<li class="justForTest"><a href="article_manager.php"><i class="fa fa-caret-right"></i> Gérer Articles</a></li>
		  </ul>
        </li>
        <li class="nav-parent justForTest" id="biblio"><a href="#"><i class="fa fa-book"></i> <span>Bibliothèque</span></a>
          <ul class="children">
            <li class="justForTest" id="biblioManager"><a href="add_book.php"><i class="fa fa-caret-right"></i> Nouveau Livre</a></li>
			<li class="justForTest"><a href="book_manager.php"><i class="fa fa-caret-right"></i> Gérer Livres</a></li>
		  </ul>
        </li>
        <li class="justForTest"><a href="User_List.php"><i class="fa  fa-user"></i> <span>Adhérents</span></a>
        </li>
		
		<li class="justForTest" ><a href="mail_list.php"><i class="fa fa-envelope"></i> <span>Newsletter</span></a>
          
        </li>
		<li class="nav-parent justForTest" ><a href="#"><i class="fa fa-cogs"></i> <span>Paramètres</span></a>
          <ul class="children">
            <li class="justForTest"><a href="add_admin.php"><i class="fa fa-caret-right"></i>Ajouter Admin</a></li>
			<li class="justForTest"><a href="admin_list.php"><i class="fa fa-caret-right"></i>Administrateurs</a></li>
			<li class="justForTest"><a href="mysql_backup.php"><i class="fa fa-caret-right"></i>Backup DataBase</a></li>
		  </ul>
        </li>
        </ul>
      
      
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  
  <div class="mainpanel">
    
    <div class="headerbar">
      
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
      
      <form class="searchform" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="" />
      </form>
      
      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <?php 
				$username =  $_SESSION['username'];
				
				
				$sql = "SELECT avatar FROM admin WHERE username = '$username'";

				$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$nb_news = mysql_num_rows($req);

if ($nb_news == 0) {
				echo'<img src="images/avatars/default.gif " alt="" />' ;
}
else {
	// si on a au moins une news, on l'affiche
	while ($data = mysql_fetch_array($req)) {
				echo'<img src="images/avatars/'.$data['avatar'].' " alt="" />' ;

}
}				?>
                <?php echo ucfirst ( $username ); ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i>Profile</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Compte</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Aide</a></li>
                <li><a href="login.php"><i class="glyphicon glyphicon-log-out"></i> Déconnexion</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div><!-- header-right -->
     
    </div><!-- headerbar -->
