<table>
<tr>
  	<th>ID</th>
    <th>Name</th>
    <th>Price</th> 
    <th>Action</th>
 </tr>
<?php foreach($listProduit as $produit){ ?>
  <tr>
  	<td id=<?php echo $produit['art_id']; ?>><?php echo $produit['art_id']; ?></td>
    <td><?php echo $produit['art_name']; ?></td>
    <td><?php echo $produit['art_price'] ?></td> 
    <td>nothing</td>
  </tr>
<?php } ?>
</table>