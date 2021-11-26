<?php 

	// require_once '../authorized.php';
	// checkIfNotAdmin();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once 'adminhead.php'; ?>

	<title>Add Category</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

	<?php 
	include '../db.php';
	
	?>

	<?php require_once 'sidebar-top.php'; ?>

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>	
		</div>

			<form action="addcategory.php" method="post">
				<label class="form-label">name</label>
				<input type="text" name="cname" class="form-control" required>
				<label class="form-label">description</label>
				<textarea cols="30" rows='5' name="cdesc" class="form-control" required></textarea>
				<button type="submit" class="btn btn-primary mt-3">Add category</button>

			</form>
	</div>

		<?php require_once 'sidebar-bot.php'; ?>
				
		
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	
</body>
</html>