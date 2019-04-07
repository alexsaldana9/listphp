<?php include 'templates/top.php'; ?>

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
        <th></th>
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
                <td>
                    <?php echo $row['common_name']; ?>
                </td>
                <td class="scientific">
                    <?php echo $row['sci_name']; ?>
                </td>
                <td>
                    <?php echo $row['type']; ?>
                </td>
                <td>
                    <a href="update.php?id=<?php echo $row['id'] ?>">Update </a> &nbsp;&nbsp;
                    <a href="delete.php?id=<?php echo $row['id'] ?>">Delete </a> &nbsp;&nbsp;
                </td>
            </tr>
    <?php 
        }
    ?>
</table>

<a href="add.php"><button>Add to List</button></a><br>

<?php 
    $result->close();
    
    CloseCon($connection);
?>  

<?php include 'templates/bottom.php'; ?>
