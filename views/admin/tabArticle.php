<?php
require_once ('classes/db.php');
$instancedb = DB::getinstance ();
$requete = $instancedb->bdd->query ( "SELECT * FROM category" );
$categories = $requete->fetchAll ();

$requete = $instancedb->bdd->prepare ( 'INSERT INTO modelearticle (mod_name,mod_desc,mod_price,cat_id) VALUES (:name,:descr,:price,:cat)' );
if (isset ( $_POST ['name'] ) && isset ( $_POST ['descr'] ) && isset ( $_POST ['price'] ) && isset ( $_POST ['cat'] ) ) {
	echo "Donnes completes";
	$requete->execute ( array (
			'name' => $_POST ['name'],
			'descr' => $_POST ['descr'],
			'price' => $_POST ['price'], 
			'cat' => $_POST ['cat']
	) );
if (isset ( $_POST ['nb'] )) {
	$requete = $instancedb->bdd->query ( "SELECT * FROM `modelearticle` WHERE `mod_id` = LAST_INSERT_ID() ");
	$modelsarticle = $requete->fetch();

	$requete = $instancedb->bdd->prepare ( 'INSERT INTO article (mod_id) VALUES (:id)');

	for ($i=0; $i < $_POST['nb']; $i++) { 
		$requete->execute ( array (
			'id' => $modelsarticle['mod_id']
	) );
	}
}

} else {
	echo "Vos devez remplir le text";
}

// $resultat = $requete->fetchAll();
// return $resultat;
?>

<form method="post">
	<fieldset>
		<label>nom</label>
		<input type="text" name="name"><br />

		<label>description</label>
		<textarea name="descr"></textarea><br /> 

		<label>price</label>
		<input type="text" name="price"><br /> 

		<label>Categorie :</label>
 		<select name="cat">
			<option label="hors categorie" value="null"></option>
			<?php foreach ($categories as $categorie) { ?>
    	      <option label=<?php echo ('"'.$categorie['cat_name'].'"'); ?>
				value=<?php echo ('"'.$categorie['cat_id'].'" '); ?>
				<?php
			
			if ($cat == $categorie ['cat_id']) {
				echo ("selected ");
			}
			?>></option>
    	    <?php } ?>
		</select>

		<label>quantité</label>
		<input type="number" name="nb"><br /> 
		<input type="submit">
	</fieldset>
</form>
