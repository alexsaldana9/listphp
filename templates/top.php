<?php
    session_start();
?>

<?php
function test_input($data) {
  $data = $data ? $data : "";
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  if (!$data){
    die("Missing required parameter");
  }

  return $data;
}
?>

<!DOCTYPE html>
<!-- 
Alexandra Saldana 
Homework 3: List of Favorites
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>List of Favorites</title>
        
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

        <link rel="stylesheet" href="style.css" />

    </head>
    <body>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <div class="add" align="center">

        <nav class="navbar navbar-expand-lg">
		  <ul class="navbar-nav mr-auto">
		    <li class="nav-item active">
		      <a class="nav-link" href="index.php">Home</a>
		    </li>
		    <li class="nav-item">
		      <a class="nav-link" href="add.php">Add</a>
		    </li>
            <li class="nav-item">
              <a class="nav-link" id="logout" href="logout.php">Logout</a>
            </li>
		  </ul>
		</nav>