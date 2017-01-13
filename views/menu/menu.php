<nav>
	<ul>
		<?php foreach($listMenu as $menu){ ?>
		<li><a href= <?php echo "'".$menu["lien"]."'";?> ><?php echo $menu["textLien"] ?></a></li>
		<?php } ?>
	</ul>
</nav>
