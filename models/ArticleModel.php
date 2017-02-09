<?php  
class ArticleModel{

	public function listArticles($cat){
		require_once('classes/db.php');
		$instancedb = DB::getinstance();
		if ($cat > 0) {
			$requete = $instancedb->bdd->query("SELECT * FROM article WHERE cat_id = ".$_GET["cat"]);
		} else {
			$requete = $instancedb->bdd->query("SELECT * FROM article WHERE cat_id IS NULL");
		}
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
	public function getArticle($id){
		require_once('classes/db.php');
		$instancedb = DB::getinstance();
		$requete = $instancedb->bdd->query("SELECT * FROM article WHERE art_id=".$id);
		if (!empty($requete)) {
			$resultat = $requete->fetch();
			return $resultat;
		}else return null;
		
		
	}
	
}
?>