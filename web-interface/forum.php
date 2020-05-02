<?php

      include("requests.php");

      $regionData = "Select * from regiondata";

      $dhakaData = "Select * from dhakadata";

      $regionRes = mysqli_query($con,$regionData);
      $dhakaRes = mysqli_query($con,$dhakaData);

      $regionLocation = array();
      $regionLat = array();
      $regionLon = array();
      $regionFreq = array();

      $areaLocation = array();
      $areaLat = array();
      $areaLon = array();
      $areaFreq = array();

      $json = array(
         'max'      => '200',
         'data'  => array()
      );


      while ($row = mysqli_fetch_array($dhakaRes)) {

          $data = array(
          'lat' => $row['Latitude'],
          'lng' => $row['Longitude'],
          'count' => $row['Freq.'],
          );

          array_push($json['data'], $data);
      }

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
    

  </head>

  <body class="nav-md">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K85WRB2"
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
                <?php
                    include("sidebar.php");
                ?>
              <!-- /sidebar menu  -->



            </div>
          </div>

          <!-- page content -->
          <div class="right_col" role="main">
            <!-- top tiles -->
            <?php

              include("stats.php");

            ?>
            <!-- /top tiles -->

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel tile">
                  <div class="x_title">
                    <h2>COVID-19 FORUM</h2>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                        <div id="mapid" style="width: 100%; height: 600px;">
                        
                            <iframe src="http://covidstatusbd.live/forum/forums/" width="100%" height="100%" class="myIframe">
                                <p>Hi SOF</p>
                            </iframe>
                        </div>
                        
                    </div>
                </div>
              </div>
          </div>
        </div>
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
<script type="text/javascript" language="javascript"> 
$('.myIframe').css('height', $(window).height()+'px');
</script>



</body>
</html>
