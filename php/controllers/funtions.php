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

    

?>