<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .signup-container {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 400px;
    }

    .signup-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .signup-form {
        margin-top: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-group button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #45a049;
    }

    .form-group .error-message {
        color: red;
        margin-top: 5px;
    }
</style>
</head>
<body>
<div class="signup-container">
<h2> <img src="TPL.jpg"salt="Trulli" width="300" height="250"><br><h2>
    <h2>Sign in</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="email">email:</label>
            <input type="text" name="email" value="<?php echo $email;?>">
        </div>
        
        <div class="form-group">
           <br> <label for="password">Password:</label>
           <input type="password" name="password" value="">
        </div>
        <div class="form-group">
            <button type="submit">Log in</button>
        </div>
        
    </form>
    <p>Don't have an account? <a href="signup_form.php">Sign up</a></p> <!-- Sign-up link -->
</div>
</body>
</html>


<?php

$validation_error = "";
$username = "";
$servername = "localhost"; // Or your MySQL server's hostname
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "Project_calculator"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$users = ["emekaobene@yahoo.com" => "password", "coderKid" => "pa55w0rd", "dogWalker" => "ais1eofdog$"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Prepare and bind parameters to avoid SQL injection
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
      // Verify the password
      if (password_verify($password, $user['password'])) {
          // Password is correct, redirect to a logged-in page
          header("Location: login.php");
          exit();
      } else {
          // Password is incorrect
          echo "Incorrect password!";
      }
  } else {
      // No user found with the given username
      echo "User not found!";
  }

  $stmt->close();
}

$conn->close();
?>
  
  

