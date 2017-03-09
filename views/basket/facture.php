<?php
if (! empty ( $_SESSION ['pannier'] )) {
	?>
<div style="
    display: inline-block;
    margin: 20px;
    margin-right: 200px;">
	<strong>
		Entreprise <br/>
		1 rue de la paix <br/>
		75000 Paris <br/>
	</strong>
	<ul style="
    padding: 10px;
    list-style-type: none;
">
		<li>N°Siret : 123456789 ABC 98765</li>
		<li>Tel : 02 99 01 23 45</li>
		<li>Email : cotact@entreprise.fr</li>
	</ul>
</div>
<div style="
    border-style: solid;
    border-radius: 20px;
    padding: 20px;
    display: inline-block;
    width: 200px;
">
	<h3><?php echo $factureData['user_firstName']." ".$factureData['user_lastName']; ?></h3>
	<strong>
		<?php echo $factureData['order_adress'] ?><br/>
		<?php echo $factureData['order_zip']." ".$factureData['order_city']; ?><br/>
	</strong>
</div>
<h2>Facture N° <?php echo "00"+$factureData['order_id']; ?> datant du <?php echo $factureData['order_date']; ?></h2>
<table>
	<tr style="
    background-color: gray;">
		<th>Libelé Article</th>
		<th>Prix Unitaire</th>
		<th>Quantité</th>
		<th>Montant</th>
	</tr>
	<?php
	
	foreach ( $_SESSION ["pannier"] as $item ) {
		?>

		<tr>
			<td>
				<?php
				$article = $ArticleModel->getArticle ( $item['id'] );
				echo ($article['mod_name']);
				?>
			</td>
			<td>
				<?php
				$article = $ArticleModel->getArticle ( $item['id'] );
				echo ($article ['mod_price'] . " €");
				?>
			</td>
			<td>

			<?php if (!empty($item['id'])) { ?>
				
				<?php echo $item['qty']; ?>

			<?php } ?>

			</td>
			<td >
				<?php
					$article = $ArticleModel->getArticle ( $item ['id'] );
					$totalPrice += $article ['mod_price'] * $item ['qty'];
					echo ($article ['mod_price'] * $item ['qty'] . " €");
				?>
			</td>
		</tr>
		<?php
	}
	?>

		<tr>
		<th colspan="3" style="
    background-color: gray;
">TOTAL HT :</th>
		<td style="font-weight: bold;border-style: solid;border-color: gray;"> <?php echo($totalPrice." €"); ?> </td>
	</tr>

</table>

<p>Signature : </p>

<?php
} else {
	echo "Erreur de generation de la facture";
}
?>