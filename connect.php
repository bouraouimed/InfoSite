<?php
$conn = mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("infoislam");
mysql_set_charset('utf8',$conn);
?>