<?php

      include("config.php");

      mysqli_set_charset($con,"utf8");

      $sql = "Select * from iedcrdata";

      $regionData = "SELECT * FROM `regiondata`";

      $dhakaData = "Select * from `dhakadata`";

      $totalCaseDhaka = "Select * from `regiondata` where Location = 'Dhaka City'";

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

      $percentagePositive = ($last24HoursCases[$count-1] / $positiveCases[$count-2]) * 100;

      $percentageDeath = ($deathsInLast24Hours[$count-1] / $deathCases[$count-2]) * 100;

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

      $covidSql = "SELECT * FROM `covidnews` WHERE `Title` LIKE '%করোনা%' OR `Title` LIKE '%CORONA%'";
      $covidRes = mysqli_query($con,$covidSql);

      $awareSql = "SELECT * from awarenessnews";
      $awareRes = mysqli_query($con,$awareSql);

 ?>
