<?php 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		if ($_FILES['gpic']['type'] == 'image/jpeg' || $_FILES['gpic']['type'] == 'image/png'){
			if ($_FILES['gpic']['type'] <= 1024*1024) {

				move_uploaded_file($_FILES['gpic']['tmp_name'], "../images/".$_FILES['gpic']['name']);
			}
		}


		$gname = $_POST['gname'];
		$gdesc = $_POST['gdesc'];
		$gprice = $_POST['gprice'];
		$gqty = $_POST['gquantity'];
		$gcat = $_POST['gcat'];

		if ($gname && $gdesc && $gprice && $gcat && $gqty){
			include '../db.php';
			addGood($gname, $gdesc, $gprice, $gqty, $_FILES['gpic']['name'], $gcat);
			
		}
	}
	header("Location:goods.php");

?>