<?php  
class MenuModel{
	public function listMenus(){
		$resultat = [
			["lien"=>"index.php","textLien"=>"acceuil","visibility"=>0],
			["lien"=>"./bdd/","textLien"=>"un lien quelconque","visibility"=>0],
			["lien"=>"login.php","textLien"=>"conection","visibility"=>1],
			["lien"=>"x.php","textLien"=>"admin","visibility"=>3],
			["lien"=>"login.php?unlog=true","textLien"=>"deconnection","visibility"=>2],
			["lien"=>"signin.php","textLien"=>"S'enregistrer","visibility"=>1]

		];
		return $resultat;
	}
}
?>