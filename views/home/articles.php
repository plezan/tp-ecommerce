<?php
if (empty ( $listProduit )) {
	echo "Il n'y a pas de produit dans cette catégorie";
} else {
	foreach ( $listProduit as $produit ) {
		?>
<div>
	<h2><?php echo $produit['mod_name']; ?></h2>
	<p><?php echo $produit['mod_desc']; ?></p>
	<p>
		Prix : <i><?php echo $produit['mod_price'] ?> €</i>
	</p>
		<?php if(!empty($_SESSION['login']) && $_SESSION['login'] ['grade'] == 2){
			$nbArticle = $modelArticle->getNbArticle($produit['mod_id']);
			echo "nbArticle";
			echo '<a href="account.php?tab=2&article_id='.$produit['mod_id'].'">Modifier</a>'; ?>
			<form>
				<label>Stock</label>
				<input type="number" name="qty" value=<?php echo '"'.$nbArticle['nb'].'"'; ?>>
				<input type="submit" value="Ok">
			</form>
			<?php }?>
			<br/>
		<form method="post">
		<input type="hidden" name="buy"
			value= <?php echo '"'.$produit['mod_id'].'"' ?> > 
		<input type="submit"
			value="Acheter">
	</form>
</div>
<?php
	
}
}

 ?>