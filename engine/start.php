<?php
session_start();
$token = $_SESSION['token'];
include 'acquiretooken.php';

acquiretookenk();

if (!$data->error) {
  include 'apicalls.php';
    #success


    if (!empty($token)) {
      try {
      fetch_accidents($token);

      } catch (Exception $e) {
        echo $e;
      }


    } else {
        exit(0);
    }
} else {
    # login failure
    echo 'Incorrect Username or Password';

    exit(0);
}
