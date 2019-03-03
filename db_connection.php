<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "admin";
 $dbpass = "OiOlV7BDw8FQ";
 $db = "favorites";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>