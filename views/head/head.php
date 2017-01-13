<!DOCTYPE html>
<head>
	<title><?php echo $titre ?></title>
	<?php foreach ($styles as $style) { ?>
	<link rel="stylesheet" type="text/css" href=
		<?php echo $style ?> 
	>
	<?php } ?>
</head>
