<?php
include("config/db.php");
include("cmd/exec.php");

$db = new Database();
$str_conn = $db->getConnection();
$str_exe = new ExecSQL($str_conn);
$action= $_GET['cmd'];
switch($action){
    case 'select' :
    $stmt = $str_exe->readAll("tb_user");
    $num_row = $str_exe->rowCount("tb_user");
    echo json_encode($num_row);

    if($num_row>0){
        $data_arr['rs'] = array();
        foreach($stmt as $row ){
            $item = array(
                'firstname'=>$row['firstname'],
                'lastname'=> $row['lastname'],
                'username'=> $row['username'],
                'password'=> $row['password']

            );
            array_push($data_arr['rs'],$item);
            echo json_encode($data_arr);
        }
    }else{
        echo json_encode(array('msg'=>'Result not fount'));
    }
    break;
    
    case 'read' :
    $str_user_id = $_GET['user_id'];
    $stmt = $str_exe->readOne("tb_user"," where user_id = ".$str_user_id);
    $data_arr['rs'] = array();
        foreach($stmt as $row ){
            $item = array(
                'firstname'=>$row['firstname'],
                'lastname'=> $row['lastname']

            );
            array_push($data_arr['rs'], $item);
            echo json_encode($data_arr);
    }
    
    break;
}


?>