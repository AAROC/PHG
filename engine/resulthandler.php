<?php


function pushresult($token, $gps, $severity, $id){

echo "string";
  try {
      $ENDPOINT = 'http://glibrary.ct.infn.it:3500/v2/repos/phg/accident_analyser';
      $HEADER = 'Content-Type: application/json';

      $body = json_encode(array(
          'gps_location' => "(37.52383941990069, 15.075033903121948)",
          'severity' => $severity,
          'parentid' => $id
      ));
      //$body =  "";
      $ch = curl_init(); // intialize curl
      curl_setopt($ch, CURLOPT_URL, $ENDPOINT); // point to endpoint
      //curl_setopt($ch, CURLOPT_HEADER, $HEADER); // if no headers

      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          'Content-Type: application/json','Authorization: '.$token
      ));

      curl_setopt($ch, CURLOPT_VERBOSE, '1'); // not verbal
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $body); //data
      curl_setopt($ch, CURLOPT_TIMEOUT, 60); // request time out
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0'); // no ssl verifictaion
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');

      $result = curl_exec($ch);

      $data = json_decode($result);

      print_r($result);
  } catch (Exception $e) {
      echo $e;
  }


}


function droptables($token){

  try {
      $ENDPOINT = 'http://glibrary.ct.infn.it:3500/v2/repos/phg/accident_analyser';
    //$HEADER = 'Authorization: '.$token;
    $ch = curl_init(); // intialize curl
    curl_setopt($ch, CURLOPT_URL, $ENDPOINT); // point to endpoint
    //curl_setopt($ch, CURLOPT_HEADER, $HEADER); // if no headers

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json', 'Authorization: '.$token,
    ));

      curl_setopt($ch, CURLOPT_VERBOSE, '1'); // not verbal
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_TIMEOUT, 60); // request time out
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0'); // no ssl verifictaion
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');

      $result = curl_exec($ch);

        //print_r($result);
      $data = json_decode($result);
      $positionunfiltred = array();
      $clusterids = array();
     for ($i=0; $i < sizeof($data); $i++) {
          execdelete($data[$i]->id, $token);
        //var_dump($data);

      }
    //  print_r($positionunfiltred);
  } catch (Exception $e) {
      echo $e;
  }


}


function execdelete($id, $token){


      try {
          $ENDPOINT = 'http://glibrary.ct.infn.it:3500/v2/repos/phg/accident_analyser/'.$id;
          $HEADER = 'Content-Type: application/json';

          //$body =  "";
          $ch = curl_init(); // intialize curl
          curl_setopt($ch, CURLOPT_URL, $ENDPOINT); // point to endpoint
          //curl_setopt($ch, CURLOPT_HEADER, $HEADER); // if no headers

          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json','Authorization: '.$token
          ));

          curl_setopt($ch, CURLOPT_VERBOSE, '1'); // not verbal

      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_TIMEOUT, 60); // request time out
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0'); // no ssl verifictaion
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');

          $result = curl_exec($ch);
      } catch (Exception $e) {
          echo $e;
      }
}

 ?>
