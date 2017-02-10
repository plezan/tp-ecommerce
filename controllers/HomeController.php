<?php  

class HomeController {
	
	public function homepage()
	{
		require_once('models/ArticleModel.php');
		$modelArticle = new ArticleModel();

		if (isset($_GET["cat"])) {

			$listProduit = $modelArticle->listArticles($_GET["cat"]);
			require_once('views/home/articles.php');

		} else {
			$listCategorie = $modelArticle->listCategorie();
			require_once('views/home/homepage.php');
		}

		if (!empty($_POST['buy'])) {
			if (isset($_SESSION['pannier'][$_POST['buy']] )){
				$_SESSION["pannier"][$_POST['buy']]["qty"]++;
			}elseif (!isset($_SESSION)) {
				session_start();
				$_SESSION["pannier"][$_POST['buy']]["id"]=$_POST['buy'];
				$_SESSION["pannier"][$_POST['buy']]["qty"]=1;
			}else{
				$_SESSION["pannier"][$_POST['buy']]["id"]=$_POST['buy'];
				$_SESSION["pannier"][$_POST['buy']]["qty"]=1;
			}

			
			
		}
		/*if (isset($_SESSION['login']) && $_SESSION['login']['grade']=2) {
			$nbItem = 	}*/
	}
}
?>