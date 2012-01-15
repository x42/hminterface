<?php

function fmt_url ($item) {
	return BASE_URL.'?key='.$item['key'].'&amp;idx='.$item['idx'];
}

function img_url ($item, $opt=0) {
  if ($opt & 1) 
		return BASE_URL.'static/data/lbox/'.$item['img'];
	return BASE_URL.'static/data/thumb/'.$item['img'];
}

function fmt_item ($item, $opt=0) {
	global $keys;
	if (!is_array($item)) return '<div class="empty"></div>';
	$rv='<div class="c">';
	if (($opt&1) == 0) {
		$rv.= '<a href="'.fmt_url($item).'">';
	}
	$rv.= '<img alt="" src="'.img_url($item, $opt).'" />';
	if (($opt&1) == 0) {
		$rv.= '</a>';
	}
	if ($opt &2)
		$rv.='<div class="osd date" onclick="go(\''.fmt_url($item).'\');">'.$item['date'].'</div>';
	if ($opt &1) {
		if (empty($item['title']))
			$rv.='<div class="osd title" onclick="go(\''.fmt_url($item).'\');">'.basename($item['img']).'</div>';
		else 
			$rv.='<div class="osd title" onclick="go(\''.fmt_url($item).'\');">'.$item['title'].'</div>';
	}
	if ($opt &4) {
		$rv.='<div class="osd dim" onclick="go(\''.fmt_url($item).'\');"></div>';
	}
	if ($opt &9) {
		$rv.='<div class="osd key" onclick="go(\''.fmt_url($item).'\');">'.$keys[$item['key']].'</div>';
	}
	$rv.='</div>'.NL;
	return $rv;
}

function gimg ($item, $idx, $opt=0) {
	return fmt_item($item[$idx], $opt);
}

function itempagefooter ($item) {
	echo '<div class="itemdesc">'.NL;
	echo $item['desc'].NL;
	echo '</div>'.NL; #end container;
}

function vis_imagegroup2D ($d) {
	echo '<div class="container">'.NL;
	echo '<table class="xmatrix">'.NL;
	echo '<tr><td class="lr2 tb"></td><td class="lr1 tb"></td><td class="tb">'.gimg($d[0], 0, 12).'</td><td class="lr1 tb"></td><td class="lr2 tb"></td></tr>'.NL.NL;
	echo '<tr><td class="lr2">'.gimg($d[1], 0, 4).'</td><td class="lr1">'.gimg($d[1], 1, 6).'</td><td>'.gimg($d[1], 2, 3).'</td><td class="lr1">'.gimg($d[1], 3, 6).'</td><td class="lr2">'.gimg($d[1], 6).'</td></tr>'.NL.NL;
	echo '<tr><td class="lr2 tb"></td><td class="lr1 tb"></td><td class="tb">'.gimg($d[2], 0, 12).'</td><td class="lr1 tb"></td><td class="lr2 tb"></td></tr>'.NL.NL;
	echo '</table>'.NL;

	itempagefooter($d[1][2]);
	echo '</div>'.NL; #end container;
	return true;
}

function vis_timeline () {
	global $keys;
	$tl=array();
	for($k=1;$k<=count($keys);$k++) {
		$idx=0;
		foreach (get_items($k) as $i) {
			if (empty($i['date'])) continue;
			$i['key']=$k;
			$i['idx']=$idx++;
			$tl[$i['date']][] = $i;
		}
	}
	ksort($tl);

	#output
	$xs=735/(count($tl)-1);
	$ys=40;
	$h_tot=(count($keys)+1)*$ys;
	$h_nav=(count($keys)+1)*$ys;
	echo '<div class="tlc" style="min-height:'.$h_tot.'px">'.NL;
	$x=$y=0;
	foreach ($tl as $ii) {
		foreach ($ii as $i) {
			$y=$i['key'] -.33;
			echo ' <div class="tli" style="left:'.$x*$xs.'px;top:'.$y*$ys.'px;" onclick="go(\''.fmt_url($i).'\');"><img alt="" src="'.img_url($i).'" /></div>'.NL;
		}
		echo '<div class="tla"';
		echo ' onmouseover="highlight(this,1)" onmouseout="highlight(this,0);"';
		#echo ' style="width:'.($xs*7).'px;height:'.$h_nav.'px; left:'.$x*$xs.'px;top:0; padding-top:'.(($x%4)*12).'px; padding-bottom:'.((3-($x%4))*12).'px;">';
		echo ' style="width:'.($xs*7).'px;height:'.$h_nav.'px; left:'.$x*$xs.'px;top:0;">';
		echo $i['date'].'</div>';
		$x++;
	}
	echo '</div>'.NL;
	
}
