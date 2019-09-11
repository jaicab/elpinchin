<?php 
include('lib/session.php');

if(isset($_GET['e'])){
	$desc[400]='Solicitud incorrecta.';
	$desc[401]='HTTP no autorizado.';
	$desc[403]='No tiene acceso a esa página.';
	$desc[404]='No se ha encontrado esa página.';
	$desc[500]='No se ha podido acceder a esa página.';
}

include('lib/top.php');
?>
<title>Error <?php echo $_GET['e']; ?> | El Pinchin - Bar en Parquesol, Valladolid</title>
<meta name="keywords" content="caballero, carlos, terapia, oficial, terapeuta, conducta, infantil, familiar"/>
<meta name="description" content="Sitio web oficial del psicologo Carlos Caballero, situado en Ponferrada" />

<style media="all">
h2,h4{margin:5px 0;}

<?php if($_SESSION["m"]==0){ ?>
h1, p{text-align:center;}
<?php }else{ ?>

<?php } ?>

</style>
</head>

<body>
<?php include('lib/header.php'); ?>

<div id="cuerpo"><div class="content">

<h1>¡Vaya! Ha ocurrido un error.</h1>
<p>Prueba con las secciones del menú, seguro que encuentras lo que buscas.<br/>
Si el error sigue ahí, <a href="/contacto">contacta con nosotros</a> e intentaremos resolverlo lo antes posible.</p>
<p><b>Error <?php echo $_GET['e']; ?></b>: <?php echo $desc[$_GET['e']]; ?></p>


</div></div>

<?php include('lib/footer.php');