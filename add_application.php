<?php include 'db.php'; ?>
<?php include 'header_nav.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Job Application</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Add New Job Application</h1>
    <form method="POST" action="add_application.php">
        <input type="text" name="job_title" placeholder="Job Title" required><br>
        <input type="text" name="company" placeholder="Company Name" required><br>
        <input type="date" name="application_date"><br>
        <input type="text" name="status" placeholder="Status" required><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "INSERT INTO applications (job_title, company, application_date, status)
                VALUES (?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_POST['job_title'],
            $_POST['company'],
            $_POST['application_date'],
            $_POST['status']
        ]);

        echo "<p>Application added!</p>";
    }
    ?>
</body>
</html>