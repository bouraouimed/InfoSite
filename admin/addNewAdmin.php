<?php
include ("../connect.php");
$username = $_POST ['username'];
$password = md5($_POST ['password']);
$avatar = $_POST ['avatar'];
$email = $_POST ['email'];
$ip = $_SERVER['REMOTE_ADDR'];

$link = "INSERT INTO admin (username,password,avatar,last_signin,last_signin_ip,email) VALUES ('$username','$password','$avatar',NOW(),'$ip','$email')";
$res = mysql_query ( $link ) or die ( mysql_error () );
if ($res)
{
echo '<div class="alert alert-successt">Admin ajouté avec succès!</div>';
}
?>