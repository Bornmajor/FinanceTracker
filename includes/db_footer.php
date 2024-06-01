
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>  

    
  <!-- Bootstrap core JavaScript-->
   <script src="res/jquery/jquery.min.js"></script>
    <script src="res/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>


    <!-- <script src="../js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <script src="res/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="res/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->

    <script></script>

 
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- budget modal -->



<!-- budget Modal -->
<div class="modal fade" id="createBudgetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Budget</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="add_budget_form">

        <div class="budget_feed_form"></div>

        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Title" name="budget_title" required>
        <label for="floatingInput">Budget title</label>
        </div>

        <!-- <div class="form-check form-switch ms-1">
        <input class="form-check-input budget-period-switch" type="checkbox" role="switch" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckDefault">Recurring date</label>
        </div>
        <div class="view_budget_period_option my-3 mx-1"></div> -->

        <div class="form-floating mb-3">
          <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="interval_period" required>
            <option selected>Choose one option</option>
            <option value="daily">Daily</option>
            <option value="weekly">Weekly</option>
            <option value="monthly">Monthly</option>
            <option value="yearly">Yearly</option>
          </select>
          <label for="floatingSelect">Recurring Intervals</label>
        </div>


        <div class="form-floating mb-3">
        <input type="number" class="form-control" id="floatingInput" placeholder="Amount" name="amount_limit" required>
        <label for="floatingInput">Spending limit(only numbers)</label>
        </div>



        <button type="submit" class="btn btn-primary">Create</button>
        


        </form>
      </div>
  
    </div>
  </div>
</div>
  <!-- budget modal -->


<!-- budget Modal -->
<div class="modal fade" id="updateBudgetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Budget</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body edit_budget_modal">
       
      </div>
  
    </div>
  </div>
</div>
  <!-- budget modal -->

  

<!-- Expenses Modal -->
<div class="modal fade" id="createExpenseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">Add expense</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      <form action="" method="post" class="add_user_expense">
      
      <div class="expense_feed_form"></div>
  

      <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Title" name="expense_title" required>
      <label for="floatingInput">Expense title</label>
      </div>

      <div class="form-floating my-3">
      <select class="form-select budget_expenses_options" id="budgetSelect" aria-label="Floating label select example" name="budget_id" required>
          <!-- #rendered from budget_expenses_options.php -->
  
      </select>
      <label for="floatingSelect">Budget category</label>
      </div>

    


      <div class="form-floating mb-3">
      <input type="number" class="form-control" id="floatingInput" placeholder="Amount" name="amount_spent">
      <label for="floatingInput">Amount spent(only numbers)</label>
      </div>



      <button type="submit" class="btn btn-primary btn_expense_submit">Add to category</button>
      


      </form>
    </div>

  </div>
</div>
</div>
<!--  Expenses Modal -->

<!-- Budget Item Modal -->
<div class="modal fade" id="budgetItemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content budget-item-content">
  <!-- #render from async/budget-item-modal.php-->

  </div>
</div>
</div>
<!--  Budget Item Modal -->

 <!-- #profile modal-->

<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="" method="post" class="update_user_data_form">
        <?php
        if(isset($_SESSION['usr_id'])){
          $sess_usr_id = $_SESSION['usr_id'];

        $query = "SELECT * FROM finance_tracker_users WHERE usr_id = $sess_usr_id";
        $select_user_data = mysqli_query($connection,$query);
        checkQuery($select_user_data);
        while($row = mysqli_fetch_assoc($select_user_data)){
        $mail = $row['mail'];
        $username = $row['username'];

        }  
        }
        
        ?>
      
      <div class="update_profile_feed"></div>
 
     <div class="form-floating mb-3">
      <input type="text" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com" value="<?php echo $username; ?>">
      <label for="floatingEmptyPlaintextInput">Name(readonly)</label>
    </div>
     <div class="form-floating mb-3">
      <input type="email" readonly class="form-control-plaintext" id="floatingEmptyPlaintextInput" placeholder="name@example.com" value="<?php echo $mail; ?>">
      <label for="floatingEmptyPlaintextInput">email(readonly)</label>
    </div>


    <div class="form-floating my-3">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Current password" name="current_pwd" required>
    <label for="floatingPassword">Current password</label>
    </div>

    <div class="form-floating mb-3">
    <input type="password" class="form-control" id="floatingPassword" placeholder="New password" name="new_pwd" required>
    <label for="floatingPassword">New password</label>
    </div>

<button class="btn btn-primary" type="submit">Update password</button>
</form>

        
      </div>
      <div class="modal-footer">
   
      </div>
    </div>
  </div>
</div>

 <script>
    
$(document).ready(function() {

     function  loadIntervalRateCardsReports(){
      $.ajax({
          url: "async/interval_rate_cards.php",
          type: "POST",
          success:function(data){
            if(!data.error){
              $('.load-interval-rate-cards').html(data);
            }
      
          }
        })

     }
     //Loading Interval Rate Cards IN Reports
     loadIntervalRateCardsReports();

    //async_charts_data
     $('.report-load-btn').click(function(e){
        //loading charts data
    loadChartsData();
     })

    function loadChartsData(){
      $.ajax({
          url: "async/charts_data.php",
          type: "POST",
          success:function(data){
            if(!data.error){
              $('.async_charts_data').html(data);
            }
      
          }
        })

    }
     //loading charts data
    loadChartsData();

    $(".update_user_data_form").submit(function(e){
    e.preventDefault();

    let postData = $(this).serialize();

    $.post("async/update_user_pwd.php",postData,function(data){
      $(".update_profile_feed").html(data);
    });

  })

    function fetchUsersExpenses(){
      $.ajax({
          url: "async/list_all_user_expenses.php",
          type: "POST",
          success:function(data){
            if(!data.error){
              $('.container-expense-list-cards').html(data);
            }
      
          }
        })

    }
    //fetch expenses in expenses page
    fetchUsersExpenses();

    $(".add_user_expense").submit(function(e){
      e.preventDefault();

      let postData = $(this).serialize();

     
    $.post('async/add_user_expense.php',postData,function(data){
        $('.expense_feed_form').html(data);
        $(".add_user_expense")[0].reset();
      // updated users  fetched data on dashboards budgets
      fetchUsersDashboardBudgets();
      //refetch user budgets on budgets page
      fetchUserBudgets();
      //fetch expenses in expenses page
      fetchUsersExpenses();
      //reloading charts data
      loadChartsData();
        //Loading Interval Rate Cards IN Reports
     loadIntervalRateCardsReports();
      
    })


    })

   
    function fetchBudgetExpensesOptions(){
      $.ajax({
          url: "async/budget_expenses_options.php",
          type: "POST",
          success:function(data){
            if(!data.error){
              $('.budget_expenses_options').html(data);
            }
      
          }
        })

    }
 //fetching budget expense in options in select expenses modal 
    fetchBudgetExpensesOptions();

    $('.add_budget_form').submit(function(e){
      e.preventDefault();

      let postData = $(this).serialize();

    $.post('async/add_budget.php',postData,function(data){
        $('.budget_feed_form').html(data);
        $(".add_budget_form")[0].reset();
      // fetch users dashboards budgets
       fetchUsersDashboardBudgets();
      //refetch user budgets on budgets page
       fetchUserBudgets()
        //fetching budget expense in options in select expenses modal 
    fetchBudgetExpensesOptions();
      //reloading charts data
      loadChartsData();
        //Loading Interval Rate Cards IN Reports
     loadIntervalRateCardsReports();
    })

    })


    $('.budget-period-switch').change(function() {
        if ($(this).is(':checked')) {
            // Switch is checked
            console.log('Switch is checked');
            fetchRecurringTimeElements()

            
            // Call your function or perform actions here
        } else {
            // Switch is unchecked
            console.log('Switch is unchecked');
            fetchOneTimeElements();
            // Call your function or perform actions here
        }
    });

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
   //fetch users' budgets from budget.php
    fetchUserBudgets();

    
    
    function fetchUsersDashboardBudgets(){
      $.ajax({
          url: "async/users_dashboard_budgets.php",
          type: "POST",
          success:function(data){
            if(!data.error){
              $('.view_dashboard_users_budgets').html(data);
            }
      
          }
        })

    }
  //using ajax to fetch users dashboards budgets
    fetchUsersDashboardBudgets();

    function fetchOneTimeElements(){
        $.ajax({
          url: "async/onetime_form_element.php",
          type: "POST",
          success:function(data){
            if(!data.error){
              $('.view_budget_period_option').html(data);
            }
      
          }
        })
      }
      function fetchRecurringTimeElements(){
        $.ajax({
          url: "async/recurring_form_element.php",
          type: "POST",
          success:function(data){
            if(!data.error){
             $('.view_budget_period_option').html(data);
            }
      
          }
        })
      }

       //clicking onetime element of budget period for first time user loads
      fetchOneTimeElements();


     // Listen for changes in the select element for expense form
    $('#budgetSelect').change(function() {
        // Get the selected option text
        var selectedOptionText = $(this).children("option:selected").text();
        
        // Update the text of the submit button with the selected option text
        $('.btn_expense_submit').text('Add to ' + selectedOptionText);
    });

});

 </script>

</body>

</html>