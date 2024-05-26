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

function gradeToPoint($grade,$cred) {
    $grade = strtoupper($grade); 
    switch ($grade) {
        case 'S': return 10.0*$cred;
        case 'A': return 9.0*$cred;
        case 'B': return 8.0*$cred;
        case 'C': return 7.0*$cred;
        case 'D': return 6.0*$cred;
        case 'E': return 5.0*$cred;
        case 'F': return 0.0*$cred;
        default: return null;
    }
}

function saveStudentDataToFile($name, $db, $cn, $cd, $ai, $cp, $oe, $dbl, $cnl, $gpa) {
    $file = fopen("students.csv", "a");
    fputcsv($file, [$name, $db, $cn, $cd, $ai, $cp, $oe, $dbl, $cnl, $gpa]);
    fclose($file);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name= htmlspecialchars($_POST['name']);
    $db = htmlspecialchars($_POST['db']);
    $cn = htmlspecialchars($_POST['cn']);
    $cd = htmlspecialchars($_POST['cd']);
    $ai = htmlspecialchars($_POST['ai']);
    $cp = htmlspecialchars($_POST['cp']);
    $oe = htmlspecialchars($_POST['oe']);
    $dbl = htmlspecialchars($_POST['dbl']);
    $cnl = htmlspecialchars($_POST['cnl']);

    $dbPoint = gradeToPoint($db,4.0);
    $cnPoint = gradeToPoint($cn,4.0);
    $cdPoint = gradeToPoint($cd,4.0);
    $aiPoint = gradeToPoint($ai,4.0);
    $cpPoint = gradeToPoint($cp,3.0);
    $oePoint = gradeToPoint($oe,3.0);
    $dblPoint = gradeToPoint($dbl,1.5);
    $cnlPoint = gradeToPoint($cnl,1.5);

    $gpa = ($dbPoint + $cnPoint + $cdPoint + $aiPoint + $cpPoint + $oePoint + $dblPoint + $cnlPoint) / 25;
    saveStudentDataToFile($name, $db, $cn, $cd, $ai, $cp, $oe, $dbl, $cnl, $gpa);
    echo "<script type=text/javascript>alert('Uploaded to CSV file')</script>";
    exit();

} else {
    echo "Invalid request method.";
}

$conn->close();
?>
