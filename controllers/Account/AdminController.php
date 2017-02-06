<?php  

class AdminController {
	
	public function adminTab()
	{
		echo "AdminControler";
		require_once('models/AccountAdminModel.php');
		$modelAccountAdmin = new AccountAdminModel();
		$listUser = $modelAccountAdmin->listUser();
		if (isset($_GET['changeGrade']) && isset($_GET['grade']) && $_GET['changeGrade']>0 && $_GET['grade']<=1 && $_GET['grade']>=0 ) {
			if ($_GET['grade']) {
				$modelAccountAdmin->changeUserGrade($_GET['changeGrade'],1);
			} else {
				$modelAccountAdmin->changeUserGrade($_GET['changeGrade'],0);
			}
			header('Location: account.php');  
		} elseif (isset($_GET['deleteAccount']) && $_GET['deleteAccount']>0) {
			$modelAccountAdmin->deleteUser($_GET['deleteAccount']);
			header('Location: account.php');
		}
		
		require_once('views\admin\admin.php');
		//require_once('')
	}
}
?>