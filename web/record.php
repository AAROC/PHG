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

<?php
    session_start();
    $token = $_SESSION["token"];
    //echo $token;
?>

<body>
    <div class="main">
        <div>
            <h1><image src="images/group.png" alt=""/>PHG WEB PORTAL DEMO </h1>

        </div>
        <div class="w3l_main_grids">
            <div class="clear"> </div>
            <div class="wthree_leave_your_comment">
                <h3>Record Accident</h3>
                <div class="wthree_leave_your_commentl">
                    <form action="#" method="post">
                        <h4>County*</h4>
                        <input type="text" name="county" placeholder="Your County" required=" ">
                        <h4>Date*</h4>
                        <input type="text" name="date" placeholder="Date of accident " required=" ">

                        <div style="float: right">
                            <h4>Severity*</h4>
                            <select type="text" name="description">
                        
                            <option type="text"value="1">1</option>
                            <option type="text"value="2">2</option>
                            <option value="3" type="text">3</option>
                            <option value="4" type="text">4</option>
                            <option value="5"type="text">5</option>
                        </select>
                            <h4>Road Category*</h4>

                            <select type="text" name="description">
                        
                            <option type="text"value="highway">Highway</option>
                            <option type="text"value="driveway">Driveway</option>
                            <option value="parkway" type="text">Parkway</option>
                            <option value="singlecarriage" type="text">Single Carriage</option>
                            <option value="dualcarriage"type="text">Dual Carriage</option>
                        </select>
                        </div>

                        <h4>Surface*</h4>
                        <select type="text" name="description">
                        
                            <option type="text"value="tarmac">Tarmac </option>
                            <option type="text"value="dirt">Dirt </option>
                            <option value="paved" type="text">Paved </option>
                            <option value="sandy" type="text">Sandy </option>
                            <option value="concrete" type="text">Concrete</option>
                        </select>

                        <h4>Weather*</h4>
                        <select type="text" name="description">
                        
                            <option type="text"value="normal">NORMAL</option>
                            <option type="text"value="fog">FOG</option>
                            <option value="rain" type="text">RAIN</option>
                            <option value="hail" type="text">SNOW/HAIL</option>
                            <option value="dusty"type="text">DUSTY</option>
                        </select>


                        <h4>Location*</h4>
                        <input type="text" name="location" placeholder="Accident Location" required=" ">

                        <h4>Passangers*</h4>
                        <input type="text" name="passagerno" placeholder=" Passanger No" required=" ">




                    </form>
                </div>
                <div class="wthree_leave_your_commentr">





                    <div class="wthree_leave_your_commentl  " style="width:93% !important">

                        <h4>Vehile Make*</h4>
                        <input type="text" name="vehiclemake" placeholder="Vehicle Make" required=" " />

                        <h4>Vehicle Model*</h4>
                        <input type="text" name="vehiclemodel" placeholder="Vehicle Model" required=" ">

                        <h4>Vehicle Plate*</h4>
                        <input type="text" name="vehicleplate" placeholder="Vehicle Plate" required=" ">
                    </div>




                    <form action="#" method="post">

                        <h4>Your Comment Here*</h4>
                        <textarea name="Message" placeholder="Type Your Text Here...." required=" "></textarea>
                        <input type="submit" value="Submit">
                    </form>
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