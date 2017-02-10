<?php  
	require_once("models/ArticleModel.php");
	$ArticleModel = new ArticleModel();
	require_once("controllers/HeadController.php");
	$head = new HeadController();
	$head->head();
	require_once('controllers/MenuController.php');
	$menu = new MenuController();
	$menu->menu();
	require_once("controllers/BasketController.php");
	$totalPrice = 0;
	$basket = new BasketController();
	$basketUpdate = $basket->basketUpdate();
	require_once("views/basket.php");
?> 