<?php 
    require "connection.php";
    
    function insertRecords($connection,$tbl,$att,$data){
        $placeholders = implode(",", array_fill(0, count($data), "?"));
        
        $sql = "INSERT INTO $tbl (". implode(",", $att) .") VALUES ($placeholders)";
        $stmt = mysqli_prepare($connection, $sql);
    
        if ($stmt) {
            $types = str_repeat('s', count($data)); 

            mysqli_stmt_bind_param($stmt, $types, ...$data);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
    
            return true; 
        } else {
            return false; 
        }
    }

    function updateRecords($connection,$tbl,$column,$data,$id){
        if(is_string($column)){
            $placeholders = "$column = ?";
        }
        else{
            $placeholders = implode(', ', array_map(function($column) { return "$column = ?"; }, $column));
        }

        $sql = "UPDATE $tbl SET $placeholders WHERE blogID = $id";
        $stmt = mysqli_prepare($connection, $sql);
        
        if ($stmt) {
            if(count($data) == 1 && is_numeric($data[0])){
                $types = 'i';
            }
            else {
                $types = str_repeat('s', count($data));
            }
            mysqli_stmt_bind_param($stmt, $types , ...$data);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
        else {
            return false; 
        }
    }

    function deleteRecords($connection, $tbl, $conditions = []) {
        $sql = "DELETE FROM $tbl";
        if (!empty($conditions)) {
            $sql .= " WHERE ";
            $conditionStrings = [];
            $params = [];
            $types = '';
    
            foreach ($conditions as $column => $value) {
                $conditionStrings[] = "$column = ?";
                $params[] = $value;
                $types .= is_numeric($value) ? 'i' : 's';
            }
            if(count($conditions) > 0){
                $sql .= implode(' AND ', $conditionStrings);
            }
            else {
                $sql .= $conditionStrings;
            }
            
        }
        $stmt = mysqli_prepare($connection, $sql);
    
        if ($stmt) {
            if (!empty($conditions)) {
                mysqli_stmt_bind_param($stmt, $types, ...$params);
            }
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
    
            return true;
        } else {
            return false;
        }
    }
    
    

    function selectRecords($connection, $column, $tbl, $whereColumn = null, $whereValue = null, $order = null, $limit = null) {
        $sql = "SELECT $column FROM $tbl";
        if($order){
            $sql .= " ORDER BY $order";
        }
        if ($whereColumn && $whereValue) {
            $sql .= " WHERE $whereColumn = ?";
        }
        if($limit){
            $sql.= " LIMIT $limit";
        }
        $stmt = mysqli_prepare($connection, $sql);
        if ($stmt) {
            if ($whereColumn && $whereValue) {
                mysqli_stmt_bind_param($stmt, 's', $whereValue);
            }
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $result;
        } else {
            return false;
        }
    }

    function settingCookie(){
        $uniqueId = uniqid();

        if(!isset($_COOKIE['device_id'])) {
            setcookie('device_id', $uniqueId, time() + (365 * 24 * 60 * 60), '/');
            header("Location: ../Index.php");
        }
    }

    function getTotalLikes($connection, $blogID){
        $user_likes = mysqli_fetch_assoc(selectRecords($connection, "COUNT(*) as total", "likes", 'blogID', $blogID));
        return $user_likes['total'];
    }
    function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
    
        if (!is_dir($dir)) {
            return unlink($dir);
        }
    
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
    
            if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }
    
        return rmdir($dir);
    }
?>
