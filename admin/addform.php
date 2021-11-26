<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once 'adminhead.php'; ?>

	<title>Add form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

	<?php 
	include '../db.php';
	$cats = getAllCategories();
	
	?>

	<?php require_once 'sidebar-top.php'; ?>

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>	
		</div>

			<form action="addgood.php" method="post" enctype="multipart/form-data">
				<label class="form-label">name</label>
				<input type="text" name="gname" class="form-control" required>
				<label class="form-label">description</label>
				<textarea cols="30" rows='5' name="gdesc" class="form-control" required></textarea>
				<label class="form-label">price</label>
				<input type="number" name="gprice" class="form-control" required>
				<label class="form-label">Quantity</label>
				<input type="number" name="gquantity" class="form-control" required>
				<label class="form-label">category</label>
				<select name="gcat" class="form-select" required>
								
						<?php
							if($cats != null){
										foreach($cats as $c){
						?>
						<option value="<?php echo $c['id']; ?>" ><?php echo $c['name']; ?></option>
						<?php
								}
							}
						?>
				</select>

  						<label for="formFile" class="form-label">Default file input example</label>
  						<input class="form-control" type="file" name=gpic id="formFile">

				<button type="submit" class="btn btn-primary mt-3">Add good</button>

			</form>
	</div>

		<?php require_once 'sidebar-bot.php'; ?>
				
		
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	
</body>
</html>