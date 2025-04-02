<?php
// PostgreSQL connection details
$host = "host=localhost";
$port = "port=5432";
$dbname = "dbname=postgres";
$credentials = "user=postgres password=123456";

// Connect to PostgreSQL
$conn = pg_connect("$host $port $dbname $credentials");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$department = $_POST['department'];

// Insert data into database
$query = "INSERT INTO students (name, email, age, department) VALUES ($1, $2, $3, $4)";
$result = pg_query_params($conn, $query, array($name, $email, $age, $department));

if ($result) {
    echo "Student registered successfully!";
} else {
    echo "Error: " . pg_last_error($conn);
}

// Close connection
pg_close($conn);
?>
