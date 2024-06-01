<?php
include('functions.php');


$sess_usr_id = $_SESSION['usr_id'];

$query = "SELECT * FROM budgets WHERE usr_id = '$sess_usr_id' AND is_archived = 'no' ORDER BY budget_id DESC";
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
<div class="card budget-card " budget-id="<?php echo $budget_id; ?>" data-bs-toggle="modal" data-bs-target="#budgetItemModal">
    <a  class="">

    
    <div class="card-body">
        
        <div class="budget-title-menu-opt">
        <div class="card-subtitle mb-2 text-truncate text-body-secondary"><?php echo $budget_title ?></div>
        <span class="budget-menu"><i class="fas fa-ellipsis-v"></i></span>

        </div>
    
        <div class="budget-icons">
        <span><i class="fas fa-redo-alt"></i></span>
        <span><i class="fas fa-clock"></i></span>
        <button class="btn btn-primary btn-sm mx-2" style="font-size:12px;"><?php echo ucfirst($interval_period) ?></button>
        </div>
         <div class="ratio-range">
          <span style="font-size:14px;"><?php echo expenseToBudgetRatio($budget_id).'%' ?></span> 
         <span>
            <?php
            $total = totalExpensesInBudget($budget_id);
            echo $total;
          ?>
         /<?php echo $amount_limit;?></span>  
         </div>
         <?php
         //get ratio between total expense / budget limit
         $ratio = expenseToBudgetRatio($budget_id);

         ?>
        <div class="progress " role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 8px">
            
        <div class="progress-bar <?php if($ratio >= 70){echo 'bg-danger'; }else{ echo 'bg-success';} ?>"   style="width: <?php echo $ratio.'%' ?>" ></div>
        </div>
        <?php
        //rating based on ration total expenses/budget if >= 75 critical else good
        if($ratio >= 70){
        ?>
        <div class="budget-status">
            <p class="status-critical"> <i class="fas fa-exclamation-triangle"></i>
            Critical</p>         
        </div>
        
        <?php
        }else{
         ?>   
         <div class="budget-status">
            <p class="status-average"> <i class="fas fa-thumbs-up"></i>
            Good</p>         
        </div>
        <?php
        }

        ?>
       
        
    
    </div>
    </a>
</div>
<?php
} //end loop  
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
    $('.budget-card').click(function(){
        let budget_id = $(this).attr('budget-id');
        $.post("async/budget_item_modal.php",{budget_id:budget_id},function(data){
            $('.budget-item-content').html(data);
        })
    })
</script>


