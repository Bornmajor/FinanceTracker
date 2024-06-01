<?php
include('functions.php');

$sess_usr_id = $_SESSION['usr_id'];

$budget_title = $_POST['budget_title'];
$amount_limit = $_POST['amount_limit'];
$interval_period = $_POST['interval_period'];

$budget_title = escapeString($budget_title);
$amount_limit = escapeString($amount_limit);
$interval_period = escapeString($interval_period);
$sess_usr_id = escapeString($sess_usr_id);

//date_created
$date_created =  date("Y-m-d H:i:s");

$query = "INSERT INTO budgets(budget_title,amount_limit,date_created,interval_period,usr_id)VALUES('$budget_title','$amount_limit','$date_created','$interval_period','$sess_usr_id')";
$insert_budget = mysqli_query($connection,$query);
checkQuery($insert_budget);

if($insert_budget){
successMsg("Budget created");    
}

?>