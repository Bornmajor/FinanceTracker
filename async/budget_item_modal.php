<?php
include('functions.php');
$budget_id = $_POST['budget_id'];
$budget_id = escapeString($budget_id);

$query = "SELECT * FROM budgets WHERE budget_id = $budget_id";
$select_budgets_details = mysqli_query($connection,$query);
checkQuery($select_budgets_details);
while($row = mysqli_fetch_assoc($select_budgets_details)){
$budget_id  = $row['budget_id'];
$budget_title = $row['budget_title'];
$amount_limit = $row['amount_limit'];
$date_created = $row['date_created'];
$interval_period = $row['interval_period'];
}
?>
<div class="modal-header">
      <div class="budgetitem-modal-title-date">
       <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $budget_title ?></h1>
       <span class="text-muted" style="font-size:14px;">
       <?php
         $date = new DateTime($date_created);
         $formattedDate = $date->format('d/m/Y');
         echo $formattedDate;
        ?>
        </span>  
      </div>
     
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      
    <div class="d-flex align-items-center mb-3">

           <div class="progress-circle 
            <?php
            if(expenseToBudgetRatio($budget_id) > 50){
            echo 'over50 ';  
            }
            echo 'p'.expenseToBudgetRatio($budget_id)
            ?>
            ">
                <span><?php  echo expenseToBudgetRatio($budget_id)?>%</span>
                <div class="left-half-clipper">
                    <div class="first50-bar"></div>
                    <div class="value-bar"></div>
                </div>
            </div>

      

      <div class="progress-msg" style="padding-top:15px;padding-left:10px;">
       <span>
       <?php echo totalExpensesInBudget($budget_id);?>/<?php echo $amount_limit; ?> (Kshs)</span> 
       <?php
         //get ratio between total expense / budget limit
         $ratio = expenseToBudgetRatio($budget_id);

         ?>

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

    </div>

    <!-- <div class="budget_analysis d-flex flex-column my-3">
    <span>Highest  <i class="fas fa-arrow-right"></i> Ksh 100</span>  
    <span>Lowest <i class="fas fa-arrow-right"></i> Ksh 20</span>
    <span>Total <i class="fas fa-arrow-right"></i> Ksh 1000</span>
    </div> -->

    <button class="btn btn-primary "><?php echo $interval_period; ?></button>

 
    

    </div>