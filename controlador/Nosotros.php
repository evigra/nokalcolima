<?php
	$objeto			=new general();

	$objeto->words["html_head_css"]			="default";
	$objeto->words["html_head_title"]		.="Nosotros";
	
	$objeto->words["html_head_description"]	="Esta descripcion";
	$objeto->words["html_head_keywords"]	="Designia, Designia.vip, Eventos, events";
	
	$objeto->words["html_body"]				=$objeto->__VIEW_BASE("body", $objeto->words);

	$objeto->words["html_left"]				="";
	$objeto->words["html_center"]			="Misión: Crear una página web que acerque al usuario a encontrar una casa en renta, facilitando la búsqueda y optimizando sus tiempos.

Visión: posicionarse como una marca local en donde podrás encontrar una casa en renta en el cual te sientas seguro sin tanto esfuerzo y de manera exclusiva.";
	$objeto->words["html_right"]			="";

	$objeto->words["html_menu"]				=$objeto->__VIEW_BASE("menu", $objeto->words);
	$objeto->words["html_pie"]				=$objeto->__VIEW_BASE("pie", $objeto->words);
	
	echo $objeto->__VIEW_BASE("index", $objeto->words);	
?>

