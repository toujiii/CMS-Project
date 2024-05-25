<?php
session_start();

$_SESSION['create_status'] = 'creating';
echo json_encode(['message' => 'Session accessed successfully']);
?>