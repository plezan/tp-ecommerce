<?php
// include_once('includes/database.php');
require_once ('classes/db.php');

if (isset ( $_GET ["article_id"] )) {
	
	$instancedb = DB::getinstance ();
	$requete = $instancedb->bdd->prepare ( "SELECT * FROM modeleArticle WHERE mod_id = :art_id");
	$requete->execute(array(
				'art_id' => $_GET ["article_id"] 
			));
	$article = $requete->fetchAll ();
	if (!empty($article)) {
		$id = $_GET ['article_id'];
		$nom = $article [0] ['mod_name'];
		$contenu = $article [0] ['mod_desc'];
		$price = $article [0] ['mod_price'];
		$cat = $article [0] ['cat_id'];
	}
	
	$requete = $instancedb->bdd->query ( "SELECT * FROM category" );
	$categories = $requete->fetchAll ();
	
	?>

<form method="GET" action="">



	<label>Categorie :</label> <select name="Category">
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
	</select> <label>Nom :</label> <input type="text" name="Nom"
		placeholder="Article sans titre" <?php if(isset($nom)): ?>
		value="<?= $nom ?>" <?php endif; ?>> <br> <label>Contenu :</label>
	<textarea name="Contenu" rows="10" cols="30"
		placeholder=" Texte de l'article "><?php if(isset($contenu)): ?> <?= $contenu ?> <?php endif; ?></textarea>
	<br> <label>Price :</label> <input type="text" name="Price"
		<?php if(isset($price)): ?> value="<?= $price ?>" <?php endif; ?>> <input
		type="hidden" name="article_id" <?php if(isset($id)): ?>
		value="<?= $id ?>" <?php endif; ?>> <input type="submit">
</form>
<?php  } else { ?>
<form method="GET">
	<label>Id</label> <input type="text" name="article_id" /> <input
		type="hidden" name="tab" value="2" /> <input type="submit" />
</form>
<?php
}
$instancedb = DB::getinstance ();
$requete = $instancedb->bdd->prepare ( "UPDATE `modeleArticle` SET `mod_name` = :nom, `mod_desc` = :contenu, `mod_price` = :price, `cat_id` = :categ WHERE `modeleArticle`.`mod_id` = :id" );

if (isset ( $_GET ['Nom'] ) && isset ( $_GET ['Contenu'] ) && isset ( $_GET ['Price'] ) && isset ( $_GET ['Category'] )) {
	echo "Category defined";
	$requete->execute ( array (
			'nom' => $_GET ['Nom'],
			'contenu' => $_GET ['Contenu'],
			'price' => $_GET ['Price'],
			'categ' => $_GET ['Category'],
			'id' => $_GET ['article_id'] 
	) );
	header ( "Location: index.php" );
}
?>