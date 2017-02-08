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
	}
}
?>