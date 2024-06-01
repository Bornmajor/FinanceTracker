<?php
include('functions.php');

$sess_usr_id = $_SESSION['usr_id'];

$query = "SELECT expense_month,SUM(amount_spent) AS total_expense FROM expenses GROUP BY expense_month WHERE usr_id = $sess_usr_id";
$result = mysqli_query($connection,$query);

$data = array(
    "months" => array(),
    "total_expenses" => array()
);
while ($row = mysqli_fetch_assoc($result)) {
    $data["months"][] = $row["expense_month"];
    $data["total_expenses"][] = $row["total_expense"];
}

// Print or use $data array as required
// print_r($data);
// echo json_encode($data);


// Convert $data array into JSON format
$data_json = json_encode($data);

?>