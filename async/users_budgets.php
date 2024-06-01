<?php
include('functions.php');

$sess_usr_id = $_SESSION['usr_id'];

$query = "SELECT * FROM budgets WHERE usr_id = '$sess_usr_id' AND is_archived = 'no'";
$select_users_budgets = mysqli_query($connection,$query);
checkQuery($select_users_budgets);
if(mysqli_num_rows($select_users_budgets) !== 0){
while($row = mysqli_fetch_assoc(($select_users_budgets))){
$budget_id  = $row['budget_id'];
$budget_title = $row['budget_title'];
$amount_limit = $row['amount_limit'];
$date_created = $row['date_created'];
$interval_period = $row['interval_period'];
?>
<div class="accordion-item" budget-id="<?php echo $budget_id; ?>">
<h2 class="accordion-header">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $interval_period.$budget_id ?>" aria-expanded="true" aria-controls="collapseOne">

<span><?php echo $budget_title; ?> </span>  



</button>
</h2>
<div id="<?php echo $interval_period.$budget_id; ?>" budget-id="<?php echo $budget_id; ?>" class="accordion-collapse collapse "   data-bs-parent="#accordionExample">
<div class="accordion-body">
    <!-- #content -->

<div class="progress-circle-amount-date">


<div class="circle-progress-date-interval">

<div class="progress-circle 
<?php
if(expenseToBudgetRatio($budget_id) > 50){
  echo 'over50 ';  
}
  echo 'p'.expenseToBudgetRatio($budget_id)
?>
">
    <span><?php  echo expenseToBudgetRatio($budget_id)?>%</span>
    <div class="left-half-clipper">
        <div class="first50-bar"></div>
        <div class="value-bar"></div>
    </div>
</div>

<div class="timeline">
    <!-- <span class="start_date">17 July</span> - <span class="end_date">25 July</span> -->
</div>

<button class="btn btn-primary  interval-btn"><?php echo ucfirst($interval_period) ?></button>



</div>


<div class="target-amount-date-created">
    <span> <img src="assets/target.jpg" class='icon_img' alt="">Ksh <?php echo $amount_limit ?></span>
    <span>  <i class="fas fa-clock"></i> 
    <?php
    $date = new DateTime($date_created);
    $formattedDate = $date->format('d/m/Y');
    echo $formattedDate;
     ?>
     </span>
</div>


</div>




<div class="container-dashboard">

<div class="main-expense-title-see-all">
<strong> Expenses </strong> 
<a  class="budget_see_all update_budget" budget-id="<?php echo $budget_id;  ?>" data-bs-toggle="modal" data-bs-target="#updateBudgetModal">Edit</a> 

</div>


<!-- #expense -->
<div class="container-budget-cards">

<?php 
$query = "SELECT * FROM expenses WHERE budget_id = $budget_id";
$select_expenses_budgets = mysqli_query($connection,$query);
checkQuery($select_expenses_budgets);
if(mysqli_num_rows($select_expenses_budgets) !==0){
while($row = mysqli_fetch_assoc($select_expenses_budgets)){
$expense_title = $row['expense_title'];
$amount_spent = $row['amount_spent'];
$expense_date_created = $row['date_created'];
?>
<!-- #expensecard-->
<div class="card expense-budget-card" style="">
    <div class="card-body">
        <h6 class="card-title mb-2 text-truncate text-body-secondary"><?php echo $expense_title  ?></h6>
        <p class="value text-truncate ">Ksh <?php echo $amount_spent ?></p>
        <p class="text-muted expense-date"><?php echo $expense_date_created; ?></p>
    </div>
</div>
<?php
}
}else{
?>
<div class="d-flex align-items-center justify-content-evenly" >
    <!-- <img src="assets/empty.png" alt="" width="150px"> -->
No expenses</p> 
<a  class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#createExpenseModal">Add expenses</a>
</div>
<?php
}
?>




</div>
</div>


<!-- #expense -->




<!-- #content -->
</div>
</div>
</div>



<?php
}
}else{
?>
<div class="d-flex justify-content-center align-items-center flex-column">
    <img src="assets/no_data.png" width="150px" alt="">
    <div>Nothing here</div>
</div>
<?php
}
?>


<script>
    const items = $('.accordion-item .accordion-collapse');
if (items.length >= 2) {
  $(items[0]).addClass('show');  // Add class to second div
}

$(".update_budget").click(function(e){

    let budget_id = $(this).attr("budget-id");

    $.post("async/edit_budget_modal.php",{budget_id:budget_id},function(data){
        $(".edit_budget_modal").html(data);
    })

})

         
</script>