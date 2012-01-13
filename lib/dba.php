<?php
require_once(IHM_LIB.'data.php');
# Data Base Access

function keycircle($key, $add=0) {
	global $keys;
	$kcnt=count($keys);
	$key+=$add;
	if ($kcnt==0) return;

	while ($key<1) $key+=$kcnt;
	while ($key>$kcnt) $key-=$kcnt;
	return $key;
}

function datetimediff($a, $b) {
	return abs($a['date'] - $b['date']);
}

function keyitem($key, $item) {
	# use topic-image; but link to an item
	# closest in time to $item

	$diff = 1000000;
	$idx  = 0;
	$iter = 0;
	foreach (get_items($key) as $i) {
		$mdiff = datetimediff($i, $item);
		if ($mdiff < $diff) { $idx=$iter; $diff=$mdiff; }
		$iter++;
	}
	global $keyimg;
	return array(
		'img'   => $keyimg[$key],
		'key'   => $key,
		'idx'   => $idx,
	);
}

function get_key_index($key) {
	# start-item for each group. image closest to 2010
	$diff = 1000000;
	$idx  = 0;
	$iter = 0;
	$item=array('date' => '2010');

	foreach (get_items($key) as $i) {
		$mdiff = datetimediff($i, $item);
		if ($mdiff < $diff) { $idx=$iter; $diff=$mdiff; }
		$iter++;
	}
	return $idx;
}

function get_key_index_old($key) {
	$c = count(get_items($key))-1;
	if ($c>2) return $c-2;
	return 0;
}

function get_items($key) {
	global $data;
	return $data[$key];
}

function get_item($key, $idx) {
	$items=get_items($key);
	return $items[$key];
}

function sanitize_key($key) {
	global $keys;
	if ($key<1) return 1;
	if ($key>count($keys)) return count($keys);
	return $key;
}

function query_data($key, $idx) {
	$key=sanitize_key(intval($key));

	$rv=get_items($key);
	$idx=$idx%count($rv);

	if ($idx>1) {
		$grps=array_slice($rv, $idx-2, 5, false);
		while (count($grps)<5) array_push($grps, null);
	} else {
		$grps=array_slice($rv, 0, 5-(2-$idx), false);
		while (count($grps)<5) array_unshift($grps, null);
	}

	for ($i=0;$i<5;$i++) {
		if (!is_array($grps[$i])) continue;
			$grps[$i]['key'] = $key;
			$grps[$i]['idx'] = $i+$idx-2;
	}

	$item = $grps[2];
	return array (
		/* top row -    index item */  array (keyitem(keycircle($key,-1),$item)),
		/* middle row - 5 items    */  $grps,
		/* bottom row - index item */  array (keyitem(keycircle($key,1),$item)),
	);
}
