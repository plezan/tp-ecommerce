<?php  

class HomeController {
	
	public function homepage()
	{
		require_once('models/ArticleModel.php');
		$modelArticle = new ArticleModel();
		$listProduit = $modelArticle->listArticles();
		require_once('views/home/homepage.php');



	}
}
?>