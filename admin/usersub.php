<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Submissions</title>
    <style>
        /* General*/
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff9a9e, #fad0c4, #fbc2eb, #a18cd1, #cfd9df);
            margin: 0;
            padding: 0;
        }

        /* Container*/
        .container {
            background: #fff;
            border-radius: 25px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        /* Title  */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #a18cd1;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #fbc2eb;
        }

        /* Copyright*/
        .copyright {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 12px;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>DATA MAHASISWA VOKASI</h2>
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Kelas</th>
                        <th>Gender</th>
                        <th>Saran</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Nama']); ?></td>
                            <td><?php echo htmlspecialchars($row['Nim']); ?></td>
                            <td><?php echo htmlspecialchars($row['Email']); ?></td>
                            <td><?php echo htmlspecialchars($row['Kelas']); ?></td>
                            <td><?php echo htmlspecialchars($row['Gender']); ?></td>
                            <td><?php echo htmlspecialchars($row['Saran']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No submissions found.</p>
        <?php endif; ?>
        <?php $conn->close(); ?>
    </div>
    <div class="copyright">
        &copy; 2024 Rifcha Sya'bani Fatullah - T3G
    </div>
</body>
</html>
