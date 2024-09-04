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
