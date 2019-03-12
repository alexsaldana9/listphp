<?php ?>
<head>
        <meta charset="UTF-8">
        <title>List of Favorites</title>
        
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <style>
        body {
            padding: 50px;
        }
        
        
        .scientific {
            font-style: italic;
        }
       
      
      header {
        background-color: #3B5CB2;
        width:100%;
        text-align: center;
        border-radius: 10px;
        top:0;
        left:0;
      }
     .btn-primary {
        background-color: #3B5CB2;
        border-color: #3B5CB2;
        width: 100%;
      }

      .add {
            padding: 50px;

      }

      .navbar {
        background-color: lightblue;
      }

    

    </head>
</style>
<div class="add" align="center">

    <nav class="navbar navbar-expand-lg">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index_with_db.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Add</a>
        </li>
      </ul>
    </nav>
    
    <h2>Add to List</h2>
        <?php 
            include 'db_connection.php';
            
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
              $connection = OpenCon();

              if ($connection->connect_error) {
                die("Fatal Error 1"); 
              }

              $common_name = test_input($_POST["common_name"]);
              $sci_name = test_input($_POST["sci_name"]);
              $type = test_input($_POST["type"]);

              $query  = "INSERT INTO plants (common_name, sci_name, type) VALUES ('".$common_name."','".$sci_name."','".$type."')";

              
              $result = $connection->query($query);

              if (!$result) {
                die("Fatal Error 2");
              }

              CloseCon($connection);

              header("Location: index_with_db.php");
              exit;
            }


            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
        ?>  

        <form method = "post" action = "add.php">
            <div class="form-row">
              <div class="form-group col-md-3">
                <div class="form-group">
                  <label for="start_date">Common Name:</label>
                  <input type="text" class="form-control" id="common_name" name="common_name" required >
                </div>
                <div class="form-group">
                  <label for="start_date">Scientific Name:</label>
                  <input type="text" class="form-control" id="sci_name" name="sci_name" required >
                </div>  
                <div class="form-group">
                  <label for="start_date">Native or Non-native:</label>
                  <input type="text" class="form-control" id="type" name="type" required>
                </div>
              </div> 
            </div>
            <div class="form-row">
                <div class="form-group">
                    <input type="submit" value="add" class="btn btn-primary">
                </div>
            </div>
        </form>
</div>
<nav class="navbar fixed-bottom">
  <a class="navbar-brand">Alexandra Saldana &#169; - List of Favorites </a>
</nav>  