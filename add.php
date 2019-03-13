<?php include 'templates/top.php'; ?>

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

<img src="img/waterlily.jpg">

<?php include 'templates/bottom.php'; ?>
