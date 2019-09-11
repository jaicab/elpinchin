<?php 

//ACTUALIZAMOS VISITAS
if(!isset($_SESSION['visits'])){
	mysql_query("UPDATE misc SET value=value+1 WHERE id=1");
	$_SESSION['visits']=1;
}

//COMPROBAMOS MÓVIL
if(ereg('iPhone',$_SERVER['HTTP_USER_AGENT']) || ereg('iPod',$_SERVER['HTTP_USER_AGENT']) || strpos($_SERVER['HTTP_USER_AGENT'],"Android") || ereg('BlackBerry',$_SERVER['HTTP_USER_AGENT'])){
	if(!isset($_SESSION['m'])){
		$_SESSION["m"]=1;
	}else $_SESSION["m"]=1;
}
else $_SESSION["m"]=0;

//OBTENEMOS VISITAS
$visitas_sql=mysql_query("SELECT value FROM `misc` WHERE id=1");
$visitas=mysql_fetch_array($visitas_sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="robots" content="all" />
<link rel="author" href="/humans.txt" />
<link rel="shortcut icon" href="/img/favicon.ico" />

<?php if($_SESSION["m"]==0){ ?>
<link href="/layout.css" type="text/css" rel="stylesheet" media="all" />
<?php }else{ ?>
<link href="/mobile.css" type="text/css" rel="stylesheet" media="all" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no" />
<script type="text/javascript">
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1);}
</script>
<?php } ?>

<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Lobster+Two:400' rel='stylesheet' type='text/css'>
<!-- Slider -->
<script type="text/javascript" src="lib/script.js"></script>

<script language="javascript" type="text/javascript">
$(function() {
	$('#up').click(function(){
		$('html, body').animate({scrollTop:0},'slow');
	});
	<?php if($_SESSION["m"]==0){ ?>
	//ajustamos footer abajo del todo
	function footer(){
		if (window.innerHeight) alt = window.innerHeight;
   		else alt = document.body.clientHeight;
		$('#cuerpo').css('min-height',(alt-$('#footer').height()-$('#header').height()-62)+'px');
	}

	footer();
	$(window).resize(function(){footer();});
	<?php } ?>
});
</script>