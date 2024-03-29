<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    .form-group input[type="select"],
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
    <h2>Sign up</h2>
  
    <form class="signup_form" action="signup.php" method="post">
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="username" name="email" required>
        </div>
        <div class="form-group">   
            <label for="fullnames">Full Names:</label> 
            <input type="text" class="form-control" id="fullnames" name="fullnames" required>
        </div>
        <div class="form-group">   
            <label for="DOB">Date of Birth:</label>
            <input type="date" class="form-control" id="DOB" name="DOB" required>
        </div>
        <div class="form-group">
            <label for="country">Country of Residence:</label>
            <select class="form-control" name="country" id="">
                <option value="Nigeria">Nigeria</option>
                <option value="UK">UK</option>
                <option value="USA">USA</option>
                <option value="Australia">Australia</option>
                <option value="Canada">Canada</option>
                <option value="Canada">Ghana</option>

            </select>
            
        </div>
         <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
         </div>
    
        <div class="form-group">
            <label for="postcode">Postcode:</label>
            <input type="text" class="form-control" id="postcode" name="postcode" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Sign Up</button>
        </div>
    </form>
</div>
</body>
</html>
