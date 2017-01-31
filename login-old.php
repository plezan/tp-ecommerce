<?php
	session_start();
	require_once("controllers/HeadController.php");
	$head = new HeadController();
	require_once('controllers/MenuController.php');
	$menu = new MenuController();

	$head->head();
	$menu->menu();



	if (!empty($_GET)) {
		echo "get non vide";
		if (!isset($_POST["login"])) {
			$_SESSION['admin'] = 0;
			$_POST["id"] = "";
		}
	}else{

		if (isset($_SESSION['admin'])&&($_SESSION['admin']>=1) || !empty($_POST)) {
			echo "vous etes connectés en temps qu'admin ";
			echo "<a href='?deconnection=true'>Se deconnter</a>";
		}else{
			
			require_once('views/login/form');
				


		}
	}
	if(!empty($_POST["id"])){
		require_once('classes/db.php');
		$instancedb = DB::getinstance();
		$req = $instancedb->bdd->query("SELECT * FROM user WHERE user_email LIKE '".$_POST["id"]."'");
		echo "req = ";
		$reult = $req->fetch();
		echo $reult['user_password']."<br>".$result['user_grade'];
		echo password_verify($_POST["pwd"],$reult['user_password']);

		if(password_verify($_POST["pwd"],$reult['user_password'])==1){
			if ($result["user_grade"]==1) {
				$_SESSION['admin'] = 2;
				echo "1) admin";
			} else {
				$_SESSION['admin'] = 1;
				echo "1) user";
			}
			
			echo '<input type="hidden" name="login" value="1"/>';
			$_GET["login"]=1;
			echo "connection ok";
		}else{
			echo "mauvais mot de passe";
			$_SESSION['admin'] = 0;
		}
	}

?>
			</form>
<?php 
if(!empty($_POST)){
	echo "post non vide";
		if($_SESSION['admin'] == 1){
			echo "toi = user";
		}else if($_SESSION['admin'] == 2){
			echo "toi = admin";
		}else{
			echo "toi != admin";
		}
		//header("Location: index.php");
	}
?>

	