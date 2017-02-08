<?php 
if (empty($listProduit)) {
	echo "Il n'y a pas de produit dans cette catégorie";
} else {
	foreach($listProduit as $produit){ ?>
	<div>
		<h2><?php echo $produit['art_name']; ?></h2>
		<p><?php echo $produit['art_description']; ?></p>
		<p>Prix : <i><?php echo $produit['art_price'] ?> €</i></p>
		<?php if($_SESSION['login'] == 2){ echo '<a href="account.php?tab=2&article_id='.$produit['art_id'].'">Modifier</a>';} ?>
		<form method="post">
			<input type="hidden" name="buy" value=<?php echo '"'.$produit['art_id'].'"' ?>>
			<input type="submit" value="Acheter">
		</form>
	</div>
<?php }
}

 ?>