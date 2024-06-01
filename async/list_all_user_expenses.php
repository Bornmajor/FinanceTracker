<?php
include('functions.php');

$sess_usr_id = $_SESSION['usr_id'];

// if(isset($_POST['budget_id'])){
// $budget_id = $_POST['budget_id'];    
// $query = "SELECT * FROM expenses WHERE budget_id = $budget_id";
// }else{

// }
$query = "SELECT * FROM expenses WHERE usr_id = $sess_usr_id";
$select_users_expenses = mysqli_query($connection,$query);
checkQuery($select_users_expenses);
if(mysqli_num_rows($select_users_expenses) !== 0){
while($row = mysqli_fetch_assoc($select_users_expenses)){
$expense_id = $row['expense_id'];
$expense_title = $row['expense_title'];
$amount_spent = $row['amount_spent'];
$date_created = $row['date_created'];
$budget_id = $row['budget_id'];

?>

<!-- #expense-list-card -->
<div class="expense-list-card">

<div class="expense-list-title-budget">
<div class="title-budget-expense">
    <span class="text-truncate"><?php echo $expense_title ?></span> 
<span class="text-truncate"><?php echo getBudgetNameFromId($budget_id); ?></span>   
</div>

</div>

<div class="expense-list-amount-date-delete">

<div class="expense-list-amount-date">
<span>Ksh <?php echo $amount_spent; ?></span>
<span><?php echo $date_created; ?></span>  
</div>

<span class="delete-expense mx-4" style="cursor:pointer;" expense-id="<?php echo $expense_id; ?>"><i class="fas fa-trash fa-lg" ></i></span>

</div>

</div>    
<!-- #expense-list-card -->
<?php
}

}else{
    //add expenses
?>
<div class="d-flex justify-content-center align-items-center flex-column">
    <img src="assets/no_data.png" width="150px" alt="">
    <a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createExpenseModal">Add expense</a>
    <div>Nothing here</div>

</div>
<?php
}

?>

<script>
    //refetch expenses
       function fetchUsersExpenses(){
      $.ajax({
          url: "async/list_all_user_expenses.php",
          type: "POST",
          success:function(data){
            if(!data.error){
              $('.container-expense-list-cards').html(data);
            }
      
          }
        })

    }
    $('.delete-expense').click(function(e){
    const expense_id = $(this).attr('expense-id');

    $.post("async/delete_user_expense.php",{expense_id:expense_id},function(data){
    //fetch expenses in expenses page
    fetchUsersExpenses();
    });

    })
    
</script>  