<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "tugas2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = $conn->real_escape_string($_POST['Nama']);
    $nim = $conn->real_escape_string($_POST['Nim']);
    $email = $conn->real_escape_string($_POST['Email']);
    $kelas = $conn->real_escape_string($_POST['Kelas']);
    $gender = $conn->real_escape_string($_POST['Gender']); 
    $saran = $conn->real_escape_string($_POST['Saran']);

    $sql = "INSERT INTO user (Nama, Nim, Email, Kelas, Gender, Saran) VALUES ('$nama', '$nim', '$email', '$kelas', '$gender', '$saran')";

    if ($conn->query($sql) === TRUE) {
        $message = "Your submission was successful. Thank you for your input!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fad0c4, #fbc2eb, #a18cd1, #a18cd1, #cfd9df);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            border-radius: 30px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            width: 90%;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        input[type="submit"] {
            background-color: #a18cd1;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px; 
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #fbc2eb;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
            border-radius: 8px; 
        }
        .message.success {
            color: #28a745; 
        }
        .message.error {
            color: #dc3545; 
        }
        .gender-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .gender-container label {
            margin-left: 5px;
            margin-right: 20px;
        }
        .copyright {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 14px;
            color: #fff;
        }
    </style>
    <script>
        function confirmSubmission() {
            return confirm("Apakah Anda yakin ingin mengirim formulir ini?");
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>CONTACT FORM</h2>
        <?php if ($message): ?>
            <div class="message <?php echo strpos($message, 'Error') === false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="index.php" method="post" onsubmit="return confirmSubmission()">
            <label for="Nama">Nama:</label>
            <input type="text" id="Nama" name="Nama" required>

            <label for="Nim">NIM:</label>
            <input type="text" id="Nim" name="Nim" required>

            <label for="Email">Email:</label>
            <input type="email" id="Email" name="Email" required>

            <label for="Kelas">Kelas:</label>
            <input type="text" id="Kelas" name="Kelas" required>
            
            <label>Gender:</label>
            <div class="gender-container">
                <input type="radio" id="genderP" name="Gender" value="P" required>
                <label for="genderP">Perempuan</label>
                
                <input type="radio" id="genderL" name="Gender" value="L" required>
                <label for="genderL">Laki-Laki</label>
            </div>
            
            <label for="Saran">Saran:</label>
            <textarea id="Saran" name="Saran"></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="copyright">
        &copy; 2024 Rifcha Sya'bani Fatullah - T3G
    </div>
</body>
</html>
