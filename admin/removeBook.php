<?php
include ("../connect.php");
$id = $_POST ['id'];
$link = "DELETE from livre WHERE id='$id'";
$res = mysql_query ( $link ) or die ( mysql_error () );
if ($res)
{
echo '<div class="alert alert-successt">Livre supprimé avec succès!</div>';
}
?>