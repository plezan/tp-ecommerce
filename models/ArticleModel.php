<?php  
class ArticleModel{

	public function listArticles($cat){
		require_once('classes/db.php');
		$instancedb = DB::getinstance();
		$requete = $instancedb->bdd->query("SELECT * FROM article WHERE cat_id = ".$_GET["cat"]);
		$resultat = $requete->fetchAll();
		return $resultat;
	}
	public function listCategorie(){
		require_once('classes/db.php');
		$instancedb = DB::getinstance();
		$requete = $instancedb->bdd->query("SELECT * FROM category");
		$resultat = $requete->fetchAll();
		return $resultat;
	}
	
}
?>