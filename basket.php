<?php

require_once ("controllers/HeadController.php");
$head = new HeadController ();
$head->head ();
require_once ('controllers/MenuController.php');
$menu = new MenuController ();
$menu->menu ();
require_once ("controllers/BasketController.php");
$basket = new BasketController ();
$basket = $basket->basket ();

?> 