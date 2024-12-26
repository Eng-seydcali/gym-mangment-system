<?php
include "../conn/functions.php";
if(isset($_POST['action']) && $_POST['action']=='insertToMothersAndGuardians'){
    // getdata($_POST['table'],$_POST['id']);
    if($_POST['name'] != "" && $_POST['phone'] != ""){
        if($_POST['table'] == "classes"){
            $data = array(
                "name"=>$_POST['name'],
                "description"=>$_POST['phone']
            );
            $sucsess = insert($data,$_POST['table']);
            if($sucsess){
                echo json_encode(readAll("*",$_POST['table']));
            };
        }elseif($_POST['table'] == "village"){
            $data = array(
                "name"=>$_POST['name']
            );
            $sucsess = insert($data,$_POST['table']);
            if($sucsess){
                echo json_encode(readAll("*",$_POST['table']));
            };
        }else{
            $data = array(
                "name"=>$_POST['name'],
                "phone"=>$_POST['phone']
            );
            $sucsess = insert($data,$_POST['table']);
            if($sucsess){
                echo json_encode(readAll("*",$_POST['table']));
            };
        }
    }
    
}6

if(isset($_POST['action']) && $_POST['action'] == "old_checker"){
    echo json_encode(readAll($_POST['col'],$_POST['table']));
}

if(isset($_POST['action']) && $_POST['action'] == "getdata"){
    echo json_encode(readAllWhere("*",$_POST['table'],$_POST['id'],"id"));
}

if(isset($_POST['action']) && $_POST['action'] == "studentinfo"){
    echo json_encode(readAllWhere("*",$_POST['table'],$_POST['id'],"id"));
}


// deletion
if(isset($_POST['action']) && $_POST['action'] == "deletedata"){
    echo json_encode(delete($_POST['id'],$_POST['table'],$_POST['location']));
}

// get all 
if(isset($_POST['action']) && $_POST['action'] == "getalldata"){
    echo json_encode(readAll("*",$_POST['table']));
}

// is_exist 
if(isset($_POST['action']) && $_POST['action'] == "is_exist"){
    echo json_encode(readAllWhere("*",$_POST['table'],$_POST['name'],$_POST["col"]));
}
// reject
if(isset($_POST['action']) && $_POST['action'] == "up_status_rej"){
    echo json_encode(rejectionUpdate($_POST["id"],$_POST['table']));
}
// Approve
if(isset($_POST['action']) && $_POST['action'] == "up_status_app"){
    echo json_encode(approvedUpdate($_POST["id"],$_POST['table']));
}

// getdata_r_daily
if(isset($_POST['action']) && $_POST['action'] == "getdata_r_daily"){
    echo json_encode(readAllWhere("*",$_POST['table'],$_POST['date'],"date"));
}

// countTable
if(isset($_POST['action']) && $_POST['action'] == "countTable"){
    echo json_encode(countTable($_POST["table"],$_POST["col"],$_POST["op"]));
}
?>
