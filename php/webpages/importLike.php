<?php
require "../controllers/funtions.php";

if(isset($_POST['id'])) {
    $receivedValue = $_POST['id'];
    $inputFieldNames = array('deviceID','blogID');
    $data = array($_COOKIE['device_id'],$receivedValue);

    insertRecords($connection, "likes", $inputFieldNames, $data);
} else {
    echo "Error: Value not received from client.";
}
?>
