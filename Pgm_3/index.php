<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "Theertha";
$dbname = "web_2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, dbms, cn, cd, ai, cp, oe, dbl, cnl, gpa FROM student";
$result = $conn->query($sql);

$table_html = "<h1>Student Details from Database</h1>";
$table_html .= "<table>";
$table_html .= "<tr><th>Name</th><th>DBMS</th><th>Computer Networks</th><th>Compiler Design</th><th>Artificial Intelligence</th><th>Cryptography</th><th>Open Elective</th><th>DBMS Lab</th><th>CN Lab</th><th>GPA</th></tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $table_html .= "<tr>";
        $table_html .= "<td>" . htmlspecialchars($row["name"]) . "</td>";
        $table_html .= "<td>" . htmlspecialchars($row["dbms"]) . "</td>";
        $table_html .= "<td>" . htmlspecialchars($row["cn"]) . "</td>";
        $table_html .= "<td>" . htmlspecialchars($row["cd"]) . "</td>";
        $table_html .= "<td>" . htmlspecialchars($row["ai"]) . "</td>";
        $table_html .= "<td>" . htmlspecialchars($row["cp"]) . "</td>";
        $table_html .= "<td>" . htmlspecialchars($row["oe"]) . "</td>";
        $table_html .= "<td>" . htmlspecialchars($row["dbl"]) . "</td>";
        $table_html .= "<td>" . htmlspecialchars($row["cnl"]) . "</td>";
        $table_html .= "<td>" . htmlspecialchars($row["gpa"]) . "</td>";
        $table_html .= "</tr>";
    }
}

$table_html .= "</table>";
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grades Form</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            width: 80%;
            max-width: 1000px;
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333333;
            margin-bottom: 1.5rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #dddddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 1rem;
            }
            th, td {
                padding: 8px 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task 3</h1>
        <div id="res"></div>
    </div>

    <script>
        document.getElementById('res').innerHTML = `<?php echo $table_html; ?>`;
    </script>
</body>
</html>
