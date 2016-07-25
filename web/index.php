<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/



project by Charles MUiruri , njarambacharles01@gmail.com

            Dennis MUoki, muokid3@gmail.com

A SCI-GaIA Based project.
-->
<!DOCTYPE html>

<!DOCTYPE html>

<?php
    
    
						$password = $_POST['Password'];
						$Username = $_POST['Username'];


						//echo $Username." ".$password;
						try{
						
						$ENDPOINT = "http://glibrary.ct.infn.it:3500/v2/users/login";
						$HEADER = "Content-Type: application/json";
						$body = json_encode(array("username" => $Username, "password" => $password));
						//$body =  "";

							$ch = curl_init(); // intialize curl
							curl_setopt($ch, CURLOPT_URL, $ENDPOINT); // point to endpoint 
							//curl_setopt($ch, CURLOPT_HEADER, $HEADER); // if no headers

							curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: application/json'));

							curl_setopt($ch, CURLOPT_VERBOSE, '1'); // not verbal
							curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
							curl_setopt($ch, CURLOPT_POSTFIELDS, $body);  //data
							curl_setopt($ch, CURLOPT_TIMEOUT, 60);// request time out
							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0'); // no ssl verifictaion
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');

							$result=curl_exec($ch);

							
							$data = json_decode($result);
							

							if (!$data->error) {
								#success
								

								header('Location: record.php');
								exit();

							}
							else
							{
								# login failure
								echo "login failure";
                            }


						}
						catch(Exception $e)
						{
							echo $e;
						}

	?>

    <html>

    <head>
        <title>PHG WEB PORTAL DEM</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Easy Multiple Forms Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript">
            addEventListener("load", function() {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }

        </script>
        <!-- //for-mobile-apps -->
        <!-- js -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <!-- //js -->
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href='//fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="main">
            <div>
                <h1><image src="images/group.png" alt=""/>PHG WEB PORTAL DEMO </h1>

            </div>
            <div class="w3l_main_grids">
                <div class="clear"> </div>
                <div class="wthree_leave_your_comment">
                    <div class="w3l_main_grids_right_grid1">
                        <form action="#" method="post">
                            <input type="text" name="Username" placeholder="Your Username" required=" ">
                            <input placeholder="Passphrase" name="Password" type="password" required="">
                            <input type="submit" value="Submit">
                        </form>

                        <div class="close1"> </div>

                    </div>


                </div>
                <div class="clear"> </div>
                <div class="close4"> </div>
            </div>
            <script>
                $(document).ready(function(c) {
                    $('.close4').on('click', function(c) {
                        $('.wthree_leave_your_comment').fadeOut('slow', function(c) {
                            $('.wthree_leave_your_comment').remove();
                        });
                    });
                });

            </script>
        </div>
        <div class="copyright">
            <p> <a style="Color:white" href="https://github.com/AAROC/PHG">© 2016 Pulic Health Gateway . All rights reserved</a>| Design by <a href="http://w3layouts.com" style="Color:white">W3layouts</a></p>
        </div>
        </div>
    </body>

    </html>
