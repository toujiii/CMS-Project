<?php
session_start();

$_SESSION['edit_status'] = 'editing';
echo json_encode(['message' => 'Session accessed successfully']);
?>