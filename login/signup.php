<?php include '../view/header.php'; ?>

<main>
	<section>
		<h2>Sign Up</h2>
		<form action="index.php" method="post" id="signup_form">
			<input type="hidden" name="action" value="newUser">

			<label for="firstName">First Name</label> <br>
			<input type="text" name ="fName"> <br>

			<label for="lastName">Last Name</label> <br>
			<input type="text" name ="lName"> <br>

			<label for="eMail">E-Mail</label> <br>
			<input type="text" name ="eMail"> <br>

			<label for="password">Password</label> <br>
			<input type="password" name ="password"> <br>

			<label for="phoneNumber">Phone Number</label> <br>
			<input type="text" name ="phone"> <br>

			<label for="birthday">Birthday</label> <br>
			<input type="date" name ="birthday"> <br>

			<label for="gender">Gender</label> <br>
			<select name="gender">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Other">Other</option>
			</select> <br>

			<input type="submit" name="submit" value="Submit">
	    </form>

	    <p class="last_paragraph"><a href="index.php?action=login">Click here to login instead.</a></p>
	</section>
</main>

<?php include '../view/footer.php'; ?>