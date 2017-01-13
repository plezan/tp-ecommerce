<?php
	session_start();
	require_once("controllers/HeadController.php");
	$head = new HeadController();
	require_once('controllers/MenuController.php');
	$menu = new MenuController();
	
	$head->head();//head de la page web
	$menu->menu();//menu

if(!empty($_POST)){
					if($_POST["id"] == "admin" && $_POST["pwd"] == "admin" ){
						$_SESSION['admin'] = true;
						echo "<p>admin</p><br>";
						$_GET["login"]=1;
					}else{
						$_SESSION['admin'] = false;
						echo "<p>!admin</p><br>";
					}
				}


	if (!empty($_GET) && ( isset($_GET['login']) || isset($_GET['logout']))) {//si login ou logout
		if (isset($_GET['login'])) {
			echo "login";
			if (isset($_SESSION)&&$_SESSION['admin']!=true||!isset($_SESSION)) {
				echo "vous n'êtes pas connectés"; 
				?>

				<form action="" method="post">
				<label>Nom d'utilisateur</label>
				<input type="text" name="id" value=""/>S
				<label>Mot de passe</label>
				<input type="password" name="pwd" value=""/>
				<input type="submit" value="send"/>
				</form>

				<?php
			}
			
		}elseif (isset($_GET['logout'])) {
			echo "logout";
			$_SESSION['admin']=false;
		}
	}else{//sinon
			echo "loged";
	}
	
?>