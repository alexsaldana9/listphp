<?php ?>

<style>
     .add {
            padding: 50px;
        }
</style>
<div class="add" align="center">
    
    <h2>Update</h2>
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

              $common_name = test_input($_POST["common_name"]);
              $sci_name = test_input($_POST["sci_name"]);
              $type = test_input($_POST["type"]);

              $id = $_POST["id"];

              //UPDATE `plants` SET `id`=[value-1],`common_name`=[value-2],`sci_name`=[value-3],`type`=[value-4] WHERE 1

              $query  = "UPDATE plants SET common_name='".$common_name."', sci_name='".$sci_name."', type='".$type."' WHERE id=".$id.";";

              
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

        <form method = "post" action = "update.php">
          <input type="hidden" name="id" value="<?php echo $row['id']?>">

          <label>Common Name: <?php echo $row['common_name']?></label><br>
          <label>Scientific Name: <?php echo $row['sci_name']?></label><br>
          <label for="start_date">Type: <?php echo $row['type']?></label><br>

            <div class="form-row">
              <div class="form-group col-md-3">
                <div class="form-group">
                  <label for="start_date">Common Name:</label>
                  <input type="text" class="form-control" id="common_name" name="common_name" >
                </div>
                <div class="form-group">
                  <label for="start_date">Scientific Name:</label>
                  <input type="text" class="form-control" id="sci_name" name="sci_name" >
                </div>  
                <div class="form-group">
                  <label for="start_date">Native or Non-native:</label>
                  <input type="text" class="form-control" id="type" name="type" >
                </div>
              </div> 
            </div>
            <div class="form-row">
                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </div>
        </form>
</div>