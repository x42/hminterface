<?php
require_once(IHM_LIB.'data.php');

/* dummy - test */
function gen_item($key=0, $idx=0) {
	return array(
		'img'   => 'fakeimg.php?key='.$key.'&amp;idx='.$idx,
		'key'   => $key,
		'idx'   => $idx,
		'title' => 'Title',
		'date'  => 1960 + $idx*8,
		'text'  => '<h2>So what.</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus magna in nibh mattis aliquam. Sed ut nibh at mauris ultrices molestie. Vestibulum ullamcorper dolor a dui vestibulum ut dapibus purus dignissim. Integer sit amet aliquet mauris. Mauris consequat urna et ligula mattis condimentum.
</p>',
	);
}

function testquery_data($key=0, $idx=0) {
	$d=array (
		/* top row - index item */  array (gen_item(1)),
		/* middle row - 5 items */  array (
			//gen_item(2,0), gen_item(2,1), gen_item(2,2), gen_item(2,3), gen_item(2,4)
			null, gen_item(2,1), gen_item(2,2), gen_item(2,3), gen_item(2,4)
		),
		/* bottom row - index item */  array(gen_item(3,0)),
	);

	return $d;
}


function keycircle($key, $add=0) {
	global $keys;
	$kcnt=count($keys);
	$key+=$add;

	# TODO use modulo, permit empty $key list
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
	# start-item for each group.
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

function query_data($key, $idx) {
	#TODO check if item exists; valid key,idx

	$rv=get_items($key);

	if ($idx>1) {
		$grps=array_slice($rv, $idx-2, 5, false);
		while (count($grps)<5) array_push($grps, null);
	} else {
		$grps=array_slice($rv, 0, 5-(2-$idx), false);
		while (count($grps)<5) array_unshift($grps, null);
	}

	$i=$idx-2;
	for ($i=$idx-2;$i<=$idx+2;$i++) {
		if (!is_array($grps[$i])) continue;
			$item['key'] = $key;
			$item['idx'] = $i;
	}

	$item = $grps[2];
	return array (
		/* top row -    index item */  array (keyitem(keycircle($key,-1),$item)),
		/* middle row - 5 items    */  $grps,
		/* bottom row - index item */  array (keyitem(keycircle($key,1),$item)),
	);
}
