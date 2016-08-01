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
        var myLatlng = new google.maps.LatLng(latitude,longitude);
        var mapOptions = {
          center: { lat: latitude, lng: longitude},
          zoom: 18
        };
		//地圖設定
        var map = new google.maps.Map(
            document.getElementById('googlemap'),
            mapOptions);
		//畫出map
		var marker = new google.maps.Marker({
            position: myLatlng,
            title:"目前位置"
            });
		//標記地點
		marker.setMap(map);		
      }