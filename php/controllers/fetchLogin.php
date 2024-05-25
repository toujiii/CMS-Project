<?php
session_start();
require "../controllers/funtions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $emailKey = array_keys($_POST, $_POST['email'])[0];
    $passwordKey = array_keys($_POST, $_POST['password'])[0];

    $data = mysqli_fetch_assoc(selectRecords($connection, '*', 'login', $emailKey, $_POST['email']));

    $response = false;
    if ($data && password_verify($_POST['password'], $data['password'])) {
        // Password is correct
        $response = true;
        $_SESSION['Admin'] = true;
    }

    if (!$response) {
        echo json_encode("*Invalid Email or Password");
    }
} 
