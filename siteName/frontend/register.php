<?php

//php registration stuffs w/ MYSQL & pw hashing + salting

?>
<!DOCTYPE html>
<html>
    <head>
	<title>siteName Register</title>
	<!-- Insert Style Here -->
    </head>
    <body>
	<h1>Register</h1><br><br>
	<div align='left'>
	    <form action='' method="POST">
		<div align='center'>Username:</div><br>
		<div align='center'><input type='text' name='username'><span id='username'></span></div><br>
		<div align='center'>Password Requirements:<br>
		    <ol style='text-align: left'>
			<li>Minimum 8 Characters.</li>
			<li>At least 1 number or special character ($, $amp;, #, !, etc...)</li>
			<li>You may not use your username within your password</li>
		    </ol>
		</div>
		<div align='center'>Password:</div><br>
		<div align='center'><input type='text' name='password'><span id='password1'></span></div><br>
		<div align='center'>ReEnter Password:</div><br>
		<div align='center'><input type='text' name='password'><span id='password2'></span></div><br>
		
	    </form>
	</div>
    </body>
</html>