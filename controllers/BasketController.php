<?php  

class BasketController {
	
	public function basket() {
		if ( isset($_GET['buy']) && !empty($_SESSION["pannier"]) ) {
			if (!isset($_SESSION["login"]['id'])) {
				require_once('views/login/toLogin.php');
			} else {
				$this->basketConfirm();
			}
		}else{
			$this->defaultBasket();
		}
		
	}


	public function defaultBasket() {
		require_once ("models/ArticleModel.php");
		$ArticleModel = new ArticleModel ();
		$totalPrice = 0;
		require_once ("views/basket/basket.php");
		$this->basketUpdate();

		
	}

	public function basketUpdate() {
		if(!empty($_GET["id"]) && !empty($_GET["qty"]) && $_GET["qty"] > 0){
			$_SESSION['pannier'][$_GET["id"]]['qty']=$_GET["qty"];
			$_SESSION['pannier'][$_GET["id"]]['id']=$_GET["id"];
			header("Location: basket.php");

		} elseif(!empty($_GET["id"]) && !empty($_GET["del"])){
			unset($_SESSION['pannier'][$_GET["id"]]);
			header("Location: basket.php");

		} elseif (!empty($_GET["id"]) && ( empty($_GET["qty"]) || $_GET["qty"] < 0 )) {
			unset($_SESSION['pannier'][$_GET["id"]]);
			header("Location: basket.php");

		} elseif (isset($_GET["void"])) {
			unset($_SESSION['pannier']);
			header("Location: index.php");
		}
	}

	public function basketConfirm() {

		var_dump($_SESSION["pannier"]);
		require_once('views/basket/form.php');


	}
}
?>