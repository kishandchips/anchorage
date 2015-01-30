(function($){

	var main = {
		
		vars: {},
		w : $(window),

		init: function(){

			main.vars.header = $('#header'),
			main.vars.body = $('body'),

			this.header.init();
			this.about.init();
			
			main.w.on('load', function(){
			});

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
			}
		},

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