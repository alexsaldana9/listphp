
        //
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $common_name = test_input($_POST["common_name"]);
            $sci_name = test_input($_POST["sci_name"]);
            $type = test_input($_POST["type"]);
            $new_line = array($common_name, $sci_name, $type);
            
            $add = fopen("list.csv", "a");
            fputcsv($add, $new_line);
            fclose($add);
            
            //redirect
            header("Location: index.php");
            exit;
        }
       
        
        $file = fopen("list.csv", "r");
        $list = array();
        
        while (!feof($file))
        {
            $csvRow = fgetcsv($file);
            array_push($list, $csvRow);
        }
        
        fclose($file);
                     
        
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>