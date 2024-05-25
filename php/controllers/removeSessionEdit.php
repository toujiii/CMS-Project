<?php
session_start();

$_SESSION['edit_status'] = 'edited';

echo json_encode(['message' => 'Session accessed successfully']);
?>