<?php 

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		$url = "register.php";

		$login = $_POST['login'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$fullname = $_POST['fullname'];


		$ok=true;

		if(isset($login) && isset($password) && isset($repassword) && isset($fullname)){
			require_once 'db.php';
			$user = getUser($login);
			// echo "</br>";
			// echo "GetUser SUCCESS!";

			if($user = null){
				header("Location:registerForm.php?message=userExist");
				$ok=false;
			}

			if(strcmp($password, $repassword) !== 0){
				header("Location:registerForm.php?message=passwordMissmatch");
				$ok=false;
			}

			elseif(strlen($password) != strlen($repassword)){
				header("Location:registerForm.php?message=passwordLength");
				$ok=false;
			}

			if($ok)
				registerUser($login, sha1($password), $fullname,);
	}
}

?>