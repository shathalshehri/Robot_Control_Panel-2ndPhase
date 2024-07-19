<?php
// Required variables to connect with the local database
$servername = "localhost";
$username = "root";
$password = "rootroot";
$db = "Robot";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Retrieve the latest command
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT directions FROM remote ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // Output the command
            $row = $result->fetch_assoc(); 
            echo $row['directions'];
        } else {
            echo "No directions found";
        }
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    // Handle POST request for inserting direction
    $direction = "";
    if (isset($_POST["Forward"])) {
        $direction = $_POST["Forward"];
    } elseif (isset($_POST["Backward"])) {
        $direction = $_POST["Backward"];
    } elseif (isset($_POST["Left"])) {
        $direction = $_POST["Left"];
    } elseif (isset($_POST["Right"])) {
        $direction = $_POST["Right"];
    } elseif (isset($_POST["Stop"])) {
        $direction = $_POST["Stop"];
    }

    if (!empty($direction)) {
        $sql = "INSERT INTO remote (directions) VALUES ('$direction')";
        if ($conn->query($sql) === TRUE) {
            echo $direction;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

