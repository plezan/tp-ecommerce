<?php
	require_once('classes/db.php');
		$instancedb = DB::getinstance();
	$requete = $instancedb->bdd->prepare('INSERT INTO article(art_name,art_description,art_price) VALUES (:art_name,:art_description,:art_price)');
	if (isset($_POST['art_name']) && isset($_POST['art_description']) && isset($_POST['art_price'])) {
		echo "Donnes completes";
		$requete->execute(array(
			'art_name' => $_POST['art_name'],
			'art_description' => $_POST['art_description'],
			'art_price' => $_POST['art_price'],
		));
	} else {echo"Vos devez remplir le text";}

		//$resultat = $requete->fetchAll();
		//return $resultat;
	?>

<form method="post">
	<fieldset>
		<label>nom</label>
		<input type="text" name="art_name"><br/>
		<label>description</label>
		<input type="text" name="art_description"><br/>
		<label>price</label>
		<input type="text" name="art_price"><br/>

		<input type="submit">
	</fieldset>
</form>
