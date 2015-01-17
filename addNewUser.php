<?php
include ("connect.php");
$cin = $_POST ['cin'];
$prenom = $_POST ['prenom'];
$nom = $_POST ['nom'];
$sex = $_POST ['sex'];
$nationality = $_POST ['nationality'];
$gouvernorat = $_POST ['gouvernorat'];
$adresse = $_POST ['adresse'];
$activite = $_POST ['activite'];
$tel = $_POST ['tel'];
$email = $_POST ['email'];
$situation = $_POST ['situation'];
$permis = $_POST ['permis'];
$car = $_POST ['car'];
$annee = $_POST ['annee'];
$mois = $_POST ['mois'];
$jour = $_POST ['jour'];
$ad = $_POST ['ad'];
$cle = '';
$date_naiss= $jour.'/'.$mois.'/'.$annee;

$link = "INSERT INTO adherent (cin,prenom,nom,sex,dat_naiss,nationality,gover,adresse , travail,num_tel, email, situation,permis, voiture, ad,cle) VALUES ('$cin','$prenom','$nom','$sex','$date_naiss','$nationality', '$gouvernorat', '$adresse', '$activite', '$tel', '$email', '$situation','$permis','$car','$ad','$cle')";
$res = mysql_query ( $link ) or die ( mysql_error () );
if ($res)
{
echo '<div class="alert green-alert" style="width: 100%; text-align: right; font-size: 20px">تمت عملية التسجيل بنجاح</div>';
}
?>