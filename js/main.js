(function($){

	var main = {
		
		vars: {},
		w : $(window),

		init: function(){

			main.vars.header = $('#header'),
			main.vars.body = $('body'),

			this.header.init();
			this.about.init();

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
				main.about.floater.init();

				$('.show-more').on('click', function(){
					$(this).parent().siblings('.hide-more').toggleClass('expand');
				});
			},

			floater:{
				init: function(){
					var wrap = $('.floater-wrap');

					if(!wrap.is(':hidden')){
						console.log('running');
						
						var bar = $('#booking-bar');
						var barOffset = bar.offset().top;
						var headerH = main.vars.header.outerHeight();
						var formH = $('.booking-form').outerHeight();
						
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

		slider: {
			element: $('#slider'),

			init: function(){
				var element = main.slider.element;
				if(!element.length){return;}

				main.w.on('load',function(){
					element.owlCarousel({
					    items: 1,
					    loop: true,
					    nav: true,
					    navText: [],
					    navSpeed: 1000,
					    dots: true,
					});					
				})
			}
		},// main.slider

	};//main

	window.main = main;

	$(function(){
		window.main.init();

	});
	
})(jQuery);