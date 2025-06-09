<?php include 'db.php'; ?>
<?php include 'header_nav.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Applications</title>

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
        table {
        margin: 0 auto; /* Centers the table horizontally */
        border-collapse: collapse; /* neater borders */
        }

        table th, table td {
        padding: 10px;
        }
        
    </style>
</head>
<body>
    <h1>Job Applications</h1>

    <?php
    // Handle deletion if triggered via GET
    if (isset($_GET['delete_id'])) {
        $delete_id = intval($_GET['delete_id']);
        $stmt = $pdo->prepare("DELETE FROM applications WHERE id = ?");
        $stmt->execute([$delete_id]);
        echo "<p style='color: green;'>Application deleted successfully.</p>";
    }
    ?>

    <table border="1">
        <tr>
            <th>Job Title</th>
            <th>Company</th>
            <th>Status</th>
            <th>Applied On</th>
            <th>Action</th>
        </tr>

        <?php
        $stmt = $pdo->query("SELECT id, job_title, company, status, application_date FROM applications ORDER BY application_date DESC");
        foreach ($stmt as $row) {
            echo "<tr>
                    <td>{$row['job_title']}</td>
                    <td>{$row['company']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['application_date']}</td>
                    <td>
                        <a href='view_applications.php?delete_id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this application?');\">Delete</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>