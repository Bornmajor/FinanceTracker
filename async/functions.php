<?php
include('connection.php');

require __DIR__ . '/../vendor/autoload.php';


//correcting time
date_default_timezone_set('UTC');

function escapeString($string){
    global  $connection;
   return mysqli_real_escape_string($connection,$string);
 
 }
 
 //success msg
function successMsg($msg){
  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

//fail msg
function failMsg($msg){
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

//warning msg
function warnMsg($msg){
  echo '
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

function checkQuery($result){
  global $connection;
  if($result){

  }else{
      die("Query failed".mysqli_error($connection));
  
  }  
}

function setSession($mail){
  global $connection;

  $mail = escapeString($mail);

  $query = "SELECT * FROM finance_tracker_users WHERE mail = '$mail'";
  $select_users = mysqli_query($connection,$query);
  checkQuery($select_users);

  while($row = mysqli_fetch_assoc($select_users)){
  $_SESSION['usr_id'] = $row['usr_id'];
  $db_mail = $row['mail'];

  }
  //trim content after @
  $parts = explode('@',$db_mail);
  $_SESSION['mail'] = $parts[0];
   
  //assigning session variable


}

function totalExpensesInBudget($budget_id){
  global $connection;

  $query = "SELECT * FROM expenses WHERE budget_id = $budget_id";
  $check_expenses_exist = mysqli_query($connection,$query);
  checkQuery($check_expenses_exist);

  
  $query = "SELECT SUM(amount_spent) FROM expenses WHERE budget_id = $budget_id";
  $select_expenses = mysqli_query($connection,$query);
  checkQuery($select_expenses);
  if(mysqli_num_rows($check_expenses_exist) !== 0){
   while($row = mysqli_fetch_assoc($select_expenses)){
   $total_spendings = $row['SUM(amount_spent)'];

  }
  
  }else{
   $total_spendings = 0;
  }
 
return $total_spendings;  
}

function expenseToBudgetRatio($budget_id){
  global $connection;
 
  //get budget limit
  $query = "SELECT * FROM budgets WHERE budget_id = $budget_id";
  $select_budget = mysqli_query($connection,$query);
  checkQuery($select_budget);
   while($row = mysqli_fetch_assoc($select_budget)){
   $amount_limit = $row['amount_limit'];

   }

   $total_spendings = totalExpensesInBudget($budget_id);

   //sum up all expense related to budget

   $percentage_ratio = $total_spendings/$amount_limit * 100;
   
   return  round($percentage_ratio);



}


function getBudgetNameFromId($budget_id){
  global $connection;

  $query = "SELECT * FROM budgets WHERE budget_id = $budget_id";
  $select_budget_name = mysqli_query($connection,$query);
  checkQuery($select_budget_name);
  while($row = mysqli_fetch_assoc($select_budget_name)){
  $budget_title =  $row['budget_title'];
  }

  return $budget_title;

}


// Function to check if a given date and time has elapsed based on daily interval
function hasElapsedDaily($givenDateTime) {
  $givenTimestamp = strtotime($givenDateTime);
  $currentTimestamp = time(); // Get the current timestamp

  // Calculate the difference in seconds between the current time and the given time
  $timeDifference = $currentTimestamp - $givenTimestamp;

  // Check if the time difference is greater than or equal to a day (86400 seconds)
  return $timeDifference >= 86400;
}

// Function to check if a given date and time has elapsed based on weekly interval
function hasElapsedWeekly($givenDateTime) {
  $givenTimestamp = strtotime($givenDateTime);
  $currentTimestamp = time(); // Get the current timestamp

  // Calculate the difference in seconds between the current time and the given time
  $timeDifference = $currentTimestamp - $givenTimestamp;

  // Check if the time difference is greater than or equal to a week (604800 seconds)
  return $timeDifference >= 604800;
}

// Function to check if a given date and time has elapsed based on monthly interval
function hasElapsedMonthly($givenDateTime) {
  $givenTimestamp = strtotime($givenDateTime);
  $currentTimestamp = time(); // Get the current timestamp

  // Calculate the difference in seconds between the current time and the given time
  $timeDifference = $currentTimestamp - $givenTimestamp;

  // Calculate the number of seconds in a month (30 days)
  $secondsInMonth = 30 * 24 * 60 * 60;

  // Check if the time difference is greater than or equal to a month
  return $timeDifference >= $secondsInMonth;
}

// Function to check if a given date and time has elapsed based on yearly interval
function hasElapsedYearly($givenDateTime) {
  $givenTimestamp = strtotime($givenDateTime);
  $currentTimestamp = time(); // Get the current timestamp

  // Calculate the difference in seconds between the current time and the given time
  $timeDifference = $currentTimestamp - $givenTimestamp;

  // Calculate the number of seconds in a year (365 days)
  $secondsInYear = 365 * 24 * 60 * 60;

  // Check if the time difference is greater than or equal to a year
  return $timeDifference >= $secondsInYear;
}

// Example usage:
// $givenDateTime = "2024-02-20 10:00:00";

// if (hasElapsedDaily($givenDateTime)) {
//   echo "A day has elapsed since the given date and time.\n";
// }

// if (hasElapsedWeekly($givenDateTime)) {
//   echo "A week has elapsed since the given date and time.\n";
// }

// if (hasElapsedMonthly($givenDateTime)) {
//   echo "A month has elapsed since the given date and time.\n";
// }

// if (hasElapsedYearly($givenDateTime)) {
//   echo "A year has elapsed since the given date and time.\n";
// }

function recreateNewBudget($budget_id){
  global $connection;

  $query = "SELECT * FROM budgets WHERE budget_id = $budget_id";
  $select_budget = mysqli_query($connection,$query);
  checkQuery($select_budget);
  while($row = mysqli_fetch_assoc($select_budget)){
    $budget_title = $row['budget_title'];  
    $amount_limit = $row['amount_limit'];
    $interval_period =  $row['interval_period'];
 
  }
  $sess_usr_id = $_SESSION['usr_id'];
  //date_created
  $date_created =  date("Y-m-d H:i:s");

  $query = "INSERT INTO budgets(budget_title,amount_limit,date_created,interval_period,usr_id)VALUES('$budget_title','$amount_limit','$date_created','$interval_period','$sess_usr_id')";
  $insert_budget = mysqli_query($connection,$query);
  checkQuery($insert_budget);


}

function archiveBudget($budget_id){
  global $connection;
  
  $query = "UPDATE budgets SET is_archived = 'yes' WHERE budget_id = $budget_id";
  $update_archive = mysqli_query($connection,$query);
  checkQuery($update_archive);

}
//recurring budget based on interval
function rescheduleBudget($usr_id){
  global $connection;


  $query = "SELECT * FROM budgets WHERE usr_id = $usr_id AND is_archived = 'no'";
  $select_usr_budgets = mysqli_query($connection,$query);
  checkQuery($select_usr_budgets);
  if(mysqli_num_rows($select_usr_budgets) !== 0){
    //budgets exist
    while($row = mysqli_fetch_assoc($select_usr_budgets)){
    $budget_id = $row['budget_id'];  
    // $budget_title = $row['budget_title'];  
    // $amount_limit = $row['amount_limit'];
    $interval_period =  $row['interval_period'];
    $date_created =  $row['date_created'];


      //check interval period matching with elapsed function
   if($interval_period == 'daily'){
      //if true recreate new budget with same attr and archive the current one
     if(hasElapsedDaily($date_created)){
     recreateNewBudget($budget_id);
      archiveBudget($budget_id);  

     } 

    }//weekly
    else if($interval_period == 'weekly'){
      //if true recreate new budget with same attr and archive the current one
    if(hasElapsedWeekly($date_created)){
      recreateNewBudget($budget_id);
      archiveBudget($budget_id);

     } 
    }
    else if($interval_period == 'monthly'){
      //if true recreate new budget with same attr and archive the current one
      if(hasElapsedMonthly($date_created)){
        recreateNewBudget($budget_id);
        archiveBudget($budget_id);
  
        } 

  }else{
    //yearly
      //if true recreate new budget with same attr and archive the current one
      if(hasElapsedYearly($date_created)){
      recreateNewBudget($budget_id);
      archiveBudget($budget_id);

      } 

  }

  }



  }



}

//reschedule elapsed budget 
if(isset($_SESSION['usr_id'])){
  $usr_id = $_SESSION['usr_id'];
  rescheduleBudget($usr_id);
}

function intervalSavingRate($interval_period){
  global $connection;

  $sess_usr_id = $_SESSION['usr_id'];

  //total expense at given interval like daily,weekly...
  $query  = "SELECT SUM(amount_spent) FROM expenses WHERE interval_period = '$interval_period' AND usr_id = $sess_usr_id";
  $select_amount_spent = mysqli_query($connection,$query);
  checkQuery($select_amount_spent);
  if(mysqli_num_rows($select_amount_spent)){
    //if amount exist in  expenses
    while($row = mysqli_fetch_assoc( $select_amount_spent)){
     $total_amount_spent = $row['SUM(amount_spent)'];  
    }
   
  }else{
     $total_amount_spent = 0;
  }
  
   //total budget limit at given interval like daily,weekly...
  $query = "SELECT SUM(amount_limit) FROM budgets WHERE interval_period = '$interval_period' AND usr_id = $sess_usr_id";
  $select_amount_limits = mysqli_query($connection,$query);
  checkQuery($select_amount_limits);
  if(mysqli_num_rows($select_amount_limits) !== 0){
    while($row = mysqli_fetch_assoc($select_amount_limits)){
      $total_amount_budget_limit = $row['SUM(amount_limit)'];
    }
    if($total_amount_budget_limit == 0){
      $total_amount_budget_limit = 1; 
    }

  }else{
    $total_amount_budget_limit = 1;
  }

  //get rate of interval
  //total expenses at interval / total budget limit at interval
  
  $interval_rate = $total_amount_spent/ $total_amount_budget_limit * 100;

  return  round($interval_rate);
}

?>