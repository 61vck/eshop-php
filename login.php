<?php 

	if($_SERVER['REQUEST_METHOD'] == "POST"){

		$url = "login.php";

		$login = $_POST['login'];
		$password = $_POST['password_'];

		$ok=true;

		if(isset($login) && isset($password)){
			require_once 'db.php';
			$user = getUser($login);

			if($user == null){
				header("Location:loginForm.php?message=userNotExist");
				$ok=false;
			}

			elseif($user['password'] != sha1($password)){
				header("Location:loginForm.php?message=passwordIncorrect");
				$ok=false;
			}

			if(ok){
				session_start();
				$_SESSION['user'] = $user;
				$url = "home.php";

				if ($user['code'] == "ADMIN") 
					$url = "admin/adminpage.php";

				header("Location:$url");
		}
	}
}

?>