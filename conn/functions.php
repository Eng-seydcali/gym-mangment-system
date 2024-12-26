<?php
include "db.php";
function readAll($cols,$table){
    global $db;
    $query = "select $cols from $table";
    return $db-> query($query)->fetchAll(PDO::FETCH_OBJ);
}

function readAllWhere($cols,$table,$id,$col){
    global $db;
    $query = "select $cols from $table where $col = '$id'";
    return $db-> query($query)->fetchAll(PDO::FETCH_OBJ);
}

// reeadallwhere and 
function readAllWhereAnd($cols,$table,$id,$col,$col2,$id2){
    global $db;
    $query = "select $cols from $table where $col = '$id' and $col2 = $id";
    return $db-> query($query)->fetchAll(PDO::FETCH_OBJ);
}


function statusGen($num,$p1,$p2,$p3){
    if($p3 != ""){
        if($num == "0"){
            return $p1;
        }elseif($num == "1"){
            return $p2;
        }else{
            return $p3;
        }
    }else{
        return ($num == "0") ? $p1 : $p2;
    }
   
}

function imageUploader($IMG){

    // print_r($IMG['name']);

    if($IMG['name'] != ""){
    // $file = $_FILES['file'];
    $fileName = $IMG['name'];
    $fileLocation = $IMG['tmp_name'];
    // $fileError = $IMG['error'];
    // $fileSize = $IMG['size'];
    // $fileType = $IMG['type'];

    $destination = "Uploads/".$fileName;

    move_uploaded_file($fileLocation,$destination);
    // array_push($_SESSION['images'],$fileName);
    return $IMG['name'];
    }
}

// insert function

function insert($data,$table){
    global $db;
    $columns = implode(",", array_keys($data));
    $value = ":" . implode(",:",array_keys($data));

    try {
        $query = $db->prepare("INSERT INTO $table ($columns) VALUES ($value)");
        $query->execute($data);
        return $query ? true : false;
    }catch(PDOException $e){
        return false;
    }

}


// update function 

function update($data,$table){
    global $db;
    $pairs = array();
    foreach($data as $key=>$value){
        $pairs[] = $key . "= :" . $key;
    }
    
    $keyValue = implode(",",$pairs);
    try{
        $query = $db->prepare("UPDATE $table SET $keyValue WHERE id = :id");
        $res = $query->execute($data);
        return $query ? true : false;
    }catch(PDOException $e){
        return false;
    }
    // return $keyValue;
    
}

// update business Status 

function rejectionUpdate($id,$table){
    global $db;
    try{
        $Data = " UPDATE $table SET status = '0' WHERE id = $id";
        $sql= $db->Query($Data);
        return $sql ? true :false;
    }catch(PDOException $e){
        return false;
    }
    
}
// update business Status 

function approvedUpdate($id,$table){
    global $db;
    try{
        $Data = " UPDATE $table SET status = '1' WHERE id = $id";
        $sql= $db->Query($Data);
        return $sql ? true :false;
    }catch(PDOException $e){
        return false;
    }
    
}

//delete function

function delete($id,$table,$location){
    global $db;
    try {
        $Data = " DELETE FROM $table WHERE Id = $id ";
        $sql= $db->Query($Data);
        return $sql ? true :false;
        
    } catch(PDOException $ex) {
        return false;
    }
    header("location: $location");
}



function messages($message){
    foreach($message as $m){
        $pair = explode(",",$m);
        echo "<li class='messagesUP list-group-item border ".$pair[1] ." text-white p-2 px-3 d-flex justify-content-between  '>
        <div>" . $pair[0] . "</div>
        <i class='text-light'>X</i>
    </li>";
    }
}


function countTable($table,$col,$op){
    global $db;
    $query = "SELECT $op($col) as Tc FROM $table ";
    return $db-> query($query)->fetchAll(PDO::FETCH_OBJ);
}

// count Table where
function countTableWhere($table,$col,$id){
    global $db;
    $query = "SELECT COUNT(id) as Tc FROM $table where $col = $id";
    return $db-> query($query)->fetchAll(PDO::FETCH_OBJ);
}



// Get Top
function Get_top(){
    global $db;
    $query = "SELECT c.name,c.id, COUNT(b.id) AS business_count FROM cities c LEFT JOIN business_registrations b ON c.id = b.city_id GROUP BY c.name ORDER BY business_count DESC limit 5;";
    return $db-> query($query)->fetchAll(PDO::FETCH_OBJ);
}

// function id generation

function lastid($table){
    global $db;
    $query = "select id from $table order by id desc limit 1";
    return $db-> query($query)->fetchAll(PDO::FETCH_OBJ);
}

function idgen($prefix,$table){
    $last = lastid($table);
    if($last == null){
        return $prefix."001";
    }else{
        if($last[0]->id <= 9){
            return $prefix."00".$last[0]->id+1;
        }elseif($last[0]->id <= 99){
            return $prefix."0".$last[0]->id+1;
        }else{
            return $prefix.$last[0]->id+1;
        }
    }
}

// daily report

function d_report(){
    global $db;
    $query = "SELECT 
    DateList.Date,
    IFNULL(SUM(Payment.Amount), 0) AS TotalAmount
    FROM 
        (SELECT CURDATE() - INTERVAL 4 DAY AS Date
        UNION ALL SELECT CURDATE() - INTERVAL 3 DAY
        UNION ALL SELECT CURDATE() - INTERVAL 2 DAY
        UNION ALL SELECT CURDATE() - INTERVAL 1 DAY
        UNION ALL SELECT CURDATE()) AS DateList
    LEFT JOIN 
        Payment ON DATE(Payment.date) = DateList.Date
    GROUP BY 
        DateList.Date
    ORDER BY 
        DateList.Date;";
    return $db-> query($query)->fetchAll(PDO::FETCH_OBJ);
}

// Weekly report

function m_report(){
    global $db;
    $query = "SELECT 
    MonthList.Month,
    IFNULL(SUM(P.Amount), 0) AS TotalAmount
    FROM 
        (SELECT DATE_FORMAT(CURDATE() - INTERVAL i MONTH, '%Y-%m') AS Month
        FROM (SELECT 0 AS i UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4) AS Months) AS MonthList
    LEFT JOIN 
        Payment P ON DATE_FORMAT(P.date, '%Y-%m') = MonthList.Month
    GROUP BY 
        MonthList.Month
    ORDER BY 
        MonthList.Month DESC;";
    return $db-> query($query)->fetchAll(PDO::FETCH_OBJ);
}

