<?php ?>

<style>
     .add {
            padding: 50px;
        }
</style>
<div class="add" align="center">
    
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

              $query  = "DELETE FROM plants Where id=".$id.";";

              
              $result = $connection->query($query);

              if (!$result) {
                die("Fatal Error 2");
              }

              CloseCon($connection);

              header("Location: index_with_db.php");
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
                  <label for="start_date">Native or Non-native: <?php echo $row['type']?></label>
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