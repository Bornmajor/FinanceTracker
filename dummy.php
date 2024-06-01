//weekly
    else if($interval_period == 'weekly'){
        //if true recreate new budget with same attr and archive the current one
      if(hasElapsedWeekly($date_created)){
        recreateNewBudget($budget_id);
        archiveBudget($budget_id);
  
       } 

    //monthly
    }else if($interval_period == 'monthly'){
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