<?php
	require_once("controllers/HeadController.php");
	$head = new HeadController();
	$head->head();
	require_once('controllers/MenuController.php');
	$menu = new MenuController();
	$menu->menu();
	echo "Work In Progress ...";
	require_once('controllers/HomeController.php');
	$home = new HomeController();
	
	$home->homepage();

?>
