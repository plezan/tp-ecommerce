<?php  
if (!isset($_SESSION)){session_start();}
class HeadController {
	public function head()
	{
		$titre = "Mon E-commerce";
		$styles = [
			"views/menu/menu.css",
			"views/admin/tabs.css"
		];
		$scripts = [
			"views/admin/script.js"
		];
		require_once('views/head/head.php');
	}
}
?>