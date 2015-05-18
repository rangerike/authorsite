<?php

include 'config.php';

function Redirect($url)
{
    ?><meta http-equiv="refresh" content='0;url=<?=$url?>'><?php
}

/**
* Validates that a password meets the required complexity
*
* @param string $pass The password to be checked
* @param string $username The username to be checked
* @param int $minLength Minimum password length (Default: 8)
* @param int $minDigitSymbols Minimum number of digits or symbols required
*  (Default: 1)
* @param bool $throwException Throw an exception instead of simply returning
*  false if a password fails
* @return bool true if include password rules, false if not
*
*/
function verifyPassword($pass, $username, $minLength = 8, $minDigitSymbols = 1,
                       $throwException = false)
{
   try
   {
       // First, ensure what we were passed is actually a string since we are
       // going to be treating it as such
       if ( !is_string($pass) )
       {
           throw new \InvalidArgumentException('$pass is not a string');
       }
       else if ( !is_string($username) )
       {
           throw new \InvalidArgumentException('$username is not a string');
       }

       // Next, ensure the password meets the length requirement
       if ( strlen($pass) < $minLength )
       {
           // @TODO Make this a named exception
           throw new \Exception(
               'Password is too short. '.strlen($pass).' given '
               .intval($minLength).' required'
           );
       }

       // Ensure the username doesn't exist in the password
       if ( false !== stripos($pass, $username) )
       {
           throw new \Exception(
               'Password cannot container username.'
           );
       }

       // Now, based on our other minimum parameters (digits and/or symbols)
       // use a regular expression to validate them
       $foundDigitsSymbols = preg_match_all(
           '/[\d\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/',
           $pass,
           $m,
           PREG_PATTERN_ORDER
       );
       if ( $foundDigitsSymbols < intval($minDigitSymbols) )
       {
           // @TODO Make this a named exception
           throw new \Exception(
               'At least '.intval($minDigitSymbols).' digits and/or symbols'
               .' are required, '.$foundDigitsSymbols.' found.'
           );
       }
   }
   catch ( \Exception $e )
   {
       if ( $throwException )
       {
           throw $e;
       }

       return false;
   }

   // If we've come this far, the password is "complex enough"
   return true;
}