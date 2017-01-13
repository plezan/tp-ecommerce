<?php  

class SigninController {
	
	public function signin()
	{
		require_once('models/SigninModel.php');
		$modelSignin = new SigninModel();
		require_once('views/signin/form.php');

		if(!empty($_POST)){
			$modelSignin->addUser();

		}

	}
}
?>