<?php  
class MenuModel{
	public function listMenus(){
		$resultat = [
			["lien"=>"http://localhost:8080/","textLien"=>"un lien secret ..."],
			["lien"=>"http://localhost:8080/bdd/","textLien"=>"un lien quelconque"],
			["lien"=>"http://localhost:8080/ecommerce/login.php","textLien"=>"conection"]
		];
		return $resultat;
	}
}
?>