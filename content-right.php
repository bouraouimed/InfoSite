<div id="sidebar" class="boxedwidget">
	<div class="subscribe  widget">
		<?php
		include ("./connect.php");
		
			echo '<h2>النشرة الإخبارية</h2>
		<p lang="ar" dir="rtl">
			اشترك ببريدك الإلكتروني ليصلك جديد الجمعيّة
		</p>
		<form action="" method="POST">
			<input type="text" class="email" placeholder="Email" name="email" id="mailToNewsLetter">
			<input type="button" class="green-btn btn-style-1" value="أرسل" id="submitNewsLetter">
		</form>
		<div id="messageNewsLetter"></div>
		';
		
		?>
	</div>

	
	
	

	<div class="download-kit  widget1">
		<iframe
			src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Finfo.islam.tn&amp;width=235&amp;height=270&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=false"
			scrolling="no" frameborder="0"
			style="border: none; overflow: hidden; width: 180px; height: 310px;"
			allowtransparency="true"></iframe>
	</div>

	<div class="twitter-feed  widget">
		<a href="https://twitter.com/Info_Islam_TN"
			class="twitter-follow-button" data-show-count="false" data-lang="ar"
			data-size="large">Follow @Info_Islam_TN</a>
		<script>
			! function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (!d.getElementById(id)) {
					js = d.createElement(s);
					js.id = id;
					js.src = "//platform.twitter.com/widgets.js";
					fjs.parentNode.insertBefore(js, fjs);
				}
			}(document, "script", "twitter-wjs");
		</script>
	</div>

	<div class="widget">
		<h2>روابط</h2>
		<ul class="widget-link">
			<li><a href="qui-sommes-nous.php">من نحن ؟</a></li>
			<li><a href="adhesion.php">إنضمّ إلينا</a></li>
			<li><a href="musulman.php">المهتدين الجدد</a></li>
			<li><a href="bibliotheque.php">المكتبة</a></li>
			<li><a href="contact.php">إتصل بنا</a></li>
		</ul>
	</div>

</div>
