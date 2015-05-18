<?php

 include '../inc/config.php';
 //TODO MySQL here

?>

<html>
    <head>
	<title>siteName Login</title>
	<script>
	    function validatePassword() 
	    {
		var password, username, output = true;
		document.getElementById("username").innerHTML = '';
		document.getElementById("password").innerHTML = '';
		username = document.frmChange.username;
		password = document.frmChange.password;
		
		if (!username.value)
		{
		    username.focus();
		    document.getElementById('error').innerHTML = "Username Required"
		    output = false;
		}
		else if (!password.value)
		{
		    password2.focus();
		    document.getElementById('error').innerHTML = "Password Required"
		    output = false;
		}
		
		return output;
	    }
	</script>
    </head>
    <body>
	<h1>Login</h1><br><br>
	<div align='left'>
	    <form action='' method="POST">
		<div
		<div align='left'>Username:</div><br>
		<div align='left'><input type='text' name='username'><span id='username'></span></div><br>
		<div align='left'>Password:</div><br>
		<div align='left'><input type='text' name='password'><span id='password'></span></div><br>
		<div align='left'><input type='submit' value='Submit'>
	    </form>
	</div>
    </body>
</html>