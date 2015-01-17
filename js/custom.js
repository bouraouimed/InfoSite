$global_menu_html = jQuery(".dl-menu-container").html();
$global_gallery = jQuery("#gallery").html();

var $global_menu_html = jQuery(".dl-menu-container").html();
/* Function Set Responsive Menu */
function menu_responsive_display(){

	jQuery("#dl-submenu").attr({style : ""});
	$menu_html = jQuery(".dl-menu-container").html();
	jQuery(".dl-responsive-menu-container").html($menu_html);
	jQuery( '.dl-responsive-menu-container #dl-menu' ).dlmenu({
			animationClasses : { classin : 'dl-animate-in-5', classout : 'dl-animate-out-5' }
		});
	jQuery('.dl-menu-container ul.dl-menu').superfish({});		
	
	
}
function resize_action(){
	jQuery(".dl-responsive-menu-container .dl-menuwrapper li a").attr({style : ""});				
	jQuery(".dl-responsive-menu-container .dl-menuwrapper").attr({style : ""});				
	jQuery(".dl-responsive-menu-container .dl-menuwrapper button").attr({style : ""});				
	jQuery(".dl-responsive-menu-container .responsive-searchbox input").attr({style : ""});	
	
	$logo_menu_area_height = jQuery(".logo_menu_area").css('height');
	$logo_menu_area_width = jQuery(".logo_menu_area").width();
	$container_left = jQuery(".logo_menu_area .container").css('width');
	$dl_sub_left = (parseInt($logo_menu_area_width) - parseInt($container_left)) / 2;
	$logo_menu_area_height = jQuery(".logo_menu_area").css('height');
	$logo_menu_area_height = $logo_menu_area_height.substr(0,$logo_menu_area_height.length-2);
	$top_bar_area_height = jQuery(".top-bar").height(); 

	position = jQuery(".top-bar").position();
	offset = jQuery(".top-bar").offset();
	posY = offset.top - jQuery(window).scrollTop();
	posX = offset.left - jQuery(window).scrollLeft();
	
	jQuery(".dl-responsive-menu-container .dl-menuwrapper").attr({style : "width:100% !important;z-index:9999999"});				
	jQuery(".dl-responsive-menu-container .dl-menuwrapper .dl-menu").attr({style : "width:"+$logo_menu_area_width+"px;"});				
		
	jQuery(".dl-responsive-menu-container .dl-menuwrapper li a").attr({style : "padding-left:"+(parseInt($dl_sub_left)+15)+"px;"});				
		
	jQuery(".dl-responsive-menu-container .dl-menuwrapper button").attr({style : "right:"+(parseInt($dl_sub_left)+15)+"px;opacity:1;"});				
	jQuery(".dl-responsive-menu-container .responsive-searchbox input").attr({style : "padding-left:"+(parseInt($dl_sub_left)+15)+"px;"});				
	jQuery(".dl-responsive-menu-container .responsive-searchbox input.responsive-submit").attr({style : ""});				
	jQuery("head").append("<style>.dl-responsive-menu-container .dl-menuwrapper li > a:not(:only-child):after{ right:"+(parseInt($dl_sub_left))+"px;}</style>");				
	jQuery("head").append("<style>.dl-responsive-menu-container .dl-menuwrapper li.dl-back:after{ left:"+(parseInt($dl_sub_left) +15)+"px;top:0px;}</style>");				
}
/* Function Set Responsive Menu */
function dopamine_responsive_menu(){
	
	if(jQuery(window).width()>768)	{
		jQuery("#sidebar .subpage-menu.widget ul").attr({style : ""});
	}
	if(jQuery(window).width()>979)	{
	jQuery(".logo_menu_area").attr({style : ""});
	
	$logo_menu_area_height = jQuery(".logo_menu_area").css('height');
	$logo_menu_area_width = jQuery(".logo_menu_area").width();
	$container_left = jQuery(".logo_menu_area .container").css('width');
	$dl_sub_left = (parseInt($logo_menu_area_width) - parseInt($container_left)) / 2;
	$logo_menu_area_height = jQuery(".logo_menu_area").css('height');
	$logo_menu_area_height = $logo_menu_area_height.substr(0,$logo_menu_area_height.length-2);
	$top_bar_area_height = jQuery(".top-bar").height(); 

	position = jQuery(".top-bar").position();
	offset = jQuery(".top-bar").offset();
	posY = offset.top - jQuery(window).scrollTop();
	posX = offset.left - jQuery(window).scrollLeft();
	
		
	
	if((posY +$top_bar_area_height)<=0){
			jQuery(".logo_menu_area").attr({style : ""});
			jQuery(".logo_menu_area").css("position","fixed");
			jQuery(".logo_menu_area").css("top","0px");
			jQuery(".logo_menu_area").css("background","#fff");
			jQuery(".logo_menu_area").css("margin","0 auto");
			jQuery(".logo_menu_area").css("width","100%");
			jQuery(".logo_menu_area").css("z-index","99999");
			jQuery(".logo_menu_area").css("height",$logo_menu_area_height+"px");
			
	}else{
		jQuery(".logo_menu_area").attr({style : ""});
		jQuery(".logo_menu_area").css("position","relative");
	
	};
	}
}
/* Function set footer alway in bottom */
function footer_alway_in_bottom(){
	/* FOOTER ALWAY IN BOTTOM */
	var $footer_height = jQuery("footer").height();
	var $footer_top = jQuery("footer").css("padding-top");
	var $padding =$footer_top.substr(0,$footer_top.length-2);
	var $top_padding = parseInt($footer_height)+ parseInt($padding);
	if(jQuery('#top-footer').length)
	{
		jQuery("#top-footer").css('padding-bottom',$top_padding + "px" );
	}else{
		jQuery("#content").css('padding-bottom',$top_padding + "px" );
	}
}
jQuery(window).load(function() {
	"use strict";
/* Load Default Rs For Template */
	menu_responsive_display();
	resize_action();
	dopamine_responsive_menu();
	footer_alway_in_bottom();
	if(jQuery(window).width()>=980)	{
		jQuery(".dl-responsive-menu-container").css("display","none");
		jQuery(".dl-menu-container").css("display","block");
	}else{
		jQuery(".dl-responsive-menu-container").css("display","block");
		jQuery(".dl-menu-container").css("display","none");
	}
/* Load Default Rs For Template */
	
	if(jQuery().jCarouselLite){
		jQuery('.slider').jCarouselLite({
			btnNext: '#gallery .arrow-next',
			btnPrev: '#gallery .arrow-prev',
			visible: 3,
			autoWidth: false,
			autoCss:true,
			responsive: true,
			
		});
	};
	/* Load Slider */
	if(jQuery().flexslider){
	  jQuery('.testimonial-content .flexslider').flexslider({
		animation: "slide",
		controlsContainer: ".testimonial"
	  });
	  jQuery('.home-baner-content .flexslider').flexslider({
		animation: "fade",
		controlsContainer: "#home-baner"
	  });
	  jQuery('.flextslider-content .flexslider').flexslider({
		animation: "fade",
		controlsContainer: ".flexslider"
	  });
	  
    }
	var i;i=0;
	jQuery('.comments-wrap').find('.comment-box').each(function() {
		i= i + 1;
		jQuery(this).append('<span class="right_num">'+i+'</span>');
	});
});
jQuery(document).ready(function($){
	"use strict";
	jQuery.noConflict() 
	
	/* JS FOR DROPDOWN SUBPAGE */
	jQuery(".responsive-subpage span").html(jQuery("#sidebar .subpage-menu.widget ul li.current a").html());
	jQuery(".responsive-subpage").click(function(){
		jQuery("#sidebar .subpage-menu.widget ul").toggle();
		if(!(jQuery(this).hasClass("on"))){
			jQuery(this).addClass("on");
			jQuery(this).css('background-color','#83c129');
			jQuery(this).find("span").css('color','#fff');
			jQuery(this).css('color','#fff');
			
		}else{
				jQuery(this).removeClass("on");
				jQuery(this).css('background-color','#f2f2f2');
				jQuery(this).find("span").css('color','#191919');
				jQuery(this).css('color','#191919');
		}		
		
	});
	jQuery("#sidebar .subpage-menu.widget ul li a").click(function(){
		
		jQuery(this).parent().parent().find("li").attr({style : ""});
		jQuery(this).parent().parent().find("a").attr({style : ""});
		
		jQuery(".responsive-subpage span").html(jQuery(this).html());
		if(jQuery(window).width()<768)	{
		jQuery(this).parent().parent().toggle();
		}
		jQuery(this).parent().parent().find('.current').removeClass('current');
		jQuery(this).parent().addClass("current");
		
		jQuery(this).parent().prev().css("border-bottom","1px solid #83c129");
		jQuery(this).parent().prev().find("a").css("border-bottom","1px solid #83c129");
		
		jQuery(".responsive-subpage").css('background-color','#f2f2f2');
		jQuery(".responsive-subpage").css('color','#191919');
		jQuery(".responsive-subpage").find("span").css('color','#191919');
		
		
	});
	/* JS FOR DROPDOWN SUBPAGE */
	/* Resize Action */
	jQuery(window).scroll(function() {
		dopamine_responsive_menu();
	});
	
	/* Resize Action */
	jQuery(window).resize(function() {
		if(jQuery(window).width()>=980)	{
			if(jQuery(".dl-responsive-menu-container").css("display") == "block"){
				jQuery(".dl-responsive-menu-container").css("display","none");
			}
			if(jQuery(".dl-menu-container").css("display") == "none"){
				jQuery(".dl-menu-container").css("display","block");
			}
		}else{
			if(jQuery(".dl-responsive-menu-container").css("display") == "none"){
				jQuery(".dl-responsive-menu-container").css("display","block");
			}
			if(jQuery(".dl-menu-container").css("display") == "block"){
				jQuery(".dl-menu-container").css("display","none");
			}
		}
		resize_action();
		footer_alway_in_bottom();
		dopamine_responsive_menu();
		jQuery("#gallery").html($global_gallery);
		if(jQuery().jCarouselLite){
			jQuery('.slider').jCarouselLite({
				btnNext: '#gallery .arrow-next',
				btnPrev: '#gallery .arrow-prev',
				visible: 3,
				autoWidth: false,
				autoCss:true,
				responsive: true,
				
			});
		};
		/* Reload Isotope */
		if(jQuery().isotope){
		var $container = jQuery('.portfolio-lists');
			var selector = jQuery("#portolfio-filter a.active").attr('data-filter');
			$container.isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false,
	
				}
			});
			return false;
		}	
			
	});
	
	// hide #back-top first
	jQuery("#back-top").hide();		
	// fade in #back-top
	jQuery(function () {
		"use strict";
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('#back-top').fadeIn();
			} else {
				jQuery('#back-top').fadeOut();
			}
		});	
		// scroll body to 0px on click
		jQuery('#back-top a').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});	
	//Add Shadow For Menu	
	var lastScroll = 0;
	jQuery(window).scroll(function(event){
	    var st = jQuery(this).scrollTop();
		if (st > lastScroll){
			jQuery(".logo_menu_area").css('box-shadow','0px 1px 1px rgba(0,0,0,0.2)');
		}
		 
		lastScroll = st;
	});
	/* End Fancy Box*/
	jQuery(".service-style-4:in-viewport").each(function() {
				
				//jQuery(this).css("opacity","1");
				jQuery(this).find(".chart").easyPieChart({
							animate: 1000,
							lineCap: 'square',
							lineWidth: jQuery(this).find(".chart").attr('data-linewidth'),
							size: jQuery(this).find(".chart").attr('data-size'),
							barColor: jQuery(this).find(".chart").attr('data-barcolor'),
							trackColor: jQuery(this).find(".chart").attr('data-trackcolor'),
							scaleColor: 'transparent'
						});
		});	
	// CHART JQUERY	
	jQuery( window  ).scroll(function() {
		jQuery(".service-style-4:in-viewport").each(function() {
				
				//jQuery(this).css("opacity","1");
				jQuery(this).find(".chart").easyPieChart({
							animate: 1000,
							lineCap: 'square',
							lineWidth: jQuery(this).find(".chart").attr('data-linewidth'),
							size: jQuery(this).find(".chart").attr('data-size'),
							barColor: jQuery(this).find(".chart").attr('data-barcolor'),
							trackColor: jQuery(this).find(".chart").attr('data-trackcolor'),
							scaleColor: 'transparent'
						});
		});	
	});	
	
	//Portfolio Relatest Hover 
	jQuery(".latest-work-style-1 .relasted-item").hover(function(){
		jQuery(this).find(".hover-item").animate({
					opacity: 0.8,
				  }, 500);	
	},function(){
		jQuery(this).find(".hover-item").animate({
					opacity: 0,
				  }, 100);	
	});
	
	//Fullwidth Bg
	jQuery(".bgimage").each(function(){
		
		var bg_image = jQuery(this).attr("rel");
		var bg_color = jQuery(this).attr("data-color");
		var bg_id= jQuery(this).attr("id")
		
		jQuery(this).css('background-image',bg_image);
		jQuery('head').append('<style>#'+bg_id+'{ background-image:url(\''+bg_image+'\')  !important;background-attachment: fixed;background-position: 50% 50%;background-color:'+bg_color+';}</style>');});
	
	
	// scroll body to 0px on click
		jQuery('.devider-gotop').click(function () {
			jQuery('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	
	/* End Portfolio */
	

	/* Tooltip */
	jQuery('.top-social a, .tooltips').tooltip({
		placement: 'bottom',
	});
	
	jQuery(".media.video").fitVids();
	
	/* If screen > 970 */
	jQuery(".search-popup input").focusin(function(){
		if(jQuery(window).width()>=980)	{
			jQuery('head').append('<style>.search-popup{border:2px solid #ff4533 !important;}.search-popup:before{ border-bottom:7px solid #ff4533; }</style>');
		}else{
		
		}
	});
	
	jQuery(".search-popup input").focusout(function(){
		if(jQuery(window).width()>=980)	{
			jQuery('head').append('<style>.search-popup{border:2px solid #e6e6e6 !important;}.search-popup:before{ border-bottom:7px solid #e6e6e6; }</style>');
		}else{
		}
		
	});
	//Search Button Click
	jQuery(".search-button").click(function(){
		if(jQuery(window).width()>=980)	{
			jQuery(".search-popup").toggle( "fast");		
		}else{
			jQuery(".my-responsive-search").toggle( "fast");		
		}
	});
	
	// Revolution Slider
	if( $.fn.revolution ) {

		jQuery( '.fullwidthbanner' ).revolution({
			delay: 6000, 
			startheight: 550, 
			fullWidth: 'on', 
			shadow:3,
			
			onHoverStop:"on",
			hideThumbs:200,
			navigationType:"bullet",
			navigationStyle:"navbar",
			navigationArrows:"verticalcentered",
			
			touchenabled:"on",

			navOffsetHorizontal:1,
			navOffsetVertical:11,
			
		});
	}
	/* TAB */	
	jQuery('.tabs').each(function(){
		var $tabs = jQuery(this);
		// init the tabs
		$tabs.find('.tabs-nav a:eq(0)').addClass('active');
		$tabs.find('.tab').hide().eq(0).show();

		// actions
		$tabs.find('.tabs-nav a').on('click', function(e){
			var $self = jQuery(this),
				idx = $self.index();

			$self.addClass('active').siblings('.active').removeClass('active');

			$tabs.find('.tab').hide().eq( idx ).fadeIn();

			e.preventDefault();
		})
	});
	/* Accordion */
	jQuery('.accordion h6').on('click', function(e){
		var $li = jQuery(this).closest('li');
		
		$li
			.toggleClass('exp').find('.acc-cnt').slideToggle().end()
			.siblings('.exp').removeClass('exp').find('.acc-cnt').slideUp();

		e.preventDefault();
	});
	/* Short By Cols */
	jQuery(function(){
		"use strict";
		jQuery(".portfolio-cols ul li").click(function(){
			jQuery(this).parent().find(".active").removeClass("active");
			jQuery(this).addClass("active");
			if(jQuery(this).hasClass("p-2-cols"))
			{
				if(jQuery(".portfolio-lists").hasClass("three-cols")){
					jQuery(".portfolio-lists").removeClass("three-cols");
					jQuery(".portfolio-lists").addClass("two-cols");
				}
			}
			if(jQuery(this).hasClass("p-3-cols"))
			{
				if(jQuery(".portfolio-lists").hasClass("two-cols")){
					jQuery(".portfolio-lists").removeClass("two-cols");
					jQuery(".portfolio-lists").addClass("three-cols");
				}
			}
			var $container = jQuery('.portfolio-lists');
			var selector = jQuery("#portolfio-filter a.active").attr('data-filter');
			$container.isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false,
	
				}
			});
			return false;
			
		});
	});
	
	jQuery('#portolfio-filter a').click(function () {
		jQuery('#portolfio-filter a').removeClass('active');
		jQuery(this).addClass('active');
		return false;
	});
	
	/* ISOTOPE */
	if(jQuery().isotope){
		var $container = jQuery('.portfolio-lists');
		$container.isotope({
				filter: '*',
				animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false,
				animationEngine: 'css'
			}
		});
		jQuery('#portolfio-filter a').click(function () {
			jQuery('#portolfio-filter a').removeClass('active');
			jQuery(this).addClass('active');
			return false;
		});
		jQuery('#portolfio-filter a').click(function () {
			var selector = jQuery(this).attr('data-filter');
			$container.isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false,
	
				}
			});
			return false;
		});
	};
	/* Fancy Box*/
	if(jQuery().fancybox){
		jQuery("a.project-zoom").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	300, 
		'speedOut'		:	100, 
		'overlayShow'	:	false
	});
	};
});
