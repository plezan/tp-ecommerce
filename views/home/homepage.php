<?php foreach($listProduit as $produit){ ?>
	<h2><?php echo $produit['art_name']; ?></h2>
	<p><?php echo $produit['art_description']; ?></p>
	<p>Prix : <i><?php echo $produit['art_price'] ?> €</i></p>
<?php } ?>