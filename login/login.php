<?php include '../view/header.php'; ?>

<main>
	<section>
		<h2>Login</h2>
		<form action="index.php" method="post" id="signup_form">
			<input type="hidden" name="action" value="checkPassword">

			<label for="eMail">E-Mail</label> <br>
			<input type="text" name ="eMail"> <br>

			<label for="password">Password</label> <br>
			<input type="password" name ="password"> <br>

	        <input type="submit" value="Log In" />
	    </form>

	    <p class="last_paragraph"><a href="index.php?action=signup">Don't have an account? Sign up!</a></p>
	</section>
</main>

<?php include '../view/footer.php'; ?>