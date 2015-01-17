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
			<div class="contentpanel">
				<div class="col-md-12 panel panel-default" id="formUploadPost">
					<div class=" col-sm-8 control-group" style="border: 1px solid rgba(12, 12, 12, 0.03); border-radius: 3px; box-shadow: 3px 3px 3px rgba(12, 12, 12, 0.03); margin-top: 30px;">

						<form method="post">
							<div class="col-sm-12">
								</br>
								<label class="col-sm-8 control-label"><h2>Titre & Description</h2></label>
								</br>
								<input id="articleTitle" class="form-control" name="title" type="text" placeholder="" lang="ar" dir="rtl" required>
								</br>
								<textarea ></textarea>								
								</br>

							</div>

					</div>
					<div class="col-sm-1"></div>
					<div class="col-sm-3" style="border: 1px solid rgba(12, 12, 12, 0.03); border-radius: 3px; box-shadow: 3px 3px 3px rgba(12, 12, 12, 0.03); margin-top: 30px;">
						<div class="col-sm-12">

							<label class="col-sm-8 control-label"><h2>Categorie</h2></label>
						</div>
						<div class="col-sm-2"></div>
						<div class="col-sm-8">
							<select name="categorie" id="categoryId" required>
								<option></option>
								<?php
								$res = mysql_query('select * from categorie') or die(mysql_error());

								while ($data = mysql_fetch_assoc($res)) {
									echo '<option value="' . $data['id'] . '"  >' . $data['name'] . '</option>';

								}
								?>
							</select>
							</br></br>
						</div>
					</div>
					<div class="col-sm-1"></div>

					<div class="col-sm-3 panel panel-default" style="border: 1px solid rgba(12, 12, 12, 0.03); border-radius: 3px; box-shadow: 3px 3px 3px rgba(12, 12, 12, 0.03); margin-top: 30px;">
						</br>
						<label class="col-sm-12 control-label"><h2>Image</h2></label>

						<div class="col-md-12 form-group">

							<div id="imageContainrer">
									<span class="btn btn-black" id="pickfiles">
									Choisir Image
									</span>
							</div>

						</div>

					</div>
					</br>
					<div class="col-sm-12" style="margin-top: 20px; margin-bottom: 30px">
					<button type="button" onClick='submitForm()' class="boutton btn  btn-success ">
								Publier
							</button>

							<button type="reset" class="boutton btn btn-danger ">
								Annuler
							</button>
							</form>
						</div>
				</div>
					
				<div>

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