<?php include 'db.php'; ?>
<?php include 'header_nav.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Applications</title>
</head>
<body>
    <h1>Job Applications</h1>
    <table border="1">
        <tr>
            <th>Job Title</th>
            <th>Company</th>
            <th>Status</th>
            <th>Applied On</th>
        </tr>

        <?php
        $stmt = $pdo->query("SELECT job_title, company, status, application_date FROM applications ORDER BY application_date DESC");
        foreach ($stmt as $row) {
            echo "<tr>
                    <td>{$row['job_title']}</td>
                    <td>{$row['company']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['application_date']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>