<?php include'connect.php'
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="ar">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title>الجمعية التونسية للتعريف بالإسلام</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">

<!-- Favicons -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Google Fonts -->
<link
	href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic'
	rel='stylesheet' type='text/css'>
<!-- <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'> -->
<!-- Base Stylesheet -->
<link rel="stylesheet" href="css/base.css">
<script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
<script >
function submitMail(){

var name = $('#name').val();
var email = $('#email').val();
var subject = $('#subject').val();
var content = $('#contenu').val();

var cle = $('#cle').val();
$.ajax({
type: "POST",
url: "SendMail.php",
dataType: "text",
data : {name:name,email:email,subject:subject,content:content,cle:cle},
success : function(data){$('#formUploadPost').html(data);}
});
return false;
}
</script>

</head>
<body class="default-page">
	<!-- Header -->
		<?php
		
			include "header.php"
		?>
	<!-- End Header -->
	<div class="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="span12">
					<h1>إتصل بنا</h1>
				</div>
			</div>
		</div>
	</div>
	<div id="content">
		<div class="container">
			<div class="row">
				<div class="page-main-content" style="float: left;">
					<div class="row-fluid">
						<div class="span12">
							<div class="post-content">
								<div class="gmap2">
									<iframe width="100%" height="550" frameborder="0" scrolling="no"
									marginheight="0" marginwidth="0"
									src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.2261141490185!2d10.320622549999998!3d36.83706039999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd4b30a0b34a1f%3A0x48282604cf0a5914!2sINFO+ISLAM+TUNISIA!5e0!3m2!1sfr!2stn!4v1394568615390"
									width="600" height="450" frameborder="0" style="border: 0"></iframe>
								</div>
							<div class="post-content">
						<div class="accordion green">
							<h1 dir="rtl">مكاتبنا</h1>
							</br>
							<ul dir="rtl">
								<li>
									<h6><span></span>مكتب تونس</h6>
									<div class="acc-cnt">
									<p>العنوان : المركز الإسلامي بالكرم، 21 نهج جبران خليل جبران، الكرم الشرقي.</p>
									<p>الهاتف : 29.158.100</p>
									<p>البريد الإلكتروني : contact@info-islam.tn</p>
									</div>
								</li>
								<li>
									<h6><span></span>مكتب سوسة</h6>
									<div class="acc-cnt">
									<p>العنوان : 32 شارع أبوحامد الغزالي، سوسة.</p>
									<p>الهاتف : 29.158.112</p>
									<p>البريد الإلكتروني : sousse@info-islam.tn</p>
									</div>
								</li>
								<li>
									<h6><span></span>مكتب جربة</h6>
									<div class="acc-cnt">
									<p>العنوان : دار الجمعيات 14 جانفي 2011 ميدون، جربة.</p>
									<p>الهاتف : 29.158.106</p>
									<p>البريد الإلكتروني : djerba@info-islam.tn</p>
									</div>
								</li>
							</ul>
							</br></br>
						</div>
					</div>
					
								<div class="span3 pull-right">
									<div class="box-grey" lang="ar" dir="rtl">
										<h5>العنوان </h5>
										<p class="" lang="ar" dir="rtl">
											المركز الإسلامي بالكرم، 21 نهج جبران خليل جبران، الكرم الشرقي. 
										</p>
										<h5 lang="ar" dir="rtl">للإتصال</h5>
										<br> <a href="#" dir="ltr">+216 29 158 100
										contact@info-islam.tn </a> <br>
										<h5 lang="ar" dir="rtl">المواقع الاجتماعية</h5>
										<ul class="social social-dark">
											<li class="twitter" id="twitter"><a href="https://twitter.com/Info_Islam_TN"
											data-toggle="tooltip" title="" data-original-title="Twitter"></a>
											</li>
											<li class="facebook" id="facebook">
												<a href="https://www.facebook.com/info.islam.tn" data-toggle="tooltip" title="" data-original-title="Facebook"></a>												</li>
											<li class="youtube" id="youtube">
												<a href="http://www.youtube.com/user/InfoIslamTunisia" data-toggle="tooltip" title="" data-original-title="Youtube"></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="span7" id="formUploadPost">
							
									<center>
										<h2>راسلنا</h2>
									</center>
									<form method="post" class="form-contact-small">
										<input type="text" placeholder="الاسم" dir="rtl" style="font-family: 'DroidKufi';" id="name" required>
										<input type="email" placeholder="البريد الالكتروني" dir="rtl" style="font-family: 'DroidKufi';" id="email" required> 
										<input type="text" placeholder="الموضوع" dir="rtl" style="font-family: 'DroidKufi';" id="subject" required>
										<textarea placeholder="المحتوى" dir="rtl" style="font-family: 'DroidKufi';" id="contenu" required></textarea>
										<div class="row">
											<div class="clearfix"></div>
										</div>
										<input onClick='submitMail()' type="submit" value="أرسل " class="green-btn btn-style-1 btn-aj " />
										
									<div hidden="false">
										<input type="text" class="name" placeholder="" id="cle" required>
									</div>
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
		<?php
		include 'footer.php';
		?>
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
		<script type="text/javascript"
			src="js/jquery.mousewheel-3.0.4.pack.js"></script>
		<script type='text/javascript' src="js/jquery.fancybox-1.3.4.js"></script>
		<script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
		<script type="text/javascript" src="js/jcarousellite.js"></script>

		<!-- JQuery Revolution Slider Plugin -->
		<script type='text/javascript' src="js/custom.js"></script>
		<!-- End Jquery Plugin-->

</body>
</html>