<?php

$db = mysqli_connect("localhost","root","","e-commerce");  // database connection

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>