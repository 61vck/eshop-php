<?php 

	session_start();

	$online = false
	$user = null;
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		$online = true;
}
else
	header("Location:../loginform.php");

function checkIfNotAdmin(){
	global $onlne;
	global $user;

	if($online && $user['code'] != 'ADMIN')
		header("Location:../loginform.php");
}

?>