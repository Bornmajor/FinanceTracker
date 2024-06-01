<?php
include('functions.php');

$sess_usr_id = $_SESSION['usr_id'];

$expense_title = $_POST['expense_title'];
$budget_id = $_POST['budget_id'];
$amount_spent = $_POST['amount_spent'];

$expense_title = escapeString($expense_title);
$budget_id = escapeString($budget_id);
$amount_spent = escapeString($amount_spent);

$date_created = date('d/m/Y');
$expense_month = date('M');
$expense_year = date('Y');

//fetch interval period from budget
$query = "SELECT interval_period FROM budgets WHERE budget_id = $budget_id";
$select_interval = mysqli_query($connection,$query);
checkQuery($select_interval);
while($row = mysqli_fetch_assoc($select_interval)){
$interval_period = $row['interval_period'];
}


$query = "INSERT INTO expenses(expense_title,amount_spent,budget_id,date_created,expense_month,expense_year,interval_period,usr_id)VALUES('$expense_title','$amount_spent','$budget_id','$date_created','$expense_month','$expense_year','$interval_period','$sess_usr_id')";
$create_expense = mysqli_query($connection,$query);
checkQuery($create_expense);
if($create_expense){
successMsg("Expenses added"); 
}
?>