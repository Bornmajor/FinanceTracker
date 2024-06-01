<?php
if(isset($_GET['page'])){
   $source = $_GET['page'];

}else{
    $source = '';
}

switch($source){
case 'home';
include('pages/home.php');
break;
case 'dashboard';
include('pages/dashboard.php');
break;
case 'budget';
include('pages/budget.php');
break;
case 'expenses';
include('pages/expenses.php');
break;
case 'reports';
include('pages/reports.php');
break;
case 'login';
include('pages/login.php');
break;
case 'registration';
include('pages/registration.php');
break;
case 'education';
include('pages/education.php');
break;
case 'help_center';
include('pages/contact.php');
break;
case 'logout';
include('pages/logout.php');
break;
default:
include('pages/home.php');
}


  
?>