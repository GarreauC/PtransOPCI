<?php
/**
 * User: Quentin
 * Date: 15/04/2015
 * Time: 15:41
 */
 
//Usage : Connection to a database
function connect($host, $user, $password, $base)
{

    $conn = new mysqli($host, $user, $password, $base);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>