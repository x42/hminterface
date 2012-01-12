<?php

require_once('config.php');
require_once(IHM_LIB.'xhtml.php');
require_once(IHM_LIB.'pages.php');

/* parse request */

/* gather data */

function gen_item($key=0, $idx=0) {
	return array(
		'img'   => 'fakeimg.php?key='.$key.'&amp;idx='.$idx,
		'key'   => $key,
		'idx'   => $idx,
		'title' => 'Title',
		'date'  => '2007',
		'text'  => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam cursus magna in nibh mattis aliquam. Sed ut nibh at mauris ultrices molestie. Vestibulum ullamcorper dolor a dui vestibulum ut dapibus purus dignissim. Integer sit amet aliquet mauris. Mauris consequat urna et ligula mattis condimentum. Nulla dictum euismod tellus, ac varius augue egestas nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin consequat eleifend lacinia. Vestibulum ornare lorem at odio vulputate eget congue arcu imperdiet. Sed a nunc ac metus hendrerit egestas. In tortor quam, aliquam id dignissim id, imperdiet eget mauris. Integer elit magna, eleifend sed suscipit in, pulvinar et erat.
</p><p>
		Morbi lorem libero, adipiscing eu bibendum eget, lobortis nec quam. Sed gravida sollicitudin feugiat. Aenean eget nisl eu mauris congue dignissim ac et arcu. Ut auctor mauris eu ligula dapibus elementum. Integer molestie rutrum orci, nec volutpat turpis tincidunt sed. Donec a diam sapien, eget dapibus velit. Phasellus laoreet auctor nisi at vestibulum. Praesent ornare turpis ac nibh pellentesque venenatis venenatis nisl gravida. Aliquam non eros velit, pellentesque luctus nisi. Nunc commodo fermentum elit, vel bibendum odio semper id. Sed scelerisque dapibus tincidunt. Pellentesque sed dapibus sem. Quisque ornare risus et mi pharetra sodales.
</p>',
	);
}

$d=array (
	/* top row - index item */  array (gen_item(0)),
	/* middle row - 5 items */  array (
		//gen_item(1,0), gen_item(1,1), gen_item(1,2), gen_item(1,3), gen_item(1,4)
		null, gen_item(1,1), gen_item(1,2), gen_item(1,3), gen_item(1,4)
	),
	/* bottom row - index item */  array(gen_item(2,0)),
);


/* output */
htmlhead('HMInterface - prospective interface archeology');
xhtml_topmenu(0, 0);

vis_imagegroup2D($d, 0, 0);

htmlfoot();
