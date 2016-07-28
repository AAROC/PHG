 <?php
//echo $Username." ".$password;
function acquiretookenk(){


 $Username = 'muokid3';
 $password = 'st34lthfr34k';

  try {
      $ENDPOINT = 'http://glibrary.ct.infn.it:3500/v2/users/login';
      $HEADER = 'Content-Type: application/json';
      $body = json_encode(array(
          'username' => $Username,
          'password' => $password,
      ));
      //$body =  "";

      $ch = curl_init(); // intialize curl
      curl_setopt($ch, CURLOPT_URL, $ENDPOINT); // point to endpoint
      //curl_setopt($ch, CURLOPT_HEADER, $HEADER); // if no headers

      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json',
      ));

      curl_setopt($ch, CURLOPT_VERBOSE, '1'); // not verbal
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $body); //data
      curl_setopt($ch, CURLOPT_TIMEOUT, 60); // request time out
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0'); // no ssl verifictaion
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');

      $result = curl_exec($ch);

      $data = json_decode($result);
      session_start();
      $_SESSION['token'] = $data->id;

  } catch (Exception $e) {
      echo $e;
  }



}
?>
