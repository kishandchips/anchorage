!function($){var e={vars:{},w:$(window),init:function(){e.vars.header=$("#header"),e.vars.body=$("body"),this.header.init(),this.about.init(),this.map.init(),this.slider.init(),$("[rel='fancybox-thumb']").fancybox({helpers:{thumbs:!0},theme:"dark",openEffect:"fade",closeEffect:"fade",prevEffect:"fade",nextEffect:"fade"}),$("a.fancybox, .fancybox a").fancybox({minHeight:370,openEffect:"fade",closeEffect:"fade"})},header:{element:$("#header"),init:function(){var n=e.header.element;if(n.length){var t=e.vars.header;$("#menu-toggle").on("click",function(){t.toggleClass("menu-visible")})}}},about:{element:$("#apartment"),init:function(){var n=e.about.element;n.length&&(e.slider.init(),$(".show-more").on("click",function(){$(this).parent().siblings(".hide-more").toggleClass("expand"),$(this).hide()}))},floater:{init:function(){var n=$(".floater-wrap");if(!n.is(":hidden")){var t,a=$("#booking-bar"),o=a.offset().top,i=e.vars.header.outerHeight(),r=$(".booking-form").outerHeight();e.w.on("load",function(){t=a.outerHeight(!0)}),e.w.on("scroll",function(){var s=e.w.scrollTop();s>=o?(a.addClass("fixed"),n.css({top:s+i+10,bottom:"auto"}),n.position().top+r>=t&&n.css({bottom:20,top:"auto"})):(a.removeClass("fixed"),n.css({top:0}))})}}}},slider:{element:$(".owl-carousel"),init:function(){var n=e.slider.element;n.length&&n.each(function(){var e=$(this);e.owlCarousel({items:1,loop:e.data("loop"),nav:e.data("nav"),navText:[],navSpeed:1e3,dots:!0,animateOut:"fadeOut",animateIn:"fadeIn",autoplay:e.data("autoplay"),autoplayHoverPause:!1})})}},map:{element:$("#map"),init:function(){var n=e.map.element;n.length&&e.w.on("load",e.map.setup())},setup:function(){function n(){t=o.getCenter()}var t=new google.maps.LatLng(this.element.data("lat"),this.element.data("lng")),a={center:t,zoom:16,scrollwheel:!1},o=new google.maps.Map(document.getElementById("map"),a),i=new google.maps.Marker({position:t,map:o,icon:wordpress.template+"/images/anchor-marker.png"});google.maps.event.addDomListener(o,"idle",function(){n()}),google.maps.event.addDomListener(window,"resize",function(){o.setCenter(t)}),e.map.markers(o)},markers:function(e){markers=[],$("#markers li").each(function(){var n=$(this),t=n.data("lat"),a=n.data("lng"),o=n.data("icon"),i=new google.maps.LatLng(t,a);content=$(".popup",n).html();var r=new google.maps.Marker({position:i,map:e,icon:o});markers.push(r),n.on("click",function(){$.each(markers,function(e){markers[e].setAnimation(null)}),r.setAnimation(google.maps.Animation.BOUNCE)});var s=new google.maps.InfoWindow({maxWidth:446,padding:0});google.maps.event.addListener(r,"click",function(n,t,a){return function(){a.setContent(t),a.close(),a.open(e,n)}}(r,content,s))})}}};window.main=e,$(function(){window.main.init()})}(jQuery);