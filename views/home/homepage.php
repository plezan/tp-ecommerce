<?php 
foreach($listCategorie as $categorie){ ?>
	
		<a href=<?php echo "?cat=".$categorie['cat_id'];?> > 
		<div>
			<?php echo $categorie['cat_name']; ?>
		</div>		
		</a>
	
<?php } ?>