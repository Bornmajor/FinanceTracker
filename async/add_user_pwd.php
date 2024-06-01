<?php
include('functions.php');

$mail= $_POST['mail'];
$username = $_POST['username'];

$mail = escapeString($mail);
$username = escapeString($username);



$query = "SELECT mail FROM finance_tracker_users WHERE mail = '$mail'";
$select_user = mysqli_query($connection,$query);
checkQuery($select_user);
if(mysqli_num_rows($select_user) !== 0){
    failMsg('It seems your account already exist'.'<a href="#" class="alert-link"> login instead</a>');

}

?>
<form action="" method="post" class="add_user_pwd">

<input type="hidden" name="mail" value="<?php echo $mail ?>">
<input type="hidden" name="username" value="<?php echo $username ?>">

<div class="form-floating mb-3">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd" required>
  <label for="floatingPassword">Password</label>
</div>

<div class="mb-3">
    <button class="btn btn-secondary w-100" type="submit">Proceed</button>
</div>

</form>

<script>
       $('.user-stp').addClass('completed');
     $('.key-stp .step-counter').addClass('active');

     $('.add_user_pwd').submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post('async/add_user_data.php',postData,function(data){
            $('.feedback').html(data);
        })
 


     })
</script>
