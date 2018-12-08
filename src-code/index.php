<?php

// Quick Test:
// * Set BreakPoints and debug:
$serverip = "172.200.0.22";
$usr = "dbusr";
$pass = "ABCabc123";
$db = "dbapp";

try {
    // Try open connection
    $cnn = new mysqli($serverip, $usr, $pass, $db);
    if ($cnn->connect_error) {
        throw new Exception("Connection failed: " . $cnn->connect_error);
    } 
    echo "Connected successfully <br>";

    // Creating sample table
    $cnn->query("CREATE TABLE Person (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        date_created TIMESTAMP);");

    // Inserting sample data:
    $cnn->query("INSERT INTO Person (name) VALUES ('John Smith');");    
    
    // Reading data:
    $result = $cnn->query("SELECT name FROM Person");
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            print(" > Row name inserted: " . $row["name"] . "<br>");
        }
    } else {
        print("0 insertions <br>");
    }

    // Truncate data:
    $cnn->query("TRUNCATE TABLE Person;");
    print("Person table truncated. <br>");

    // Drop table:
    $cnn->query("DROP TABLE Person;");
    print("Person table droped. <br>");

    $cnn->close();

} catch (Exception $e) {
    print('Caught exception: ' . $e->getMessage() . '<br>');
}

// Test throw exeption:
// throw new Exception("Intentional Exception.");
?>