<?php
session_start();
$a=0;

$menu[$a]['url'] = '/';
$menu[$a]['title'] = 'Inicio';

$a++;
$menu[$a]['url'] = '/opinion';
$menu[$a]['title'] = 'Opinión';

$a++;
$menu[$a]['url'] = '/direccion';
$menu[$a]['title'] = 'Dirección';

$a++;
$menu[$a]['url'] = '/contacto';
$menu[$a]['title'] = 'Contacto';

if($_SESSION['admin']==1){ 

$a++;
$menu[$a]['url'] = '/admin';
$menu[$a]['title'] = 'Admin.';

}

/*$a++;
$menu[$a]['url'] = '';
$menu[$a]['title'] = '';

$b++;
$submenu[$a][$b]['url'] = '/';
$submenu[$a][$b]['title'] = '';
*/

$totalMenu = $a;

echo '<div id="menu">';
if($_SESSION['m']==1 && $_SERVER['REQUEST_URI']!='/home') echo '<a href="/home">Menú</a>';
else for($c=0; $c<=$totalMenu; $c++){
	if($menu[$c]['url']==$_SERVER['REQUEST_URI']) echo '<a class="selected" id="menu'.$c.'">'.$menu[$c]['title'].'</a>';
	else echo '<a href="'.$menu[$c]['url'].'" id="menu'.$c.'">'.$menu[$c]['title'].'</a>';
}

echo '</div>';