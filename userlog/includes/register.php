<?php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "secyear";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the "donor" table
$sql = "SELECT * FROM donor";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Name: " . $row["name"] . "<br>";
        echo "Gender: " . $row["gender"] . "<br>";
        echo "Date of Birth: " . $row["dob"] . "<br>";
        echo "Weight: " . $row["weight"] . "<br>";
        echo "Blood Group: " . $row["bloodgroup"] . "<br>";
        echo "Address: " . $row["address"] . "<br>";
        echo "Contact: " . $row["contact"] . "<br>";
        echo "Blood Quantity: " . $row["bloodqty"] . "<br>";
        echo "Collection Date: " . $row["collection"] . "<br>";
        echo "<br>";
    }
} else {
    echo "No data found.";
}

// Close the database connection
$conn->close();

?>
