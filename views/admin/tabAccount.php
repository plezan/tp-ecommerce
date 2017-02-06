<table>
<tr>
  	<th>ID</th>
    <th>Name</th>
    <th>Grade</th> 
    <th>Action</th>
 </tr>
<?php foreach($listUser as $user){ ?>
  <tr>
  	<td><?php echo $user['user_id']; ?></td>
    <td><?php echo $user['user_prenom']." ".$user['user_nom']; ?></td>
    <td>
    	<a href= <?php echo "?changeGrade=".$user['user_id']."&grade=".($user['user_grade']+1)%2; ?> >
	    <?php if($user['user_grade']){
	    	echo "admin";
	    }else{ 
	    	echo "user";
	    } ?> </a>
    </td> 
    <td><a href= <?php echo "?deleteAccount=".$user['user_id']; ?> > Supprimer le compte </a></td>
  </tr>
<?php } ?>
</table>