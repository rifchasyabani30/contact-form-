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
