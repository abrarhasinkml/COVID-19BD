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
    <span class="count_bottom"><?php if($percentagePositive > 0) echo '<i class="red"><i class="fa fa-sort-asc"></i>' .round($percentagePositive,2) .'%</i> From last day</span>'; ?>
  </div>
  <div class="col-md-3 col-sm-4  tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Death Cases</span>
    <div class="count red"><?php echo $deathCases[$count-1]; ?></div>
    <span class="count_bottom"><?php if($percentageDeath > 0) echo '<i class="red"><i class="fa fa-sort-asc"></i>'.round($percentageDeath,2) .'%</i> From last day</span>'; ?>
  </div>
  <div class="col-md-3 col-sm-4  tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Recovery Rate</span>
    <div class="count green"><?php echo round($recoveryRate[$count-1],2); ?>%</div>
    <span class="count_bottom">
      <?php
        if(round($percentageRecovery,2) > 0)
          echo '<i class="green"><i class="fa fa-sort-asc"></i>' .round($percentageRecovery,2) .'%</i> From last day</span>';
        else if(round($percentageRecovery,2) == 0)
          echo '<i class="green">' .abs(round($percentageRecovery)) .'%</i> From last day</span>';
        else
          echo '<i class="red"><i class="fa fa-sort-desc"></i>' .abs(round($percentageRecovery,2)) .'%</i> From last day</span>';
      ?>
  </div>
  <div class="col-md-3 col-sm-4  tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Death Rate</span>
    <div class="count red"><?php echo round($deathRate[$count-1],2); ?>%</div>
    <span class="count_bottom">
      <?php
        if($deathRate[$count-1] > $deathRate[$count-2])
          echo '<i class="red"><i class="fa fa-sort-asc"></i>' .round($percentageDeathRate,2) .'%</i> From last day</span>';
        else if(round($deathRate[$count-1] - $deathRate[$count-2],2) == 0)
          echo '<i class="green">' .abs(round($percentageDeathRate)) .'%</i> From last day</span>';
        else
          echo '<i class="green"><i class="fa fa-sort-desc"></i>' .abs(round($percentageDeathRate,2)) .'%</i> From last day</span>';
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
<div>
<p>Last Updated: <?php echo date('jS F Y', strtotime($date[$count-1])); ?><p>
</div>
