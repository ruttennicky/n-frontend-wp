$(document).ready(function() {

	resize();
	
	$(window).resize(function() {
		resize();
	});

	$("#mobile-menu").mmenu();
	
	var mobilemenu = $('#mobile-menu').data('mmenu');
	mobilemenu.bind('opened', function () {
	    $("#mobile-menu-button > i").addClass("fa-rotate-90");
	});
	
	mobilemenu.bind('closed', function () {
	    $("#mobile-menu-button > i").removeClass("fa-rotate-90");
	});
	
	$(".fancybox").fancybox({
		padding		: 0
	});
	
    $(".gallery").slick({
    	infinite:true,
  		slidesToShow: 3,
  		slidesToScroll: 3,
  		arrows:false,
  		dots:true,
  		autoplay: true,
  		autoplaySpeed: 2000
  	});
  	
  	$(".gallery-header").slick({
    	infinite:true,
  		slidesToShow: 1,
  		slidesToScroll: 1,
  		arrows:false,
  		autoplay: true,
  		autoplaySpeed: 5000,
  		fade: true,
  		cssEase: 'linear'
  	});

  	$("#gallery-next").on("click", function(e){
  		e.preventDefault();
	    $('.gallery').slick('slickNext');
	});

	$("#gallery-prev").on("click", function(e){
		e.preventDefault();
	    $('.gallery').slick('slickPrev');
	});
	
	$(".js-hide").hide();
	
	$(".smooth-scroll").on('click',function(e){
		e.preventDefault();
	    $('html, body').animate({
	        scrollTop: $('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top
	    }, 500);
	});
	
	if ( $( "#filter-grid" ).length ) {
		
		$("#filter-grid").imagesLoaded( function(){
	        $("#filter-grid").isotope({
		        itemSelector: '.item'
		    });
		} );

	    $("#filter-list").on( "click", "a", function(e) {
          e.preventDefault();
	      $("#filter-list > li > a").each(function() {
	        $(this).removeClass("active");
	      });
	      $(this).addClass("active");
	      var filterValue = $(this).data("filter");
	      if ( filterValue !== '*' ) {
		      filterValue = filterValue + ', .corner-stamp'
		   }
	       $("#filter-grid").isotope({ filter: filterValue });
	    });

    }
    
    if( $("#search").length ) {
    
	    var searchBox = $("#search");
	    
	    searchBox.hide(); 
	    
	    $("#search-button").on("click",function(e) {
		    e.preventDefault();
			$('html, body').animate({	scrollTop: 0	}, 500);
			searchBox.slideDown("slow");     
	    });
	    
	    $("#search-button-close").on("click",function(e) {
		   e.preventDefault();
		   searchBox.slideUp("slow");   
	    });
    
    }
    
    if ( $( "#google-maps" ).length ) {
	    
	    var markersContainer = new Array;	
		var markers = new Array;	
		var map;
			    			
		function initialize() {
		
			$( "#google-maps .google-maps-marker" ).each( function(index,element) {
					markers[index] = [$(element).data('latitude'),$(element).data('longitude'),$(element).data('address'),$(element).data('title'),$(element).data('icon')];
			} );
			
			var MY_MAPTYPE_ID = 'gvd-style';
			var customLayoutOptions = {	name: 'GVD' };	
			var customLayout =	[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#b6dae0"},{"visibility":"on"}]}];
			var customMapType = new google.maps.StyledMapType(customLayout, customLayoutOptions);
			
			map = new google.maps.Map( document.getElementById('google-maps'), {
				zoom: 16,
			    mapTypeControl: false,
			    scrollwheel: false,
	 			disableDoubleClickZoom: true,
	 			mapTypeId: MY_MAPTYPE_ID
			} );

			map.mapTypes.set(MY_MAPTYPE_ID, customMapType);	
			
			showMarkers(map,markers);
					
		}

		
		function showMarkers(map,markers) {
			
			map.setCenter(new google.maps.LatLng(markers[0][0],markers[0][1]));
				
			for (var i = 0 ; i < markers.length ; i++) {
				
				var content = "<div class='m-top-20'><h3 class='m-0'>"+ markers[i][3]+"</h3><div><i class='fa fa-map-marker m-right-10'></i>"+ markers[i][2]+"</div></div>";
				
				var infowindow = new google.maps.InfoWindow();
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(markers[i][0],markers[i][1]),
	            	title: markers[i][3],
	            	content: content,
					map: map,
					icon: markers[i][4],
					animation: google.maps.Animation.DROP
				});
				
				markersContainer.push(marker);
				
				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent(marker.content);
						infowindow.open(map, marker);
	        		}
	      		})(marker, i));
	      		
			}
		}
		
		if ( $("#properties").length > 0 ) {
			
			$("#properties .property").click( function(e) {
				e.preventDefault();
				map.setZoom(8);
				var i = $(this).data("id");
				infowindow.open(map, markersContainer[i]);
				
			} );
				
		}
		
		google.maps.event.addDomListener(window, "load", initialize);
	}

    if ( $("#auto-popup").length && document.cookie.indexOf("state_popup") <= 0) {

        setTimeout(function() {
            $("#auto-popup").modal();
        }, 7500);

        $("#popup-close").on("click",function(e) {
            e.preventDefault();
            $("#auto-popup").modal('hide');
        });

        $("#auto-popup").on('hidden.bs.modal', function (e) {
            document.cookie="state_popup=closed";
        });

    }

});

function resize() {

	$(".js-full-screen").height($(window).height());

}