<?php  
if (!isset($_SESSION)){session_start();}
class HeadController {
	public function head()
	{
		$titre = "Mon E-commerce";
		$styles = [
			"views/menu/menu.css"
		];
		require_once('views/head/head.php');
	}
}
?>