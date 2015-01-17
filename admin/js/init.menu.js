
	  if(document.URL == "http://localhost/info-islam/admin/article_manager.php")
	  {
	  $('#addNewPost').addClass('active');
	  $('#posts').addClass("active");
	  
	  
	  setTimeout(function() {
       $('#posts').find('a:first').click();
		}, 1500);
	  }
	  else if (document.URL == "http://localhost/info-islam/admin/index.php")
	  {$('#dashboard').addClass('active');}
	  else if (document.URL == "http://localhost/info-islam/admin/book_manager.php")
	  {
	  $('#biblio').addClass('active');
	  $('#biblioManager').addClass('active');
	  setTimeout(function() {
       $('#biblio').find('a:first').click();
		}, 1500);
	  }
