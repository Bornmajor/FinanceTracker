<?php include("includes/header.php"); ?>
<?php
//prevent access if already login in
if(isset($_SESSION['usr_id'])){
  header("location: ?page=home&login=true");
  }
?>
<title>FinanceTraker | Registration</title>
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

<div class="mb-3">

<div class="stepper-wrapper">
      <div class="env-stp stepper-item">
        <div class="step-counter active"><i class="fas fa-envelope"></i></div>
        <!-- <div class="step-name">First</div> -->
      </div>

      <div class="user-stp stepper-item">
        <div class="step-counter"><i class="fas fa-user"></i></div>
      </div>
      <div class="key-stp stepper-item  ">
        <div class="step-counter"><i class="fas fa-key"></i></div>
     
      </div>
    </div>

</div>


<div class="feedback"><!--feedback-->

<form action="" class="add_email_form" method="post">

<h5 class="mb-3">Registration form</h5>

<div class="form-floating mb-3">
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="mail" required>
    <label for="floatingInput">Email address</label>
</div>

<div class="mb-3">
    <button class="btn btn-secondary w-100" type="submit">Proceed</button>
</div>

</form>

</div><!--feedback-->

<!-- <div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput">Email address</label>
</div>
<div class="form-floating mb-3">
  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
  <label for="floatingPassword">Password</label>
</div>
 -->







<div class="mb-3 color-form-inputs">
    Already have an account ? <a href="?page=login" class="form-alternative-link" >Login instead</a>
</div>

</div>


</div>

</div>
<script>
   $('document').ready(function(){

  $('.add_email_form').submit(function(e){
      e.preventDefault();

      let postData = $(this).serialize();

      $.post('async/add_user_mail.php',postData,function(data){
             $('.feedback').html(data);
        })
       

    })


   })
 
</script>

<?php include('includes/footer.php') ?>