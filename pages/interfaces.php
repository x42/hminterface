<h1>Interfaces</h1>

<div class="iflist">
<?php
global $keys, $keyimg;
foreach ($keys as $k => $n) {
	echo '<div class="fl"><div>';
	echo '<a href="'.BASE_URL.'?key='.$k.'&amp;idx='.get_key_index($k).'">';
	echo '<img alt="" src="static/data/thumb/'.$keyimg[$k].'"/>';
	echo '</a>';
	echo '</div><div>';
	echo '<a href="'.BASE_URL.'?key='.$k.'&amp;idx='.get_key_index($k).'">'.$n.'</a>';
	echo '</div></div>';
}
?>
</div>

