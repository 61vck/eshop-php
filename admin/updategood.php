<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$gid = $_POST['gid'];
		$gname = $_POST['gname'];
		$gdesc = $_POST['gdesc'];
		$gprice = $_POST['gprice'];
		$gqty = $_POST['gquantity'];
		$gcat = $_POST['gcat'];
		$gimg = "";
		print_r($_POST);


		if($gid && $gname && $gdesc && $gprice && $gcat && $gqty){
			include '../db.php';
			updateGood($gid, $gname, $gdesc, $gprice, $gqty, $gimg, $gcat);
		}
	}
	header("Location:goods.php");

?>