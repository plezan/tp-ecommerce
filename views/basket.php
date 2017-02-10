<?php
if (! empty ( $_SESSION ['pannier'] )) {
	?>
<table>
	<tr>
		<th>Id</th>
		<th>Nom de l'article</th>
		<th>Prix Unitaire</th>
		<th>Quantité</th>
		<th>Action</th>
		<th>Prix</th>
	</tr>
	<?php
	
	foreach ( $_SESSION ["pannier"] as $item ) {
		?>

		<tr>
			<td>
				<?php echo $item['id'] ?>
			</td>
			<td>
				<?php
				$article = $ArticleModel->getArticle ( $item ['id'] );
				echo ($article ['art_name']);
				?>
			</td>
			<td>
				<?php
				$article = $ArticleModel->getArticle ( $item ['id'] );
				echo ($article ['art_price'] . " €");
				?>
			</td>
			<td>

			<?php if (!empty($item['id'])) { ?>
				
				<form method="GET">
					<input type="number" name="qty"
						value=<?php echo '"'.$item['qty'].'"'; ?> /> <input type="hidden"
						name="id" value=<?php echo '"'.$item['id'].'"'; ?>> <input
						type="submit" value="Ok">
				</form>	

			<?php } ?>

			</td>
			<td>
				<?php if (!empty($item['id'])) { ?>
					<form method="GET">
					<input type="hidden" name="id"
						value=<?php echo '"'.$item['id'].'"'; ?>> <input type="submit"
						name="del" value="Supprimer">
					</form>
				<?php } ?>
			</td>
			<td>
				<?php
					$article = $ArticleModel->getArticle ( $item ['id'] );
					$totalPrice += $article ['art_price'] * $item ['qty'];
					echo ($article ['art_price'] * $item ['qty'] . " €");
				?>
			</td>
		</tr>
		<?php
	}
	?>

		<tr>
		<th colspan="5">TOTAL :</th>
		<td> <?php echo($totalPrice." €"); ?> </td>
	</tr>

</table>

<form method="GET">
	<input type="hidden" name="void" value="1"> <input type="submit"
		value="Vider le panier">
</form>
<form method="GET">
	<input type="hidden" name="buy" value="1"> <input type="submit"
		value="Poursuivre l'achat">
</form>


<?php
} else {
	echo "Vous n'avez rien dans votre panier";
}
?>