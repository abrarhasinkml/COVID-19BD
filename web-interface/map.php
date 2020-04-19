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

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <script src="heatmap.js"></script>
    <script src="leaflet-heatmap.js"></script>

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
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K85WRB2');</script>
    <!-- End Google Tag Manager -->

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
                    <h2>COVID-19 Heat Map</h2>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content">
                        <div id="mapid" style="width: 100%; height: 600px;"></div>
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
<script>

var regionLat = <?php echo json_encode($regionLat); ?>;
var regionLon = <?php echo json_encode($regionLon); ?>;



var data = <?php echo json_encode($json); ?>;

console.log(data);

var baseLayer = L.tileLayer(
  'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
    attribution: '...',
    maxZoom: 18
  }
);

var cfg = {
  // radius should be small ONLY if scaleRadius is true (or small radius is intended)
  // if scaleRadius is false it will be the constant radius used in pixels
  "radius": 0.005,
  "maxOpacity": .5,
  // scales the radius based on map zoom
  "scaleRadius": true,
  // if set to false the heatmap uses the global maximum for colorization
  // if activated: uses the data maximum within the current map boundaries
  //   (there will always be a red spot with useLocalExtremas true)
  "useLocalExtrema": true,
  // which field name in your data represents the latitude - default "lat"
  latField: 'lat',
  // which field name in your data represents the longitude - default "lng"
  lngField: 'lng',
  // which field name in your data represents the data value - default "value"
  valueField: 'count'
};


var heatmapLayer = new HeatmapOverlay(cfg);

var bounds = [
[23.6238, 90.5000], // Southwest coordinates
[23.9999, 90.3000] // Northeast coordinates
];

var map = new L.Map('mapid', {
  center: new L.LatLng(23.7807777, 90.3492859),
  zoom: 12,
  minZoom: 11,
  layers: [baseLayer, heatmapLayer],
  maxBounds: bounds,
  maxBoundsViscosity: 1.0
});

heatmapLayer.setData(data);

</script>



</body>
</html>
