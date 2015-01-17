<?php

 include'connect.php';

 ?>
<!DOCTYPE html >
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="ar">
	<!--<![endif]-->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<title>إنضمّ إلينا</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">

		<!-- Favicons -->
		<link rel="shortcut icon" href="images/favicon.png">
		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
		<!-- <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'> -->
		<!-- Base Stylesheet -->
		
				<script type='text/javascript' src="js/jquery-1.11.0.min.js"></script>
		<link rel="stylesheet" href="css/base.css">
		<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script type="text/javascript">
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}



function submitForm(){

var cin = $('#username').val();
var prenom = $('#prenom').val();
var nom = $('#nom').val();
var sex = $('#sex:checked').val();
var nationality = $('#nationality').val();
var gouvernorat = $('#gouvernorat').val();
var adresse = $('#adresse').val();
var activite = $('#activite').val();
var tel = $('#tel').val();
var email = $('#email').val();
var situation = $('#situation:checked').val();
var permis = $('#permis:checked').val();
var car = $('#car:checked').val();
var annee = $('#annee').val();
var mois = $('#mois').val();
var jour = $('#jour').val();
var ad = $('#ad:checked').val();
var cle = $('#cle').val();
$.ajax({
type: "POST",
url: "addNewUser.php",
dataType: "text",
data : {cin:cin,prenom:prenom,nom:nom,sex:sex,nationality:nationality,gouvernorat:gouvernorat,adresse:adresse,activite:activite,tel:tel,email:email,situation:situation,permis:permis,car:car,annee:annee,mois:mois,jour:jour,ad:ad},
success : function(data){$('#formUploadPost').html(data);}
});
return false;
}
</script>
<script type="text/javascript">
$(document).ready(function() {
	$("#username").keyup(function (e) {
	
		//removes spaces from username
		$(this).val($(this).val().replace(/\s/g, ''));
		
		var username = $(this).val();
		if(username.length < 8){$("#user-result").html('');return;}
		
		if(username.length >= 8){
			$("#user-result").html('<img src="images/ajax-loader.gif" />');
			$.post('check_username.php', {'username':username}, function(data) {
			  $("#user-result").html(data);
			});
		}
	});	
});
</script>	
		
		
	</head>
	<body class="default-page page-right-sidebar">
		<!-- Header -->
		<?php
		include 'header.php';
		?>
		<!-- End Header -->
		<div class="breadcrumb">
			<div class="container">
				<div class="row">
					<div class="span12">
						<h1>إنضمّ إلينا</h1>
					</div>
				</div>
			</div>
		</div>
		<div id="content">
			<div class="container">
				<div class="row">
					<div class="page-main-content">
						<div class="row-fluid">
							<div class="span12">
								<div class="post-content">
									<div id="formUploadPost" class="signup">
									
										<div class="table-responsive">
											<table class="table tab " lang="ar" dir="rtl">
										<form  method="post">
												<tr>
													<td>
													<p>
														رقم بطاقة التعريف
													</p></td>
													<td>
													<input onkeypress='validate(event)'   type="text" class="name" placeholder="" id="username" maxlength="8" required>
													</td>
													<td id="user-result">
													
													</td>
												</tr>
												<tr>
													<td>
													<p>
														الإسم
													</p></td>
													<td>
													<input type="text" class="name" placeholder="" id="prenom" required>
													</td>
													<td></td>
												</tr>
												<tr>
													<td>
													<p>
														اللقب
													</p></td>
													<td>
													<input type="text" class="name" placeholder="" id="nom" required>
													</td>
													<td></td>
												</tr>
												<tr>
													<td>
													<p>
														الجنس
													</p></td>
													<td>
													<div class="radio">
														<label >
															<input type="radio" name="sex" id="sex" class="rad" value="ذكر" required>
															ذكر </label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="sex" id="sex" class="rad" value="أنثى" required>
															أنثى </label>
													</div></td>
													<td></td>
												</tr>
												<tr>
													<td>
													<p>
														تاريخ الولادة
													</p></td>
													<td>
													<select class="form-control input-lg sel" id="annee" >
														<option ></option>
														<?php
														for ($k = date('Y'); $k > 1899; $k--) {echo '<option value="' . $k . '">' . $k . '</option>';
														}
														?>
													</select>
													<select class="form-control input-lg sel" id="mois" >
														<option ></option>
														<?php
														for ($k = 1; $k < 13; $k++) {echo '<option value="' . $k . '">' . $k . '</option>';
														}
														?>
													</select>
													<select class="form-control input-lg sel" id="jour" >
														<option ></option>
														<?php
														for ($k = 1; $k < 32; $k++) {echo '<option value="' . $k . '">' . $k . '</option>';
														}
														?>
													</select></td>
													<td></td>
												</tr>
												<tr>
													<td>
													<p>
														الجنسيّة
													</p></td>
													<td>
														<select class="form-control input-lg sel" id="nationality" >
														<option></option>
														<?php
														
														$res = mysql_query('select * from nationality ORDER BY nationality') or die(mysql_error());

														while ($data = mysql_fetch_assoc($res)) {
															echo '<option value="' . $data['natid'] . '"  >' . $data['nationality'] . '</option>';

														}
														?>
													</select>
													</td>
													<td></td>
												</tr>
												<tr>
													<td>
													<p>
														الولاية
													</p></td>
													<td>
													<select class="form-control input-lg sel" id="gouvernorat" >
														<option></option>
														<?php
														$res = mysql_query('select * from gouvernorat ORDER BY gov') or die(mysql_error());

														while ($data = mysql_fetch_assoc($res)) {
															echo '<option value="' . $data['govid'] . '"  >' . $data['gov'] . '</option>';

														}
														?>
													</select></td>
													<td></td>
												</tr>

												<tr>
													<td>
													<p>
														العنوان
													</p></td>
													<td>
													<input type="text" class="name" placeholder="" id="adresse" required>
													</td>
													<td></td>
												</tr>
												<tr>
													<td>
													<p>
														المهنة
													</p></td>
													<td>
													<input type="text" class="name" placeholder="" id="activite" >
													</td>
													<td></td>
												</tr>
												<tr>
													<td>
													<p>
														رقم الهاتف
													</p></td>
													<td>
													<input type="text" class="name" placeholder="" id="tel" required>
													</td>
													<td></td>
												</tr>
												<tr>
													<td>
													<p>
														البريد الإلكتروني
													</p></td>
													<td>
													<input type="text" class="text" placeholder="" id="email" lang="fr" dir="ltr" required>
													</td>
													<td></td>
												</tr>
												<tr>
													<td>
													<p>
														الحالة الإجتماعية
													</p></td>
													<td>
													<div class="radio">
														<label>
															<input type="radio" name="situation" id="situation" class="rad" value="أعزب/عزباء" required>
															أعزب/عزباء </label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="situation" id="situation" class="rad" value="متزوج/متزوجة" required>
															متزوج/متزوجة </label>
													</div></td>
													<td></td>
												</tr>
												<tr>
													<td>
													<p>
														هل تملك رخصة قيادة ؟
													</p></td>
													<td>
													<div class="radio">
														<label>
															<input type="radio" name="permis" id="permis" class="rad" value="أملك" required>
															نعم </label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="permis" id="permis" class="rad" value="لا أملك" required>
															لا </label>
													</div></td>
													<td></td>
												</tr>
												<tr>
													<td>
													<p>
														هل تملك سيارة ؟
													</p></td>
													<td>
													<div class="radio">
														<label>
															<input type="radio" name="car" id="car" class="1" value="أملك" required>
															نعم </label>
													</div>
													<div class="radio">
														<label>
															<input type="radio" name="car" id="car" class="rad" value="لا أملك" required>
															لا </label>
													</div></td>
													<td></td>
												</tr>
												<tr hidden="false">
													<td>
													<p>
														
													</p></td>
													<td>
													<input type="text" class="name" placeholder="" id="cle" required>
													</td>
													<td></td>
												</tr>
											</table>
										</div>
											<center>
												<button class="green-btn btn-style-1 btn-aj btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" lang="ar" dir="rtl">
													إقرأ شروط العضوية ...
												</button>
											</center>

											<!-- Modal -->
											<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
                                                    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:right">الشروط و الأهداف </h4>
      </div>
														<div class="modal-body">

															<img alt="" src="images/image.jpg">
														</div>
														<div class="modal-footer">
															<button type="button" class="green-btn btn-style-1 btn-aj btn btn-default" data-dismiss="modal">
																أغلق
															</button>
														</div>
													</div>
												</div>
											</div>
											<br>
											<p style="margin-top:20px">
												قرأت الأهداف و الشروط و أريد الإنخراط
											</p>

											<div class="radio">
												<label>
													<input type="radio" name="ad" id="ad" class="rad" value="عضو عامل" required>
													كعضو عامل </label>
											</div>
											<div class="radio">
												<label>
													<input type="radio" name="ad" id="ad" class="rad" value="عضو متعاون" required>
													كعضو متعاون </label>
											</div>
											<br>
											<br>

											<input type="submit" onClick='submitForm()' class="green-btn btn-style-1 btn-aj " value="التسجيل">

										</form>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="page-content-right">
						<?php include 'content-right.php' ?>
					</div>

				</div>
			</div>
		</div>
				<!-- Footer -->
				<?php include'footer.php' ?>
				<!-- End Footer -->
				<p id="back-top">
					<a href="#top"><i class="icon-angle-up"></i></a>
				</p>

				<!-- JQuery Plugin -->
				<script type='text/javascript' src="js/jquery-1.11.0.min.js"></script>
				<script type='text/javascript' src="js/jquery-migrate-1.2.1.js"></script>
				<script type='text/javascript' src="js/superfish.js"></script>
				<script type='text/javascript' src="js/bootstrap.min.js"></script>
				<script type='text/javascript' src='js/jquery.easing.1.3.js'></script>
				<script type='text/javascript' src='js/jquery.flexslider.js'></script>
				<script type='text/javascript' src="js/jquery.plugins.min.js"></script>
				<script type='text/javascript' src="js/jquery.fitvids.js"></script>
				<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.pack.js"></script>
				<script type='text/javascript' src="js/jquery.fancybox-1.3.4.js"></script>
				<script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
				<script type="text/javascript" src="js/jcarousellite.js"></script>
				<script >
				
				jQuery("#myModal").hide()
				</script>
				<!-- JQuery Revolution Slider Plugin -->
				<script type='text/javascript' src="js/custom.js"></script>
				<!-- End Jquery Plugin-->
	</body>
</html>