<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>Delete</title>
        
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
          <a class="nav-link" href="#">Delete</a>
        </li>
      </ul>
    </nav>
    
    <h2>Delete</h2>
        <?php 
            include 'db_connection.php';

            if ($_SERVER["REQUEST_METHOD"] == "GET"){
              $connection = OpenCon();
              if ($connection->connect_error) {
                die("Fatal Error 1"); 
              }

              $id = $_GET["id"];

              $query ="SELECT * FROM plants WHERE id=".$id.";";
              $result = $connection->query($query);

              if (!$result) {
                die("Fatal Error 2");
              }

              $row = $result->fetch_assoc();

              CloseCon($connection);          
            }
            
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
              $connection = OpenCon();

              if ($connection->connect_error) {
                die("Fatal Error 1"); 
              }

              $id = $_POST["id"];

              $stmt=$connection->prepare("DELETE FROM plants Where id=?;");
              $stmt->bind_param("i", $id);
              $stmt->execute();


              if (!$stmt) {
                die("Fatal Error 2");
              }

              CloseCon($connection);

              header("Location: index.php");
              exit;
            }
        ?>  


        <form method = "post" action = "delete.php">
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <div class="form-row">
              <div class="form-group col-md-3">
                <div class="form-group">
                  <label>Common Name: <?php echo $row['common_name']?></label>
                </div>
                <div class="form-group">
                  <label>Scientific Name: <?php echo $row['sci_name']?></label>
                </div>  
                <div class="form-group">
                  <label for="start_date">Type: <?php echo $row['type']?></label>
                </div>
              </div> 
            </div>
            <div class="form-row">
                <div class="form-group">
                    <input type="submit" value="Delete" class="btn btn-primary">
                </div>
            </div>
        </form>
</div>
<img src="img/tulips.jpg">
<nav class="navbar fixed-bottom">
  <a class="navbar-brand">Alexandra Saldana &#169; - List of Favorites </a>
</nav>  
</body>
</html>