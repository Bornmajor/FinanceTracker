
<?php 
$pageTitle = 'Budgets';
include('includes/dashboard_bars.php'); 
?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Budgets</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->

                                
                    </div>

                    <!-- Content Row -->
               
                 <div class="container-dashboard">
                     <!-- #accordion budget-->

                     <div class="accordion list_users_budgets" id="accordionExample">
 

                    </div>

                 </div>
                    <!-- Content Row -->

             
                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
          


  

 <?php  include('includes/db_footer.php');?>