<?php
    session_start();
    $token = $_SESSION["token"];
    
				try{
						
						$ENDPOINT = "http://glibrary.ct.infn.it:3500/v2/repos/phg/accident_analyser";
						$HEADER = "Authorization: ".$token;
						$HEADER2 = "Content-Type: application/json";
						
							$ch = curl_init(); // intialize curl
							curl_setopt($ch, CURLOPT_URL, $ENDPOINT); // point to endpoint 
							//curl_setopt($ch, CURLOPT_HEADER, $HEADER); // if no headers

							curl_setopt($ch,CURLOPT_HTTPHEADER,array($HEADER, $HEADER2));

							curl_setopt($ch, CURLOPT_VERBOSE, '1'); // not verbal
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							//curl_setopt($ch, CURLOPT_POSTFIELDS, $body);  //data
							curl_setopt($ch, CURLOPT_TIMEOUT, 60);// request time out
							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0'); // no ssl verifictaion
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');

							$result=curl_exec($ch);								
							$jsonDecoded = json_decode($result, true);
							echo $result;


						}
						catch(Exception $e)
						{
							echo $e;
						}
			

	
	 

?>