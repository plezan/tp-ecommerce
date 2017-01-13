<?php  

class SigninController {
	
	public function signin()
	{
		require_once('models/SigninModel.php');
		require_once('views/signin/form.php');

		if(!empty($_POST)){
			echo password_hash($_POST['user_password'], PASSWORD_DEFAULT)."\n";
		}
	}
}
?>