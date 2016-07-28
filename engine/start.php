<?php
include 'acquiretooken.php';


acquiretookenk();
if (!$data->error) {

      include 'apicalls.php';
    #success
    $token = $_SESSION['token'];

    if (!empty($token)) {
      try {
        echo "22222222222222222";
      fetch_accidents($token);

      } catch (Exception $e) {
        echo $e;
      }


    } else {
      echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        exit(0);
    }
} else {
    # login failure
    echo 'Incorrect Username or Password';

    exit(0);
}
