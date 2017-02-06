<?php  
class ArticleModel{
	public function listArticles(){
		require_once('classes/db.php');
		$instancedb = DB::getinstance();
		$requete = $instancedb->bdd->query("SELECT * FROM article ORDER BY art_id");
		$resultat = $requete->fetchAll();
		return $resultat;
	}
}
?>