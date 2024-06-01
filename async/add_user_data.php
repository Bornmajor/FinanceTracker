<?php
include('functions.php');

$mail= $_POST['mail'];
$username = $_POST['username'];
$pwd = $_POST['pwd'];

$mail = escapeString($mail);
$username = escapeString($username);
$pwd = escapeString($pwd);




$query = "SELECT mail FROM finance_tracker_users WHERE mail = '$mail'";
$select_user = mysqli_query($connection,$query);
checkQuery($select_user);
if(mysqli_num_rows($select_user) !== 0){
    failMsg('It seems your account already exist'.'<a href="#" class="alert-link"> login instead</a>');

}else{
    //check if empty
    if(!empty($mail) || !empty($username) || !empty($pwd)){
    // password encryption
    $pwd = password_hash($pwd,PASSWORD_BCRYPT,array('cost' => 12));

    $query = "INSERT INTO finance_tracker_users(mail,username,pwd)VALUES('$mail','$username','$pwd')";
    $create_user_data = mysqli_query($connection,$query);
    checkQuery($create_user_data);
    
    if($create_user_data){
        successMsg('Account setup successfully');
         //redirecting
            echo "<script type='text/javascript'>
            window.setTimeout(function() {
                window.location = '?page=dashboard';
            }, 2000);
            </script>";

        successMsg('Redirecting.Logging in...');
        setSession($mail);
    }
    }
    
}

?>

<script>
       $('.key-stp').addClass('completed');
  

    //  $('.add_user_data').submit(function(e){
    //     e.preventDefault();

    //     let postData = $(this).serialize();

    //     $.post('async/add_user_pwd.php',postData,function(data){
    //         $('.feedback').html(data);
    //     })
 


    //  })
</script>
