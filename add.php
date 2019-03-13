<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Add</title>
        
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="add" align="center">

    <nav class="navbar navbar-expand-lg">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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


              $stmt=$connection->prepare("INSERT INTO plants (common_name, sci_name, type) VALUES (?,?,?)");
              $stmt->bind_param("sss", $common_name, $sci_name, $type);
              $stmt->execute();


              if (!$stmt) {
                die("Fatal Error 2");
              }

              CloseCon($connection);

              header("Location: index.php");
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
                  <label for="start_date">Type:</label>
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
<img src="img/waterlily.jpg">
<nav class="navbar fixed-bottom">
  <a class="navbar-brand">Alexandra Saldana &#169; - List of Favorites </a>
</nav>
</body>
</html>