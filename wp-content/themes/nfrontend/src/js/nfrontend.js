$(document).ready(function() {

		$("#mobile-menu-wrapper").mmenu({
			navbar: false
		});

    $(".gallery").slick({
			infinite:true,
  		slidesToShow: 1,
  		slidesToScroll: 1,
  		arrows:false,
  		autoplay: true,
  		autoplaySpeed: 5000,
  		fade: true,
  		cssEase: 'linear'
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

		if ( $("#google-maps").length ) {

		  var markersContainer = new Array;
			var markers = new Array;
			var map;
			var zoomLevel = $("#google-maps").data("zoom");
			var bounds = new google.maps.LatLngBounds();

			function initialize() {

				$( "#google-maps .google-maps-marker" ).each( function(index,element) {
						markers[index] = [$(element).data('latitude'),$(element).data('longitude'),$(element).data('address'),$(element).data('title'),$(element).data('icon')];
				} );

				var MY_MAPTYPE_ID = 'custom-map-style';
				var customLayoutOptions = {	name: 'ndigital' };
				var customLayout =	[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#b6dae0"},{"visibility":"on"}]}];
				var customMapType = new google.maps.StyledMapType(customLayout, customLayoutOptions);


				map = new google.maps.Map( document.getElementById('google-maps'), {
					zoom: zoomLevel,
				  mapTypeControl: false,
				  scrollwheel: false,
		 			disableDoubleClickZoom: true,
		 			mapTypeId: MY_MAPTYPE_ID
				} );

				map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

				showMarkers(map,markers);

			}

			function showMarkers(map,markers) {

				for (var i = 0 ; i < markers.length ; i++) {

					var content = "<div class='m-top-20 p-left-10 p-right-10 p-bottom-10'><h5 class='m-0'>"+ markers[i][3]+"</h5><div class='m-top-10'><i class='fa fa-map-marker m-right-10'></i>"+ markers[i][2]+"</div></div>";
					var infowindow = new google.maps.InfoWindow();
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(markers[i][0],markers[i][1]),
		        title: markers[i][3],
		        content: content,
						map: map,
						icon: markers[i][4],
						animation: google.maps.Animation.DROP
					});

					bounds.extend(marker.position);
					map.fitBounds(bounds);

					markersContainer.push(marker);

					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function() {
							infowindow.setContent(marker.content);
							infowindow.open(map, marker);
		        		}
		      		})(marker, i));

				}

				map.setZoom(zoomLevel);
			}

			google.maps.event.addDomListener(window, "load", initialize);

	}

});
