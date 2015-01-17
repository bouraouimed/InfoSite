<?php
include ("../connect.php");
$title = $_POST ['title'];
$content = $_POST ['content'];
$image = $_POST ['image'];
$category = $_POST ['category'];

$link = "INSERT INTO article (id,title,content,picture,idcat,date) VALUES (null,'$title','$content','$image','$category',NOW())";
$res = mysql_query ( $link ) or die ( mysql_error () );
if ($res)
{
echo '<div class="alert alert-successt">Article ajouté avec succès!</div>';
}
?>