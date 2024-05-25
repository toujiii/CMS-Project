<?php
session_start();

$_SESSION['create_status'] = 'created';

echo json_encode(['message' => 'Session accessed successfully']);
?>