<?php

      include("config.php");

      $sql = "Select * from iedcrdata";

      $regionData = "Select * from regiondata";

      $dhakaData = "Select * from dhakadata";

      $totalCaseDhaka = "Select * from dhakadata where Location = 'Total'";

      $totalRes = mysqli_query($con,$totalCaseDhaka);

      $totData = mysqli_fetch_array($totalRes);

      $dhaka = $totData['Freq.'];


      $res = mysqli_query($con,$sql);

      $regionRes = mysqli_query($con,$regionData);
      $dhakaRes = mysqli_query($con,$dhakaData);

      $date = array();
      $totalTests = array();
      $testsInPreviousDay = array();
      $positiveCases = array();
      $last24HoursCases = array();
      $recovered = array();
      $deathCases = array();
      $recoveryRate = array();
      $deathRate = array();
      $newRecoveries = array();
      $deathsInLast24Hours = array();

      $dateString = array();

      while ($row = mysqli_fetch_array($res)) {

        $date[] = $row['Date'];
        $totalTests[] = $row['TOTAL COVID-19 TESTS'];
        $testsInPreviousDay[] = $row['LAST 24 Hours Test'];
        $positiveCases[] = $row['Covid-19 Positive Cases'];
        $last24HoursCases[] = $row['Last 24Hours Cases'];
        $recovered[] = $row['Recovered'];
        $deathCases[] = $row['Death Cases'];
        $recoveryRate[] = $row['Recovery Rate'];
        $deathRate[] = $row['Death Rate'];
        $newRecoveries[] = $row['New Recoveries'];
        $deathsInLast24Hours[] = $row['Deaths in last 24 hours'];
      }

      $count = count($totalTests);

      $percentagePositive = ($last24HoursCases[$count-1] / $positiveCases[$count-1]) * 100;

      $percentageDeath = ($deathsInLast24Hours[$count-1] / $deathCases[$count-1]) * 100;

      $percentageRecovery = $recoveryRate[$count-1] - $recoveryRate[$count-2];

      $percentageDeathRate = $deathRate[$count-1] - $deathRate[$count-2];

      for($i = 0; $i <= $count-1; $i++)
      {
        $dateString[] = date('jS F', strtotime($date[$i]));
      }

      $underTreatment = $positiveCases[$count-1] - $recovered[$count-1] - $deathCases[$count-1];

      $openCases = round(($underTreatment / $positiveCases[$count-1]) * 100);

      $pieData = [round($recoveryRate[$count-1]), round($deathRate[$count-1]), $openCases];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>COVID-19 BD Status Live</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>COVID-19 BD</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a data-toggle="collapse" href="#Death_Recovery" role="button" >Death/Recovery Rate</a></li>
                        <li><a data-toggle="collapse" href="#DeathvRecovery" role="button" >Death Vs Recovery</a></li>
                        <li><a  data-toggle="collapse" href="#Daily_Cases" role="button">Daily Cases</a></li>
                        <li><a  data-toggle="collapse" href="#TotalCases" role="button">Total Cases</a></li>
                      <li><a  data-toggle="collapse" href="#Recoveriesin24" role="button">Recoveries in Last 24 Hours</a></li>
                        <li><a  data-toggle="collapse" href="#DailyDeaths" role="button">Daily Deaths</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Data Analysis<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a  data-toggle="collapse" href="#RegionBasedData" role="button">Region Based & Analysis</a></li>
                      
                      
                    </ul>
                  </li>
                </ul>
              </div>


            </div>
            <!-- /sidebar menu  -->
              
              
              

          </div>
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Tests</span>
              <div class="count"><?php echo $totalTests[$count-1]; ?></div>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Last 24 Hours Test</span>
              <div class="count"><?php echo $testsInPreviousDay[$count-1]; ?></div>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Positive Cases</span>
              <div class="count red"><?php echo $positiveCases[$count-1]; ?></div>
              <span class="count_bottom"><?php if($percentagePositive > 0) echo '<i class="green"><i class="fa fa-sort-asc"></i>' .round($percentagePositive,2) .'%</i> From last day</span>'; ?>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Death Cases</span>
              <div class="count red"><?php echo $deathCases[$count-1]; ?></div>
              <span class="count_bottom"><?php if($percentageDeath > 0) echo '<i class="green"><i class="fa fa-sort-asc"></i>'.round($percentageDeath) .'%</i> From last day</span>'; ?>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Recovery Rate</span>
              <div class="count green"><?php echo round($recoveryRate[$count-1],2); ?>%</div>
              <span class="count_bottom">
                <?php
                  if($percentageRecovery > 0)
                    echo '<i class="green"><i class="fa fa-sort-asc"></i>' .round($percentageRecovery) .'%</i> From last day</span>';
                  else
                    echo '<i class="red"><i class="fa fa-sort-desc"></i>' .abs(round($percentageRecovery)) .'%</i> From last day</span>';
                ?>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Death Rate</span>
              <div class="count red"><?php echo round($deathRate[$count-1],2); ?>%</div>
              <span class="count_bottom">
                <?php
                  if($deathRate[$count-1] > $deathRate[$count-2])
                    echo '<i class="green"><i class="fa fa-sort-asc"></i>' .round($percentageDeathRate) .'%</i> From last day</span>';
                  else
                    echo '<i class="red"><i class="fa fa-sort-desc"></i>' .abs(round($percentageDeathRate)) .'%</i> From last day</span>';
                ?>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Recoveries in Last 24 Hours</span>
              <div class="count green"><?php echo $newRecoveries[$count-1]; ?></div>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Deaths in Last 24 Hours</span>
              <div class="count red"><?php echo $deathsInLast24Hours[$count-1]; ?></div>
            </div>
          </div>
        </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
                
                
                <div class="collapse" id="Death_Recovery">
                  <div class="card card-body">
                      
                      
                    <div class="dashboard_graph">

                        <div class="row x_title">
                          <div class="col-md-6">
                            <h3>Death / Recovery Rate</h3>
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>

                        <div class="col-md-9 col-sm-9 ">
                          <div id="chart" class="demo-placeholder">
                            <canvas id="myChart" width="400px" height="100%" padding: "60px"></canvas>
                          </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                      
                      
                    </div>
                </div>


                    
                <div class="collapse" id="DeathvRecovery">
                  <div class="card card-body">
                      
                      <div class="dashboard_graph">

                        <div class="row x_title">
                          <div class="col-md-6">
                            <h3>Death Vs Recovery</h3>
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>

                        <div class="col-md-9 col-sm-9 ">
                          <div id="chart" class="demo-placeholder">
                            <canvas id="myChart2" width="400px" height="100%"></canvas>
                          </div>
                        </div>

                        <div class="clearfix"></div>
                      </div>
                    </div>
                </div>

                    
                <div class="collapse" id="Daily_Cases">
                  <div class="card card-body">
                    
                      <div class="dashboard_graph">

                        <div class="row x_title">
                          <div class="col-md-6">
                            <h3>Daily Cases</h3>
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>

                        <div class="col-md-9 col-sm-9 ">
                          <div id="chart" class="demo-placeholder">
                            <canvas id="myChart3" width="400px" height="100%"></canvas>
                          </div>
                        </div>

                        <div class="clearfix"></div>
                      </div>
                      
                      </div>
                </div>

              
                <div class="collapse" id="TotalCases">
                  <div class="card card-body">
                
                            <div class="dashboard_graph">

                            <div class="row x_title">
                              <div class="col-md-6">
                                <h3>Total Cases</h3>
                              </div>
                              <div class="col-md-6">
                              </div>
                            </div>

                            <div class="col-md-9 col-sm-9 ">
                              <div id="chart" class="demo-placeholder">
                                <canvas id="myChart4" width="400px" height="100%"></canvas>
                              </div>
                            </div>

                            <div class="clearfix"></div>
                          </div>
                    </div>
                </div>
                        
               <div class="collapse" id="Recoveriesin24">
                  <div class="card card-body">     
                      <div class="dashboard_graph">

                        <div class="row x_title">
                          <div class="col-md-6">
                            <h3>Recoveries in Last 24 Hours</h3>
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>

                        <div class="col-md-9 col-sm-9 ">
                          <div id="chart" class="demo-placeholder">
                            <canvas id="myChart5" width="400px" height="100%"></canvas>
                          </div>
                        </div>

                        <div class="clearfix"></div>
                      </div>

                     </div>
                </div>
                
                  <div class="collapse" id="DailyDeaths">
                     <div class="card card-body">     
                          <div class="dashboard_graph">

                            <div class="row x_title">
                              <div class="col-md-6">
                                <h3>Daily Deaths</h3>
                              </div>
                              <div class="col-md-6">
                              </div>
                            </div>

                            <div class="col-md-9 col-sm-9 ">
                              <div id="chart" class="demo-placeholder">
                                <canvas id="myChart6" width="400px" height="100%"></canvas>
                              </div>
                            </div>

                            <div class="clearfix"></div>
                          </div>

                        </div>

                      </div>
                </div>
                </div>
          <br />
          <br />
                
                
               
                
          <div class="row">

              <div class="collapse" id="RegionBasedData">
                     <div class="card card-body"> 
                         <div class="row">
                    <div class="col-md-4 col-sm-4 ">
                      <div class="x_panel tile">
                        <div class="x_title">
                          <h2>Region Based Data</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                          <?php

                                  while ($row = mysqli_fetch_array($regionRes)) { ?>

                                      <div class="widget_summary">
                                        <div class="w_left w_25">
                                          <span><?php echo $row['Location']; ?></span>
                                        </div>
                                        <div class="w_center w_55">
                                          <div class="">
                                            <div class="progress progress" style="width: 76%;">
                                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo round(($row['Freq.']/$positiveCases[$count-1])*100); ?>"></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="w_right w_20">
                                          <span><?php echo $row['Freq.']; ?></span>
                                        </div>
                                        <div class="clearfix"></div>
                                      </div> <?php
                                  }

                          ?>

                        </div>
                      </div>
                    </div>
                         
                         <div class="col-md-4 col-sm-4 ">
                          <div class="x_panel tile">
                            <div class="x_title">
                              <h2>Dhaka Data</h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                              <?php

                                      while ($row = mysqli_fetch_array($dhakaRes)) { ?>

                                        <div class="widget_summary">
                                          <div class="w_left w_25">
                                            <span><?php echo $row['Location']; ?></span>
                                          </div>
                                          <div class="w_center w_55">
                                            <div class="">
                                              <div class="progress progress" style="width: 76%;">
                                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="<?php echo round(($row['Freq.']/$dhaka)*100); ?>"></div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="w_right w_20">
                                            <span><?php echo $row['Freq.']; ?></span>
                                          </div>
                                          <div class="clearfix"></div>
                                        </div> <?php
                                      }

                              ?>

                            </div>
                          </div>
                        </div>
                             
                             
                             <div class="col-md-4 col-sm-4 ">
                          <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title">
                              <h2>Analysis of Total Cases</h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <table class="" style="width:100%">
                                <tr>
                                  <th style="width:37%;">

                                  </th>
                                  <th>
                                    <div class="col-lg-7 col-md-7 col-sm-7 ">
                                      <p class="">Device</p>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 ">
                                      <p class="">Progress</p>
                                    </div>
                                  </th>
                                </tr>
                                <tr>
                                  <td>
                                    <canvas id = "doughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                                  </td>
                                  <td>
                                    <table class="tile_info">
                                      <tr>
                                        <td>
                                          <p><i class="fa fa-square green"></i>Recovered</p>
                                        </td>
                                        <td><?php echo round($recoveryRate[$count-1]); ?>%</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <p><i class="fa fa-square red"></i>Dead</p>
                                        </td>
                                        <td><?php echo round($deathRate[$count-1]); ?>%</td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <p><i class="fa fa-square purple"></i>Open Cases </p>
                                        </td>
                                        <td><?php echo round(($underTreatment/$positiveCases[$count-1])*100); ?>%</td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                 
                        </div>            
                </div>
                </div>

              
              <div class="collapse" id="DhakaData">
                     <div class="card card-body">  
                        
                         
                    </div>
                </div>

              <div class="collapse" id="AnalysisofTotalCases">
                     <div class="card-body">  
                        
                  </div>
                </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script>

      var graph1 = document.getElementById('myChart');
      var doughnut = document.getElementById('doughnut');
      var graph2 = document.getElementById('myChart2');
      var graph3 = document.getElementById('myChart3');
      var graph4 = document.getElementById('myChart4');
      var graph5 = document.getElementById('myChart5');
      var graph6 = document.getElementById('myChart6');

      Chart.defaults.global.animation.duration = 3000;

      var myChart = new Chart(graph1, {
          type: 'line',
          data: {
            labels: <?php echo json_encode($dateString); ?>,
            datasets: [{
              label: "Death Rate",
              backgroundColor: "rgba(255, 0, 0, 0.1)",
              borderColor: "rgba(255, 0, 0, 1)",
              pointBorderColor: "rgba(255, 0, 0, 1)",
              pointBackgroundColor: "rgba(255, 0, 0, 1)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 5,
              data: <?php echo json_encode($deathRate); ?>
            }, {
              label: "Recovery Rate",
              backgroundColor: "rgba(42, 187, 155, 0.1)",
              borderColor: "rgba(42, 187, 155, 1)",
              pointBorderColor: "rgba(42, 187, 155, 1)",
              pointBackgroundColor: "rgba(42, 187, 155, 1)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(42, 187, 155, 1)",
              pointBorderWidth: 5,
              data: <?php echo json_encode($recoveryRate); ?>
            }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });

      var myChart = new Chart(graph2, {
          type: 'line',
          data: {
            labels: <?php echo json_encode($dateString); ?>,
            datasets: [{
              label: "Death Cases",
              backgroundColor: "rgba(255, 0, 0, 0.1)",
              borderColor: "rgba(255, 0, 0, 1)",
              pointBorderColor: "rgba(255, 0, 0, 1)",
              pointBackgroundColor: "rgba(255, 0, 0, 1)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 5,
              data: <?php echo json_encode($deathCases); ?>
            }, {
              label: "Recovered",
              backgroundColor: "rgba(42, 187, 155, 0.1)",
              borderColor: "rgba(42, 187, 155, 1)",
              pointBorderColor: "rgba(42, 187, 155, 1)",
              pointBackgroundColor: "rgba(42, 187, 155, 1)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(42, 187, 155, 1)",
              pointBorderWidth: 5,
              data: <?php echo json_encode($recovered); ?>
            }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });

      var myChart = new Chart(graph3, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($dateString); ?>,
            datasets: [{
              label: "Daily Cases",
              backgroundColor: "rgba(255, 0, 0, 0.9)",
              borderColor: "rgba(255, 0, 0, 1)",
              pointBorderColor: "rgba(255, 0, 0, 1)",
              pointBackgroundColor: "rgba(255, 0, 0, 1)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 5,
              data: <?php echo json_encode($last24HoursCases); ?>
            }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });

      var myChart = new Chart(graph4, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($dateString); ?>,
            datasets: [{
              label: "Total Cases",
              backgroundColor: "rgba(255, 0, 0, 0.9)",
              borderColor: "rgba(255, 0, 0, 1)",
              pointBorderColor: "rgba(255, 0, 0, 1)",
              pointBackgroundColor: "rgba(255, 0, 0, 1)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 5,
              data: <?php echo json_encode($positiveCases); ?>
            }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });

      var myChart = new Chart(graph5, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($dateString); ?>,
            datasets: [{
              label: "Recoveries in Last 24 Hours",
              backgroundColor: "rgba(255, 0, 0, 0.9)",
              borderColor: "rgba(255, 0, 0, 1)",
              pointBorderColor: "rgba(255, 0, 0, 1)",
              pointBackgroundColor: "rgba(255, 0, 0, 1)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 5,
              data: <?php echo json_encode($newRecoveries); ?>
            }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });

      var myChart = new Chart(graph6, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($dateString); ?>,
            datasets: [{
              label: "Daily Deaths",
              backgroundColor: "rgba(255, 0, 0, 0.9)",
              borderColor: "rgba(255, 0, 0, 1)",
              pointBorderColor: "rgba(255, 0, 0, 1)",
              pointBackgroundColor: "rgba(255, 0, 0, 1)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 5,
              data: <?php echo json_encode($deathsInLast24Hours); ?>
            }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });


      var myChart = new Chart(doughnut, {
        type: 'doughnut',
        data: {
          labels: ["Dead", "Recovered", "Open Cases"],
          datasets: [{
            label: '',
            data: <?php echo json_encode($pieData); ?>,
            backgroundColor: [
              'rgba(207, 0, 15, 0.7)',
              'rgba(42, 187, 155, 1)',
              'rgba(102, 51, 153,0.7)'
            ],
            borderColor: [
              'rgba(207, 0, 15, 1)',
              'rgba(42, 187, 155, 1)',
              'rgba(102, 51, 153, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
         	//cutoutPercentage: 40,
          responsive: false,

          legend: {
            display: false,
          }

        }
      });

    </script>

  </body>
</html>
