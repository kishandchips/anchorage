(function($){

	var main = {
		
		vars: {},
		w : $(window),

		init: function(){

			main.vars.header = $('#header'),
			main.vars.body = $('body'),

			this.header.init();
			this.about.init();
			this.map.init();
			this.slider.init();

			$("[rel='fancybox-thumb']").fancybox({
				helpers : {
					thumbs : true
				},
				theme: 'dark',
				openEffect : 'fade',
				closeEffect	: 'fade',				
				prevEffect		: 'fade',
				nextEffect		: 'fade'				
			});

			$("a.fancybox, .fancybox a").fancybox({
				minHeight: 370,
				openEffect : 'fade',
				closeEffect	: 'fade'
			});

			// if($('.sticky-wrapper').length) {
			// 	if(main.w.width() > 899) {
			// 		$('.sticky-wrapper').height($('.information .left-wrapper').height());
			// 		$('#sticky-request').hcSticky({
			// 			top: 180
			// 		});
			// 	}
			// }
			
		},

		header: {
			element: $('#header'),

			init: function(){
				var element = main.header.element;
				if(!element.length){return;}

				var header = main.vars.header;

				$('#menu-toggle').on('click', function(){
					header.toggleClass('menu-visible');
				});

			},

		},// main.header

		about:{
			element: $('#apartment'),

			init: function(){
				var element = main.about.element;
				if(!element.length){return;}

				main.slider.init();
				// main.about.floater.init();

				$('.show-more').on('click', function(){
					$(this).parent().siblings('.hide-more').toggleClass('expand');
					$(this).hide();
				});
			},

			floater:{
				init: function(){
					var wrap = $('.floater-wrap');

					if(!wrap.is(':hidden')){
						
						var barH,
							bar = $('#booking-bar'),
 							barOffset = bar.offset().top,
							headerH = main.vars.header.outerHeight(),
							formH = $('.booking-form').outerHeight();
						
						main.w.on('load', function(){
							barH = bar.outerHeight(true);
						});

						main.w.on('scroll', function() {
							var scrollPos = main.w.scrollTop();

						    if ( scrollPos >= barOffset) {
						    	bar.addClass('fixed');
								wrap.css({top: scrollPos + headerH + 10, bottom: 'auto'});

								if(wrap.position().top + formH >= barH){
									wrap.css({bottom: 20,top: 'auto'});
								}

						    } else {
						    	bar.removeClass('fixed');
						    	wrap.css({top:0});
						    }
						});						
					}
				}// init
			}// about.floater

		},// main.about

		slider:{
			element: $('.owl-carousel'),

			init: function(){
				var element = main.slider.element;
				if(!element.length){return;}



				element.each( function() {
					var $carousel = $(this);
					$carousel.owlCarousel({
					    items: 1,
					    loop: $carousel.data("loop"),
					    nav : $carousel.data("nav"),
					    navText: [],
					    navSpeed: 1000,
					    dots: true,
					    animateOut: 'fadeOut',
					    animateIn: 'fadeIn',
					    autoplay: $carousel.data("autoplay"),
						autoplayHoverPause: false
					});					
				});
			}
		},// main.slider

		map:{
			element: $('#map'),

			init: function(){
				var element = main.map.element;
				if(!element.length){return;}

			    main.w.on('load',main.map.setup());
			},

			setup:function(){
				var margate = new google.maps.LatLng(this.element.data('lat'),this.element.data('lng'));

		        var mapOptions = {
		          center: margate,
		          zoom: 16,
		          scrollwheel: false,
		        };

		        var map = new google.maps.Map(document.getElementById('map'),mapOptions);
				var marker = new google.maps.Marker({
				    position: margate,
				    map: map,
				    icon: wordpress.template + '/images/anchor-marker.png'
				});

				function calculateCenter() {
				  margate = map.getCenter();
				}

				google.maps.event.addDomListener(map, 'idle', function() {
				  calculateCenter();
				});
				
				google.maps.event.addDomListener(window, 'resize', function() {
				  map.setCenter(margate);
				});

				main.map.markers(map);
			},// map.setup

			markers: function(map){
				markers = [];

				$('#markers li').each(function(){
					var el = $(this),
					lat = el.data('lat'),
					lng = el.data('lng'),
					icon = el.data('icon'),
					latlng = new google.maps.LatLng(lat,lng);
					content = $('.popup', el).html();
					
					var marker = new google.maps.Marker({
					    position: latlng,
					    map: map,
					    icon: icon,
					});

					markers.push(marker);

					el.on('click', function(){
						$.each(markers, function(index){
							markers[index].setAnimation(null);	
						})
							marker.setAnimation(google.maps.Animation.BOUNCE);
					});

		            var infowindow = new google.maps.InfoWindow({
		            	maxWidth: 446,
		            	padding: 0            	
		            });

					// google.maps.event.addListener(infowindow, 'domready', function() {
					//    var iwOuter = $('.gm-style-iw');
					//    var iwBackground = iwOuter.prev();
					//    iwBackground.children(':nth-child(2)').css({'display' : 'none'});
					//    iwBackground.children(':nth-child(4)').css({'display' : 'none'});
					// });		            


		            google.maps.event.addListener(marker, 'click', (function(marker, content, infowindow) {		                
		                return function() {		                	
		                    infowindow.setContent(content);
		                    infowindow.close();
		                    infowindow.open(map, marker);
		                };
		            })(marker, content, infowindow));


				});

			}// map.markers

		}// main.map

	};//main

	window.main = main;

	$(function(){
		window.main.init();

	});
	
})(jQuery);