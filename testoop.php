<?php

	require_once 'db.php';

	$db = new Database("eshop");

	$item = $db->selectOne("categories", 6);

	print_r($item);

?>