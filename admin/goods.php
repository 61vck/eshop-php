<?php 

	// require_once 'authorized.php';
	// checkIfNotAdmin();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Goods</title>'
	<?php require_once 'adminhead.php'; ?>

</head>

<body id="page-top">

	<?php require_once 'sidebar-top.php'; ?>

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
			<a class="btn btn-primary" href="addform.php">Add good</a>				
		</div>

		<?php require_once '../db.php'; ?>
		
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">name</th>
					<th scope="col">description</th>
					<th scope="col">price</th>
					<th scope="col">quantity</th>
					<th scope="col">category</th>
					<th scope="col">actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$goods = getAllGoods();
					foreach ($goods as $good){
				?>
				<tr>
					<td><?php echo $good['id']; ?></td>
					<td><?php echo $good['name']; ?></td>
					<td><?php echo $good['description']; ?></td>
					<td><?php echo $good['price']; ?></td>
					<td><?php echo $good['qty']; ?></td>
					<td><?php echo $good['cname']; ?></td>
					<td><a class ="btn btn-primary" href="onegood.php?id=<?php echo $good['id']; ?>">Details</a></td>


				</tr>
				<?php 
					}
				?>
				
			</tbody>
		</table>

	</div>

	<?php require_once 'sidebar-bot.php'; ?>
	
</body>
</html>