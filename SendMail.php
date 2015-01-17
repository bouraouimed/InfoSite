<?php
$name = $_POST ['name'];
$email = $_POST ['email'];
$subject = $_POST ['subject'];
$content = $_POST ['content'];
$cle = $_POST ['cle'];

mail("contact@info-islam.tn",$subject,$content);
echo '<div class="alert green-alert" style="width: 100%; text-align: right; font-size: 20px">شكرا لك على هذه الرسالة</div>';

?>

