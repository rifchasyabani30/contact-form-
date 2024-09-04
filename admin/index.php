<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tugas2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }

    $stmt->bind_param('s', $admin_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (md5($admin_password) === $row['password']) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: usersub.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Invalid username or password.";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        /* Body */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff9a9e, #fad0c4, #fbc2eb, #a18cd1, #cfd9df);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
        }

        /* Container LOGIN FORM */
        .login-container {
            background: #fff;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 400px;
        }

        /* Title */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Error mssg */
        .error {
            color: #ff4d4d;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Form grp */
        .form-group {
            margin-bottom: 15px;
        }

        /* Label */
        .form-group label {
            display: block;
            margin-bottom:5px;
            color: #555;
            font-weight: bold;
        }

        /* Input */
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 16px;
        }

        /* Submit */
        .form-group input[type="submit"] {
            background-color: #a18cd1;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group input[type="submit"]:hover {
            background-color: #fbc2eb;
        }

        /* Copyright */
        .copyright {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 20px;
            color: #fff;
        }
    </style>
    </head>
<body>
    <div class="login-container">
        <h2>LOGIN ADMIN</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
    <div class="copyright">
        &copy; 2024 Rifcha Sya'bani Fatullah - T3G
    </div>
</body>
</html>
