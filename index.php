<?php 
include('lib/session.php');

include('lib/top.php');
?>
<title>El Pinchin - Bar en Parquesol, Valladolid</title>
<meta name="keywords" content="pinchin, bar, parquesol, vinos, tapas, carta, valladolid, restaurante"/>
<meta name="description" content="El Pinchín es tu bar favorito en Parquesol, Valladolid" />

<style media="all">
h2,h4{margin:5px 0;}
#horario{text-align:center;}

<?php if($_SESSION["m"]==0){ ?>
#horario{
	float:right;
	margin:10px 0 20px 40px;
	padding-left:40px;
	border-left:1px solid #111;
}

<?php }else{ ?>
<?php } ?>


#footer{clear:both;}

</style>
</head>

<body>
<?php include('lib/header.php'); ?>

<div id="cuerpo"><div class="content">
<?php if($_SESSION["m"]==0){ ?>
<div id="horario">
	<h2 style="color:#5e4d36;">Horario</h2>
	<h2>12:30 - 16:00</h2>
    <h2>20:00 - 24:00</h2>
    <h4>Abierto de Martes a Domingo.</h4>
    <h4>Cerrado Domingos noche y Lunes.</h4>
</div>
<?php } ?>
<h1>Bienvenido al sitio web de El Pinchín.</h1>
<p><b>Cañas</b>: Bien tiradas.<br/>
<b>Vinos</b>: Bien seleccionados.<br/>
<b>Tapas</b>: De buen gusto.<br/>
<b>Carta</b>: Distinta.<br/>
<b>Música</b>: De la que te gusta.<br/>
<b>En resumen</b>: "Simplemente" bueno.</p>
<p>Recordamos que <b>conviene reservar</b>.</p>
<p>Consulta <a href="/direccion" title="Ver dirección">aquí</a> nuestra dirección.</p>
<?php if($_SESSION["m"]==1){ ?>
<div id="horario">
	<h2 style="color:#5e4d36;">Horario</h2>
	<h2>12:30 - 16:00</h2>
    <h2>20:00 - 24:00</h2>
    <h4>Abierto de Martes a Domingo.</h4>
    <h4>Cerrado Domingos noche y Lunes.</h4>
</div>
<?php } ?>


</div></div>

<?php include('lib/footer.php');