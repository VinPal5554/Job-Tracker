<?php include 'db.php'; ?>
<?php include 'header_nav.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Job Application</title>
    <link rel="stylesheet" href="css/styles.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }
        h1 {
            font-size: 2.5em;
        }
        a.button {
            display: inline-block;
            padding: 12px 24px;
            margin: 10px;
            font-size: 1.1em;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            border-radius: 6px;
        }
        a.button:hover {
            background-color: #0056b3;
        }
        form {
        display: inline-block;       /* Keeps it in the center despite text-align: center */
        text-align: left;            /* Align labels and inputs inside the form */
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

        label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        }

        input, select {
        width: 100%;
        padding: 8px;
        margin-top: 4px;
        margin-bottom: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

        input[type="submit"] {
        background-color: #007BFF;
        color: white;
        cursor: pointer;
        font-size: 1em;
        border: none;
        transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
        background-color: #0056b3;
        }
        
    </style>
        
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