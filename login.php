<?php
	session_start();
	require_once("controllers/HeadController.php");
	$head = new HeadController();
	require_once('controllers/MenuController.php');
	$menu = new MenuController();

	$head->head();
	$menu->menu();



	if (!empty($_GET)) {
		if (!isset($_POST["login"])) {
			$_SESSION['admin'] = false;
			$_POST["id"] = "";
		}
	}else{

		if ($_SESSION['admin']==true || !empty($_POST)) {
			echo "vous etes connectés en temps qu'admin ";
			echo "<a href='?deconnection=true'>Se deconnter</a>";
		}else{
?>
			<form action="login.php" method="post">
				<label>Nom d'utilisateur</label>
				<input type="text" name="id" value=""></input>
				<label>Mot de passe</label>
				<input type="password" name="pwd" value=""></input>
				<input type="submit" value="send"/>
				

<?php
		}
	}
	if(!empty($_POST)){
		if($_POST["id"] == "admin" && $_POST["pwd"] == "admin" ){
			$_SESSION['admin'] = true;
			echo '<input type="hidden" name="login" value="1"/>';
			$_GET["login"]=1;
		}else{
			$_SESSION['admin'] = false;
		}
	}

?>
			</form>
<?php 
if(!empty($_POST)){
		if($_SESSION['admin'] == true){
			echo "toi = admin";
		}else{
			echo "toi != admin";
		}
	}
?>

	