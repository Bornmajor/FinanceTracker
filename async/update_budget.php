<?php
include('functions.php');

if(isset($_POST['budget_id'])){
    $budget_id = escapeString($_POST['budget_id']);

    $budget_title = escapeString($_POST['budget_title']);
    $amount_limit = escapeString($_POST['amount_limit']);

    $query = "UPDATE budgets SET budget_title = '$budget_title',amount_limit = '$amount_limit' WHERE budget_id = $budget_id";
    $update_budget = mysqli_query($connection,$query);
    
}
?>