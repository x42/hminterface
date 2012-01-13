<?php

function fmt_url ($item) {
	return BASE_URL.'?key='.$item['key'].'&amp;idx='.$item['idx'];
}

function img_url ($item, $opt) {
  if ($opt & 1) 
		return BASE_URL.'static/data/lbox/'.$item['img'];
	return BASE_URL.'static/data/thumb/'.$item['img'];
}

function fmt_item ($item, $opt=0) {
	global $keys;
	if (!is_array($item)) return '<div class="empty"></div>';
	$rv='<div class="c">';
	$rv.= '<a href="'.fmt_url($item).'"><img alt="" src="'.img_url($item, $opt).'" /></a>';
	if ($opt &2)
		$rv.='<div class="osd date">'.$item['date'].'</div>';
	if ($opt &1)
		$rv.='<div class="osd title">'.$item['img'].'</div>';
	if ($opt &8) // was &4 -- disabled
		$rv.='<div class="osd key">'.$keys[$item['key']].'</div>';
	$rv.='</div>';
	return $rv;
}

function gimg ($item, $idx, $opt=0) {
	return fmt_item($item[$idx], $opt);
}

function itempagefooter ($item) {

	echo '<div class="itemdesc">'.NL;
	echo $item['text'].NL;
	echo '</div>'.NL; #end container;
}

function vis_imagegroup2D ($d) {
	echo '<div class="container">'.NL;
	echo '<table class="xmatrix">'.NL;
	echo '<tr><td class="lr2 tb"></td><td class="lr1 tb"></td><td class="tb">'.gimg($d[0], 0, 4).'</td><td class="lr1 tb"></td><td class="lr2 tb"></td></tr>'.NL;
	echo '<tr><td class="lr2">'.gimg($d[1], 0).'</td><td class="lr1">'.gimg($d[1], 1, 2).'</td><td>'.gimg($d[1], 2, 3).'</td><td class="lr1">'.gimg($d[1], 3, 2).'</td><td class="lr2">'.gimg($d[1], 4).'</td></tr>'.NL;
	echo '<tr><td class="lr2 tb"></td><td class="lr1 tb"></td><td class="tb">'.gimg($d[2], 0, 4).'</td><td class="lr1 tb"></td><td class="lr2 tb"></td></tr>'.NL;
	echo '</table>'.NL;

	itempagefooter($d[1][2]);
	echo '</div>'.NL; #end container;
	return true;
}
