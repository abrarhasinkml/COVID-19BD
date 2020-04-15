<?php

      include("config.php");
      mysqli_set_charset($con,"utf8");

      $sql = "Select * from iedcrdata";

      $regionData = "Select * from regionData";

      $dhakaData = "Select * from dhakadata";

      $totalCaseDhaka = "Select * from regionData where Location = 'Dhaka City'";

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

      $percentagePositive = ($last24HoursCases[$count-1] / $positiveCases[$count-3]) * 100;

      $percentageDeath = ($deathsInLast24Hours[$count-1] / $deathCases[$count-3]) * 100;

      $percentageRecovery = $recoveryRate[$count-1] - $recoveryRate[$count-2];

      $percentageDeathRate = $deathRate[$count-1] - $deathRate[$count-2];

      for($i = 0; $i <= $count-1; $i++)
      {
        $dateString[] = date('jS F', strtotime($date[$i]));
      }

      $underTreatment = $positiveCases[$count-1] - $recovered[$count-1] - $deathCases[$count-1];

      $openCases = round(($underTreatment / $positiveCases[$count-1]) * 100);

      $pieData = [round($recoveryRate[$count-1]), round($deathRate[$count-1]), $openCases];

      $regionLocation = array();
      $regionFreq = array();

      $areaLocation = array();
      $areaFreq = array();

      while ($row = mysqli_fetch_array($regionRes)) {

          $regionLocation[] = $row['Location'];
          $regionFreq[] = $row['Freq.'];
      }

      while ($row = mysqli_fetch_array($dhakaRes)) {

          $areaLocation[] = $row['Location'];
          $areaFreq[] = $row['Freq.'];
      }

      $covidSql = "SELECT * FROM `covidnews` WHERE `Title` LIKE '%করোনা%'";
      $covidRes = mysqli_query($con,$covidSql);

      $awareSql = "SELECT * from awarenessnews";
      $awareRes = mysqli_query($con,$awareSql);

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

    <style>
          @media (max-width: 991px) {
          .nav-md .container.body .col-md-3.left_col {
              display: block;
          }

          .nav-md .container.body .right_col {
              margin-left: 230px;
          }
        }

        .aboutTable {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        .aboutTable td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        .aboutTable tr:nth-child(even) {
          background-color: #dddddd;
        }

        .wrapper {
          height: 500px !important;
        }

        ::-webkit-scrollbar {
            width: 12px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(200,200,200,1);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color:#fff;
            -webkit-box-shadow: inset 0 0 6px rgba(90,90,90,0.7);
        }
        #myChart{
          responsive: True;
        }

    </style>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KKH7447');</script>
    <!-- End Google Tag Manager -->

  </head>

  <body class="nav-md">
      <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKH7447"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
     <!-- End Google Tag Manager (noscript) -->

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
               <a href="index.php" class="site_title"><img src="images/main_image.png" alt="Covid19BD"  style='height: 100%; width: 100%; object-fit: contain'></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa"></span></a>

                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="" id="rate">Death/Recovery Rate</a></li>
                        <li><a href="" id="deathRecovery">Death Vs Recovery</a></li>
                        <li><a href="" id="dailyCases">Daily Cases</a></li>
                        <li><a href="" id="totalCases">Total Cases</a></li>
                      <li><a href="" id="recoveries">Recoveries in Last 24 Hours</a></li>
                        <li><a href="" id="dailyDeaths">Daily Deaths</a></li>
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
                  if(round($percentageRecovery) > 0)
                    echo '<i class="green"><i class="fa fa-sort-asc"></i>' .round($percentageRecovery) .'%</i> From last day</span>';
                  else if(round($percentageRecovery) == 0)
                    echo '<i class="green">' .abs(round($percentageRecovery)) .'%</i> From last day</span>';
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
                  else if(round($deathRate[$count-1] - $deathRate[$count-2]) == 0)
                    echo '<i class="green">' .abs(round($percentageDeathRate)) .'%</i> From last day</span>';
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
                    <div class="dashboard_graph">

                      <div class="row x_title">
                        <div class="col-md-6">
                          <h3 id="graphTitle">Total Cases</h3>
                        </div>
                        <div class="col-md-6">
                        </div>
                      </div>

                      <div class="col-md-9 col-sm-9 ">
                      <canvas id="myChart" height="fit-content" width="fit-content"></canvas>
                      <div class="clearfix"></div>
                      </div>


                    </div>
          </div>
        </div>
          <br />
          <br />
          <div class="row">


            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile">
                <div class="x_title">
                  <h2>Region Based Data</h2>
                  <div class="clearfix"></div>
                </div>
                <div class = "prevRegionData">

                <div class="x_content">

                  <?php
                          $x = 0;
                          while ($x<5) { ?>
                              <div class="widget_summary">
                                <div class="w_left w_25">
                                  <span><?php echo $regionLocation[$x]; ?></span>
                                </div>
                                <div class="w_center w_55">
                                  <div class="">
                                    <div class="progress progress" style="width: 76%;">
                                      <div class="progress-bar bg-red" role="progressbar" data-transitiongoal="<?php echo round(($regionFreq[$x]/$positiveCases[$count-1])*100); ?>"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="w_right w_20">
                                  <span><?php echo $regionFreq[$x]; ?></span>
                                </div>
                                <div class="clearfix"></div>
                              </div> <?php
                              $x++;
                          } ?>
                    </div>
                    <div style="text-align:center">
                      <button id="regionShow" style="border:none;"><img src="./images/showMore.png" style="width:20px;height:20px;"> </button>
                    </div>
                  </div>

                  <div class="regionData" style="display:none;">
                      <div class="x_content">
                          <?php

                          for($j = 0; $j < count($regionLocation); $j++) { ?>

                            <div class="widget_summary">
                              <div class="w_left w_25">
                                <span><?php echo $regionLocation[$j]; ?></span>
                              </div>
                              <div class="w_center w_55">
                                <div class="">
                                  <div class="progress progress" style="width: 76%;">
                                    <div class="progress-bar bg-red" role="progressbar" data-transitiongoal="<?php echo round(($regionFreq[$j]/$positiveCases[$count-1])*100); ?>"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="w_right w_20">
                                <span><?php echo $regionFreq[$j]; ?></span>
                              </div>
                              <div class="clearfix"></div>
                            </div>

                          <?php
                          } ?>
                          <div style="text-align:center">
                            <button id="regionHide" style="border:none;"><img src="./images/showLess.png" style="width:20px;height:20px;"> </button>
                          </div>
                    </div>

                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile">
                <div class="x_title">
                  <h2>Dhaka Data</h2>
                  <div class="clearfix"></div>
                </div>
                <div class = "prevDhakaData">

                <div class="x_content">

                  <?php
                          $x = 0;
                          while ($x<5) { ?>
                              <div class="widget_summary">
                                <div class="w_left w_25">
                                  <span><?php echo $areaLocation[$x]; ?></span>
                                </div>
                                <div class="w_center w_55">
                                  <div class="">
                                    <div class="progress progress" style="width: 76%;">
                                      <div class="progress-bar bg-red" role="progressbar" data-transitiongoal="<?php echo round(($areaFreq[$x]/$positiveCases[$count-1])*100); ?>"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="w_right w_20">
                                  <span><?php echo $areaFreq[$x]; ?></span>
                                </div>
                                <div class="clearfix"></div>
                              </div> <?php
                              $x++;
                          } ?>

                    </div>
                    <div style="text-align:center">
                      <button id="dhakaShow" style="border:none;"><img src="./images/showMore.png" style="width:20px;height:20px;"> </button>
                    </div>
                  </div>

                  <div class="dhakaData" style="display:none;">
                      <div class="x_content">
                          <?php

                          for($j = 0; $j < count($areaLocation)-1; $j++) { ?>

                            <div class="widget_summary">
                              <div class="w_left w_25">
                                <span><?php echo $areaLocation[$j]; ?></span>
                              </div>
                              <div class="w_center w_55">
                                <div class="">
                                  <div class="progress progress" style="width: 76%;">
                                    <div class="progress-bar bg-red" role="progressbar" data-transitiongoal="<?php echo round(($areaFreq[$j]/$dhaka)*100); ?>"></div>
                                  </div>
                                </div>
                              </div>
                              <div class="w_right w_20">
                                <span><?php echo $areaFreq[$j]; ?></span>
                              </div>
                              <div class="clearfix"></div>
                            </div>

                          <?php
                          } ?>
                          <div style="text-align:center">
                            <button id="dhakaHide" style="border:none;"><img src="./images/showLess.png" style="width:20px;height:20px;"> </button>
                          </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 ">
              <div class="x_panel tile" style="height:311.5px">
                <div class="x_title">
                  <h2>Analysis of Total Cases</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">

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
          <div class="row">
            <div class="col-md-6">
                              <div class="overflow-auto" style="height:475px;">
                    <?php
                      while ($row = mysqli_fetch_array($covidRes)) { ?>

                      <div class="col-lg-12">
                        <div class="x_panel tile">
                        <a href = "<?php echo $row['link']; ?>" target="_blank">
                          <div class="x_content">
                            <div class="widget_summary">
                              <div class="w_left w_45">
                                <img src="<?php echo $row['image']; ?>" style="width:170px;height:100px;">
                              </div>
                              <div class="w_right w_55">
                                <div class="">
                                    <h6> <?php echo $row['Title']; ?></h6>
                                    <p>Source: <?php echo $row['Source']; ?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>

                    <?php
                      }
                     ?>

                      <div class="clearfix"></div>
                    </div>

              </div>

              <div class="col-md-6 ">
                <div class="overflow-auto" style="height:475px;">
                      <?php
                        while ($row = mysqli_fetch_array($awareRes)) { ?>

                          <div class="col-lg-12">
                            <div class="x_panel tile">
                            <a href = "<?php echo $row['link']; ?>" target="_blank">
                              <div class="x_content">
                                <div class="widget_summary">
                                  <div class="w_left w_45">
                                    <img src="<?php echo $row['image']; ?>" style="width:170px;height:100px;">
                                  </div>
                                  <div class="w_right w_55">
                                    <div class="">
                                        <h6> <?php echo $row['Title']; ?></h6>
                                        <p>Source: <?php echo $row['Source']; ?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </a>
                          </div>
                        </div>

                      <?php
                        }
                       ?>

                        <div class="clearfix"></div>
                </div>
              </div>
          </div> </br> </br>
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
                    <div class="dashboard_graph">

                      <div class="x_panel tile">
                        <div class="x_title">
                          <h1>About</h2>
                          <div class="clearfix"></div>
                        </div>

                      <div class="col-lg-12">
                        <div class="x_content">
                          <p align="justify">COVID-19 Stat BD (Bangladesh) is a community-based website that comprises various data surrounding the Coronavirus pandemic in Bangladesh. The data shown in the website is collected from IEDCR (Institute of Epidemiology, Disease Control and Research) daily. The page serves as a portal for the public to view the status of the disease outbreak in Bangladesh. We aim to present the data in a more visual manner for the general population. The platform is continuously under works for improvement that makes data more accessible to the general public. </p> </br>

                          <p>We thank you for visiting the page. Stay safe, stay indoors.</p> </br>
                          <p>The sources of the data can be found in the table below:</p> </br>
                      <table class="aboutTable">
                        <tr>
                          <th>Data</th>
                          <th>Description</th>
                          <th>Source</th>
                        </tr>
                        <tr>
                          <td>Daily tally of COVID-19</td>
                          <td>The total number of COVID-19 positive cases </br>
                              The number of COVID-19 positives in the last 24 hours </br>
                              Number of Recoveries in Total and in the last 24 hours </br>
                              Number of Deaths in Total and in the last 24 hours
                          </td>
                          <td><a href="https://www.iedcr.gov.bd">IEDCR</a></td>
                        </tr>
                        <tr>
                          <td>Recovery Rate</td>
                          <td>Calculated using </br>
                             *Total Recovered </br>
                             *Total Positives</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Death Rate</td>
                          <td>Calculated using </br>
                             *Total Deaths </br>
                             *Total Positives</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>Region Based & Area wise (Dhaka) Tally</td>
                          <td> A tally count of the number of affected presented in an area wise manner</td>
                          <td>IEDCR ( Distribution of confirmed cases in Bangladesh )</td>
                        </tr>
                        <tr>
                          <td>News Ticker</td>
                          <td>Recent news from national news portals and e-papers</td>
                          <td> <a href="https://www.ittefaq.com.bd/national">Ittefaq </a></br>
                               <a href="https://www.prothomalo.com/bangladesh">Prothom Alo </a> </br>
                               <a href="https://www.bbc.com/bengali">BBC Bangla </a> </br>
                               <a href="https://bangla.bdnews24.com/covid19-awareness-video/">Ntv BD </a>
                          </td>
                        </tr>
                        <tr>
                          <td>Awareness Ticker</td>
                          <td>Facts and awareness related articles about COVID-19</td>
                          <td><a href="https://bangla.bdnews24.com/covid19-awareness-video/">Bdnews24.com</a></td>
                        </tr>
                      </table>
                      </div>
                      </div>

                      <div class="clearfix"></div>
                    </div>
          </div>
        </div>
      </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <!-- hitwebcounter Code START -->
            <a href="https://www.hitwebcounter.com" target="_blank">
            <img src="https://hitwebcounter.com/counter/counter.php?page=7230694&style=0007&nbdigits=5&type=ip&initCount=0" title="User Stats" Alt="PHP Hits Count"   border="0" >
            </a>
            Unique Visitors
          </div> </br>
          <div class="pull-right">
            GGWP
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
      $('#regionShow').click(function(){
        $('.prevRegionData').hide();
        $('.regionData').show();
        return false;
      });
      $('#regionHide').click(function(){
        $('.prevRegionData').show();
        $('.regionData').hide();
        return false;
      });
      $('#dhakaShow').click(function(){
        $('.prevDhakaData').hide();
        $('.dhakaData').show();
        return false;
      });
      $('#dhakaHide').click(function(){
        $('.prevDhakaData').show();
        $('.dhakaData').hide();
        return false;
      });
    </script>


    <script>

      var graph1 = document.getElementById('myChart');
      var doughnut = document.getElementById('doughnut');

      Chart.defaults.global.animation.duration = 3000;

      var rateChart = {
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
            responsive:true,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      };

      var deathRecoveryGraph = {
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
              responsive:true,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      };

      var dailyCases = {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($dateString); ?>,
            datasets: [{
              label: "Daily Cases",
              backgroundColor: "rgba(255,165,0, 0.9)",
              borderColor: "rgba(255,165,0, 1)",
              pointBorderColor: "rgba(255,165,0, 1)",
              pointBackgroundColor: "rgba(255,165,0 , 1)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 5,
              data: <?php echo json_encode($last24HoursCases); ?>
            }]
          },
          options: {
            responsive:true,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      };

      var totalCases = {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($dateString); ?>,
            datasets: [{
              label: "Total Cases",
              backgroundColor: "rgba(0,0,76, 0.9)",
              borderColor: "rgba(0,0,76, 1)",
              pointBorderColor: "rgba(0,0,76, 1)",
              pointBackgroundColor: "rgba(0,0,76, 1)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 5,
              data: <?php echo json_encode($positiveCases); ?>
            }]
          },
          options: {
            responsive:true,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      };

      var recoveries24 = {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($dateString); ?>,
            datasets: [{
              label: "Recoveries in Last 24 Hours",
              backgroundColor: "rgba(76,166,76, 0.9)",
              borderColor: "rgba(76,166,76, 1)",
              pointBorderColor: "rgba(76,166,76, 1)",
              pointBackgroundColor: "rgba(76,166,76, 1)",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgba(220,220,220,1)",
              pointBorderWidth: 5,
              data: <?php echo json_encode($newRecoveries); ?>
            }]
          },
          options: {
            responsive:true,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      };

      var dailyDeaths = {
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
            responsive:true,
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      };

      var rate = new Chart(graph1,totalCases);

      $('#rate').click(function(){
        $("#graphTitle").html("Death/Recovery Rate");
        rate.destroy();
        rate = new Chart(graph1,rateChart);
        return false;
      });

      $('#deathRecovery').click(function(){

        rate.destroy();
        $("#graphTitle").html("Death vs Recovery");
        rate = new Chart(graph1,deathRecoveryGraph);
        return false;
      });

      $('#dailyCases').click(function(){
        $("#graphTitle").html("Daily Cases");
        rate.destroy();
        rate = new Chart(graph1,dailyCases);
        return false;
      });

      $('#totalCases').click(function(){
        $("#graphTitle").html("Total Cases");
        rate.destroy();
        rate = new Chart(graph1,totalCases);

        return false;
      });

      $('#recoveries').click(function(){
        $("#graphTitle").html("Recoveries in Last 24 Hours");
        rate.destroy();
        rate = new Chart(graph1,recoveries24);

        return false;
      });

      $('#dailyDeaths').click(function(){
        $("#graphTitle").html("Daily Deaths");
        rate.destroy();
        rate = new Chart(graph1,dailyDeaths);

        return false;
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
