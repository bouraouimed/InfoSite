<?php
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="ar">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="images/favicon.png" type="image/png">

		<title>info-islam Admin</title>
		<link rel="stylesheet" href="uploadify/uploadify.css" type="text/css" />
		<link href="css/style.default.css" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
		<script src="js/jquery-1.11.0.js"></script>
		<script src="js/tinymce/jquery.tinymce.min.js"></script>
		<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript">
			tinymce.init({
				selector : "textarea",
				plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste "],
				toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent "
			});
		</script>

		<script type="text/javascript" src="js/plupload.full.js"></script>

		<script type="text/javascript">
var uploader;
$( document ).ready(function() {
uploader = new plupload.Uploader({

runtimes : 'gears,html5,flash,silverlight,browserplus',

browse_button : 'pickfiles',

max_file_size : '10mb',

url : './script/upload.php',
multi_selection:false,
filters : [
{title : "Image files", extensions : "jpg,gif,png"},

],

});

uploader.bind('UploadProgress', function(up, file) {
console.log( file.name + " "+file.percent+' %');
});

uploader.bind('FilesAdded', function(up, files) {

uploader.refresh();
setTimeout(
function(){
uploader.start();
}
, 100);

});

uploader.bind('FileUploaded', function(up, file, info) {
var x = jQuery.parseJSON(info.response);
console.log(x.file);
$("#imageContainrer").html('<img id="postedImage" class="img-responsive" src="../images/articles/'+x.file+'"  data-source="'+x.file+'" />');
});

uploader.init();
});

function submitForm(){

var content = tinymce.activeEditor.getContent();
var title = $('#articleTitle').val();
var categorie = $('#categoryId').val();
var imageFileName = $('#postedImage').data('source');

$.ajax({
type: "POST",
url: "addNewPost.php",
dataType: "text",
data : {content:content,title:title,category:categorie,image:imageFileName},
success : function(data){$('#formUploadPost').html(data);}
});
return false;
}
		</script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>
		<!-- Preloader -->
		<div id="preloader">
			<div id="status">
				<i class="fa fa-spinner fa-spin"></i>
			</div>
		</div>

		<section>

			<!-- Header -->
			<?php
			include 'header.php';
			?>
			<!-- End Header -->
			<div class="pageheader">
				<h2><i class="fa fa-edit"></i> Nouveau Article</h2>
			</div>

		</section>

		<script src="js/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/modernizr.min.js"></script>
		<script src="js/jquery.sparkline.min.js"></script>
		<script src="js/toggles.min.js"></script>
		<script src="js/retina.min.js"></script>
		<script src="js/jquery.cookies.js"></script>

		<script src="js/wysihtml5-0.3.0.min.js"></script>
		<script src="js/bootstrap-wysihtml5.js"></script>

		<script src="js/custom.js"></script>

		<script src="js/init.menu.js"></script>
	</body>

</html>