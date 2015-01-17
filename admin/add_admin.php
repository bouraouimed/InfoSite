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
		<link href="css/style.default.css" rel="stylesheet">
		<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
		<script src="js/jquery-1.11.0.js"></script>


		<script type="text/javascript" src="js/plupload.full.js"></script>

		<script type="text/javascript">
var uploader;
$( document ).ready(function() {
uploader = new plupload.Uploader({

runtimes : 'gears,html5,flash,silverlight,browserplus',

browse_button : 'pickfiles',

max_file_size : '10mb',

url : './script/uploadAvatar.php',
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
$("#imageContainrer").html('<img id="avatar" class="img-thumbnail img-responsive" style="height:140px; width:140px" src="images/avatars/'+x.file+'"  data-source="'+x.file+'" />');
});

uploader.init();
});

function submitForm(){

var username = $('#username').val();
var password = $('#password').val();
var avatar = $('#avatar').data('source');
var email =$('#email').val();

$.ajax({
type: "POST",
url: "addNewAdmin.php",
dataType: "text",
data : {username:username,password:password,avatar:avatar,email:email},
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
				<h2><i class="fa fa-edit"></i> Nouveau Administrateur</h2>
			</div>
			<div class="contentpanel">
				<div class="panel panel-default" id="formUploadPost">
				<div class="panel-body panel-body-nopadding">
          
          <form class="form-horizontal form-bordered" method="post" id="formUploadPost">
            
            <div class="form-group">
              <label class="col-sm-3 control-label">Nom d'utilisateur</label>
              <div class="col-sm-6">
                <input id="username" type="text" class="form-control" placeholder="">
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-sm-3 control-label">Mot de passe</label>
              <div class="col-sm-6">
                <input id="password" type="password" class="form-control" placeholder="">
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-sm-3 control-label">Email</label>
              <div class="col-sm-6">
                <input id="email" type="email" class="form-control" placeholder="">
              </div>
            </div>
			
			<div class="form-group">
              <label class="col-sm-3 control-label">Avatar</label>
              <div class="col-sm-6">
				<div id="imageContainrer">
					<span class="btn btn-black" id="pickfiles">
						Choisir Image
					</span>
				</div>
              </div>
            </div>
			
          
          
        </div><!-- panel-body -->
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				<button type="button" onClick='submitForm()' class=" btn  btn-success ">
								Ajouter
							</button>

							<button type="reset" class=" btn btn-danger ">
								Annuler
							</button>
							</form>
				</div>
			 </div>
		  </div><!-- panel-footer -->
        
      </div>
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