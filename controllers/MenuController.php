<?php  

class MenuController {
	
	public function menu()
	{
		require_once('models/MenuModel.php');
		$modelMenu = new MenuModel();
		$listMenu = $modelMenu->listMenus();
		require_once('views/menu/menu.php');



	}
}
?>