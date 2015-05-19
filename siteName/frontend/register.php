<?php

if (isset($_POST['username']) && isset($_POST['password1']) 
	&& isset($_POST['password2']) && $_POST['password1'] == $_POST['password2']
	&& passwordVerify($password1, $username))
{
    $query = 'INSERT INTO 
	      name.users  
	      (Username, Password) 
	      VALUES 
	      ("'.mysqli_real_escape_string($_POST['username']).'",'
	       .mysqli_real_escape_string(password_hash($_POST['password1'], PASSWORD_BCRYPT)).'"';
    $result = mysqli_query($_SESSION['connection'], $query);
}
?>
<!DOCTYPE html>
<html>
    <head>
	<title>siteName Register</title>
	<script>
	    function validatePassword() 
	    {
		var password1, password2, username, output = true;
		document.getElementById("password1").innerHTML = '';
		document.getElementById("password2").innerHTML = '';
		document.getElementById("username").innerHTML = '';
		password1 = document.frmChange.password1;
		password2 = document.frmChange.password2;
		username = document.frmChange.username;
		
		if (!password1.value)
		{
		    password1.focus();
		    document.getElementById('error').innerHTML = "Password Field Required"
		    output = false;
		}
		else if (!password2.value)
		{
		    password2.focus();
		    document.getElementById('error').innerHTML = "ReEnter Password Field Required"
		    output = false;
		}
		else if (password1.value != password2.value)
		{
		    password1.value = '';
		    password2.value = '';
		    password1.focus();
		    document.getElementById("error").innerHTML = 'Not the Same';
		    output = false;
		}
		else if (password1.value.length < 8)
		{
		    password1.value = '';
		    password2.value = '';
		    password1.focus();
		    document.getElementById("error").innerHTML = 'Too Short';
		    output = false;
		}
		else if (password1.value.indexOf(username) != -1)
		{
		    password1.value = '';
		    password2.value = '';
		    password1.focus();
		    document.getElementById("error").innerHTML = 'Username in password';
		    output = false;
		}
		else if (password1.value.indexOf("1") == -1 && password1.value.indexOf("2") == -1
			&& password1.value.indexOf("3") == -1 && password1.value.indexOf("4") == -1
			&& password1.value.indexOf("5") == -1 && password1.value.indexOf("6") == -1
			&& password1.value.indexOf("7") == -1 && password1.value.indexOf("8") == -1
			&& password1.value.indexOf("9") == -1 && password1.value.indexOf("0") == -1
			&& password1.value.indexOf("!") == -1 && password1.value.indexOf("@") == -1
			&& password1.value.indexOf("#") == -1 && password1.value.indexOf("$") == -1
			&& password1.value.indexOf("%") == -1 && password1.value.indexOf("^") == -1
			&& password1.value.indexOf("&") == -1 && password1.value.indexOf("*") == -1)
		{
		  password1.value="";
		  password2.value="";
		  password1.focus();
		  document.getElementById("error").innerHTML = "No Number/Special Char.";
		  output = false;
		}

		return output;
	    }
	</script>
	    
    </head>
    <body>
	<h1>Register</h1><br><br>
	<div align='left'>
	    <form name='frmChange' action='' method="POST" onsubmit="validatePassword()">
		<div align='left'>Username:</div><br>
		<div align='left'><input type='text' name='username'><span id='username'></span></div><br>
		<div align='left'>Password Requirements:<br>
		    <ol style='text-align: left'>
			<li>Minimum 8 Characters.</li>
			<li>At least 1 number or special character ($, $amp;, #, !, etc...)</li>
			<li>You may not use your username within your password</li>
		    </ol>
		</div>
		<div align='left'>Password:</div><br>
		<div align='left'><input type='text' name='password1'><span id='password1'></span></div><br>
		<div align='left'>ReEnter Password:</div><br>
		<div align='left'><input type='text' name='password2'><span id='password2'></span></div><br>
		<div align='left'><input type='submit' value='Submit'></div>
		<div align='left' id='error'></div>
		<div align='left'><<?php if(isset($message)) {echo $message; Redirect('../index.html');}?></div>
	    </form>
	</div>
    </body>
</html>