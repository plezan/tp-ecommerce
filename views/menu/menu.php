<nav>
	<ul>
		<?php
		
foreach ( $listMenu as $menu ) {
			if (! isset ( $_SESSION ["login"] ['grade'] ) || $_SESSION ["login"] ['grade'] == 0) {
				if ($menu ["visibility"] == 1 || $menu ["visibility"] == 0) {
					?>
					<li><a href=<?php echo "'".$menu["lien"]."'";?>><?php echo $menu["textLien"] ?></a></li>
				<?php
				
}
			} else if ($_SESSION ["login"] ['grade'] == 1) {
				if ($menu ["visibility"] == 2 || $menu ["visibility"] == 0) {
					?>
					<li><a href=<?php echo "'".$menu["lien"]."'";?>><?php echo $menu["textLien"] ?></a></li>
				<?php
				
}
			} else if ($_SESSION ["login"] ['grade'] == 2) {
				
				if ($menu ["visibility"] == 2 || $menu ["visibility"] == 3 || $menu ["visibility"] == 0) {
					?>
					<li><a href=<?php echo "'".$menu["lien"]."'";?>><?php echo $menu["textLien"] ?></a></li>
				<?php
				
}
			}
		}
		?>
	</ul>
</nav>
