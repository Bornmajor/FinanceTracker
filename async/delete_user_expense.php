<?php
include('functions.php');

$expense_id = $_POST['expense_id'];
$expense_id = escapeString($expense_id);

$sess_usr_id = $_SESSION['usr_id'];

$query = "DELETE FROM expenses WHERE expense_id = $expense_id AND usr_id = $sess_usr_id";
$delete_expense = mysqli_query($connection,$query);
checkQuery($delete_expense);



?>