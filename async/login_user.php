<?php
include('functions.php');


$mail= $_POST['mail'];
$pwd = $_POST['pwd'];

$mail = escapeString($mail);
$pwd = escapeString($pwd);

//check if pwd and mail are not empty
if(!empty($mail) || !empty($pwd)){
$query = "SELECT * FROM finance_tracker_users WHERE mail = '$mail'";
$select_user = mysqli_query($connection,$query);
checkQuery($select_user);

if(mysqli_num_rows($select_user) == 0){
failMsg('You do not have an account'.'<a href="?page=registration" class="alert-link"> register instead</a>');

}else{
    while($row = mysqli_fetch_assoc($select_user)){
    $db_pwd =  $row['pwd'];

   
    }
 

       

        //assign session variable
    if(password_verify($pwd,$db_pwd)){
       
     setSession($mail);
     successMsg("Login successfully!!Redirecting");
      //redirecting after 2seconds
        echo "<script type='text/javascript'>
        window.setTimeout(function() {
            window.location = '?page=dashboard';
        }, 2000);
        </script>";

    }else{
        failMsg("Authentication failed check your credentials!!");
    }

    
}

}




?>