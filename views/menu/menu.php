<nav>
	<ul>
		<?php foreach($listMenu as $menu){
			if( !isset($_SESSION["login"]) || $_SESSION["login"] == 0 ) {
				 if($menu["visibility"] == 1 || $menu["visibility"] == 0 ){ ?>
					<li><a href= <?php echo "'".$menu["lien"]."'";?> ><?php echo $menu["textLien"] ?></a></li>
				<?php } 
			} else if( $_SESSION["login"] == 1   ){
				if($menu["visibility"] == 2 || $menu["visibility"] == 0 ){ ?>
					<li><a href= <?php echo "'".$menu["lien"]."'";?> ><?php echo $menu["textLien"] ?></a></li>
				<?php }
			} else if( $_SESSION["login"] == 2 ){

				if($menu["visibility"] == 2 || $menu["visibility"] == 3 || $menu["visibility"] == 0 ){ ?>
					<li><a href= <?php echo "'".$menu["lien"]."'";?> ><?php echo $menu["textLien"] ?></a></li>
				<?php } 
			} 
		} ?>
	</ul>
</nav>
