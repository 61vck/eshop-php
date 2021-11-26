<form id="regform" class="mt-5 w-50 mx-auto" action="register.php" method="POST">
			  <div class="mb-3">
			    <label for="fullname" class="form-label">Fullname</label>
			    <input type="text" class="form-control" id="fullname" name="fullname" aria-describedby="fullnameHelp" required>
			    <div id="fullnameHelp" class="form-text"></div>
			  </div>
			  <div class="mb-3">
			    <label for="login" class="form-label">Login</label>
			    <input type="text" class="form-control" id="login" name="login" aria-describedby="loginHelp" required>
			    <div id="loginHelp" class="form-text"></div>
			  </div>
			  <div class="mb-3">
			    <label for="password" class="form-label">Password</label>
			    <input type="password" class="form-control" name="password "id="password" aria-describedby="passwordHelp" required>
			     <div id="passwordHelp" class="form-text"></div>
			  </div>
			  <div class="mb-3">
			    <label for="repassword" class="form-label">Re-Password</label>
			    <input type="password" class="form-control" name="repassword" id="repassword" aria-describedby="repasswordHelp" required>
			   <div id="repasswordHelp" class="form-text"></div>

			  </div>
			  <div class="mb-3 form-check">
			    <input type="checkbox" class="form-check-input" id="exampleCheck1">
			    <label class="form-check-label" for="exampleCheck1">Check me out</label>
			  </div>
			  <button type="button" onclick="register()" class="btn btn-primary">Register</button>
		</form>