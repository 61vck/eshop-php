<?php 

	// require_once 'authorized.php';
	// checkIfNotAdmin();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Categories</title>'
	<?php require_once 'adminhead.php'; ?>

</head>

<body id="page-top">

	<?php require_once 'sidebar-top.php'; ?>

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
			<a class="btn btn-primary" href="addcategoryform.php">Add category</a>				
		</div>

		<?php require_once '../db.php'; ?>
		
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">name</th>
					<th scope="col">description</th>
					<th scope="col">actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$cats = getAllCategories();
					foreach ($cats as $cat){
				?>
				<tr>
					<td><?php echo $cat['id']; ?></td>
					<td><?php echo $cat['name']; ?></td>
					<td><?php echo $cat['description']; ?></td>
					<td><a class ="btn btn-primary" href="onegood.php?id=<?php echo $cat['id']; ?>">Details</a>
					<form action="deletecategory.php" method="POST">
						<input type="hidden" name="catid" value="<?php echo $cat['id']; ?>">
						<button>Delete</button>
					</form>

					</td>
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