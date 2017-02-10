<form method="post">
	<input type="radio" name="action" value="add" checked>Ajouter</input> <input
		type="radio" name="action" value="remove">Supprimer</input> <label>Catégorie
		:</label> <input type="text" name="name" /> <input type="submit" />
</form>
<?php
require_once ('classes/db.php');

if (! empty ( $_POST ['action'] ) && ! empty ( $_POST ['name'] )) {
	$action = $_POST ['action'];
	$name = $_POST ['name'];
	
	$instancedb = DB::getinstance ();
	
	if ($action == "add") {
		$requete = $instancedb->bdd->prepare ( 'INSERT INTO category (cat_name) VALUES (:nom);' );
		echo "add = " . $action;
	} else if ($action == "remove") {
		$requete = $instancedb->bdd->prepare ( "DELETE FROM category WHERE cat_name = :nom " );
		echo "remove = " . $action;
		print_r ( $requete );
	}
	
	$requete->execute ( array (
			'nom' => $name 
	) );
} else {
	// code...
}

?>