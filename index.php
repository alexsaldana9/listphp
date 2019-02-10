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

    <style>
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
    </style>
    </head>
    <body>
        <?php
        $file = fopen("list.csv", "r");
        $list = array();
        
        while (!feof($file))
        {
            $csvRow = fgetcsv($file);
            array_push($list, $csvRow);
        }
        
        fclose($file);
        ?>
        
        <table>
            <tr>
                <th>Common Name</th>
                <th>Scientific Name</th>
                <th>Type</th>
            </tr>
            <?php foreach ($list as $line) {?>
                <tr>
                    <td><?php echo $line[0] ?></td>
                    <td><?php echo $line[1] ?></td>
                    <td><?php echo $line[2] ?></td>
                </tr>
            <?php } ?>
        </table>
        
        <form method = "post" action = "index.php">
            <div class="form-row">
              <div class="form-group col-md-3">
                <div class="form-group">
                  <label for="start_date">Common Name:</label>
                  <input type="text" class="form-control" id="common_name" name="common_name" value="<?php echo isset($_POST["common_name"]) ? $_POST["common_name"] : ''; ?>">
                </div>
                <div class="form-group">
                  <label for="start_date">Scientific Name:</label>
                  <input type="text" class="form-control" id="sci_name" name="sci_name" value="<?php echo isset($_POST["sci_name"]) ? $_POST["sci_name"] : ''; ?>">
                </div>  
                <div class="form-group">
                  <label for="start_date">Native or Non-native:</label>
                  <input type="text" class="form-control" id="type" name="type" value="<?php echo isset($_POST["type"]) ? $_POST["type"] : ''; ?>">
                </div>
              </div> 
            </div>
            <div class="form-row">
                <div class="form-group">
                    <input type="submit" value="add" class="btn btn-primary">
                </div>
            </div>
        </form>
    </body>
</html>
