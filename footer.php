<footer>
	<div class="container" lang="ar" dir="rtl">
		<div class="row">
			<!-- Text Widget -->
			<div class="span4  widget text-widget" dir="rtl" style="text-align: justify;">
				<h2>التعريف</h2>
				<p>

الجمعيّة التونسية للتعريف بالإسلام هي أول جمعية تونسية متخصصة في دعوة غير المسلمين و هي إضافة نوعية في عالم الدعوة الاسلامية في تونس. تحصّلت على التأشيرة القانونية في 17 جويلية 2012 الموافق ل27 شعبان 1433 هـجري و هي مسجلة بالرائد الرسمي التونسي تحت عدد 2012T04809APSF1. </p>
			</div>
			<!-- End Text Widget -->
			<!-- Recent Post Widget -->
			<div class="span4 widget">
				<h2>أحدث المقالات</h2>
				<ul class="recent-post">
<?php
include 'connect.php';
// lancement de la requête. on sélectionne les news que l'on va ordonner suivant l'ordre "inverse" des dates (de la plus récente à la plus vieille : DESC) tout en ne sélectionnant que le nombre voulu de news à afficher (LIMIT)
$sql = 'SELECT  id, title ,date  FROM article ORDER BY date DESC limit 3 ';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on compte le nombre de news stockées dans la base de données


	// si on a au moins une news, on l'affiche
	while ($data = mysql_fetch_array($req)) {

	
	// on décompose la date
	sscanf($data['date'], "%4s-%2s-%2s %2s:%2s", $an, $mois, $jour, $heure, $min);
	// on affiche les résultats
	echo '
			<li class="media">
				<div class="media-body">
					<p>
						<a href="article.php?p='.$data['id'].'">'.$data['title'].'</a>
					</p>
					<span>'.$jour.'/'.$mois.'/'.$an.'</span>
				</div>
			</li>';
			
	}

?>
				</ul>
			</div>
			<!-- End Recent Post Widget -->
			<!-- Contact Widget -->
			<div class="span4  widget">
				<h2>
إتصل بنا
				</h2>
				<div class="foot-contact">
					<span class="office-home" lang="ar" dir="rtl">المركز الإسلامي بالكرم، 21 نهج جبران خليل جبران، الكرم الشرقي.</span>
					<span class="office-phone" lang="ar" dir="ltr"> +216 29 158 100 </span>
					<br>
					<span class="office-email" > <a href="#">contact@info-islam.tn</a></span>
					<br>
				</div>
				<ul class="social social-white">
					<li class="twitter" id="twitter">
						<a id="twitterLink" href="https://twitter.com/Info_Islam_TN" target="_blank"   title="" data-original-title="Twitter"></a>
					</li>
					<li class="facebook" id="facebook">
						<a id="facebookLink" href="https://www.facebook.com/info.islam.tn" target="_blank" title="" data-original-title="Facebook"></a>
					</li>
					<li class="googleplus" id="googleplus">
						<a id="googleplusLink" href="https://plus.google.com/115368877566854782423" target="_blank"  title="" data-original-title="Google Plus"></a>
					</li>
					<li class="youtube" id="youtube">
						<a id="youtubeLink" href="http://www.youtube.com/user/InfoIslamTunisia" target="_blank"  title="" data-original-title="Youtube"></a>
					</li>
				</ul>
			</div>
			<!-- End Contact Widget -->
		</div>
	</div>
	<!-- Copy Right -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="span12">
					<ul class="footer-bottom">
						<li>
							© <?php echo date('Y'); ?> <a mailto="" >Info Islam</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script type='text/javascript' src="js/jquery-1.11.0.min.js"></script>
	<script>
		$("#facebook").on('click',function(){window.open($("#facebookLink").attr('href'), '_blank');});
		$("#twitter").on('click',function(){window.open($("#twitterLink").attr('href'), '_blank');});
		$("#googleplus").on('click',function(){window.open($("#googleplusLink").attr('href'), '_blank');});
		$("#youtube").on('click',function(){window.open($("#youtubeLink").attr('href'), '_blank');});
		
		$("#submitNewsLetter").on("click",function(){
			var mail = $('#mailToNewsLetter').val();
			$.ajax({
			type: "POST",
			url: "addToNewsLetter.php",
			dataType: "text",
			data : {email:mail},
			success : function(data){$('#messageNewsLetter').html(data);}
			});
	
	});
	</script>
	<!-- End Copyright -->
</footer>