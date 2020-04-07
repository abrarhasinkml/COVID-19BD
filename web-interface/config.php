<?php

  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "covid19bd";

  $con = mysqli_connect($server,$username,$password,$db);

  if(!$con)
  {
    echo mysqli_connect_error();
  }

 ?>
