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
		if (isset($_POST['adress']) && isset($_POST['city']) && isset($_POST['zip'])) {
			require_once('classes/db.php');
			$instancedb = DB::getinstance();
			$requete = $instancedb->bdd->prepare('INSERT INTO ordering(order_date,order_adress,order_city,order_zip,user_id) VALUES (NOW(),:adress,:city,:zip,:id)');

			$requete->execute(array(
			'adress' => $_POST['adress'],
			'city' => $_POST['city'],
			'zip' => $_POST['zip'],
			'id' => $_SESSION["login"]['id']
		));

			$requete = $instancedb->bdd->query ( "SELECT * FROM `ordering` WHERE `order_id` = LAST_INSERT_ID() ");
			$orderInserted = $requete->fetch();

			var_dump($orderInserted);
			echo "<br>";
			var_dump($_SESSION['pannier']);

		foreach ($_SESSION['pannier'] as $item) {
			for ($i=0; $i < $item['qty']; $i++) { 
				
				
				$instancedb = DB::getinstance();
				$requete = $instancedb->bdd->prepare('UPDATE `article` SET `order_id` = :orderid WHERE `article`.`mod_id` = :id AND `order_id` IS NULL LIMIT 1');

				$requete->execute(array(
				'orderid' => $orderInserted['order_id'],
				'id' => $item['id']
		));

			}
		}

		}


	}
}
?>