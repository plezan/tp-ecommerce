<?php
	
	require_once("controllers/HeadController.php");
	$head = new HeadController();
	require_once('controllers/MenuController.php');
	$menu = new MenuController();

	$head->head();
	$menu->menu();

if( !isset($_SESSION['login']) || $_SESSION['login'] == 0 ){ // Si non connecté

	if (isset($_GET['verify']) && $_GET['verify'] == true && isset($_POST["id"]) && isset($_POST["pwd"])) { // si demande de connection et informations presentes
	  	echo "<h2>Verification des information de connection</h2>";
	  	header('Location: account.php');
	  	require_once('classes/db.php');
		$instancedb = DB::getinstance();
		$req = $instancedb->bdd->query("SELECT * FROM user WHERE user_email LIKE '".$_POST["id"]."'");
		$result = $req->fetch();
		echo "req = ";
		echo $result['user_password']."<br>User grade = ";
		echo $result['user_grade']."<br>Mot de passe = ";
		echo $_POST['pwd']."<br>";
		if (password_verify($_POST["pwd"],$result['user_password'])) {
			echo "bon mot de passe";
			$_SESSION['login'] = $result['user_grade']+1;
		} else {
			echo "mauvais identifiant ou mot de passe";
			$_SESSION['login'] = 0;
		}


	  } else {
	  	echo "<h2>formulaire de connection</h2>";
	  	require_once('views/login/form.php');
	  }

} elseif ($_SESSION['login'] == 1 || $_SESSION['login'] == 2 ) { // si connecte en temps qu'admin ou utilisateur
	
	if (isset($_GET['unlog']) && $_GET['unlog'] == true ) {
	  	echo "<h2>Déconnection</h2>";
	  	$_SESSION['login'] = 0;
	  	header('Location: index.php');
	  } else {
	  	echo "<h2>redirection vers le pannel user/admin</h2>";
	  	header("Location: account.php");
	  }

} else {
	echo "what's going on ?";
}


?>

	