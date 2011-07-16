document.observe('dom:loaded', function() {
  var images = $$('ul#slideImages li');
  if($('slideshow')) $('slideshow').observe('dom:loaded', new SlideShow({slides: images}));
  
  $$('a[rel="external"]').invoke('writeAttribute', 'target', '_blank');
  embedMovie();
  
  if($('map_canvas')) map_initialize(names, addresses, comments);
});

function embedMovie() {
  var flashvars = {};

  var params = {
    'allowfullscreen':    'false',
    'allowscriptaccess':  'always',
    'allowfullscreen':	  'false',
    'wmode':              'transparent'
  };

  var attributes = {
    'id':                 'sidebar',
    'name':               'sidebar'
  };

  swfobject.embedSWF('/media/neb_sidebar.swf', 'flashContent', '295', '505', '9', 'false', flashvars, params, attributes);
}

function map_initialize(names, addresses, comments) {
	console.log(names);
  var latlng = new google.maps.LatLng(41.29, -99.54),
  		i = 0,
  		marker,
  		location,
  		myOptions = {
    		zoom: 6,
    		center: latlng,
    		mapTypeId: google.maps.MapTypeId.ROADMAP
  		},
      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  for(var i=0; i<3; i++) location = convertAddressToPoint(names[i], addresses[i], comments[i], map);
}

function convertAddressToPoint(n, a, c, map) {
  var geocoder = new google.maps.Geocoder(),
      longLat;
  	  
  geocoder.geocode( { 'address': a, 'region': 'us' }, function(results, status) {
		if(status == google.maps.GeocoderStatus.OK) {
			var marker = createMarker(results[0].geometry.location, map),
					info = createInfoWindow(marker, n, c)
			
		} else
			alert("Geocode was not successful for the following reason: " + status);
	});
}

function createMarker(location, map) {
	new google.maps.Marker({
  	position: location,
    map: map, 
    title: 'this is my address'
  });
}

function createInfoWindow(marker, n, c) {
	var content = "<div class=\"window\">" + n + "</div>",
			infowindow = new google.maps.InfoWindow({ content: content });
    
  google.maps.event.addListener(marker, 'click', function(){
  	infowindow.open(map,marker);
  });
}

var scriptLoader = {
    _loadScript: function (url, callback) {
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = url;
    if (callback) {
      script.onreadystatechange = function () {
        if (this.readyState == 'loaded') callback();
      }
      script.onload = callback;
    }
    head.appendChild(script);
  },

  load: function (items, iteration) {
    if (!iteration) iteration = 0;
    if (items[iteration]) {
      scriptLoader._loadScript(
        items[iteration],
        function () {
          scriptLoader.load(items, iteration+1);
        }
      )
    }
  }
}
