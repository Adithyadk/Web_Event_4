<?php
session_start();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['name'] = htmlspecialchars($_POST['name']);
    $_SESSION['db'] = htmlspecialchars($_POST['db']);
    $_SESSION['cn'] = htmlspecialchars($_POST['cn']);
    $_SESSION['cd'] = htmlspecialchars($_POST['cd']);
    $_SESSION['ai'] = htmlspecialchars($_POST['ai']);
    $_SESSION['cp'] = htmlspecialchars($_POST['cp']);
    $_SESSION['oe'] = htmlspecialchars($_POST['oe']);
    $_SESSION['dbl'] = htmlspecialchars($_POST['dbl']);
    $_SESSION['cnl'] = htmlspecialchars($_POST['cnl']);

    $name=$_POST['name'];
    $db = $_POST['db'];
    $cn = $_POST['cn'];
    $cd = $_POST['cd'];
    $ai = $_POST['ai'];
    $cp = $_POST['cp'];
    $oe = $_POST['oe'];
    $dbl = $_POST['dbl'];
    $cnl = $_POST['cnl'];

    

    $dbPoint = gradeToPoint($db,4.0);
    $cnPoint = gradeToPoint($cn,4.0);
    $cdPoint = gradeToPoint($cd,4.0);
    $aiPoint = gradeToPoint($ai,4.0);
    $cpPoint = gradeToPoint($cp,3.0);
    $oePoint = gradeToPoint($oe,3.0);
    $dblPoint = gradeToPoint($dbl,1.5);
    $cnlPoint = gradeToPoint($cnl,1.5);

    $gpa= ($dbPoint + $cnPoint + $cdPoint + $aiPoint + $cpPoint + $oePoint + $dblPoint + $cnlPoint) / 25;

    $subjects = [
        "Name" => $name,
        "Database Management System" => $db,
        "Computer Networks" => $cn,
        "Compiler Design" => $cd,
        "Artificial Intelligence" => $ai,
        "Cryptography" => $cp,
        "Open Elective" => $oe,
        "Database Management System Lab" => $dbl,
        "Computer Networks Lab" => $cnl,
        "Total Cgpa" => $gpa
    ];
    
    echo "<div style='display: flex; flex-direction: column; align-items: center;'>";
foreach ($subjects as $subject => $value) {
    echo "<div style='margin: 10px 0; font-size: 18px; color: #333; background-color: #e0f7fa; padding: 10px 20px; border-radius: 5px; width: 100%; max-width: 500px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>";
    echo "<p style='margin: 0;'>$subject: $value</p>";
    echo "</div>";
}
echo "</div>";

    
    echo '</div>';

} else {
    echo "Invalid request method.";
}
?>