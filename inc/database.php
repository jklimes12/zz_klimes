<?php

mysqli_report(MYSQLI_REPORT_ERROR )| MYSQLI_REPORT_STRICT;
  try {
    $mysqli = new mysqli("localhost","root","root","zz_klimes");
    $mysqli -> set_charset("utf8mb4");

  } catch (\Exception $e) {
    error_log($e->getMessage());
    exit("error connecting to database");
  }
 ?>
