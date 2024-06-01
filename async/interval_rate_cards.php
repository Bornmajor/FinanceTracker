<?php
include('functions.php');


?>

    <!-- Interval rate daily -->
    <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Daily savings rate
                                          </div>
                                          <div class="row no-gutters align-items-center">
                                              <div class="col-auto">
                                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php echo intervalSavingRate('daily') ?>%</div>
                                              </div>
                                              <div class="col">
                                                  <div class="progress progress-sm mr-2">
                                                      <div class="progress-bar bg-primary" role="progressbar"
                                                          style="width: <?php echo intervalSavingRate('daily');  ?>%" aria-valuenow="50" aria-valuemin="0"
                                                          aria-valuemax="100"></div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Interval rate weekly -->
                      <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-success shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Weekly savings rate
                                          </div>
                                          <div class="row no-gutters align-items-center">
                                              <div class="col-auto">
                                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php echo intervalSavingRate('weekly') ?>%</div>
                                              </div>
                                              <div class="col">
                                                  <div class="progress progress-sm mr-2">
                                                      <div class="progress-bar bg-success" role="progressbar"
                                                          style="width: <?php echo intervalSavingRate('weekly');  ?>%" aria-valuenow="50" aria-valuemin="0"
                                                          aria-valuemax="100"></div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Interval rate monthly -->
                      <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-info shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Monthly savings rate
                                          </div>
                                          <div class="row no-gutters align-items-center">
                                              <div class="col-auto">
                                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php echo intervalSavingRate('monthly') ?>%</div>
                                              </div>
                                              <div class="col">
                                                  <div class="progress progress-sm mr-2">
                                                      <div class="progress-bar bg-info" role="progressbar"
                                                          style="width: <?php echo intervalSavingRate('monthly');  ?>%" aria-valuenow="50" aria-valuemin="0"
                                                          aria-valuemax="100"></div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <!-- Interval rate yearly -->
                      <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-warning shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Yearly savings rate
                                          </div>
                                          <div class="row no-gutters align-items-center">
                                              <div class="col-auto">
                                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php echo intervalSavingRate('yearly') ?>%</div>
                                              </div>
                                              <div class="col">
                                                  <div class="progress progress-sm mr-2">
                                                      <div class="progress-bar bg-warning" role="progressbar"
                                                          style="width: <?php echo intervalSavingRate('yearly');  ?>%" aria-valuenow="50" aria-valuemin="0"
                                                          aria-valuemax="100"></div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-auto">
                                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>