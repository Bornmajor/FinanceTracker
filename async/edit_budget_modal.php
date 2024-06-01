<?php
include('functions.php');

if(isset($_POST['budget_id'])){
    $budget_id = escapeString($_POST['budget_id']);

    $query = "SELECT * FROM budgets WHERE budget_id = $budget_id";
    $select_budget = mysqli_query($connection,$query);
    checkQuery($select_budget);
    while($row = mysqli_fetch_assoc($select_budget)){
     $budget_id = $row['budget_id'];
     $budget_title = $row['budget_title'];
     $amount_limit = $row['amount_limit'];
    }
}

?>

<form action="" method="post" class="update_budget_form">

<div class="update_budget_feed_form"></div>

<input type="hidden" name="budget_id" value="<?php echo $budget_id; ?>">

<div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInput" placeholder="Title" name="budget_title" value="<?php echo $budget_title ?>" required>
<label for="floatingInput">Budget title</label>
</div>


<div class="form-floating mb-3">
<input type="number" class="form-control" id="floatingInput" placeholder="Amount" name="amount_limit" value="<?php echo $amount_limit ?>" required>
<label for="floatingInput">Spending limit(only numbers)</label>
</div>



<button type="submit" class="btn btn-primary">Update</button>



</form>

<script>
    $(".update_budget_form").submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post("async/update_budget.php",postData,function(data){
            $(".update_budget_feed_form").html(data);
               //fetch users' budgets from budget.php
      fetchUserBudgets();
         
        })
    })

    function fetchUserBudgets(){
      $.ajax({
          url: "async/users_budgets.php",
          type: "POST",
          success:function(data){
            if(!data.error){
              $('.list_users_budgets').html(data);
            }
      
          }
        })
      
    }
  

</script>