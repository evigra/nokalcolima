<?php
	$objeto			=new general();

	$objeto->words["html_head_css"]			="default";
	$objeto->words["html_head_title"]		.="Busqueda";
	
	$objeto->words["html_head_description"]	="Esta seccion es un clilaquil de designios";
	$objeto->words["html_head_keywords"]	="Designia, Designia.vip, Eventos, events";

	
	$objeto->words["html_body"]				=$objeto->__VIEW_BASE("body", $objeto->words);

	$objeto->words["html_left"]				="";
	$objeto->words["html_center"]			=$objeto->__VIEW_BASE("mapa", $objeto->words);
	$objeto->words["html_right"]			="";

	$objeto->words["html_menu"]				=$objeto->__VIEW_BASE("menu", $objeto->words);
	$objeto->words["html_pie"]				=$objeto->__VIEW_BASE("pie", $objeto->words);
	
	echo $objeto->__VIEW_BASE("index", $objeto->words);	
?>

