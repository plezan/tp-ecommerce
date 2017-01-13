<?php  
	require_once("controllers/HeadController.php");
	$head = new HeadController();
	require_once('controllers/MenuController.php');
	$menu = new MenuController();
	require_once('controllers/SigninController.php');
	$signin = new SigninController();
	$head->head();
	$menu->menu();
	$signin->signin();

?>