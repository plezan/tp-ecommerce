<!DOCTYPE html>
<head>
	<title><?php echo $titre ?></title>
	<?php foreach ($styles as $style) { ?>
		<link rel="stylesheet" type="text/css" href=
			<?php echo $style ?> 
		></link>
	<?php } 
	foreach ($scripts as $script) { ?>

		<script type="text/javascript" src=
			<?php echo ($script) ?> 
		></script>
	<?php } ?>
</head>
