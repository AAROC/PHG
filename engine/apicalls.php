<?php
include 'resulthandler.php';

function fetch_accidents($token)
{
    try {
        $ENDPOINT = 'http://glibrary.ct.infn.it:3500/v2/repos/phg/accident_police';
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
       droptables($token);
       for ($i=0; $i < sizeof($data); $i++) {
         echo "string888888888";
            array_push($positionunfiltred, $data[$i]->gps);
            //array_push($position,"blue","yellow");
            //array_push($position,floor($data[$i]->gps));
            //pushresult($token,$data[$i]->gps,$data[$i]->severity,$data[$i]->id);
//var_dump($data);



          //  echo "string";
  $id = captureid($token);
        }
      //  print_r($positionunfiltred);
    } catch (Exception $e) {
        echo $e;
    }
}
