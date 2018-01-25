<?php
   error_reporting(E_ALL &~ E_NOTICE);
    $dbLink = new mysqli('localhost', 'root', '', 'pms');
     if(mysqli_connect_errno()) {
      die("MySQLI connection failed: ". mysqli_connect_error());
      }
?>