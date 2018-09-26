<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    
    <title>Task 3</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
    <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "registration";

        $conn = new mysqli($servername, $username, $password, $dbname);


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        echo "Connected successfully";
/*
        $sql = "CREATE DATABASE regDB";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }
*/    
    ?>

    <!--Table Creation-->
    <?php
        $sql = "CREATE TABLE IF NOT EXISTS `user` (
                `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `username` varchar(255) NOT NULL,
                `email` varchar(255) NOT NULL,
                `password` varchar(255) NOT NULL,
                `active` tinyint(1) NOT NULL,
                UNIQUE KEY `username` (`username`)
                )";

    ?>

</body>
</html>