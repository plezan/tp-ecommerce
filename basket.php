<?php  
require_once("controllers/HeadController.php");
	$head = new HeadController();
	$head->head();
	require_once('controllers/MenuController.php');
	$menu = new MenuController();
	$menu->menu();
	echo "basket page";
	if (isset($_SESSION['pannier'])) {
		foreach ($_SESSION["pannier"] as $item) {
			echo "<br/>";
			echo "id : ".$item['id'].", qté : ".$item['qty'];
		}
		
	}
	
?>