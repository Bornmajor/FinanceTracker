
<?php 
$pageTitle = 'Expenses';
include('includes/dashboard_bars.php'); 
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Expenses</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->

                                
                    </div>

                    <!-- Content Row -->
               
                 <div class="container-dashboard">
                     <!-- #expenses-->
                    
                  

                   
                   <div class="container-expense-list-cards">

             

                   </div>
                 


                


                   

                 </div>
                    <!-- Content Row -->

             
                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


  <script>
    $(document).ready(function(){
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
    })
  </script>

 <?php  include('includes/db_footer.php');?>