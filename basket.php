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
	$basket = new BasketController();
	$basketUpdate = $basket->basketUpdate();
	echo "basket page";
	require_once("views/basket.php");
	
	
	
?>