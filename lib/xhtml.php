<?php
function htmlhead($title, $add='') {
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <title><?=$title?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="<?=BASE_URL?>static/style.css" type="text/css" media="all"/>
	<script type="text/javascript" src="<?=BASE_URL?>static/script.js"></script>
  <?=$add?>
</head>
<body>
<?php
}

function htmlfoot() {
  echo '</body>'.NL.'</html>'.NL;
}

function ent($s) {
	return htmlentities($s,ENT_COMPAT,'UTF-8');
	#return htmlentities(mb_convert_encoding($s,'utf-8,'utf-8'),ENT_COMPAT,'UTF-8');
}

function caps($s){
  return(strtoupper(substr($s,0,1)).substr($s,1));
}

function xhtml_topmenu($req) {
	global $LANG, $keys;
  echo '
  <div class="pageheader">
    <div class="menubox">
			<ul>
				<li><a href="?"><img src="static/img/hmi_fr.png" alt="HMInterface.com" class="enabled" /></a></li>
				<li><a href="?page=about"><img src="static/img/about_fr.png" alt="About" class="enabled" /></a></li>
				<li><a href="?page=interfaces"><img src="static/img/interfaces_fr.png" alt="Interfaces" class="enabled" /></a></li>
				<li><a href="?page=contribute"><img src="static/img/contribute_fr.png" alt="Contribute" class="enabled" /></a></li>
			</ul>
    </div>
    <div class="clearer"></div>
		<div class="navigation">
		<ul>';
	$nav=array();
	foreach ($keys as $k => $n) {
		if ($k == $req['key'])
			$nav[]='<li class="active">'.$n.'</li>';
		else
			$nav[]='<li><a href="'.BASE_URL.'?key='.$k.'&amp;idx='.get_key_index($k).'">'.$n.'</a></li>';
	}
	echo implode($nav, '<li>&middot;</li>');
	echo '
		</ul>
    </div>
  </div>
';
}
