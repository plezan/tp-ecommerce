<?php foreach($listProduit as $produit){ ?>
	<div>
		<h2><?php echo $produit['art_name']; ?></h2>
		<p><?php echo $produit['art_description']; ?></p>
		<p>Prix : <i><?php echo $produit['art_price'] ?> €</i></p>
		<?php if($_SESSION['login'] == 2){ echo '<a href="account.php?tab=2#'.$produit['art_id'].'">Modifier</a>';} ?>
	</div>
<?php } ?>