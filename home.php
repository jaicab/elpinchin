<?php 
include('lib/session.php');
if($_SESSION["m"]==0) header('Location: /');
include('lib/top.php');
?>
<title>El Pinchin</title>

<style media="all" type="text/css">
#header{
	padding:0;
	margin:0;
	background:url("../images/headerbg.png");
	text-align:center;
	height:auto;
}
#header img{
	padding:10px 120px 10px 0;
	height:60px;
}
#cuerpo{background:#DDD;}
#home #menu{
	border-top:1px solid #AAA;
	border-right:1px solid #CCC;
	border-left:1px solid #CCC;
	border-bottom:1px solid #fff;
	border-radius:5px;
	margin:10px 0;
	position:static;
}
#home #menu a, .sociaLink{
	padding:12px 0 10px 14px;
	display:block;
	border-bottom:1px solid #CCC;
	border-right:none;
	font-family: 'Lobster Two', cursive;
	background:#fff url(img/arrow.png) right 50% no-repeat;
	font-size:20px;
	width:auto;
	text-align:left;
	color:#333;
}
#home #menu a:hover, .sociaLink:hover{
	background:#b8c753 url(img/arrow.png) right 50% no-repeat;
	color:#f5f5f5;
}

#home #menu a:first-child{border-radius:4px 4px 0 0;}
#home #menu a:last-child{border-radius:0 0 4px 4px;}

/*Centramos logo (excepcion)*/
#header img{padding-right:0;}

#sociales{
	margin-bottom:20px;
	position:relative;
	display:none;
}
.sociaLink{
	border-radius:4px;
	display:inline-block;
	border:1px solid #ccc;
	width:43%;
}
.sociaLink img{
	float: left;
	margin-right: 5px;
}

#facebook{
	position:absolute;
	right:0;
	bottom:0;
}

</style>
</head>

<body>
<div id="header"><div class="content" align="center">
 	<img src="/img/logo.png" border="0" alt="logo" />
</div></div>

<div id="cuerpo"><div class="content">
    <div id="home">
        <?php include('lib/menu.php'); ?>
    </div>
    <div id="sociales">
        <a href="http://mobile.twitter.com/tatorodao" target="_blank" class="sociaLink" id="twitter"><img border="0" src="img/twitter.png" /> Twitter</a>
        <a href="http://m.facebook.com/cloubyco" target="_blank" class="sociaLink" id="facebook"><img border="0" src="img/facebook.png" /> Facebook</a>
    </div>
</div></div>
<?php include('lib/footer.php');