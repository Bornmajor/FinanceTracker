<?php include("includes/header.php"); ?>
<?php
//prevent access if already login in

if(isset($_SESSION['usr_id'])){
header("location: ?page=home&login=true");
}

?>
<title>FinanceTraker | Login</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>

<div class="main-container-auth">

<div class="container-illustration-form">
    <div class="illustration-auth">
        <img src="assets/couples_onphone.jpg" alt="">
    </div>

<div class="container-form-content">

<div class="mb-3 form-app-logo">

<img src="assets/logo-trimmed.png"  width="80px" alt="logo">

<span class="logo-title">
    Finance<span class="text-primary-color">Tracker</span>
</span>



</div>

<form action="" method="post" class="login_user">

<h5 class="mb-3">Login form</h5>

<div class="feedback">

<div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" name="mail" placeholder="name@example.com" required>
  <label for="floatingInput">Email address</label>
</div>
<div class="form-floating mb-3">
  <input type="password" class="form-control" id="floatingPassword" name="pwd" placeholder="Password" required>
  <label for="floatingPassword">Password</label>
</div>


<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label color-form-inputs" for="exampleCheck1" id="rememberMe">Remember me</label>
</div>

<div class="mb-3 color-form-inputs">
    Need an account ? <a href="?page=registration" class="form-alternative-link" >Register instead</a>
</div>

<div class="mb-3 ">
    <button class="btn btn-secondary w-100 form-submit-btn">Login</button>
</div>

</div>

</form>



</div>


</div>

</div>

<script>
    $(".login_user").submit(function(e){
        e.preventDefault();

        
        let postData = $(this).serialize();

        $.post('async/login_user.php',postData,function(data){
            $('.feedback').html(data);
        })
 


    })
</script>
<?php include('includes/footer.php') ?>