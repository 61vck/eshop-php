	<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once 'adminhead.php'; ?>
	<title>Good Details</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		
		<?php require_once 'sidebar-top.php'; ?>

	<div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>	
		</div>


				<?php 

					if(isset($_GET['id']) && !empty($_GET['id'])){
						require_once '../db.php';
						$goodid = $_GET['id'];

						$good = getGood($goodid);
							if($good != null){
								$cats = getAllCategories();
				?>
						<form action="updategood.php" method="post">
							<input type="hidden" value="<?php echo $good['id']; ?>" name="gid" class="form-control">
							<label class="form-label">name</label>
							<input type="text" value="<?php echo $good['name']; ?>" name="gname" class="form-control" required>
							<label class="form-label">description</label>
							<textarea cols="30" rows='5' name="gdesc" class="form-control" required><?php echo $good['description']; ?></textarea>
							<label class="form-label">price</label>
							<input type="number" value="<?php echo $good['price']; ?>" name="gprice" class="form-control" required>
							<label class="form-label">Quantity</label>
							<input type="number" value="<?php echo $good['qty']; ?>" name="gquantity" class="form-control" required>
							<label class="form-label">category</label>
							<select name="gcat" class="form-select" required>
								
								<?php
									if($cats != null){
										foreach($cats as $c){
								?>
									<option value="<?php echo $c['id']; ?>" <?php if($good['category_id'] == $c['id']) echo "selected"; ?> ><?php echo $c['name']; ?></option>
								<?php
										}
									}
								?>
							</select>
							<label for="formFile" class="form-label">Default file input example</label>
  							<input class="form-control" type="file" name=gpic id="formFile">

									<button type="submit" class="btn btn-primary mt-3">Update good</button>
									<button type="button" class="btn btn-danger mt-3 ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete good</button>
						</form>
					<?php 
						}
					}
				?>
	</div>

	<?php require_once 'sidebar-bot.php'; ?>

				<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			
			<div class="modal-dialog">
				
				<div class="modal-content">
					
					<div class="modal-header">

						<h5 class="modal-title" id="exampleModalLabel">Delete</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
						<div class="modal-body">
							Really want to remove???
						</div>
						<div class="modal-footer">
							<form action="deletegood.php" method="POST">
								<input type="hidden" value="<?php echo $good['id']; ?>" name="gid" class="form-control">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
								<button type="submit" class="btn btn-danger">YES</button>
							</form>
					</div>
				</div>
			</div>
		</div>
		
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	
</body>
</html>


