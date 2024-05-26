<?php
session_start();

header('Content-Type: application/json');

echo json_encode([
    'gpa' => isset($_SESSION['gpa']) ? $_SESSION['gpa'] : ''
    // 'db' => isset($_SESSION['db']) ? $_SESSION['db'] : '',
    // 'cn' => isset($_SESSION['cn']) ? $_SESSION['cn'] : '',
    // 'cd' => isset($_SESSION['cd']) ? $_SESSION['cd'] : '',
    // 'ai' => isset($_SESSION['ai']) ? $_SESSION['ai'] : '',
    // 'cp' => isset($_SESSION['cp']) ? $_SESSION['cp'] : '',
    // 'oe' => isset($_SESSION['oe']) ? $_SESSION['oe'] : '',
    // 'dbl' => isset($_SESSION['dbl']) ? $_SESSION['dbl'] : '',
    // 'cnl' => isset($_SESSION['cnl']) ? $_SESSION['cnl'] : ''
]);
?>