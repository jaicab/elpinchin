<?php 
include('lib/session.php');

include('lib/top.php');
?>
<title>Dirección | El Pinchin - Bar en Parquesol, Valladolid</title>
<meta name="keywords" content="direccion, localizacion, pinchin, bar, parquesol, vinos, valladolid, restaurante"/>
<meta name="description" content="Direccion de El Pinchín en Parquesol, Valladolid" />

<style media="all">

<?php if($_SESSION["m"]==0){ ?>
#mapa{
	width:492px;
	height:280px;
	float:right;
	margin-left:70px;
	margin-bottom:20px;
}
<?php }else{ ?>
#mapa{
	width:100%;
	height:180px;
	margin:10px 0;
}
<?php } ?>

</style>


<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">
var geocoder;
var map;
var markerImg = 'img/maps.png';
var direccion = 'Calle José Garrote Tobar 22, 47014 Valladolid';

  function initialize() {
    geocoder = new google.maps.Geocoder();
	
	geocoder.geocode( { 'address': direccion}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
		
		var myOptions = {
		  zoom: 18,
		  center: results[0].geometry.location,
		  mapTypeId: google.maps.MapTypeId.ROADMAP,
		  backgroundColor: '#fafafa',
		  panControl: false
		}
		map = new google.maps.Map(document.getElementById("mapa"), myOptions);
		
		//creamos marcador
        var marker = new google.maps.Marker({
			animation: google.maps.Animation.DROP,
            map: map,
			icon: markerImg,
            position: results[0].geometry.location
        });
		
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
	
$(document).ready(function() { 
  initialize();
});
</script>

</head>

<body>
<?php include('lib/header.php'); ?>

<div id="cuerpo"><div class="content">


<div id="mapa">
</div>

<h1>Ven a tomar algo.</h1>
<p>Nuestra dirección es:</p>
<p>Calle José Garrote Tobar, 22<br/>
47014 Valladolid (Zona Parquesol)</p>

</div></div>

<?php include('lib/footer.php');