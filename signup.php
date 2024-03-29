<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "Project_calculator";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullnames = $_POST['fullnames'];
    $dob = $_POST['DOB'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $postcode = $_POST['postcode'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        echo "Email already exists. Please use a different email address.";
    } else {
        // Email does not exist, proceed with registration
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO users (email, password, fullnames, DOB, country, address, postcode) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $email, $hashed_password, $fullnames, $dob, $country, $address, $postcode);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "User registered successfully";
            // Redirect to another page after successful registration
            header("Location: http://localhost/Project_calculator/index.php");
            exit(); // Ensure no further code execution after redirection
        } else {
            echo "Error: " . $stmt->error; // Display error message
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $conn->close();
}
?>
