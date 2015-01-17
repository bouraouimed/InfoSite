<?php
include ("./connect.php");
if (isset($_POST ['email']) and ($_POST ['email']!="")) {
			if (! preg_match ( '/([a-zA-z0-9\.\-]+)@([a-zA-Z0-9\.\-]+)\.([a-zA-Z]{2,3})/', $_POST ['email'], $m )) {
			
			echo '<div class="alert red-alert">البريد الإلكتروني غير صحيح</div>';
			} else {
				
				$email = $_POST ['email'];
				$link = "SELECT * FROM follow WHERE email ='$email'";
				$res = mysql_query ( $link ) or die ( mysql_error () );
				
				if (mysql_num_rows ( $res ) > 0) {
					
				echo '<div class="alert red-alert">البريد الإلكتروني موجود مسبقاً</div>';
				} else {
					
					$link = "INSERT INTO follow (email,date) VALUES ('$email',NOW())";
					$res = mysql_query ( $link ) or die ( mysql_error () );
					
					if ($res)
				echo '<div class="alert green-alert">تم التسجيل بنجاح</div>';
				}
			}
		}
		else
		{
			echo '<div class="alert red-alert">الرجاء إدخال البريد الإلكتروني</div>';
		}
?>