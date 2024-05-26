<?php
$servername = "localhost";
$username = "root";
$password = "Theertha";
$dbname = "web_2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
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
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['name']) && isset($_GET['db']) && isset($_GET['cn']) && isset($_GET['cd']) && isset($_GET['ai']) && isset($_GET['cp']) && isset($_GET['oe']) && isset($_GET['dbl']) && isset($_GET['cnl'])) {
        $name= htmlspecialchars($_GET['name']);
        $db = htmlspecialchars($_GET['db']);
        $cn = htmlspecialchars($_GET['cn']);
        $cd = htmlspecialchars($_GET['cd']);
        $ai = htmlspecialchars($_GET['ai']);
        $cp = htmlspecialchars($_GET['cp']);
        $oe = htmlspecialchars($_GET['oe']);
        $dbl = htmlspecialchars($_GET['dbl']);
        $cnl = htmlspecialchars($_GET['cnl']);

        $dbPoint = gradeToPoint($db,4.0);
        $cnPoint = gradeToPoint($cn,4.0);
        $cdPoint = gradeToPoint($cd,4.0);
        $aiPoint = gradeToPoint($ai,4.0);
        $cpPoint = gradeToPoint($cp,3.0);
        $oePoint = gradeToPoint($oe,3.0);
        $dblPoint = gradeToPoint($dbl,1.5);
        $cnlPoint = gradeToPoint($cnl,1.5);

        $gpa = ($dbPoint + $cnPoint + $cdPoint + $aiPoint + $cpPoint + $oePoint + $dblPoint + $cnlPoint) / 25;

        $stmt = $conn->prepare("INSERT INTO student (name,dbms,cn,cd,ai,cp,oe,dbl,cnl,gpa) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssd", $name, $db, $cn, $cd, $ai, $cp, $oe, $dbl, $cnl,$gpa);
        $stmt->execute();
        echo "<script type=text/javascript>alert('Insertion Complete')</script>";
        exit();
        $stmt->close();
    } else {
        echo "Please provide all the required parameters.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
