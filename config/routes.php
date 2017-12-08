<?php

return array (
	'news/([a-z]+)/([0-9]+)'=>'news/view/$1/$2',
	//'news/([0-9]+)'=>'news/view',             //для одной новости, !!скобки, потомучто ограничитеди уже стоят в router.php
	'news'=>'news/index',                     //метод actionIndex в NewsControler
	'products'=>'product/list'
	);


?>