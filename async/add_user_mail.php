<?php
include('functions.php');

$mail= $_POST['mail'];
$mail = escapeString($mail);

$query = "SELECT mail FROM finance_tracker_users WHERE mail = '$mail'";
$select_user = mysqli_query($connection,$query);
checkQuery($select_user);
if(mysqli_num_rows($select_user) !== 0){
    failMsg('It seems your account already exist'.'<a href="?page=login" class="alert-link"> login instead</a>');

}

?>
<form action="" method="post" class="add_user_name">
<input type="hidden" name="mail" value="<?php echo $mail ?>">

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" placeholder="Official names" name="username"  required>
  <label for="floatingInput">Names</label>
</div>

<div class="mb-3">
    <button class="btn btn-secondary w-100" type="submit">Proceed</button>
</div>

</form>

<script>
     $('.env-stp').addClass('completed');

     $('.add_user_name').submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post('async/add_user_pwd.php',postData,function(data){
            $('.feedback').html(data);
        })
 


     })
</script>
