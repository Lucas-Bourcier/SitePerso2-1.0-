<?php
function displaymenu(array $items) {
	$res='<ul>';
	$foreach($items as $item){
		$res.="<li>$item</li>";
		}
	$res.='</ul>'
	echo $res;
}

?>