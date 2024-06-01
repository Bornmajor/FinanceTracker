<?php 
include('functions.php');

$sess_usr_id = $_SESSION['usr_id'];
$query = "SELECT * FROM budgets WHERE usr_id = '$sess_usr_id' AND is_archived = 'no'";
$select_list_users_budgets = mysqli_query($connection,$query);
checkQuery($select_list_users_budgets);
if(mysqli_num_rows($select_list_users_budgets) !== 0){
?>
 <option value="" selected>Selected nothing</option>
<?php
while($row = mysqli_fetch_assoc($select_list_users_budgets)){
$budget_id = $row['budget_id'];
$budget_title = $row['budget_title'];
?>

<option value="<?php echo $budget_id; ?>"><?php echo $budget_title; ?></option>
<?php

}
}

?>