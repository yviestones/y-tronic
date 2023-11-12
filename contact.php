<head>

<?php include "includes/headinfo.php";
?>




<style>
body	{
		background-image: url("img/map-1252142_1920.jpg");
		background-color: rgb(139, 105, 59);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center;	
		font-size: 100%;
		text-align: center;
		margin: 0;
		}
 

/* Kompaktes Layout für mobile Geräte */
#kontakt {
  border: solid thin red;
  float: right;
  margin-right: 1em;
}

@media (min-width: 30em) { 
  /* mehrspaltiges Layout für breitere Bildschirme */ 
  #kontakt {
    float: right;
    width: 9em;
  }
	
		#myHeader {
		padding: 0.1px;
		text-align: center;
	} 	
	


      #map {
        height: 45%;
		
		margin-top: 1em;
		margin-bottom: 3em;
		margin-right: 12em;
		margin-left: 12em;
		
      }
    
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
 
      .popup-tip-anchor {
        height: 0;
        position: absolute;
        width: 200px;
      }
      .popup-bubble-anchor {
        position: absolute;
        width: 100%;
        bottom: /* TIP_HEIGHT= */ 8px;
        left: 0;
      }
      .popup-bubble-anchor::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
   
        transform: translate(-50%, 0);
 
        width: 0;
        height: 0;
   
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 8px solid white;
      }
     
      .popup-bubble-content {
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, -100%);
     
        background-color: rgb(109, 212, 238);
        padding: 7px;
        border-radius: 5px;
        font-family: sans-serif;
        overflow-y: auto;
        max-height: 60px;
        box-shadow: 0px 2px 10px 1px rgba(0,0,0,0.5);
      }
	
.responsive_map {    /* google map responsive */ 
height: 0;
overflow: hidden;
padding-bottom: 56%;
position: relative;
}

.responsive_map iframe {
height: 100%;
left: 0;
position: absolute;
top: 0;
width: 100%;
}	
	
	
    </style>

</head>

<body>

<?php include "includes/navigation.php";
?>

<h1 id="myHeader">Kontakt</h1>
  
 <p>Hier findest Du mich</p>
 

 <div id="map"></div>
    <div id="content">
    y-tronic     
    </div>
    <script>
var map, popup, Popup;


function initMap() {
  definePopupClass();

  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 47.3014634, lng: 8.5301831  },
    zoom: 16,
	// * mapTypeId: 'satellite' *//
  });

  popup = new Popup(
      new google.maps.LatLng(47.3014634, 8.5301831  ),
      document.getElementById('content'));
  popup.setMap(map);
}




function definePopupClass() {
  
  Popup = function(position, content) {
    this.position = position;

    content.classList.add('popup-bubble-content');

    var pixelOffset = document.createElement('div');
    pixelOffset.classList.add('popup-bubble-anchor');
    pixelOffset.appendChild(content);

    this.anchor = document.createElement('div');
    this.anchor.classList.add('popup-tip-anchor');
    this.anchor.appendChild(pixelOffset);

    
    this.stopEventPropagation();
  };
  
  Popup.prototype = Object.create(google.maps.OverlayView.prototype);


  Popup.prototype.onAdd = function() {
    this.getPanes().floatPane.appendChild(this.anchor);
  };


  Popup.prototype.onRemove = function() {
    if (this.anchor.parentElement) {
      this.anchor.parentElement.removeChild(this.anchor);
    }
  };

  Popup.prototype.draw = function() {
    var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);
    // Hide the popup when it is far out of view.
    var display =
        Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ?
        'block' :
        'none';

    if (display === 'block') {
      this.anchor.style.left = divPosition.x + 'px';
      this.anchor.style.top = divPosition.y + 'px';
    }
    if (this.anchor.style.display !== display) {
      this.anchor.style.display = display;
    }
  };


  Popup.prototype.stopEventPropagation = function() {
    var anchor = this.anchor;
    anchor.style.cursor = 'auto';

    ['click', 'dblclick', 'contextmenu', 'wheel', 'mousedown', 'touchstart',
     'pointerdown']
        .forEach(function(event) {
          anchor.addEventListener(event, function(e) {
            e.stopPropagation();
          });
        });
  };
}
    </script> 
 
  </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDURIK7Co-ig5DqhquaL3X-87toklTXzTY&callback=initMap">
  </script>

    


 
<?php include "includes/footer.php";
?>														
		 
</body>
</html>	