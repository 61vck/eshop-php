<?php 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$catid = $_POST['gid'];

		if ($catid) {
			include '../db.php';
			$deleted = deleteCategory($catid);
			echo "<h1>" .$deleted. "</h1>";

		}
	}
	header("Location:categories.php");
?>