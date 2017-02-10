<?php
session_start ();
require_once ("controllers/HeadController.php");
$head = new HeadController ();
$head->head ();
require_once ('controllers/MenuController.php');
$menu = new MenuController ();
$menu->menu ();
require_once ('controllers\Account\AdminController.php');
$AdminController = new AdminController ();
if (! isset ( $_SESSION ["login"] ['grade'] ) || $_SESSION ["login"] ['grade'] == 0) {
	unset($_SESSION['login']);
	?>
<h2>Vous devez etre connectés</h2>
<?php } else if( $_SESSION["login"] ['grade'] == 1 ){ ?>

<h2>Pannel Utilisateur</h2>

<?php } else if( $_SESSION["login"] ['grade'] == 2 ){ ?>

<h2>Pannel Admin</h2>
<?php
	
	$AdminController->adminTab ();
}
?>