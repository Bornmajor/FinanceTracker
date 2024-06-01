<?php include("includes/header.php"); 

?>

<title>FinanceTraker | Help Center</title>
</head>
<body>
<?php include('includes/navbar.php'); ?>

<div class="main-container-auth">

<div class="container-illustration-form">
    <div class="illustration-auth">
        <img src="assets/support_team.jpeg"  alt="">
    </div>

<div class="container-form-content">

<div class="mb-3 form-app-logo">

<img src="assets/logo-trimmed.png"  width="80px" alt="logo">

<span class="logo-title">
    Finance<span class="text-primary-color">Tracker</span>
</span>


</div>

<form action="" method="post" class="send_mail_form">

<h5 class="mb-3 contact_form_title">Contact form</h5>

<div class="feedback_contact_form">


<div class="form-floating mb-3">
  <input type="email" class="form-control" id="floatingInput" name="mail" placeholder="name@example.com" required>
  <label for="floatingInput">Email address</label>
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" name="subject" placeholder="subject" required>
  <label for="floatingInput">Subject</label>
</div>

<div class="form-floating">
  <textarea class="form-control" placeholder="Your message" id="floatingTextarea" name="message" required style="height: 120px;resize:none;"></textarea>
  <label for="floatingTextarea">Message</label>
</div>





<div class="my-3">
    <button class="btn btn-secondary w-100 form-submit-btn">Send message</button>
</div>

</div>

</form>



</div>


</div>

</div>

<script>
    $(".send_mail_form").submit(function(e){
        e.preventDefault();

        
        let postData = $(this).serialize();

        $.post('async/send_contact_form_mail.php',postData,function(data){
            $('.feedback_contact_form').html(data);
            $(".send_mail_form")[0].reset();
        })
 


    })
</script>

<?php include('includes/footer.php') ?>