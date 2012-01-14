<?php

require_once('config.php');
require_once(IHM_LIB.'xhtml.php');
require_once(IHM_LIB.'output.php');
require_once(IHM_LIB.'dba.php');

$idx=-1;
$key=$page='';

/* parse request */
if (isset ($_REQUEST['key']))
	$key = sanitize_key(intval(rawurldecode($_REQUEST['key'])));
if (isset ($_REQUEST['idx']))
	$idx = intval(rawurldecode($_REQUEST['idx']));
if (isset ($_REQUEST['page']))
	$page = rawurldecode($_REQUEST['page']);

/* process request, gather data */
$pages=array('about', 'interfaces', 'contribute', 'contact', 'credits', 'legal');

$d=null; $p='interfaces';

if (in_array($page, $pages)) {
	$p=$page;
} else if (!empty($key) && $idx >=0 ) {
	$d=query_data($key, $idx);
	$p='';
	if (!is_array($d)) {
		$p='interfaces'; # error ; NX/item
	}
}


/* output */
htmlhead('HMInterface - prospective interface archeology');
xhtml_topmenu(array('key' => $key, 'page' => $p));

if (is_array($d)) {
	vis_imagegroup2D($d, 0, 0);
	#vis_timeline();
} else {
	echo '<div class="page">'.NL;
	require('pages/'.$p.'.php');
	echo '</div>';
}

htmlfoot(is_array($d));
