<?php
include('functions.php');

$sess_usr_id = $_SESSION['usr_id'];

$current_pwd = $_POST['current_pwd'];
$new_pwd  = $_POST['new_pwd'];

//check if current pwd matches
$query = "SELECT pwd FROM finance_tracker_users WHERE usr_id = $sess_usr_id";
$select_user_pwd = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($select_user_pwd)){
$db_pwd =  $row['pwd'];
}

if(password_verify($current_pwd,$db_pwd)){
//if pwd match

// password encryption
$new_pwd= password_hash($new_pwd,PASSWORD_BCRYPT,array('cost' => 12));

$query = "UPDATE finance_tracker_users SET pwd = '$new_pwd' WHERE usr_id = $sess_usr_id";
$update_pwd = mysqli_query($connection,$query);
checkQuery($update_pwd);
if($update_pwd){
successMsg("Password updated");
} 
}else{
failMsg("Authentication failed");
}




?>