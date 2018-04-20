<?php

include("config/db.php");
include("cmd/exec.php");

$db = new Database();
$str_conn = $db->getConnection();
$str_exe = new ExecSQL($str_conn);
$action= $_GET['cmd'];

if($action =="login") { 

$str_username = $_GET ['username'];
$str_email =$_GET ['email'];
$str_password = $_GET ['password'];
$str_add = " WHERE email = '$str_email' AND password = '$str_password'";


$num_row =  $str_exe->rowCount("tb_user"," WHERE email='$str_email' AND password = '$str_password'");
$stmt =    $str_exe->readOne("tb_user",$str_add);


if($num_row >0)
{
    $data_arr['rs'] = array();
    $status['Login_ok'] = array();
        foreach($stmt as $row ){
            $item = array(
                'username'=>$row['username'],
                'email'=>$row['email'],
            );
            $item1 =array(
            
            );
            array_push($data_arr['rs'],$status,$item);
       
            echo json_encode($data_arr);
        }


}else{

    echo "No";
}

} else {

}

?>