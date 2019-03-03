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
    </style>
    </head>
    <body>
        <?php 
            include 'db_connection.php';
            $connection = OpenCon();


            if ($connection->connect_error) die("Fatal Error 1");

            $query ="SELECT * FROM plants;";
            $result = $connection->query($query);

            if (!$result) die("Fatal Error 2");

            $rows_count = $result->num_rows;
        ?>  


        <h2 align="center">List of favorite plants</h2>
        
        <table align="center" class="table">
            <tr>
                <th>Id</th>
                <th>Common Name</th>
                <th>Scientific Name</th>
                <th>Type</th>
            </tr>

            <?php 
                for ($j = 0; $j < $rows_count; ++$j) 
                {
                    $row = $result->fetch_assoc()
            ?>
                    <tr>
                        <td>
                            <?php echo $row['id']; ?>
                        </td>
                        <td class="scientific">
                            <?php echo $row['common_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['sci_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['type']; ?>
                        </td>
                    </tr>
            <?php 
                }
            ?>
        </table>

        <?php 
            $result->close();
            
            CloseCon($connection);
         ?>     
    </body>
</html>
