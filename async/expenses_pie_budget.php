<?php
include('functions.php');
$sess_usr_id = $_SESSION['usr_id'];

$query = "SELECT * FROM budgets WHERE usr_id = $sess_usr_id";
$select_users_budgets = mysqli_query($connection,$query);
checkQuery($select_users_budgets);
if(mysqli_num_rows($select_users_budgets) !== 0){
    while($row = mysqli_fetch_assoc($select_users_budgets)){
        $row['budget_id'];
    }
}

?>
