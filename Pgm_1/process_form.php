<?php
session_start();

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
    // header("Location: output.php");
    // exit();

    $name=$_POST['name'];
    $db = $_POST['db'];
    $cn = $_POST['cn'];
    $cd = $_POST['cd'];
    $ai = $_POST['ai'];
    $cp = $_POST['cp'];
    $oe = $_POST['oe'];
    $dbl = $_POST['dbl'];
    $cnl = $_POST['cnl'];

    echo '<div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100vh; font-family: Arial, sans-serif; background-color: #336699; padding: 20px;">';

    $subjects = [
        "Name" => $name,
        "Database Management System" => $db,
        "Computer Networks" => $cn,
        "Compiler Design" => $cd,
        "Artificial Intelligence" => $ai,
        "Cryptography" => $cp,
        "Open Elective" => $oe,
        "Database Management System Lab" => $dbl,
        "Computer Networks Lab" => $cnl
    ];
    
    foreach ($subjects as $subject => $value) {
        echo "<div style='margin: 10px 0; font-size: 18px; color: #333; background-color: #e0f7fa; padding: 10px 20px; border-radius: 5px; width: 100%; max-width: 500px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);'>";
        echo "<p style='margin: 0;'>$subject: $value</p>";
        echo "</div>";
    }
    
    echo '</div>';
    

    
} else {
    echo "Invalid request method.";
}
?>