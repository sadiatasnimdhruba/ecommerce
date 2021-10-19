
<br><br><br><br><br>
<div class="login_box">

	<form method="POST" action="">

		<table align="left" width="70%">

			<tr align="left">				
				<td colspan="4">
					<h2>Login.</h2> <br/>
					<span>
						Don't have account? <a href="customer_register.php"> Register Here </a> <br/> <br/>
					</span>
				</td>
			</tr>

			<tr>
				<td width="15%"><b>Email:</b></td>
				<td colspan="3"><input type="email" name="email" placeholder="Email"/></td>
			</tr>

			<tr>
				<td width="15%"><b>Password:</b></td>
				<td colspan="3"><input type="password" name="password" placeholder="Password"/></td>
			</tr>

			<tr align="left">
				<td></td>
				<td colspan="4">
					<a href="checkout.php?forgot_pass">
						Forgot Password
					</a>
				</td>
			</tr>

			<tr align="left">
				<td></td>
				<td colspan="4">
					<button type="submit" name="submit">Login</button>
				</td>
			</tr>
			

		</table>
    
    </form>
    

</div>

<?php

	if (isset($_POST['submit'])){
		echo $_POST['email']."<br/>";
		echo $_POST['password'];
		
	}

	?>