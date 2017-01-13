<?php  
class SigninModel{
	public function addUser(){
		require_once('classes/db.php');
		$instancedb = DB::getinstance();
		$requete = $instancedb->bdd->query("SELECT * FROM articles ORDER BY id DESC LIMIT 5");
		$resultat = $requete->fetchAll();
		return $resultat;
	}
}
?>