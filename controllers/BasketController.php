<?php  

class BasketController {
	
	public function basket() {
		
	}

	public function basketUpdate() {

		if(!empty($_GET["id"]) && !empty($_GET["qty"]) && $_GET["qty"] > 0){
			$_SESSION['pannier'][$_GET["id"]]['qty']=$_GET["qty"];
			$_SESSION['pannier'][$_GET["id"]]['id']=$_GET["id"];

		} elseif(!empty($_GET["id"]) && !empty($_GET["del"])){
			unset($_SESSION['pannier'][$_GET["id"]]);

		} elseif (!empty($_GET["id"]) && ( empty($_GET["qty"]) || $_GET["qty"] < 0 )) {
			unset($_SESSION['pannier'][$_GET["id"]]);
		} elseif (isset($_GET["void"])) {
			unset($_SESSION['pannier']);
		}

	}
	public function basketConfirm() {
		if ( isset($_GET['buy'])) {
			
		}
	}
}
?>