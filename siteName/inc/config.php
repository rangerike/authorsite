<?php
    /*
     * This file includes the configuration things and global includes so only this
     * file is the one that needs to be included for all functions to be available
     */
    
    include 'functions.php';
    
    $DBUSER = 'Remote';
    $DBPASS = 'siteremote';
    $DBSERVER = 'localhost';
    $_SESSION['connection'] = mysqli_connect($DBSERVER, $DBUSER, $DBPASS);