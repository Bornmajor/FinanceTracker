<nav class="navbar sticky-top navbar-expand-lg" style="" >
  <div  class="container-fluid">

<a class="navbar-brand" href="?page=home">
<img src="assets/logo-trimmed.png"  width="80px" alt="logo">

<span class="logo-title">
    Finance<span class="text-primary-color">Tracker</span>
</span>

</a>




<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>



<div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
<ul  class="navbar-nav me-5  mb-2 mb-lg-0">



 



<li class="nav-item">
  <a class="nav-link register" href="?page=education">E-learning</a>
</li>

<li class="nav-item">
  <a class="nav-link register" href="?page=help_center">Help Center</a>
</li>

<?php
if(isset($_SESSION['usr_id'])){
//if session usr_id is set (usr logging in);

?>
 <!-- #display when logged in -->
 <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false" >
        <?php echo $_SESSION['mail']; ?>
      </a>
      <ul class="dropdown-menu">
        
        <li><a class="dropdown-item"   data-bs-toggle="modal" data-bs-target="#profileModal"> Profile</a></li>
        <li><a class="dropdown-item" href="?page=dashboard"> Dashboard</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="?page=logout"> Logout</a></li>
      
      </ul>
</li>


  <!-- #display when logged in -->
<?php

}else{
  //usr not logging in
?>
 <!-- #display when not logged in -->
<li class="nav-item">
  <a class="nav-link login"  href='?page=login'>Login</a>
</li>
<a href="?page=registration"  class="btn btn-primary mx-2" id="cta-navbar">REGISTER NOW</a>
  <!-- #display when not logged in -->


<?php


}
?>









      
</ul>


    </div>

  </div>
</nav>


 <!-- #profile modal-->

<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="" method="post" class="update_user_data_form">
        <?php
        if(isset($_SESSION['usr_id'])){
          $sess_usr_id = $_SESSION['usr_id'];

        $query = "SELECT * FROM finance_tracker_users WHERE usr_id = $sess_usr_id";
        $select_user_data = mysqli_query($connection,$query);
        checkQuery($select_user_data);
        while($row = mysqli_fetch_assoc($select_user_data)){
        $mail = $row['mail'];
        $username = $row['username'];

        }  
        }
        
        ?>
      
      <div class="update_profile_feed"></div>
 
     <div class="form-floating mb-3">
      <input type="text" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com" value="<?php echo $username; ?>">
      <label for="floatingEmptyPlaintextInput">Name(readonly)</label>
    </div>
     <div class="form-floating mb-3">
      <input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com" value="<?php echo $mail; ?>">
      <label for="floatingEmptyPlaintextInput">email(readonly)</label>
    </div>


    <div class="form-floating my-3">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Current password" name="current_pwd" required>
    <label for="floatingPassword">Current password</label>
    </div>

    <div class="form-floating mb-3">
    <input type="password" class="form-control" id="floatingPassword" placeholder="New password" name="new_pwd" required>
    <label for="floatingPassword">New password</label>
    </div>

<button class="btn btn-primary" type="submit">Update password</button>
</form>

        
      </div>
      <div class="modal-footer">
   
      </div>
    </div>
  </div>
</div>




<script>
  $(".update_user_data_form").submit(function(e){
    e.preventDefault();

    let postData = $(this).serialize();

    $.post("async/update_user_pwd.php",postData,function(data){
      $(".update_profile_feed").html(data);
    });

  })
</script>