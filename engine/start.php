<?php
include 'acquiretooken.php';


acquiretookenk();
if (!$data->error) {

      include 'apicalls.php';
    #success
    $token = $_SESSION['token'];

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
