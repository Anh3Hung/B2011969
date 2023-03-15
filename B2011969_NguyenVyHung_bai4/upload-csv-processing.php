<?php
if (isset($_POST["submit"])) {
    $file = $_FILES["file"]["tmp_name"];
    $handle = fopen($file, "r");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbanhang";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully<br/>\n";
    
    // Read the CSV file
    // $row = 1;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
        
        // Insert the data into the database
        $sql = "INSERT INTO customers (id, fullname, email, birthday, reg_date, password, img_profile)
        VALUES ('" . $data[0] . "', '" . $data[1] . "', '" . $data[2] . "', '" . $data[3] . "', '" . $data[4] . "', '" . $data[5] . "', '" . $data[6] . "')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully\n";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    fclose($handle);
    
    // Close the connection
    mysqli_close($conn);
}
?>