<?php
include ("../connect.php");
$title = $_POST ['title'];
$description = $_POST ['description'];
$image = $_POST ['image'];
$lang = $_POST ['lang'];
$pdf = $_POST ['pdf'];
$link = "INSERT INTO livre (id,title,description,picture,livre,id_lang,date) VALUES (null,'$title','$description','$image','$pdf','$lang',NOW())";
$res = mysql_query ( $link ) or die ( mysql_error () );
if ($res)
{
echo '<div class="alert alert-successt">Livre ajouté avec succès!</div>';
}
?>