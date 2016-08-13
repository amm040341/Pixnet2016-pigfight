var service;
var map;
var markers = [];
var myLatlng;
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }
  //獲取目前位置
function showPosition(position)
  {
  var lat,lng;
  lat = position.coords.latitude;
  lng = position.coords.longitude;
  /*x.innerHTML="Latitude: " + lat + 
  "<br />Longitude: " + lng;*/
  initialize(lat,lng)  
  }
  function initialize(latitude,longitude) {
        myLatlng = new google.maps.LatLng(latitude,longitude);
        var mapOptions = {
          center: { lat: latitude, lng: longitude},
          zoom: 14
        };
		//地圖設定
        map = new google.maps.Map(
            document.getElementById('googlemap'),
            mapOptions);
		//畫出map
		var marker = new google.maps.Marker({
            position: myLatlng,
            title:"目前位置"
            });
		//標記地點
		marker.setMap(map);



/*// Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  var markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();
    if (places.length == 0) {
      return;
    }

    // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      markers.push(new google.maps.Marker({
        map: map,
        icon: icon,
        title: place.name,
        position: place.geometry.location
      }));

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        //bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });*/
		
      }
	  function callback(results, status) {
		  if(results.length==0)
		     alert("no nearby shop");
		 var icon = {
        url: results[0].icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };
  if (status == google.maps.places.PlacesServiceStatus.OK) {
	  // Clear out the old markers.
    markers.forEach(function(marker) {
      marker.setMap(null);
    });
    markers = [];
	
    for (var i = 0; i < results.length; i++) {
      var place = results[i];
      //createMarker(results[i]);
	  markers.push(new google.maps.Marker({
        map: map,
		icon: icon,
        title: results[i].name,
        position: results[i].geometry.location	
      }));
    }
  }
}
function cClick()
{
	var request = {
    location: myLatlng,
	bounds: map.getBounds(),
    keyword: '屈臣氏',
    radius: '1000'
	//query:'7-11'
	//query: 'Small three US-Japan'
  };
  service = new google.maps.places.PlacesService(map);
  //service.textSearch(request, callback);
  service.radarSearch(request, callback);
}
function iClick()
{
	var request = {
    location: myLatlng,
	bounds: map.getBounds(),
    keyword: 'innisfree',
    radius: '1000'
	//query:'7-11'
	//query: 'Small three US-Japan'
  };
  service = new google.maps.places.PlacesService(map);
  //service.textSearch(request, callback);
  service.radarSearch(request, callback);
}