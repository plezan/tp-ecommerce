<?php foreach($listProduit as $produit){ ?>
	<h2><?php echo $produit['titre']; ?></h2>
	<p><?php echo $produit['contenu']; ?></p>
<?php } ?>