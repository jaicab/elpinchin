<?php 
include('lib/session.php');


if(isset($_POST['mailMsg'])){
	$name=strip_tags($_POST['mailName']);
	$email=$_POST['mailAdress'];
	$asunto= $_POST["mailTheme"];
	//direccion por defecto
	$mailcontact='contacto@elpinchin.com';
	
	
	if($asunto!="" && $_POST['mailMsg']!="" && filter_var($email,FILTER_VALIDATE_EMAIL) && $name!=""){
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";

		$headers .= "From:".$name."<".$email.">\r\n";
		$msj = strip_tags($_POST["mailMsg"]);
		
		if(mail($mailcontact,$asunto, $msj, $headers)) $msg='Correo enviado correctamente.';
		else $msg='Error enviando el correo.';
	}else $msg='Debes rellenar todos los campos.';
}

include('lib/top.php');
?>
<title>Contacto | El Pinchin - Bar en Parquesol, Valladolid</title>
<meta name="keywords" content="contacto, telefono, email, pinchin, bar, parquesol, valladolid, restaurante"/>
<meta name="description" content="Contacta con El Pinchín en Parquesol, Valladolid" />

<link href="/lib/forms.css" type="text/css" rel="stylesheet" media="all" />

<style media="all">
h2{margin:15px 0;}
h2 span{
	min-width:130px;
	display:inline-block;
	color:#922826;
}
<?php if($_SESSION["m"]==0){ ?>

#qr img{
	position:relative;
	float:left;
	width:120px;
	margin-right:30px;
	padding:5px;
	background:#fff;
}
#qr font{position:relative; top:50px; font-family:"Museo500Regular", Arial, Helvetica, sans-serif;}

form{float:right; margin-left:70px}
input[type="text"],input[type="email"]{
	width:78%;
}
textarea{width: 470px; height: 120px; margin-left: 0; margin-top:2px; resize: vertical; padding: 10px;}
<?php }else{ ?>
#qr{display:none;}
textarea{width:95%; height:140px; resize:vertical;}
<?php } ?>

</style>
</head>

<body>
<?php include('lib/header.php'); ?>

<div id="cuerpo"><div class="content">
<?php if(isset($msg)) echo "<script>alert('".$msg."');</script>"; ?>
<?php if($_SESSION["m"]==0){ ?>
<form method="post">
<label><font>Nombre</font> <input type="text" name="mailName" placeholder="Indícanos tu nombre..." required></label>
<label><font>Email</font> <input type="email" name="mailAdress" placeholder="Indícanos tu email..." required></label>
<label><font>Asunto</font> <input type="text" name="mailTheme" placeholder="Indica el asunto del correo..." required></label>
<textarea placeholder="Escribe aquí tu correo..." name="mailMsg"></textarea><br />
<input type="submit" class="button" value="Enviar"><input class="button" type="reset" value="Borrar">
</form>
<?php } ?>
<h1>Contacta con nosotros.</h1>
<p>Cualquier pregunta que tengas, nos la puedes hacer a <a href="mailto:contacto@elpinchin.com">contacto@elpinchin.com</a> o escribirnos a través de este formulario. Intentaremos contestar tus dudas lo antes posible.</p>
<p>Recordamos que <b>conviene reservar</b>.</p>
<p>También puedes llamarnos directamente al bar y hablar con nosotros:</p>
<h2><span>El Pinchin: </span> 983 37 38 27</h2>
<?php if($_SESSION["m"]==1){ ?>
<form method="post">
<label><font>Nombre</font> <input type="text" name="mailName" placeholder="Indícanos tu nombre..." required></label>
<label><font>Email</font> <input type="email" name="mailAdress" placeholder="Indícanos tu email..." required></label>
<label><font>Asunto</font> <input type="text" name="mailTheme" placeholder="Indica el asunto del correo..." required></label>
<textarea placeholder="Escribe aquí tu correo..." name="mailMsg"></textarea><br />
<input type="submit" class="button" value="Enviar"><input class="button" type="reset" value="Borrar">
</form>
<?php } ?>

</div></div>

<?php include('lib/footer.php');