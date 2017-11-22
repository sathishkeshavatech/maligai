<?php
include("dbc.php");
error_reporting(0);
checkadmin_function();
include("functions.php");
	
if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		addtocart($pid,1);
		header("location:index.php");
		exit();
		
		
		
		
	}

//$user_id = $_SESSION['user_id']; 
//if($user_id=="") {
//session_start();
//srand((double) microtime( ) *1000000);
//$random=rand();
//$autoid=$random;
//$_SESSION['user_id']= $autoid;
//exit();
//}
error_reporting (E_ALL ^ E_NOTICE);

										
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Maligai.Net</title>
<link rel="shortcut icon" href="images/maligai-logo.png" type="image/png">
<link rel="stylesheet" type="text/css" href="http://cdn.webrupee.com/font">
<link rel="stylesheet" href="css/ecommercestyle.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/backtotop.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/menuuu.css" type="text/css" media="screen">
<link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>	
<script type="text/javascript" src="js/popup.js"></script>
<script src="http://cdn.webrupee.com/js" type="text/javascript"></script>
<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js/jquery.dcmegamenu.1.3.3.js'></script>

<link href="css/green.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="js/jssor.core.js"></script>
    <script type="text/javascript" src="js/jssor.utils.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            //Reference http://www.jssor.com/development/slider-with-slideshow.html
            //Reference http://www.jssor.com/development/tool-slideshow-transition-viewer.html


            var _SlideshowTransitions = [
            //["Rotate Overlap"]
                {$Duration: 1200, $Zoom: 11, $Rotate: -1, $Easing: { $Zoom: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Round: { $Rotate: 0.5 }, $Brother: { $Duration: 1200, $Zoom: 1, $Rotate: 1, $Easing: $JssorEasing$.$EaseSwing, $Opacity: 2, $Round: { $Rotate: 0.5 }, $Shift: 90} }
            //["Switch"]
                , { $Duration: 1400, $Zoom: 1.5, $FlyDirection: 1, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Zoom: $JssorEasing$.$EaseInSine }, $ScaleHorizontal: 0.25, $Opacity: 2, $ZIndex: -10, $Brother: { $Duration: 1400, $Zoom: 1.5, $FlyDirection: 2, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Zoom: $JssorEasing$.$EaseInSine }, $ScaleHorizontal: 0.25, $Opacity: 2, $ZIndex: -10} }
            //["Rotate Relay"]
                , { $Duration: 1200, $Zoom: 11, $Rotate: 1, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Round: { $Rotate: 1 }, $ZIndex: -10, $Brother: { $Duration: 1200, $Zoom: 11, $Rotate: -1, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Round: { $Rotate: 1 }, $ZIndex: -10, $Shift: 600} }
            //["Doors"]
                , { $Duration: 1500, $Cols: 2, $FlyDirection: 1, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInOutCubic }, $ScaleHorizontal: 0.5, $Opacity: 2, $Brother: { $Duration: 1500, $Opacity: 2} }
            //["Rotate in+ out-"]
                , { $Duration: 1500, $Zoom: 1, $Rotate: 0.1, $During: { $Left: [0.6, 0.4], $Top: [0.6, 0.4], $Rotate: [0.6, 0.4], $Zoom: [0.6, 0.4] }, $FlyDirection: 6, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $ScaleHorizontal: 0.3, $ScaleVertical: 0.5, $Opacity: 2, $Brother: { $Duration: 1000, $Zoom: 11, $Rotate: -0.5, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Shift: 200} }
            //["Fly Twins"]
                , { $Duration: 1500, $During: { $Left: [0.6, 0.4] }, $FlyDirection: 1, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $Opacity: 2, $Outside: true, $Brother: { $Duration: 1000, $FlyDirection: 2, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $Opacity: 2} }
            //["Rotate in- out+"]
                , { $Duration: 1500, $Zoom: 11, $Rotate: 0.5, $During: { $Left: [0.4, 0.6], $Top: [0.4, 0.6], $Rotate: [0.4, 0.6], $Zoom: [0.4, 0.6] }, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $ScaleHorizontal: 0.3, $ScaleVertical: 0.5, $Opacity: 2, $Brother: { $Duration: 1000, $Zoom: 1, $Rotate: -0.5, $Easing: { $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Shift: 200} }
            //["Rotate Axis up overlap"]
                , { $Duration: 1200, $Rotate: -0.1, $FlyDirection: 5, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $ScaleHorizontal: 0.25, $ScaleVertical: 0.5, $Opacity: 2, $Brother: { $Duration: 1200, $Rotate: 0.1, $FlyDirection: 10, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $ScaleHorizontal: 0.1, $ScaleVertical: 0.7, $Opacity: 2} }
            //["Chess Replace TB"]
                , { $Duration: 1600, $Rows: 2, $FlyDirection: 1, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Brother: { $Duration: 1600, $Rows: 2, $FlyDirection: 2, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2} }
            //["Chess Replace LR"]
                , { $Duration: 1600, $Cols: 2, $FlyDirection: 8, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Brother: { $Duration: 1600, $Cols: 2, $FlyDirection: 4, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2} }
            //["Shift TB"]
                , { $Duration: 1200, $FlyDirection: 4, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Brother: { $Duration: 1200, $FlyDirection: 8, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2} }
            //["Shift LR"]
                , { $Duration: 1200, $FlyDirection: 1, $Easing: { $Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Brother: { $Duration: 1200, $FlyDirection: 2, $Easing: { $Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2} }
            //["Return TB"]
                , { $Duration: 1200, $FlyDirection: 8, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $ZIndex: -10, $Brother: { $Duration: 1200, $FlyDirection: 8, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $ZIndex: -10, $Shift: -100} }
            //["Return LR"]
                , { $Duration: 1200, $Delay: 40, $Cols: 6, $FlyDirection: 1, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Easing: { $Left: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $ZIndex: -10, $Brother: { $Duration: 1200, $Delay: 40, $Cols: 6, $FlyDirection: 1, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Easing: { $Top: $JssorEasing$.$EaseInOutQuart, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $ZIndex: -10, $Shift: -100} }
            //["Rotate Axis down"]
                , { $Duration: 1500, $Rotate: 0.1, $During: { $Left: [0.6, 0.4], $Top: [0.6, 0.4], $Rotate: [0.6, 0.4] }, $FlyDirection: 10, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $ScaleHorizontal: 0.1, $ScaleVertical: 0.7, $Opacity: 2, $Brother: { $Duration: 1000, $Rotate: -0.1, $FlyDirection: 5, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Top: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $ScaleHorizontal: 0.2, $ScaleVertical: 0.5, $Opacity: 2} }
            //["Extrude Replace"]
                , { $Duration: 1600, $Delay: 40, $Cols: 12, $During: { $Left: [0.4, 0.6] }, $SlideOut: true, $FlyDirection: 2, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 260, $Easing: { $Left: $JssorEasing$.$EaseInOutExpo, $Opacity: $JssorEasing$.$EaseInOutQuad }, $ScaleHorizontal: 0.2, $Opacity: 2, $Outside: true, $Round: { $Top: 0.5 }, $Brother: { $Duration: 1000, $Delay: 40, $Cols: 12, $FlyDirection: 1, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 1028, $Easing: { $Left: $JssorEasing$.$EaseInOutExpo, $Opacity: $JssorEasing$.$EaseInOutQuad }, $ScaleHorizontal: 0.2, $Opacity: 2, $Round: { $Top: 0.5}} }
            ];

            var _CaptionTransitions = [
            //CLIP|LR
            {$Duration: 900, $Clip: 3, $Easing: $JssorEasing$.$EaseInOutCubic },
            //CLIP|TB
            {$Duration: 900, $Clip: 12, $Easing: $JssorEasing$.$EaseInOutCubic },

            //DDGDANCE|LB
            {$Duration: 1800, $Zoom: 1, $FlyDirection: 9, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Zoom: $JssorEasing$.$EaseOutQuad }, $ScaleHorizontal: 0.3, $ScaleVertical: 0.3, $Opacity: 2, $During: { $Left: [0, 0.8], $Top: [0, 0.8] }, $Round: { $Left: 0.8, $Top: 2.5} },
            //DDGDANCE|RB
            {$Duration: 1800, $Zoom: 1, $FlyDirection: 10, $Easing: { $Left: $JssorEasing$.$EaseInJump, $Top: $JssorEasing$.$EaseInJump, $Zoom: $JssorEasing$.$EaseOutQuad }, $ScaleHorizontal: 0.3, $ScaleVertical: 0.3, $Opacity: 2, $During: { $Left: [0, 0.8], $Top: [0, 0.8] }, $Round: { $Left: 0.8, $Top: 2.5} },

            //TORTUOUS|HL
            {$Duration: 1500, $Zoom: 1, $FlyDirection: 1, $Easing: { $Left: $JssorEasing$.$EaseOutWave, $Zoom: $JssorEasing$.$EaseOutCubic }, $ScaleHorizontal: 0.2, $Opacity: 2, $During: { $Left: [0, 0.7] }, $Round: { $Left: 1.3} },
            //TORTUOUS|VB
            {$Duration: 1500, $Zoom: 1, $FlyDirection: 8, $Easing: { $Top: $JssorEasing$.$EaseOutWave, $Zoom: $JssorEasing$.$EaseOutCubic }, $ScaleVertical: 0.2, $Opacity: 2, $During: { $Top: [0, 0.7] }, $Round: { $Top: 1.3} },

            //ZMF|10
            {$Duration: 600, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 },

            //ZML|R
            {$Duration: 600, $Zoom: 11, $FlyDirection: 2, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 0.6, $Opacity: 2 },
            //ZML|B
            {$Duration: 600, $Zoom: 11, $FlyDirection: 8, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $ScaleVertical: 0.6, $Opacity: 2 },

            //ZMS|B
            {$Duration: 700, $Zoom: 1, $FlyDirection: 8, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $ScaleVertical: 0.6, $Opacity: 2 },

            //ZM*JDN|LB
            {$Duration: 1200, $Zoom: 11, $FlyDirection: 9, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseOutCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: { $Top: [0, 0.5]} },
            //ZM*JUP|LB
            {$Duration: 1200, $Zoom: 11, $FlyDirection: 9, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: { $Top: [0, 0.5]} },
            //ZM*JUP|RB
            {$Duration: 1200, $Zoom: 11, $FlyDirection: 10, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: { $Top: [0, 0.5]} },

            //ZM*WVR|LT
            {$Duration: 1200, $Zoom: 11, $FlyDirection: 5, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $ScaleHorizontal: 0.5, $ScaleVertical: 0.3, $Opacity: 2, $Round: { $Rotate: 0.8} },
            //ZM*WVR|RT
            {$Duration: 1200, $Zoom: 11, $FlyDirection: 6, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInWave }, $ScaleHorizontal: 0.5, $ScaleVertical: 0.3, $Opacity: 2, $Round: { $Rotate: 0.8} },
            //ZM*WVR|TL
            {$Duration: 1200, $Zoom: 11, $FlyDirection: 5, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $ScaleVertical: 0.5, $Opacity: 2, $Round: { $Rotate: 0.8} },
            //ZM*WVR|BL
            {$Duration: 1200, $Zoom: 11, $FlyDirection: 9, $Easing: { $Left: $JssorEasing$.$EaseInWave, $Top: $JssorEasing$.$EaseLinear }, $ScaleHorizontal: 0.3, $ScaleVertical: 0.5, $Opacity: 2, $Round: { $Rotate: 0.8} },

            //RTT|10
            {$Duration: 700, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInExpo, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} },

            //RTTL|R
            {$Duration: 700, $Zoom: 11, $Rotate: 1, $FlyDirection: 2, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 0.6, $Opacity: 2, $Round: { $Rotate: 0.8} },
            //RTTL|B
            {$Duration: 700, $Zoom: 11, $Rotate: 1, $FlyDirection: 8, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $ScaleVertical: 0.6, $Opacity: 2, $Round: { $Rotate: 0.8} },

            //RTTS|R
            {$Duration: 700, $Zoom: 1, $Rotate: 1, $FlyDirection: 2, $Easing: { $Left: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad }, $ScaleHorizontal: 0.6, $Opacity: 2, $Round: { $Rotate: 1.2} },
            //RTTS|B
            {$Duration: 700, $Zoom: 1, $Rotate: 1, $FlyDirection: 8, $Easing: { $Top: $JssorEasing$.$EaseInQuad, $Zoom: $JssorEasing$.$EaseInQuad, $Rotate: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseOutQuad }, $ScaleVertical: 0.6, $Opacity: 2, $Round: { $Rotate: 1.2} },

            //RTT*JDN|RT
            {$Duration: 1000, $Zoom: 11, $Rotate: .2, $FlyDirection: 6, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseOutCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: { $Top: [0, 0.5]} },
            //RTT*JDN|LB
            {$Duration: 1000, $Zoom: 11, $Rotate: .2, $FlyDirection: 9, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseOutCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: { $Top: [0, 0.5]} },
            //RTT*JUP|RB
            {$Duration: 1000, $Zoom: 11, $Rotate: .2, $FlyDirection: 10, $Easing: { $Left: $JssorEasing$.$EaseLinear, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 0.8, $ScaleVertical: 0.5, $Opacity: 2, $During: { $Top: [0, 0.5]} },
            { $Duration: 1200, $Zoom: 11, $Rotate: true, $FlyDirection: 6, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseLinear, $Zoom: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 0.5, $ScaleVertical: 0.8, $Opacity: 2, $During: { $Left: [0, 0.5] }, $Round: { $Rotate: 0.5} },
            //RTT*JUP|BR
            {$Duration: 1000, $Zoom: 11, $Rotate: .2, $FlyDirection: 10, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseLinear, $Zoom: $JssorEasing$.$EaseInCubic }, $ScaleHorizontal: 0.5, $ScaleVertical: 0.8, $Opacity: 2, $During: { $Left: [0, 0.5]} },

            //R|IB
            {$Duration: 900, $FlyDirection: 2, $Easing: { $Left: $JssorEasing$.$EaseInOutBack }, $ScaleHorizontal: 0.6, $Opacity: 2 },
            //B|IB
            {$Duration: 900, $FlyDirection: 8, $Easing: { $Top: $JssorEasing$.$EaseInOutBack }, $ScaleVertical: 0.6, $Opacity: 2 },

            ];

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 0,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 3

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, direction navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
                    $Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
                    $CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                    $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                    $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
                },

                $NavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 0,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $DirectionNavigatorOptions: {
                    $Class: $JssorDirectionNavigator$,              //[Requried] Class to create direction navigator instance
                    $ChanceToShow: 2                                //[Required] 0 Never, 1 Mouse Over, 2 Always
                }
            };

            var jssor_slider1 = new $JssorSlider$("slider1_container", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$SetScaleWidth(Math.min(parentWidth, 600));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }
            //responsive code end
        });
    </script>
<script type="text/javascript">
$(function(){
$(".text7").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'text7='+ searchid;
if(searchid!='')
{
    $.ajax({
    type: "POST",
    url: "search.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
});

jQuery("#result").live("click",function(e){ 
 var $clicked = $(e.target);
    var $name = $clicked.find('.name').html();
    var decoded = $("<div/>").html($name).text();
    $('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("text7")){
    jQuery("#result").fadeOut(); 
    }
});
$('#searchid').click(function(){
    jQuery("#result").fadeIn();
});
});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50451271-1', 'maligai.net');
  ga('send', 'pageview');

</script>
 <style> 
        .captionOrange, .captionBlack
        {
            color: #fff;
            font-size: 20px;
            line-height: 30px;
            text-align: center;
            border-radius: 4px;
        }
        .captionOrange
        {
            background: #fff;
            background-color: rgba(235, 81, 0, 0.6);
			float:left;
        }
        .captionBlack
        {
        	font-size:16px;
            background: #000;
            background-color: rgba(0, 0, 0, 0.4);
        }
        a.captionOrange, A.captionOrange:active, A.captionOrange:visited
        {
        	color: #ffffff;
        	text-decoration: none;
        }
        a.captionOrange:hover
        {
            color: #eb5100;
            text-decoration: underline;
            background-color: #eeeeee;
            background-color: rgba(238, 238, 238, 0.7);
        }
        .bricon
        {
            background: url(../img/browser-icons.png);
        }
    </style>
</head>
<body onload="openOffersDialog();" id="top">
<!----------<body oncontextmenu="return false">----disable mouse right click on a web page------>
<div class="wrapper">
<div class="header">
<div class="innerheader">
<div class="logo"><a href="index.php"><img src="images/llogo.png" style="width:370px; height:254px; margin-top:-61px;"/></a></div>
<div class="headertopmenu">
 <ul class="topmenu">
   <li><a href="index.php">Home</a></li>
         <li>|</li>
   		 <?php
if(!isset($_SESSION['uuser']))
 {
 ?>
   		 <li><a href="userlogin.php">Login</a></li>
         <li>|</li>
       <?php  }
	   else{
		   ?>
		   <li><a href=""><?php echo $_SESSION['uuser']; ?></a></li>
         <li>|</li>
         <li><a href="edit-profile.php">Edit-Profile</a></li>
         <li>|</li>
          <li><a href="userlogout.php" >logout</a></li>
  	     <li>|</li>
         <li><a href="placeorder.php">Track Order</a></li>
          <li>|</li>
		<?php   }
	   ?>
    	
  	     <li><a href="contac.php">Customer Support</a></li>
        
  
<li><a href=" https://www.facebook.com/TrichyMaligai" target="_blank" title="Facebook"><img src="images/facebook.png" /></a><li><li><a href="http://twitter.com/maligaitrichy" target="_blank" title="Twitter"><img src="images/twitter.png" /></a></li><li><a href="https://plus.google.com/" title="Google Plus" target="_blank"><img src="images/googleplus.png" /></a></li>
</ul>
</div>
<div class="searboxecom">
<div class="boxsearch">
                 <form  method="post"  action="search.php" class="serachstyle sb_wrapper" id="ui_element">
 <input name="book" id="searchid" type="text"  class="text7"/>
<input name="search" type="submit" value="Search"   class="sb_input"/>


 <div id="result"></div>
 </form>
</div>
</div>
<div class="clearer">
</div>
</div>
<div class="clearer">
</div>
</div>
<div class="ecommenu">
<div class="innerecommenu" >
<div class="emenu" >
<div class="nav-container">
<div class="nav">
<?php include "mainmenunew.php";?>
<?php
if(isset($_SESSION['uuser']))
{?>

<div class="cart"><a href="shoppingcart.php" class="big-link"><img src="images/cartbck.png" /><span class="cart1"><?php echo get_total_count(); ?></span></a></div>
<?php
}
else{?>
	<div class="cart"><a href="userlogin.php" class="big-link" ><img src="images/cartbck.png" /><span class="cart1"><?php echo get_total_count(); ?></span></a></div>
<?php } ?>
<?php include"carrrt.php";?>
</div>
</div>
</div>
<div class="clearer">
</div>
</div>
<div class="clearer">
</div>
</div>

<div class="thirdheader">
<div class="innerthirdheader">

<div class="innersecondheader">

<div class="ecomslider">

			 <div id="slider1_container" style="position: relative; width: 700px;
        height: 350px;">

        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>
        
        <!-- Slides Container -->
        <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 793px; height: 345px;margin-top:10px;
        margin-left:10px;margin-bottom:10px;margin-right:10px; overflow: hidden;">
              <div>
                <a u=image href="#"><img src="images/sp.png"/></a>
                
            </div>
             <div>
                <a u=image href="#"><img src="images/Contact-banner.png"/></a>
                
            </div>
          
            <div>
                <a u=image href="#"><img src="images/banner9.jpg"/></a>
                
            </div>
           
            <div>
                <a u=image href="#"><img src="images/laundry1.jpg" /></a>
                
            </div>
              <div>
                <a u=image href="#"><img src="images/naturalbanner.jpg" /></a>
               
            </div>
             <div>
                <a u=image href="#"><img src="images/babycare1.jpg" /></a>
               
            </div>
            <div>
                <a u=image href="#"><img src="images/pooja-items-banner.png" /></a>
                
            </div>
             <div>
                <a u=image href="#"><img src="images/gift.jpg" /></a>
               
                </div>
           
             <div>
                <a u=image href="#"><img src="images/homekichen.jpg" /></a>
                
            </div>
        </div>
        
        <!-- Navigator Skin Begin -->
        <!-- jssor slider navigator skin 01 -->
        <style>
            /*
            .jssorn01 div           (normal)
            .jssorn01 div:hover     (normal mouseover)
            .jssorn01 .av           (active)
            .jssorn01 .av:hover     (active mouseover)
            .jssorn01 .dn           (mousedown)
            */
            .jssorn01 div, .jssorn01 div:hover, .jssorn01 .av
            {
                filter: alpha(opacity=70);
                opacity: .7;
                overflow:hidden;
                cursor: pointer;
                border: #000 1px solid;
            }
            .jssorn01 div { background-color: gray; }
            .jssorn01 div:hover, .jssorn01 .av:hover { background-color: #d3d3d3; }
            .jssorn01 .av { background-color: #fff; }
            .jssorn01 .dn, .jssorn01 .dn:hover { background-color: #555555; }
        </style>
        <!-- navigator container -->
        <div u="navigator" class="jssorn01" style="position: absolute; bottom: 16px; right: 10px;">
            <!-- navigator item prototype -->
            <div u="prototype" style="POSITION: absolute; WIDTH: 12px; HEIGHT: 12px;"></div>
        </div>
        <!-- Navigator Skin End -->
        
        <!-- Direction Navigator Skin Begin -->
        <style>
            /* jssor slider direction navigator skin 05 css */
            /*
            .jssord05l              (normal)
            .jssord05r              (normal)
            .jssord05l:hover        (normal mouseover)
            .jssord05r:hover        (normal mouseover)
            .jssord05ldn            (mousedown)
            .jssord05rdn            (mousedown)
            */
            .jssord05l, .jssord05r, .jssord05ldn, .jssord05rdn
            {
            	position: absolute;
            	cursor: pointer;
            	display: block;
                background: url(../img/d17.png) no-repeat;
                overflow:hidden;
            }
            .jssord05l { background-position: -10px -40px; }
            .jssord05r { background-position: -70px -40px; }
            .jssord05l:hover { background-position: -130px -40px; }
            .jssord05r:hover { background-position: -190px -40px; }
            .jssord05ldn { background-position: -250px -40px; }
            .jssord05rdn { background-position: -310px -40px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssord05l" style="width: 40px; height: 40px; top: 123px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssord05r" style="width: 40px; height: 40px; top: 123px; right: 8px">
        </span>
        <!-- Direction Navigator Skin End -->
        <a style="display: none" href="http://www.jssor.com">jQuery Slider</a>
    </div>
 
</div>
<div class="common fL">

<?php 
$ccount= get_total_count();
if($ccount>0)
{
	include"cat.php";
 ?>
	 
 
    <?php 
	}
	 else
	{?> 


       <div class="gift-image ">

    <a href="#">
        <img alt="" src="images/banner8.png" width="270" height="130"></img>
    </a>
    </div>
    <div class="gift-image">

    <a href="#">
        <img alt="" src="images/riceproduct1.jpg" width="270" height="130" ></img>
    </a>
    </div>
    
<?php 
} 
 ?>
    </div>
</div>

<div class="clearer">
</div>
</div>
<div class="clearer">
</div>
</div>
<div class="allproducts">
<div class="innerallproducts clearfix">
<div class="itemproducts">
<div class="tiltlebckpro">
<h5>Our Products</h5>
</div>
<?php
 $id = $_GET['id'];
		   $_SESSION['page']=$id;			
	/*
		Place code to connect to your DB here.
	*/
	
	$tbl_name="products";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages[num];
	
	/* Setup vars for query. */
	$targetpage = "index.php"; 	//your file name  (the name of this file)
	$limit = 12; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">� previous</a>";
		else
			$pagination.= "<span class=\"disabled\">� previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next �</a>";
		else
			$pagination.= "<span class=\"disabled\">next �</span>";
		$pagination.= "</div>\n";		
	}
		
		
		while($r9 = mysql_fetch_array($result))
			{ 
			$autoid=$r9['autoid'];
			$id=$r9['id'];
            ?>



	




		
<div class="firsproduct">
<section class="row">
<div class="container-item">
<div class="item">
<a href="productview.php?id=<?php echo $r9['autoid']; ?>"><img src="<?php echo $r9['proimg']; ?>"  width="170" height="180"/></a>

					
				</div>
			
                    </div>
</section>
<div class="iitem">
								
                                
                                <div class="cartbut">
									<form name="for" action="index.php" method="post">
	<input type="hidden" name="productid" value="<?php echo $r9['id']; ?>"  />
    <input type="hidden" name="command" value="add" />
  
		   <input type="submit" name="add" value="Add to Cart" class="bbtn"/>
           
</form>

                                    </div>
                                   
                                    <div class="item-product">
									<div class="item-top-title">
										<p><?php echo $r9['proname']; ?></p>
										<!--<p class="subdescription">
											Low skateshoes - Grey
										</p>-->
									</div>
								</div>
								<div class="item-product-price">
									<span style="color:#2d133b;"><?php echo $r9['weightclass']; ?></span>
								</div>
                         <div class="iitemfo">      
  <span class="price-num fL">Rs:<?php echo $r9['offer']; ?></span>  <p class="subdescription fR">Rs:<?php echo $r9['price']; ?></p>
                                  
									<div class="oold-price"></div> 
                                    </div> 
                                                         
</div>
  
</div>


<?php } ?>
</div>
<!-----Fourth product----->
<p id="back-top" style="display: block;">
		<a href="#top"><span></span>Back to Top</a>
	</p></div>
<div class="clearer">

</div>
</div>

<?php echo $pagination;?>
</div>

<?php include 'frontfooter.php'; ?>
 

     
    
</div>
<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9773858; 
var sc_invisible=0; 
var sc_security="bc8629a5"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="web statistics"
href="http://statcounter.com/free-web-stats/"
target="_blank"><img class="statcounter"
src="http://c.statcounter.com/9773858/0/bc8629a5/0/"
alt="web statistics"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

<script type="text/javascript">
$(document).ready(function($){
	
	$('#mega-menu-7').dcMegaMenu({
		rowItems: '3',
		speed: 'fast',
		effect: 'slide'
	});
	
});
</script>

</body>
</html>
