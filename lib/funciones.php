<?php

function parse_links($str, $len=25, $mid='...'){
	$left = ceil(0.6666 * $len);
	$right = $len - $left;
	preg_match_all('/(?<!=|\]|\/)((https?|ftps?|irc):\/\/|' . '(www([0-9]{1,3})?|ftp)\.)([0-9a-z-]{1,25}' . '[0-9a-z]{1}\.)([^\s&\[\{\}\]]+)/ims', $str, $matches);
	foreach($matches[0] as $key=>$value){
		$temp = $value;
		if(strlen($value) > ($len + strlen($mid) + 2)){
			$value = substr($value, 0, $left) . $mid . substr($value,(-1 * $right));
		}
		$temp = !preg_match('/:\/\//', $temp) ? (substr($temp, 0, 3) === 'ftp' ? 'ftp://' . $temp : 'http://' . $temp) : $temp;
		$temp = $temp === $matches[0][$key] && $value === $matches[0][$key] ? '' : '=' . $temp;
		$str = str_replace($matches[0][$key],'[url' . $temp . ']' . $value . '[/url]', $str);
	}
	$str = preg_replace('/\[url=(?!http|ftp|irc)/ims', '[url=http://', $str);
	$str = preg_replace('/\[url\](.+?)\[\/url\]/ims','<a href="$1" target="_blank" title="$1">$1</a>',$str);
	$str = preg_replace('/\[url=(.+?)\](.+?)\[\/url\]/ims', '<a href="$1" target="_blank" title="$1">$2</a>', $str);
	return $str;
}


function safeUrl($title){
	// reemplaza cualquier cadena inválida por "-";
	$title = str_replace("&", "and", $title);
	$arrStupid = array('feat.', 'feat', '.com', '(tm)', ' ', '*', "'s", '"', ",", ":", ";", "@", "#", "(", ")", "?", "!", "_",
	"$","+", "=", "|", "'", '/', "~", "`s", "`", "\\", "^", "[","]","{", "}", "<", ">", "%", "&#8482;");
	
	$title = htmlentities($title);
	$title = preg_replace('/&([a-zA-Z])(.*?);/','$1',$title); 
	$title = strtolower("$title");
	$title = str_replace(".", "", $title);
	$title = str_replace($arrStupid, "-", $title);
	$flag = 1;
	while($flag){ 
		$newtitle = str_replace("--","-",$title);
		if($title != $newtitle) { 
			$flag = 1;
		}
		else $flag = 0;
		$title = $newtitle;
	}
	$len = strlen($title);
	if($title[$len-1] == "-") {
		$title = substr($title, 0, $len-1);
	}
	return $title;
}

function limit_text( $text, $limit )
{
  // figure out the total length of the string
  if( strlen($text)>$limit )
  {
    # cut the text
    $text = substr( $text,0,$limit );
    # lose any incomplete word at the end
    $text = substr( $text,0,-(strlen(strrchr($text,' '))) );
	# add dots
	$text.='...';
  }
  // return the processed string
  return $text;
}

function actual_date ($t){
	//if($_SESSION['lang']!='es') return date('l jS \of F Y');
	if(!$t) $t=time();
	$week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
	$months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$year_now = date ("Y",$t);
	$month_now = date ("n",$t);
	$day_now = date ("j",$t);
	$week_day_now = date ("w");
	$date = $week_days[$week_day_now] . ", " . $day_now . " de " . $months[$month_now] . " de " . $year_now; 
	return $date;  
}

function dispTime($stime,$now=true){
	if($now) $time = time()-$stime; else $time = $stime;
		
	if($time<86400){
		if($now) $ret = 'Hace ';
		if($time <= 60) $ret .= $time.' segundos';
		if(60 < $time && $time <= 3600) $ret .= floor($time/60).' minutos y '.floor($time-floor($time/60)*60).' segundos';
		if(3600 < $time && $time <= 86400) $ret .= floor($time/3600).' horas y '.floor(($time-floor($time/3600)*3600)/60).' minutos';
	}else{
		if($time > time()-172800){
			$ret = 'Ayer a las '.date('g:ia',$time);
		}else{
			$days = array('','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo');
			$mons = array('','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dec');
			
			$ret = $days[date('N',$stime)].' '.date('j',$stime).'/'.date('n',$stime).'/'.date('Y',$stime);
		}
	}
	return $ret;
}
